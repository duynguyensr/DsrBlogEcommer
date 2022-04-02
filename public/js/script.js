const menu = document.querySelector(".menu");
const closemenu = document.querySelector(".close-menu");

const submenu = document.querySelector(".sub-menu");

menu.addEventListener("click", () => {
  submenu.classList.toggle("effect");
});

closemenu.addEventListener("click", () => {
  submenu.classList.toggle("effect");
});
