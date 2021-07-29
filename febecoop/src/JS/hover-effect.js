let socialItemB = document.querySelectorAll(".social-item-b");
let itemSroute = document.querySelectorAll(".item-route");



socialItemB.forEach((item) => {

    item.onanimationend = () => {
        item.classList.remove('social-item-b-hover'); 
    };
    item.addEventListener("mouseover", function(){
        item.classList.add('social-item-b-hover');
    });

})

itemSroute.forEach((item) => {

    item.onanimationend = () => {
        item.classList.remove('item-route-hover'); 
    };
    item.addEventListener("mouseover", function(){
        item.classList.add('item-route-hover');
    });

})



let socialItemA = document.querySelectorAll(".social-item-a");

socialItemA.forEach((item) => {

    item.onanimationend = () => {
        item.classList.remove('social-item-a-hover'); 
    };
    item.addEventListener("mouseover", function(){
        item.classList.add('social-item-a-hover');
    });

})


let SearchItem = document.querySelectorAll(".js-nav-icon-search-laptop");


SearchItem.forEach((item)=> {
    item.onanimationend = () => {
        item.classList.remove('nav-search-laptop-hover'); 
    };
    item.addEventListener("mouseover", function(){
        item.classList.add('nav-search-laptop-hover');
    });
    item.addEventListener("keypress", function(e){
        if(e.key === 'Enter'){
            item.classList.add('nav-search-laptop-hover');
        }
    });
    
})

let SearchBar = document.querySelectorAll('.nav-search-laptop');

SearchBar.forEach((search) => {
    search.addEventListener("keypress", (e) => {
        if(e.key === 'Enter'){
            console.log("Enter !")
            SearchItem.forEach((item)=> {
                item.classList.add('nav-search-laptop-hover');      
            })
        }
    })
})







// -----------------------------------------------------------------------------
// --- ANIMATED CLASS TOGGLE
// -----------------------------------------------------------------------------   

// var mouseEnter = ((document.ontouchstart !== null) ? 'mouseenter' : 'touchstart');
// $('body').on("webkitAnimationEnd oanimationend msAnimationEnd animationend", 'social-item-b', function(){
// $(this).removeClass("social-item-b-hover"); 
// })
// .on(mouseEnter, 'social-item-b', function() {
// $(this).addClass("social-item-b-hover");

// });


        // webkitAnimationEnd oanimationend msAnimationEnd 