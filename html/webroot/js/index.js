const toggleSmartSearchButton = document.getElementById("toggleSmartSearchButton")
const searchFormSmart = document.getElementById("searchFormSmart")

window.onload = () => {
    toggleSmartSearchButton.addEventListener('click', () =>{
        const toggleSmartSearchButtonState = toggleSmartSearchButton.getAttribute("aria-expanded") === "true" ? false : true

        if(toggleSmartSearchButtonState == true){

            console.log(toggleSmartSearchButtonState)
            toggleSmartSearchButton.setAttribute("aria-expanded", toggleSmartSearchButtonState)
            searchFormSmart.style.display = 'block'
        } else {
            toggleSmartSearchButton.setAttribute("aria-expanded", toggleSmartSearchButtonState)
            searchFormSmart.style.display = 'none'
        }
    }, false)
}
