const toggleNavBtn = document.getElementById("toggleNavBtn");
const toggleNavMenu = document.getElementById("toggleNavMenu");

toggleNavBtn.addEventListener('click', () =>{
    const navBtnState = toggleNavBtn.getAttribute("aria-expanded") === "true" ? false : true;
    toggleNavBtn.setAttribute("aria-expanded", navBtnState)
}, false);


const headerSearch = document.getElementById("headerSearch");
const delBtn = document.getElementById("delBtn");

headerSearch.addEventListener('input', () =>{
    headerSearch.value ? delBtn.style.opacity = 1 : delBtn.style.opacity = 0;
}, false);

delBtn.onclick = () => {
    headerSearch.value = '';
    delBtn.style.opacity = 0;
}