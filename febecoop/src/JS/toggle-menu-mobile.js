const linksWithSubMenuTop = document.querySelectorAll(".header-second-section-mobile-wrapper .menu-header-main-menu-container #menu-header-main-menu .menu-item-has-children" );
const linksWithSubMenuBottom = document.querySelectorAll(".header-second-section-mobile-wrapper .top-nav-section #menu-header-top-menu .menu-item-has-children" );

console.log(linksWithSubMenuBottom)

linksWithSubMenuTop.forEach(link => {
    link.addEventListener('click', () => {
        link.classList.toggle('link-children-mobile-opened');
    })
})

linksWithSubMenuBottom.forEach(linkb => {
    linkb.addEventListener('click', () => {
        console.log('click bottom')
        linkb.classList.toggle('link-children-mobile-opened');
    })
})