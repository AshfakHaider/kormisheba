// let profileMenue = document.getElementById("profileMenu");
// let arrow = document.getElementById("arrow");

// function toggleMenu(){
//     profileMenue.classList.toggle("visible");
//     arrow.classList.toggle("vis");
// }

// let profileMenu = document.getElementById("profileMenu");
// let arrow = document.getElementById("arrow");

// function toggleMenu() {
//     profileMenu.classList.toggle("visible");
//     arrow.classList.toggle("vis");
// }

// document.addEventListener("click", function(event) {
//     const targetElement = event.target;
    
//     // Check if the clicked element is not within the profile menu
//     if (!profileMenu.contains(targetElement) && !targetElement.classList.contains("nav-prof-img")) {
//         profileMenu.classList.remove("visible");
//         arrow.classList.remove("vis");
//     }
// });

let profileMenu = document.getElementById("profileMenu");
let arrow = document.getElementById("arrow");

function toggleMenu() {
    profileMenu.classList.toggle("visible");
    arrow.classList.toggle("vis");
}

function closeMenu() {
    profileMenu.classList.remove("visible");
    arrow.classList.remove("vis");
}

document.addEventListener("click", function(event) {
    const targetElement = event.target;
    
    // Check if the clicked element is not within the profile menu and the window width is less than 1090px
    if (!profileMenu.contains(targetElement) && !targetElement.classList.contains("nav-prof-img") && window.innerWidth < 1090) {
        closeMenu();
    }
});

window.addEventListener("resize", function() {
    // Close the menu if the window width becomes less than 1090px
    if (window.innerWidth < 1090) {
        closeMenu();
    }
});