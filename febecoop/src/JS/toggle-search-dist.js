"use strict";function myFunction(){var searchTablet=document.getElementById("js-nav-search-tablet"),closeArea=document.getElementById("js-nav-search-tablet-close-area"),searchLaptop=document.getElementById("js-nav-search-laptop"),closeAreaL=document.getElementById("js-nav-search-laptop-close-area");window.matchMedia("(min-width: 1025px)").matches?(searchTablet.classList.remove("nav-search-tablet-active"),closeArea.classList.remove("nav-search-tablet-close-area-active")):(searchLaptop.classList.remove("nav-search-laptop-active"),closeAreaL.classList.remove("nav-search-laptop-close-area-active"))}var SearchActions=function(){var searchTabletPlaceholder=document.getElementById("js-nav-search-tablet-placeholder"),searchTablet=document.getElementById("js-nav-search-tablet"),closeArea=document.getElementById("js-nav-search-tablet-close-area"),searchLaptopPlaceholder=document.getElementById("js-nav-search-laptop-placeholder"),searchLaptop=document.getElementById("js-nav-search-laptop"),closeAreaL=document.getElementById("js-nav-search-laptop-close-area");searchTabletPlaceholder.addEventListener("click",function(){searchTablet.classList.contains("nav-search-tablet-active")?(searchTablet.classList.remove("nav-search-tablet-active"),closeArea.classList.remove("nav-search-tablet-close-area-active")):(searchTablet.classList.add("nav-search-tablet-active"),closeArea.classList.add("nav-search-tablet-close-area-active"))}),closeArea.addEventListener("click",function(){searchTablet.classList.remove("nav-search-tablet-active"),closeArea.classList.remove("nav-search-tablet-close-area-active")}),searchLaptopPlaceholder.addEventListener("click",function(){searchLaptop.classList.contains("nav-search-laptop-active")&&closeAreaL.classList.contains("nav-search-laptop-close-area-active")?(searchLaptop.classList.remove("nav-search-laptop-active"),closeAreaL.classList.remove("nav-search-laptop-close-area-active")):(searchLaptop.classList.add("nav-search-laptop-active"),closeAreaL.classList.add("nav-search-laptop-close-area-active"))}),closeAreaL.addEventListener("click",function(){searchLaptop.classList.contains("nav-search-laptop-active")&&closeAreaL.classList.contains("nav-search-laptop-close-area-active")?(searchLaptop.classList.remove("nav-search-laptop-active"),closeAreaL.classList.remove("nav-search-laptop-close-area-active")):(searchLaptop.classList.add("nav-search-laptop-active"),closeAreaL.classList.add("nav-search-laptop-close-area-active"))})};SearchActions(),window.addEventListener("resize",myFunction);