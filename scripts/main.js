let burgerActivated = false;

document.addEventListener("DOMContentLoaded", function(){
    sidebar = document.querySelector(".sidebar");
    sidebar.style.display = "none";
})

function activateBurger(){
    console.log(burgerActivated);
    if (burgerActivated == false){
        sidebar.style.display = "flex";
        burgerActivated = true;
    }
    else{
        deactivateBurger();
    }
}

function deactivateBurger(){
    sidebar.style.display = "none";
    burgerActivated = false;
}



window.addEventListener('resize', () => {
    // Get the width of the window
    const windowWidth = window.innerWidth;
    
    // Do something with the width
    if (windowWidth > 760){
        sidebar.style.display = "none";
        burgerActivated = false;
    }
  });
