const MenuButton = document.getElementById("js-main-navigation-menu-button");
const HeaderMainMenuMobile = document.getElementById("js-header-second-section-mobile");



MenuButton.addEventListener("click", togglemenu);
function togglemenu() {

  const scrollY = document.documentElement.style.getPropertyValue('--scroll-y');
  // body.style.position = 'fixed';
  // body.style.top = `-${scrollY}`;

  HeaderMainMenuMobile.classList.toggle("header-second-section-mobile-active");
  MenuButton.classList.toggle("main-navigation-menu-button-active")
  
  if(document.body.classList.contains('body-fixed')) {
    console.log("Je retire la classe body")
    document.body.classList.remove('body-fixed');

  } else {
    console.log("J'ajoute la classe body'")
    document.body.classList.add('body-fixed');
    document.body.style.top = `-${scrollY}`;
  }

}
