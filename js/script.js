let button = document.getElementById("button");
let menu = document.getElementById("menu-droped");

let st = false;

button.addEventListener("click", ()=>{
    if(st == false) {
        menu.classList.remove("menu-droped");
        menu.classList.add("menu-droped-visible");
        st=true;
    } else {
        menu.classList.remove("menu-droped-visible");
        menu.classList.add("menu-droped");
        st=false;
    }
});

///CARROUSEL SECTION