var menuIcon = document.querySelector(".menu-icon")
var sidebar = document.querySelector(".sidebar")
var containers = document.querySelectorAll(".container")

menuIcon.onclick = function () {
    sidebar.classList.toggle("minimize");
}
