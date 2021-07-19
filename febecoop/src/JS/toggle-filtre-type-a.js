const filtresContainerA = document.querySelector(
  ".js-filtres-type-a-container"
);

if (filtresContainerA) {

  window.addEventListener('click', (e) => {
    if(filtresContainerA.contains(e.target)) {
      filtresContainerA.classList.toggle("filtres-type-a-container-active");
    } else {
      filtresContainerA.classList.remove("filtres-type-a-container-active");
    }
  })

  // filtresContainerA.addEventListener("click", togglemenu);

  // function togglemenu() {
  //   filtresContainerA.classList.toggle("filtres-type-a-container-active");
  // }

}

