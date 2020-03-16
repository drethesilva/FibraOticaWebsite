//Here you put the javascript that you need in youre html

//This function is going to call the Homepage handler, and run the Select all case
function GetWorkingExample() {
   $.post('../Handlers/HomePageHandlers.php?action=WorkingExample', function (response) {
       $("#Receiver").html(response);
    });
};

var myIndex;

function OnLoad()
{
    //inicio criaçao de carrosel
    myIndex = 0;
    carousel();
    //Fim criaçao de carrosel
}

//inicio criaçao de carrosel
function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
//fim criaçao de carrosel