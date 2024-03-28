<!--Standard Meta Data-->
<link rel="icon" type="image/png" href="/images/logo/profitproton-favicon.png" />
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="p:domain_verify" content="158d3d36828b05cfeebb189ad4366442" />

<!--Fonts-->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;0,9..40,900;0,9..40,1000;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600;1,9..40,700;1,9..40,800;1,9..40,900;1,9..40,1000&display=swap" media="print" onload="this.media='all'" />

<!--Standard Styles-->
<link rel="stylesheet" href="/styles/feed.css">
<link rel="stylesheet" href="/styles/main.css">
<link rel="stylesheet" href="/styles/pages.css">
<link rel="stylesheet" href="/styles/navigation.css">


<!--Standard Scripts-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/img-att.php'; ?>

<script>
  const version = 6;
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
    // Replace this constant with the desired commit hash
    const latestCommit = version; // Set to a specific commit hash

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
        // All stylesheets have been loaded, remove the default stylesheet
        var defaultStylesheet = document.querySelector('link[href="default.css"]');
      })
      .catch(error => console.log(error));
  }

  loadUpdatedStylesheet();
</script>





<script>
  let burgerActivated = false;
  let sidebar;

  function setSidebar() {
    sidebar = document.querySelector(".sidebar");
    if (sidebar !== null) {
      sidebar.style.opacity = "0"; // Initially set opacity to 0
      sidebar.style.display = "none";
    } else {
      console.log(sidebar + " not found");
    }
  }

  function activateBurger() {
    if (burgerActivated == false) {
      sidebar.style.display = "flex";
      setTimeout(() => {
        sidebar.style.opacity = "1"; // Fade in sidebar with opacity transition
      }, 50);

      burgerActivated = true;
      console.log("inactive -> active");
    } else {
      deactivateBurger();
      console.log("active -> inactive");
    }
  }

  function deactivateBurger() {
    sidebar.style.opacity = "0"; // Fade out sidebar with opacity transition
    setTimeout(() => {
      sidebar.style.display = "none";
    }, 300); // Adjust timing to match your transition duration
    burgerActivated = false;
  }

  window.addEventListener('resize', () => {
    const windowWidth = window.innerWidth;

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