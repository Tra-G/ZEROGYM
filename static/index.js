const hamburger = document.querySelector(".hamburger");
const menu = document.querySelector(".navlinks ul");

hamburger.addEventListener("click", function() {
  menu.classList.toggle("show");
});