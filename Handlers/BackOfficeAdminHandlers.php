<?php
session_start();
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    if (!isset($_SESSION["idAdmin"]) && !isset($_SESSION["Token"])) {
        echo 'You have to Login First';
        return;
    } else {
        if (Decript($_SESSION["Token"]) != "TokenAccessGranted") {
            echo 'Youre token is incorrect';
            return;
        }
    }

    switch ($_REQUEST['action']) {
        case "AddContent":
            if (count($_POST)) {
                $contentId = InsertContent($db);

                if ((count($_FILES['InputFile']['name']) == 0 || count($_FILES['InputFile']['name']) == 1) && $_FILES['InputFile']['name'][0] == "") {
                } else {
                    for ($i = 0; $i < count($_FILES['InputFile']['name']); $i++) {
                        $info = pathinfo($_FILES['InputFile']['name'][$i]);
                        $ext = $info['extension']; // get the extension of the file
                        $newname = GetNumberName($db) . "." . $ext;

                        $target = '../Files/FilesSended/' . $newname;
                        move_uploaded_file($_FILES['InputFile']['tmp_name'][$i], $target);

                        InsertFileContent($contentId, $newname, $db);
                    }
                }

                header("Location: {$_SERVER['HTTP_REFERER']}");
            } else {
                echo "<script>alert('Ocorreu um erro de envio de ficheiro, certifiquese que o seu ficheiro nao é maior que 2mb')</script><button onclick=\" document.location.href = '../HTML/BackOfficeAdmin.php' \">Voltar</button>";
            }
            break;
        case "CreateAccount":
            $query = $db->prepare("INSERT INTO userstecnico(email, password, Nome) VALUES ('" . htmlspecialchars($_POST["EmailTecnico"]) . "','" . hash("sha512", htmlspecialchars($_POST["PasswordTecnico"])) . "', '" . htmlspecialchars($_POST["NomeTecnico"]) . "');");
            $query->execute();
            echo 'Conta criada com successo';
            break;
        case "ChangeGeralPassword":
            $query = $db->prepare("UPDATE usersgeral SET password = '" . hash("sha512", htmlspecialchars($_POST["PasswordGeral"])) . "' WHERE 1");
            $query->execute();
            echo "Password Geral alterada com successo";
            break;
        case "GetTecnicos":
            $query = $db->prepare("SELECT id, Nome, email FROM userstecnico");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
        case "GetConteudo":
            $query = $db->prepare("SELECT * FROM conteudobackoffice");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
        case "DeleteTecnico":
            $query = $db->prepare("DELETE FROM userstecnico WHERE id = " . $_POST["IdTecnico"]);
            $query->execute();
            echo "Técnico apagado com successo";
            break;

        case "DeleteConteudo":
            // Foreach para apagar os ficheiros.
            foreach (GetConteudoFiles($_POST["IdConteudo"], $db) as $file) {
                if (file_exists("../Files/FilesSended/" . $file->nomedoficheiro)) {
                    unlink("../Files/FilesSended/" . $file->nomedoficheiro);
                }
            }
            $query = $db->prepare("DELETE FROM conteudobackoffice WHERE id= " . $_POST["IdConteudo"] . "; Delete from ficheirosconteudobackoffice where idconteudo = " . $_POST["IdConteudo"]);
            $query->execute();
            echo "Conteúdo apagado com successo";
            break;

        case "EditTecnico":
            $query = $db->prepare("UPDATE userstecnico SET email= '" . $_POST["EmailTecnico"] . "', Nome='" . $_POST["NomeTecnico"] . "' WHERE id='" . $_POST["IdTecnico"] . "'");
            $query->execute();
            echo "Técnico editado com successo";
            break;
        case "EditConteudo":
            $query = $db->prepare("UPDATE conteudobackoffice SET nome= '" . $_POST["TituloConteudo"] . "', descricao='" . $_POST["DescricaoConteudo"] . "' WHERE id='" . $_POST["IdConteudo"] . "'");
            $query->execute();
            echo "Conteudo editado com successo";
            break;
        case "GetConteudoFiles":
            echo json_encode(GetConteudoFiles($_POST["id"], $db));
            break;
        case "DeleteImgFromEvent":
            if (file_exists("../Files/FilesSended/" . $_REQUEST["file"])) {
                unlink("../Files/FilesSended/" . $_REQUEST["file"]);
            }

            $query = $db->prepare("Delete from ficheirosconteudobackoffice where nomedoficheiro = '" . $_REQUEST["file"] . "'");
            $query->execute();
            break;
        case "AddImgs":
            for ($i = 0; $i < count($_FILES['InputFile']['name']); $i++) {
                $info = pathinfo($_FILES['InputFile']['name'][$i]);
                $ext = $info['extension']; // get the extension of the file
                $newname = GetNumberName($db) . "." . $ext;

                $target = '../Files/FilesSended/' . $newname;
                move_uploaded_file($_FILES['InputFile']['tmp_name'][$i], $target);

                InsertFileContent($_REQUEST["Id"], $newname, $db);
            }
            header("Location: {$_SERVER['HTTP_REFERER']}");
            break;
        case "ReadExcell":
            $Result = $_POST["result"];

            $QueryString = "INSERT INTO conteudoexcell ( Nome, Problema, Idade ) VALUES";

            $contador = 0;
            foreach ($Result as $r) {
                if ($contador > 0) {
                    $QueryString = $QueryString . ',';
                }

                $QueryString = $QueryString . "('" . $r["Nome"] . "', '" . $r["Problema"] . "', " . $r["Idade"] . ")";
                $contador++;
            }

            $QueryString = $QueryString . ";";
            $query = $db->prepare($QueryString);
            $query->execute();

            echo 'Conteúdo do excell adicionado com successo';
            break;
    }
}

function InsertContent($db)
{
    $query = $db->prepare("INSERT INTO conteudobackoffice (nome, descricao, typeContent) VALUES ('" . htmlspecialchars($_POST["Titulo"]) . "','" . htmlspecialchars($_POST["Descricao"]) . "' , '" . htmlspecialchars($_POST["TypeContent"]) . "');");
    $query->execute();

    $query = $db->prepare("SELECT LAST_INSERT_ID() AS id;");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id;
    }
}

function InsertFileContent($contentId, $fileName, $db)
{
    $query = $db->prepare("INSERT INTO ficheirosconteudobackoffice(idconteudo, nomedoficheiro) VALUES ('" . $contentId . "','" . $fileName . "')");
    $query->execute();
}

function GetNumberName($db)
{
    $query = $db->prepare("SELECT * FROM ficheirosconteudobackoffice ORDER BY id DESC LIMIT 0, 1");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id + 1;
    }
}

function GetConteudoFiles($id, $db)
{
    $query = $db->prepare("SELECT nomedoficheiro FROM ficheirosconteudobackoffice WHERE idconteudo = " . $id);
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    return $rs;
}

function file_upload_max_size()
{
    static $max_size = -1;

    if ($max_size < 0) {
        // Start with post_max_size.
        $post_max_size = parse_size(ini_get('post_max_size'));
        if ($post_max_size > 0) {
            $max_size = $post_max_size;
        }

        // If upload_max_size is less, then reduce. Except if upload_max_size is
        // zero, which indicates no limit.
        $upload_max = parse_size(ini_get('upload_max_filesize'));
        if ($upload_max > 0 && $upload_max < $max_size) {
            $max_size = $upload_max;
        }
    }
    return $max_size;
}

function parse_size($size)
{
    $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
    $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
    if ($unit) {
        // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
        return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
    } else {
        return round($size);
    }
}
