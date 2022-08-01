let containerTag = document.querySelector(".containers")
let menuItemTag = document.querySelector(".menuItem")
let menuItemContainerTag = document.querySelector(".menuItemContainer")

let menu1 = document.querySelector(".menu1")
let menu2 = document.querySelector(".menu2")
let menu3 = document.querySelector(".menu3")

containerTag.addEventListener('click',()=>{
    if(containerTag.classList.contains("opened")){
        menu2.classList.remove("hide")
        menu1.classList.remove("plus")
        menu3.classList.remove("minus")
        menuItemTag.classList.remove("showMenuItem")
        menuItemContainerTag.classList.remove("hideMenu")
        containerTag.classList.remove("opened")
    }else{
        menu2.classList.add("hide")
        menu1.classList.add("plus")
        menu3.classList.add("minus")
        menuItemTag.classList.add("showMenuItem")
        menuItemContainerTag.classList.add("hideMenu")
        containerTag.classList.add("opened")
    }
})
