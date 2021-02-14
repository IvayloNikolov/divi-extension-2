function hamburgerClick(){
    let backgroundOfMenu = document.querySelector('#background-of-menu');
    backgroundOfMenu.style.visibility = "visible";
    backgroundOfMenu.style.opacity = "1";
}
function closeHeader(){
    let backgroundOfMenu = document.querySelector('#background-of-menu');
    backgroundOfMenu.style.visibility = "hidden";
    backgroundOfMenu.style.opacity = "0";
}
let hamburger = document.querySelector('#hamburger');
hamburger.addEventListener('click', hamburgerClick);

let closeButton = document.querySelector('#cross');
closeButton.addEventListener('click', closeHeader);