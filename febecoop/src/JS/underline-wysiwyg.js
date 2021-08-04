var allLinksWysiwyg = document.querySelectorAll('.generic-content p a');

allLinksWysiwyg.forEach((link) => {
    let html = link.innerHTML;
    link.innerHTML = "<span>" + html +"</span>";
})

