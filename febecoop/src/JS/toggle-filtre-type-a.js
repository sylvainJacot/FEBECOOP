const filtresContainerA = document.querySelector(
  ".js-filtres-type-a-container"
);

if (filtresContainerA) {
  filtresContainerA.addEventListener("click", togglemenu);
function togglemenu() {
  filtresContainerA.classList.toggle("filtres-type-a-container-active");
}
}

