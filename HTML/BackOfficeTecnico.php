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
</body>

<?php
include_once "Content/_scripts.html";
?>

</html>