const starToggle = document.getElementsByClassName("star-toggle")[0];
const star = document.getElementsByClassName("star")[0];
const galaxy = document.getElementsByClassName("galaxy")[0];
const marvelSystem = document.getElementsByClassName("marvel-system")[0];
const transitionTime = 150;
function toggleStar(){
    starToggle.classList.toggle("star-toggle-active");
    star.classList.toggle("star-active");
    galaxy.classList.toggle("galaxy-active");
}

document.addEventListener("DOMContentLoaded", () => {    
    setTimeout(function(){
        marvelSystem.style.height = "300px";
        setTimeout(function () {
            marvelSystem.style.width = "700px";
        },1001)
    }, 10);
});