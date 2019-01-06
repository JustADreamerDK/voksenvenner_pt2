// Menu
var menu = document.querySelector(".menu");
var menuLille = document.querySelector(".menu-lille");


var showMenuBtn = document.querySelector("#showMenu");

showMenuBtn.addEventListener("click", function(event){
    menu.style.display = "block";
    menuLille.style.display = "none";
});

var closeMenuBtn = document.querySelector("#menuLuk");
closeMenuBtn.addEventListener("click", function(event){
    menu.style.display = "none";
    menuLille.style.display = "flex";
});

// Minimenu
var aabenMinimenu1 = document.querySelector(".minimenu1");
var showMinimenuBtn1 = document.querySelector("#aaben1");

if(aabenMinimenu1){
showMinimenuBtn1.addEventListener("click", function(event){
    aabenMinimenu1.style.display = "block";
})};

var aabenMinimenu2 = document.querySelector(".minimenu2");
var showMinimenuBtn2 = document.querySelector("#aaben2");

if(aabenMinimenu2){
showMinimenuBtn2.addEventListener("click", function(event){
    aabenMinimenu2.style.display = "block";
})};

var aabenMinimenu3 = document.querySelector(".minimenu3");
var showMinimenuBtn3 = document.querySelector("#aaben3");

if(aabenMinimenu3){
showMinimenuBtn3.addEventListener("click", function(event){
    aabenMinimenu3.style.display = "block";
})};

var aabenMinimenu4 = document.querySelector(".minimenu4");
var showMinimenuBtn4 = document.querySelector("#aaben4");

if(aabenMinimenu4){
showMinimenuBtn4.addEventListener("click", function(event){
    aabenMinimenu4.style.display = "block";
})};

var aabenMinimenu5 = document.querySelector(".minimenu5");
var showMinimenuBtn5 = document.querySelector("#aaben5");

if(aabenMinimenu5){
showMinimenuBtn5.addEventListener("click", function(event){
    aabenMinimenu5.style.display = "block";
})};


// Slideshow
var slide = document.querySelector(".slidebutton");
if(slide){
var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("slide");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";
      }
      x[slideIndex-1].style.display = "block";
    }
};
