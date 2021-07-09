
const SearchActions = function(){

let searchTabletPlaceholder = document.getElementById('js-nav-search-tablet-placeholder');
let searchTablet = document.getElementById('js-nav-search-tablet');
let closeArea = document.getElementById('js-nav-search-tablet-close-area');

let searchLaptopPlaceholder = document.getElementById('js-nav-search-laptop-placeholder');
let searchLaptop = document.getElementById('js-nav-search-laptop');
let closeAreaL = document.getElementById('js-nav-search-laptop-close-area');


searchTabletPlaceholder.addEventListener('click', () => {
    searchTablet.classList.add('nav-search-tablet-active');
    closeArea.classList.add('nav-search-tablet-close-area-active');
})

closeArea.addEventListener('click', () => {
    searchTablet.classList.remove('nav-search-tablet-active');
    closeArea.classList.remove('nav-search-tablet-close-area-active');
})


searchLaptopPlaceholder.addEventListener('click', () => {
    searchLaptop.classList.add('nav-search-laptop-active');
    closeAreaL.classList.add('nav-search-laptop-close-area-active');

})

closeAreaL.addEventListener('click', () => {
    searchLaptop.classList.remove('nav-search-laptop-active');
    closeAreaL.classList.remove('nav-search-laptop-close-area-active');
})


}


window.onload = function() {
    SearchActions();

}


window.onresize = function() {
    SearchActions();
}
