const MenuButton = document.getElementById("js-main-navigation-menu-button");
const HeaderMainMenuMobile = document.getElementById(
  "js-header-second-section-mobile"
);
const NavSearchTablet = document.getElementById("js-nav-search-tablet");
let closeArea = document.getElementById('js-nav-search-tablet-close-area');
const Header = document.getElementById("js-header");

MenuButton.addEventListener("click", togglemenu);
function togglemenu() {
  const scrollY = document.documentElement.style.getPropertyValue("--scroll-y");
  HeaderMainMenuMobile.classList.toggle("header-second-section-mobile-active");
  MenuButton.classList.toggle("main-navigation-menu-button-active");

  if (document.body.classList.contains("body-fixed")) {
    document.body.classList.remove("body-fixed");
  } else {
    document.body.classList.add("body-fixed");
    document.body.style.top = `-${scrollY}`;
  }

  if (NavSearchTablet.classList.contains("nav-search-tablet-active")) {
    NavSearchTablet.classList.remove("nav-search-tablet-active");
    closeArea.classList.remove('nav-search-tablet-close-area-active');
    } else {
    searchTablet.classList.add('nav-search-tablet-active');
    closeArea.classList.add('nav-search-tablet-close-area-active');
}
}