// function toggleSideBar() {
//     const sidebarMenu = document.getElementById('sidebar-menu');
//     sidebarMenu.classList.toggle('show');
// }

// window.addEventListener('click', function(event) {
//     const sidebarMenu = document.getElementById('sidebar-menu');
//     const sidebarTrigger = document.getElementById('sidebar-trigger');

//     if (event.target !== sidebarTrigger && !sidebarMenu.contains(event.target)) {
//         sidebarMenu.classList.remove('show');
//     }
// });

var sidebarTrigger = document.getElementById('sidebar-trigger');
var sidebarMenu = document.getElementById('sidebar-menu');

sidebarTrigger.addEventListener('click', toggleSideBar);

function toggleSideBar() {
  sidebarMenu.classList.toggle('show');
}

// Close sidebar menu when clicking outside of it
window.addEventListener('click', function(event) {
  if (!sidebarTrigger.contains(event.target) && !sidebarMenu.contains(event.target)) {
    sidebarMenu.classList.remove('show');
  }
});