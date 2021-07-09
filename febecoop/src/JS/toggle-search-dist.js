'use strict';

var SearchActions = function SearchActions() {

    var searchTabletPlaceholder = document.getElementById('js-nav-search-tablet-placeholder');
    var searchTablet = document.getElementById('js-nav-search-tablet');
    var closeArea = document.getElementById('js-nav-search-tablet-close-area');

    var searchLaptopPlaceholder = document.getElementById('js-nav-search-laptop-placeholder');
    var searchLaptop = document.getElementById('js-nav-search-laptop');
    var closeAreaL = document.getElementById('js-nav-search-laptop-close-area');

    searchTabletPlaceholder.addEventListener('click', function () {
        searchTablet.classList.add('nav-search-tablet-active');
        closeArea.classList.add('nav-search-tablet-close-area-active');
    });

    closeArea.addEventListener('click', function () {
        searchTablet.classList.remove('nav-search-tablet-active');
        closeArea.classList.remove('nav-search-tablet-close-area-active');
    });

    searchLaptopPlaceholder.addEventListener('click', function () {
        searchLaptop.classList.add('nav-search-laptop-active');
        closeAreaL.classList.add('nav-search-laptop-close-area-active');
    });

    closeAreaL.addEventListener('click', function () {
        searchLaptop.classList.remove('nav-search-laptop-active');
        closeAreaL.classList.remove('nav-search-laptop-close-area-active');
    });
};

window.onload = function () {
    SearchActions();
};

window.onresize = function () {
    SearchActions();
};