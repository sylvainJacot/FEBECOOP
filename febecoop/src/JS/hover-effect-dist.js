"use strict";var socialItemB=document.querySelectorAll(".social-item-b");socialItemB.forEach(function(item){item.onanimationend=function(){item.classList.remove("social-item-b-hover")},item.addEventListener("mouseover",function(){item.classList.add("social-item-b-hover")})});var socialItemA=document.querySelectorAll(".social-item-a");socialItemA.forEach(function(item){item.onanimationend=function(){item.classList.remove("social-item-a-hover")},item.addEventListener("mouseover",function(){item.classList.add("social-item-a-hover")})});var SearchItem=document.querySelectorAll(".js-nav-icon-search-laptop");SearchItem.forEach(function(item){item.onanimationend=function(){item.classList.remove("nav-search-laptop-hover")},item.addEventListener("mouseover",function(){item.classList.add("nav-search-laptop-hover")}),item.addEventListener("keypress",function(e){"Enter"===e.key&&item.classList.add("nav-search-laptop-hover")})});var SearchBar=document.querySelectorAll(".nav-search-laptop");SearchBar.forEach(function(search){search.addEventListener("keypress",function(e){"Enter"===e.key&&(console.log("Enter !"),SearchItem.forEach(function(item){item.classList.add("nav-search-laptop-hover")}))})});