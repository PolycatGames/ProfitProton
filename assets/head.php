<!--Standard Meta Data-->
<link rel="icon" type="image/png" href="/images/logo/profitproton-favicon.png" />
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--Fonts-->
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&display=swap" rel="stylesheet">
<link href="https://fonts.cdnfonts.com/css/impact" rel="stylesheet">


<!--Standard Styles-->
<link rel="stylesheet" href="/styles/feed.css">
<link rel="stylesheet" href="/styles/main.css">
<link rel="stylesheet" href="/styles/pages.css">
<link rel="stylesheet" href="/styles/navigation.css">

<!--Standard Scripts-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/img-att.php'; ?>

<script>
  if (location.hostname === "localhost") {
    var script = document.createElement("script");
    script.src = "https://code.jquery.com/jquery-3.6.0.min.js";
    script.onload = function() {
      // Your code that depends on jQuery goes here
      $(document).ready(function() {
        // Function to execute the AJAX request
        function checkFileContent() {
          $.ajax({
            url: '/readFile.php',
            type: 'GET',
            success: function(response) {
              var fileContent = response.trim();

              if (fileContent === 'ReloadBrowser') {
                fileContent = '';
                console.log('done');
                location.reload();
              }
            },
            error: function(xhr, status, error) {
              console.error(error);
            }
          });
        }

        // Run the initial check
        checkFileContent();

        // Set interval to check for updates every 5 seconds (adjust as needed)
        setInterval(checkFileContent, 500);
      });
    };
    document.head.appendChild(script);
  } else {
    // Your code that doesn't depend on jQuery goes here
    document.addEventListener("DOMContentLoaded", function() {
      // Function to execute the AJAX request
      function checkFileContent() {

      }

      // Run the initial check
      checkFileContent();

      // Set interval to check for updates every 5 seconds (adjust as needed)
      setInterval(checkFileContent, 500);
    });
  }
</script>

<script>
  const elements = document.getElementsByClassName('header');
  let lastScrollY = window.scrollY;

  window.addEventListener('scroll', function() {
    const scrollY = window.scrollY;

    if (scrollY > lastScrollY) {
      for (let i = 0; i < elements.length; i++) {
        elements[i].style.opacity = 0;
        elements[i].style.pointerEvents = 'none';
      }
    } else if (scrollY < lastScrollY) {
      for (let i = 0; i < elements.length; i++) {
        elements[i].style.opacity = 1;
        elements[i].style.pointerEvents = 'auto';
      }
    }

    lastScrollY = scrollY;
  });
</script>

<script>
  function setDimensions() {
    var images = document.getElementsByTagName('img');

    for (var i = 0; i < images.length; i++) {
      var img = images[i];

      var tempImg = new Image();
      tempImg.src = img.src;

      tempImg.onload = (function(image) {
        return function() {
          image.setAttribute('width', this.width + 'px');
          image.setAttribute('height', this.height + 'px');
        };
      })(img);
    }
  }

  window.onload = setDimensions;
</script>



<script>
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
  function loadUpdatedStylesheet() {



    fetch('https://api.github.com/repos/PolycatGames/ProfitProton/commits')

      .then(response => response.json())
      .then(data => {
        var latestCommit = data[0].sha; // Extract the latest commit hash
        var links = document.querySelectorAll('link[rel="stylesheet"]');
        var preloadPromises = [];

        for (var i = 0; i < links.length; i++) {
          var link = links[i];
          var href = link.getAttribute('href');

          if (href) {
            var updatedHref = href + '?v=' + latestCommit;
            var preloadPromise = new Promise((resolve, reject) => {
              var preloadLink = document.createElement('link');
              preloadLink.setAttribute('rel', 'preload');
              preloadLink.setAttribute('as', 'style');
              preloadLink.setAttribute('href', updatedHref);
              preloadLink.addEventListener('load', resolve);
              preloadLink.addEventListener('error', reject);
              document.head.appendChild(preloadLink);
            });

            preloadPromises.push(preloadPromise);
          }
        }

        Promise.all(preloadPromises)
          .then(() => {
            for (var i = 0; i < links.length; i++) {
              var link = links[i];
              var href = link.getAttribute('href');

              if (href) {
                var updatedHref = href + '?v=' + latestCommit;
                var newLink = document.createElement('link');
                newLink.setAttribute('rel', 'stylesheet');
                newLink.setAttribute('href', updatedHref);
                document.head.appendChild(newLink);
                link.parentNode.removeChild(link);
              }
            }
            console.log("All Loaded");
            fadeOutElementsByClass("whitescreen");
            // All stylesheets have been loaded, remove the default stylesheet
            var defaultStylesheet = document.querySelector('link[href="default.css"]');
            defaultStylesheet.parentNode.removeChild(defaultStylesheet);
          })
          .catch(error => console.log(error));
      })
      .catch(error => {
        console.log(error)
        fadeOutElementsByClass("whitescreen");
      });




  }

  loadUpdatedStylesheet();
</script>




<script>
  let burgerActivated = false;
  let sidebar;

  function setSidebar() {
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

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CXQPHCFCPT"></script>
<script>
  if (location.hostname !== "localhost")

    window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-CXQPHCFCPT');
</script>

<!--Standard Elements-->
<style>
  .whitescreen {
    position: fixed;
    z-index: 9999;
    background-color: rgb(255, 255, 255);
    right: 0;
    bottom: 0;
    left: 0;
    top: 0;
  }
</style>
<div class="whitescreen"></div>