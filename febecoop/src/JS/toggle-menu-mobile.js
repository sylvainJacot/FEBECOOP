const linksWithSubMenuTop = document.querySelectorAll(".header-second-section-mobile-wrapper .menu-header-main-menu-container #menu-header-main-menu .menu-item-has-children" );
const linksWithSubMenuBottom = document.querySelectorAll(".header-second-section-mobile-wrapper .top-nav-section #menu-header-top-menu .menu-item-has-children" );

const allMenuLinks = document.querySelectorAll('.menu-item-object-page');

linksWithSubMenuTop.forEach(link => {
    link.addEventListener('click', () => {
        link.classList.toggle('link-children-mobile-opened');
    })
})

linksWithSubMenuBottom.forEach(linkb => {
    linkb.addEventListener('click', () => {
        linkb.classList.toggle('link-children-mobile-opened');
    })
})


allMenuLinks.forEach(link => {
    link.addEventListener('click', () => {
        link.style.color = 'red';
    })
})

function removeClassTablet() {


    if (window.matchMedia("(min-width: 768px)").matches) { // If media query matches
        linksWithSubMenuTop.forEach(link => {
            link.classList.remove('link-children-mobile-opened');
        })
    } 
  }

window.addEventListener('resize', removeClassTablet) // Attach listener function on state changes
