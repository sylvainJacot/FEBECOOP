
const SearchActions = function(){

let searchTabletPlaceholder = document.getElementById('js-nav-search-tablet-placeholder');
let searchTablet = document.getElementById('js-nav-search-tablet');
let closeArea = document.getElementById('js-nav-search-tablet-close-area');

let searchLaptopPlaceholder = document.getElementById('js-nav-search-laptop-placeholder');
let searchLaptop = document.getElementById('js-nav-search-laptop');
let closeAreaL = document.getElementById('js-nav-search-laptop-close-area');


searchTabletPlaceholder.addEventListener('click', () => {
    if(searchTablet.classList.contains('nav-search-tablet-active')){
        searchTablet.classList.remove('nav-search-tablet-active');
        closeArea.classList.remove('nav-search-tablet-close-area-active');
    } else {
        searchTablet.classList.add('nav-search-tablet-active');
        closeArea.classList.add('nav-search-tablet-close-area-active');
    }

})

closeArea.addEventListener('click', () => {
    searchTablet.classList.remove('nav-search-tablet-active');
    closeArea.classList.remove('nav-search-tablet-close-area-active');
})


searchLaptopPlaceholder.addEventListener('click', () => {

    if(searchLaptop.classList.contains('nav-search-laptop-active') && closeAreaL.classList.contains('nav-search-laptop-close-area-active')) {
        searchLaptop.classList.remove('nav-search-laptop-active');
        closeAreaL.classList.remove('nav-search-laptop-close-area-active');
    } else {
        searchLaptop.classList.add('nav-search-laptop-active');
        closeAreaL.classList.add('nav-search-laptop-close-area-active');
    }

})

closeAreaL.addEventListener('click', () => {
    if(searchLaptop.classList.contains('nav-search-laptop-active') && closeAreaL.classList.contains('nav-search-laptop-close-area-active')) {
        searchLaptop.classList.remove('nav-search-laptop-active');
        closeAreaL.classList.remove('nav-search-laptop-close-area-active');
    } else {
        searchLaptop.classList.add('nav-search-laptop-active');
        closeAreaL.classList.add('nav-search-laptop-close-area-active');
    }
})


}
SearchActions();

function myFunction() {

    let searchTablet = document.getElementById('js-nav-search-tablet');
    let closeArea = document.getElementById('js-nav-search-tablet-close-area');
    let searchLaptop = document.getElementById('js-nav-search-laptop');
    let closeAreaL = document.getElementById('js-nav-search-laptop-close-area');


    if (window.matchMedia("(min-width: 1025px)").matches) { // If media query matches
        searchTablet.classList.remove('nav-search-tablet-active');
        closeArea.classList.remove('nav-search-tablet-close-area-active');
    } else {
        searchLaptop.classList.remove('nav-search-laptop-active');
        closeAreaL.classList.remove('nav-search-laptop-close-area-active');
    }
  }

window.addEventListener('resize', myFunction) // Attach listener function on state changes
