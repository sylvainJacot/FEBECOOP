"use strict";var allLinksWysiwyg=document.querySelectorAll(".generic-content p a");allLinksWysiwyg.forEach(function(link){var html=link.innerHTML;link.innerHTML="<span>"+html+"</span>",console.log(link)});