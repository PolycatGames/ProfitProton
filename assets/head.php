<!--Standard Meta Data-->
<link rel="icon" type="image/x-icon" href="images/logo/profitproton-favicon.png" />
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--HTML-->
<link rel="import" href="assets/headernav.html" />
<!--Fonts-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
<!--Standard Styles-->
<link rel="stylesheet" href="styles/general.css">
<link rel="stylesheet" href="styles/header.css">
<link rel="stylesheet" href="styles/footer.css">
<link rel="stylesheet" href="styles/sidebar.css">
<!--Standard Elements-->
<!--<div class="whitescreen"></div>-->
<!--Standard Scripts-->
<script>
  if (location.hostname !== "localhost !") {
    function fadeOutElementsByClass(className) {
      var elements = document.getElementsByClassName(className);
      var duration = 200; // Duration of the fade-out animation in milliseconds
      var interval = 10; // Interval between opacity updates in milliseconds
      var opacityStep = 1 / (duration / interval); // Amount to reduce opacity in each interval

      var currentOpacity = 1;

      var fadeOutInterval = setInterval(function() {
        if (currentOpacity <= 0) {
          clearInterval(fadeOutInterval);
          // Once the animation is complete, hide the elements
          for (var i = 0; i < elements.length; i++) {
            elements[i].style.visibility = 'hidden';
          }
        } else {
          // Reduce the opacity and update the style
          currentOpacity -= opacityStep;
          for (var i = 0; i < elements.length; i++) {
            elements[i].style.opacity = currentOpacity;
          }
        }
      }, interval);
    }
  } else {
    var elements = document.getElementsByClassName("whitescreen");
    for (var i = 0; i < elements.length; i++) {
      elements[i].style.visibility = 'hidden';
    }
  }
</script>

<script>
  if (window.location.hostname.includes("github.io")) {
    document.write('<base href="/ProfitProton/">');
    console.log("GitHub");
  } else {
    document.write('<base href="/">');

    if (window.location.hostname.includes("127.0.0.1")) {
      console.log("Local");
    } else {
      console.log("Domain hosted");
    }
  }
</script>

<script>
  if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1')
    // Function to add ".php" to the href attribute of <a> tags
  function addPhpToLinks() {
    // Check if the website is running on localhost

    // Get all the <a> tags
    var links = document.getElementsByTagName('a');

    // Loop through each <a> tag
    for (var i = 0; i < links.length; i++) {
      // Get the href attribute
      var href = links[i].getAttribute('href');

      // Check if href is not empty and doesn't end with ".php"
      if (href && !href.endsWith('.php') && href != ("/") && href != ("")) {
        // Add ".php" to the href attribute value
        links[i].setAttribute('href', href + '.php');
      }
    }
  }

  // Add event listener to run the code when the page has loaded
  window.addEventListener('DOMContentLoaded', addPhpToLinks);
</script>

<script>
  // Function to reload the page
  function reloadPage() {
    location.reload();
  }

  // Function to check for changes in HTML/PHP or CSS
  function checkForChanges() {
    fetch(window.location.href, {
        cache: "no-cache"
      })
      .then(response => response.text())
      .then(data => {
        if (typeof checkForChanges.lastHTML === "undefined") {
          checkForChanges.lastHTML = data;
        } else if (checkForChanges.lastHTML !== data) {
          reloadPage();
        }
      })
      .catch(error => console.error(error));

    var link = document.querySelector('link[rel="stylesheet"]');
    var href = link.href;
    var timestamp = new Date().getTime();

    if (!href.includes('?')) {
      href += '?';
    } else {
      href += '&';
    }

    href += 'timestamp=' + timestamp;
    link.href = href;
  }

  // Check for changes every second if accessing from localhost
  if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
    setInterval(checkForChanges, 500);
  }
</script>

<script>
  function loadUpdatedStylesheet() {
    if (location.hostname !== "localhost !")
      document.addEventListener('DOMContentLoaded', function() {
        fetch('https://api.github.com/repos/PolycatGames/ProfitProton/commits')
          .then(response => response.json())
          .then(data => {
            var latestCommit = data[0].sha; // Extract the latest commit hash
            var links = document.querySelectorAll('link[rel="stylesheet"], script[src]');
            for (var i = 0; i < links.length; i++) {
              var link = links[i];
              var href = link.getAttribute('href');
              var src = link.getAttribute('src');
              if (href) {
                link.setAttribute('href', href + '?v=' + latestCommit);
              } else if (src) {
                link.setAttribute('src', src + '?v=' + latestCommit);
              }
            }
          })
          .catch(error => console.log(error));
      });
  }

  loadUpdatedStylesheet();
</script>


<script>
  let burgerActivated = false;
  let sidebar;

  function setSidebar() {
    console.log("Ran?");
    sidebar = document.querySelector(".sidebar");
    if (sidebar !== null) {
      sidebar.style.display = "none";
      console.log(sidebar + " found");
    } else {
      console.log(sidebar + " not found");
    }
  }

  function activateBurger() {
    if (burgerActivated == false) {
      sidebar.style.display = "flex";
      burgerActivated = true;
      console.log("inactive -> active")
    } else {
      deactivateBurger();
      console.log("active -> inactive")
    }
  }

  function deactivateBurger() {
    sidebar.style.display = "none";
    burgerActivated = false;
  }



  window.addEventListener('resize', () => {
    // Get the width of the window
    const windowWidth = window.innerWidth;

    // Do something with the width
    if (windowWidth > 760) {
      sidebar.style.display = "none";
      burgerActivated = false;
    }
  });
</script>