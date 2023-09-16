const toggleNavBtn = document.getElementById("toggleNavBtn");
const toggleNavMenu = document.getElementById("toggleNavMenu");

toggleNavBtn.addEventListener('click', () =>{
    const navBtnState = toggleNavBtn.getAttribute("aria-expanded") === "true" ? false : true;
    toggleNavBtn.setAttribute("aria-expanded", navBtnState)
}, false);



window.onload = () => {
    const headerSearch = document.getElementsByClassName("header-search");
    const delBtn = document.getElementsByClassName("del-btn");
    for(let i = 0; i < headerSearch.length; i++){
        headerSearch[i].oninput = () => {
            headerSearch[i].value ? delBtn[i].style.opacity = 1 : delBtn[i].style.opacity = 0;
            console.log('foo');
        }
        delBtn[i].onclick = () => {
            headerSearch[i].value = '';
            delBtn[i].style.opacity = 0;
        }
    }
}
