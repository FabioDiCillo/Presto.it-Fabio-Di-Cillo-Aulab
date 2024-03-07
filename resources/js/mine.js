let navbar = document.querySelector(".navbar")


window.addEventListener("scroll", ()=>{

      if (window.scrollY > 0){
        navbar.classList.add("nav-custom")
    } else {
        navbar.classList.remove("nav-custom")
    }
})