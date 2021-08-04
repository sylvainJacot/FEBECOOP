// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// --- ADD TARGET BLANK
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------

//  $('a').each(function() {
//     console.log("hzfkezhfuezfez")
//      var a = new RegExp('/' + window.location.host + '/');
//      if (!a.test(this.href)) {
//         $(this).attr("target","_blank");
//      }
//   });

// var allLinksWysiwyg = document.querySelectorAll(".generic-content p a");

// console.log(allLinksWysiwyg);

// allLinksWysiwyg.forEach((link) => {
//   var a = new RegExp("/" + window.location.host + "/");
//   if (!a.test(link.href)) {
//     link.attr("target", "_blank");
//   }
// });


var links = document.querySelectorAll(".generic-content p a");

for (let i = 0; i < links.length; i++) {
    if (links[i].hostname != window.location.hostname) {
        links[i].target = '_blank';
    }
}
