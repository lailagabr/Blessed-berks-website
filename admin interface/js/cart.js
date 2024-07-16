var toggleBtn =document.getElementById('toggleBtn')
var sideNav = document.getElementById('sideNav')
var mainDiv = document.getElementById("mainDiv")


toggleBtn.addEventListener('click',function(){
    sideNav.classList.toggle('d-none')
    mainDiv.classList.toggle('close-nav')
})