<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <title>BackOffice Tecnico</title>
    <link rel="stylesheet" href="../PHP/Style.php/BackOfficeTecnico.scss">
    <script src="../JS/BackOfficeTecnico.js"></script>
</head>

<?php
include_once "../PHP/BackOfficeTecnicoHelper.php";
?>

<body>

    <?php
    include_once "Content/Navbar.html";
    ?>
    <h1>BackOffice Tecnico</h1>

    <a href="../Files/Folha Requisição Tarefosucesso.xlsx" download>
        <p>Download Controlo DST-MEO</p>
    </a>

    <a href="../Files/Controlo DST-MEO.xlsx" download>
        <p>Download Folha Requisição Tarefosucesso</p>
    </a>


    <form action="../Handlers/BackOfficeTecnicoHandlers.php?action=AddContent" method="post" enctype="multipart/form-data">
        <h3>Adicionar Conteúdo</h3>
        <div class="row">
            <div class="col">
                <input type="file" name="InputFile[]" id="InputFile" class="inputfile" multiple="multiple">
                <label for="InputFile">Choose a file</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" value="Enviar" name="submit" onclick="AddContent();">
            </div>
        </div>
    </form>
</body>

<?php
include_once "Content/_scripts.html";
?>

</html>