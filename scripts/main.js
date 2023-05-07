let burgerActivated = false;
let sidebar;


function setSidebar(){
    sidebar = document.querySelector(".sidebar");
    if (sidebar !== null){
        sidebar.style.display = "none";
        console.log(sidebar + "found");
    }
    else{
        console.log(sidebar + "not found");
    }
}

function activateBurger(){
  if (burgerActivated == false){
      sidebar.style.display = "flex";
      burgerActivated = true;
      console.log("inactive -> active")
  }
  else{
      deactivateBurger();
      console.log("active -> inactive")
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