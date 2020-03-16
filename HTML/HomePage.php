<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <?php
    include_once "Content/_header.html";
    ?>
    <link rel="stylesheet" href="../PHP/Style.php/Homepage.scss">
    <script src="../JS/HomePage.js"></script>
    <title>Homepage</title>
</head>

<?php
include_once "../PHP/HomePageHelper.php";
?>

<body onload="OnLoad()">
    <?php
    include_once "Content/Navbar.html";
    ?>
    
    <div class="container" >
        <img class="mySlides" src="https://mrgeekchris.com/wp/wp-content/uploads/2018/05/Enel-broadband.jpg" style="width:100%;display:none">
        <img class="mySlides" src="https://images.pexels.com/photos/159099/fibre-fiber-optics-blender-159099.jpeg?cs=srgb&dl=4k-resolution-blender-fiber-fibre-159099.jpg&fm=jpg" style="width:100%">
        <img class="mySlides" src="https://4k.com/wp-content/uploads/2014/12/shutterstock_fiber.jpg" style="width:100%;display:none">

        <div class="w3-row-padding w3-section">
            <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off mySlides_option_img" src="https://mrgeekchris.com/wp/wp-content/uploads/2018/05/Enel-broadband.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
            </div>
            <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off mySlides_option_img" src="https://images.pexels.com/photos/159099/fibre-fiber-optics-blender-159099.jpeg?cs=srgb&dl=4k-resolution-blender-fiber-fibre-159099.jpg&fm=jpg" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
            </div>
            <div class="w3-col s4">
            <img class="demo w3-opacity w3-hover-opacity-off mySlides_option_img" src="https://4k.com/wp-content/uploads/2014/12/shutterstock_fiber.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
            </div>
        </div>
    </div>

    <!-- Band Description -->
    <section class="w3-container w3-center w3-content" >
        <h2 class="w3-wide">THE BAND</h2>
        <p class="w3-opacity"><i>We love music</i></p>
        <p class="w3-justify">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </section>

    <div class="container" >
        <!-- Band Members -->
        <section class="w3-row-padding w3-center w3-light-grey">
            <article class="w3-third">
                <p>John</p>
                <img src="https://live.staticflickr.com/143/345519308_093f672a43_b.jpg" alt="Random Name" style="width:100%">
                <p>John is the smartest.</p>
            </article>
            <article class="w3-third">
                <p>Paul</p>
                <img src="https://torange.biz/photofx/63/8/hard-dark-very-vivid-colours-fragment-optical-fiber-63107.jpg" alt="Random Name" style="width:100%">
                <p>Paul is the prettiest.</p>
            </article>
            <article class="w3-third">
                <p>Ringo</p>
                <img src="https://p2.piqsels.com/preview/130/328/907/glass-fibres-light-light-pipe-led.jpg" alt="Random Name" style="width:100%">
                <p>Ringo is the funniest.</p>
            </article>
        </section>
    </div>

 



    <?php
    include_once "Content/_Footer.html";
    ?>


</body>
<?php
include_once "Content/_scripts.html";
?>

</html>