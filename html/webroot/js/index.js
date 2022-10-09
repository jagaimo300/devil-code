const toggleNavBtn = document.getElementById("toggleNavBtn");
const toggleNavMenu = document.getElementById("toggleNavMenu");

toggleNavBtn.addEventListener('click', () =>{
    const navBtnState = toggleNavBtn.getAttribute("aria-expanded") === "true" ? false : true;
    toggleNavBtn.setAttribute("aria-expanded", navBtnState)
}, false);


