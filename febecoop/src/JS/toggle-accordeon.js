
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

if (element) {
    element.forEach(function (el, key) {
    el.addEventListener("click", function () {
        el.classList.toggle("contenu-accordeon-item-active");

        // element.forEach(function (ell, keyEll) {
        // if (key !== keyEll) {
        //     ell.classList.remove("contenu-accordeon-item-active");
        // }
        // });
    });
    });
}
}