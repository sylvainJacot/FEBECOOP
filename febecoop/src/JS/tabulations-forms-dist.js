"use strict";var tabs=document.querySelectorAll("[data-tab-target]"),tabContents=document.querySelectorAll(".form-wrapper-item");tabs.forEach((function(t){t.addEventListener("click",(function(){var e=document.querySelector(t.dataset.tabTarget);tabContents.forEach((function(t){t.classList.remove("form-wrapper-item-active")})),tabs.forEach((function(t){t.classList.remove("tab-nav-item-active")})),e.classList.add("form-wrapper-item-active"),t.classList.add("tab-nav-item-active")}))}));