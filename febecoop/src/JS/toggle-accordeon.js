
// When the HTML content is loaded :
if (document.readyState !== "loading") {
ToggleDropDown();
} else {
document.addEventListener("DOMContentLoaded", function () {
    ToggleDropDown();
});
}


function ToggleDropDown() {
var element = document.querySelectorAll(".contenu-accordeon-item");
var Header = document.querySelectorAll(".cai-header")

if (element){
    element.forEach(function (el) {
        let header = el.querySelector(".cai-header");
        header.addEventListener("click", function (event) {
            event.preventDefault;
            el.classList.toggle("contenu-accordeon-item-active");
        })
    })
}

// if (element) {
//     element.forEach(function (el, key) {
//     el.addEventListener("click", function (event) {
//         el.classList.toggle("contenu-accordeon-item-active");
//         LinksEl.forEach(function (link) {
//             event.preventDefault;
//             link.addEventListener("click", function () {
//                 console.log("Click link");
//                 el.classList.add("contenu-accordeon-item-active");
//             })
//         })
//         // element.forEach(function (ell, keyEll) {
//         // if (key !== keyEll) {
//         //     ell.classList.remove("contenu-accordeon-item-active");
//         // }
//         // });
//     });
//     });
// }
}