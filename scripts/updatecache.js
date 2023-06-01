updateCache();

function updateCache(){
  // Fetch the latest commit hash or last modified timestamp from the GitHub API
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

      // Create a promise for each JavaScript file
      const jsPromises = Array.from(document.querySelectorAll('script[src]')).map(jsFile => {
        return new Promise((resolve, reject) => {
          jsFile.onload = resolve;
          jsFile.onerror = reject;
        });
      });

      // Wait for all CSS and JavaScript files to be loaded
      Promise.all([...cssPromises, ...jsPromises])
        .then(() => {
          // Update CSS file URLs after all CSS files are loaded
          const cssFiles = document.querySelectorAll('link[rel="stylesheet"]');
          cssFiles.forEach(cssFile => {
            const originalHref = cssFile.href;
            const updatedHref = appendQueryParameter(originalHref, `v=${latestCommitHash}`);
            cssFile.href = updatedHref;
          });

          // Update JavaScript file URLs after all JavaScript files are loaded
          const jsFiles = document.querySelectorAll('script[src]');
          jsFiles.forEach(jsFile => {
            const originalSrc = jsFile.src;
            const updatedSrc = appendQueryParameter(originalSrc, `v=${latestCommitHash}`);
            jsFile.src = updatedSrc;
          });

          // Update image file URLs
          const imgFiles = document.querySelectorAll('img[src]');
          imgFiles.forEach(imgFile => {
            const originalSrc = imgFile.src;
            const updatedSrc = appendQueryParameter(originalSrc, `v=${latestCommitHash}`);
            imgFile.src = updatedSrc;
          });

          // Display the current version number in the browser console
          console.log('Current version number:', latestCommitHash);
        })
        .catch(error => {
          console.error('Error loading files:', error);
        });
    })
    .catch(error => {
      console.error('Error fetching commit data:', error);
    });
}