var goUp = document.getElementById("backtotop");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    goUp.style.display = "block";
  } else {
    goUp.style.display = "none";
  }
}
function topFunction() {
  window.scrollTo(0, 0);
}

///////////////////
$(".navbar a").click(function() {  
  //remove all active class from a elements
  $("a").removeClass("active");
  $(this).addClass("active");      //add the class to the clicked element
});

//////////////
/*Automatic slide */
//Slideshow
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  console.log(x.length);
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000);    
}
