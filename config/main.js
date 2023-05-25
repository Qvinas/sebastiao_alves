let menu = true

function navButton(){
    var img = document.getElementById("nav_button");

    if(menu){
        img.setAttribute("src", "recursos/imagens_para_site/desktop/fechar.svg")
        menu = false
    }
    else{
        img.setAttribute("src", "recursos/imagens_para_site/desktop/menu.svg")
        menu = true
    }
}

let button = true
function verMaisText(){
    let botao_ver = document.getElementById("botao-ver-mais");
    
    if(button){
        botao_ver.innerHTML = "ver menos"
        button = false
    }
    else{
        botao_ver.innerHTML = "ver mais"
        button = true
    }
}

function aguarde(){
    setTimeout(abrirLivro, 800);
}

function abrirLivro(){
    $("#botao_livros").dropdown("toggle");
}

var menutoggler = false;


function toggleMenu(){
    console.log("bop")

    var nav = document.querySelector("nav > ul")
    var toggler = document.querySelector("#backoffice_toggle")

    if(menutoggler){
        nav.style.display = "none"
        toggler.setAttribute("src", "../../recursos/imagens_para_site/desktop/menu.svg")
        menutoggler = false;
    }
    else{
        nav.style.display = "flex"
        toggler.setAttribute("src", "../../recursos/imagens_para_site/desktop/fechar.svg")
        menutoggler = true;
    }
    
}