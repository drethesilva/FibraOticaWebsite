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
    <div class="container">
        <h1 class="text-center pt-4">BackOffice Tecnico</h1>
        <hr>

        <div class="row">
            <div class="col-12 col-md-6">
                <a class="link" href="../Files/Folha Requisição Tarefosucesso.xlsx" download>
                    <p><i class="fas fa-download"></i>Download Controlo DST-MEO</p>
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a class="link" href="../Files/Controlo DST-MEO.xlsx" download>
                    <p><i class="fas fa-download"></i>Download Folha Requisição Tarefosucesso</p>
                </a>
            </div>
        </div>




        <form action="../Handlers/BackOfficeTecnicoHandlers.php?action=AddContent" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-12">
                    <h3 class="text-left mt-4">Adicionar Conteúdo</h3>
                </div>
                <div class="col-12">
                    <div class="text-left">
                        <input type="file" name="InputFile[]" id="InputFile" class="inputfile" multiple="multiple">
                        <label for="InputFile">Choose a file</label>
                        <input type="submit" value="Enviar" name="submit" onclick="AddContent();">
                    </div>

                </div>
            </div>
        </form>
    </div>




</body>

<?php
include_once "Content/_scripts.html";
?>

</html>