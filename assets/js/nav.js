let burgerOpen = document.getElementById('burger-open')
let mobileHover = document.getElementById('mobile-hover')
let burgerClose = document.getElementById('burger-close')
let mobileName = document.getElementById('mobile-name')
let logo = document.getElementById('nav-logo')

burgerOpen.addEventListener("click", () => {

    burgerClose.style.display = "block"
    burgerOpen.style.display = "none"
    mobileName.style.display = "flex"
    logo.style.display = "none"

    mobileHover.classList.toggle("active")
    document.body.classList.toggle("no-scrolling")
})

burgerClose.addEventListener("click", () => {

    burgerClose.style.display = "none"
    burgerOpen.style.display = "block"
    mobileName.style.display = "none"
    logo.style.display = "block"

    mobileHover.classList.toggle("active")
    document.body.classList.toggle("no-scrolling")
})