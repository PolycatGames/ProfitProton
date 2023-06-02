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
<!--Standard Scripts-->
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
  fetch('https://api.github.com/repos/PolycatGames/ProfitProton/commits')
    .then(response => response.json())
    .then(data => {
      const latestCommitHash = data[0].sha;

      // Create a promise for each CSS file
      const cssPromises = Array.from(document.querySelectorAll('link[rel="stylesheet"]')).map(cssFile => {
        return new Promise((resolve, reject) => {
          cssFile.onload = resolve;
          cssFile.onerror = reject;
        });
      });

      // Wait for all CSS files to be loaded
      Promise.all(cssPromises)
        .then(() => {
          // Update CSS file URLs after all CSS files are loaded
          const cssFiles = document.querySelectorAll('link[rel="stylesheet"]');
          cssFiles.forEach(cssFile => {
            const originalHref = cssFile.href;
            const updatedHref = originalHref + '?v=' + latestCommitHash;
            cssFile.href = updatedHref;
          });

          // Update image file URLs
          const imgFiles = document.querySelectorAll('img[src]');
          imgFiles.forEach(imgFile => {
            const originalSrc = imgFile.src;
            const updatedSrc = originalSrc + '?v=' + latestCommitHash;
            imgFile.src = updatedSrc;
          });

          // Display the current version number in the browser console
          console.log('Current version number:', latestCommitHash);
        })
        .catch(error => {
          console.error('Error loading CSS files:', error);
        });
    })
    .catch(error => {
      console.error('Error fetching commit data:', error);
    });
</script>