function openMenu(){
    const hamburger = document.querySelector('#hamburger');
    const close = document.querySelector('#close'); 
    const menu = document.querySelector('#menu');   
    
        if(hamburger.clicked == true) {
            hamburger.style.display = "flex !important";
            close.style.display = "none";
            menu.style.display = "none";

           
        }
        
        else {
            hamburger.style.display = "none";
            close.style.display = "block";
            menu.style.display = "block"
        }

}

function closeMenu(){
    const hamburger = document.querySelector('#hamburger');
    const close = document.querySelector('#close');    
    const menu = document.querySelector('#menu')

        if (close.clicked == true) {
            close.style.display = "block"
            hamburger.style.display = "none"
            menu.style.display = "block"
        }
        else {
            close.style.display = "none"
            hamburger.style.display = "block"
            menu.style.display = "none"
        }
}