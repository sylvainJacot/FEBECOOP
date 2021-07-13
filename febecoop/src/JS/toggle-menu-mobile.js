const linksWithSubMenu = document.querySelectorAll(".header-second-section-mobile-wrapper .menu-header-main-menu-container #menu-header-main-menu .menu-item-has-children" );
console.log(linksWithSubMenu);



linksWithSubMenu.forEach(link => {
    link.addEventListener('click', () => {
        link.classList.add('testlooouuul');
    })
})