<link rel="canonical" href="https://www.profitproton.comarticle-url<?php echo $data['link'] ?>">

<meta property="og:title" content="<?php echo $data['title'] ?>">
<meta property="og:description" content="<?php echo $data['description'] ?>">
<meta property="og:image" content="https://www.profitproton.com<?php echo $data['thumbnail'] ?>">
<meta property="og:url" content="https://www.profitproton.com<?php echo $data['link'] ?>">
<meta property="og:type" content="article">
<meta property="og:site_name" content="ProfitProton">
<meta property="og:locale" content="en_US">

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $data['title'] ?>">
<meta name="twitter:description" content="<?php echo $data['description'] ?>">
<meta name="twitter:image" content="https://www.profitproton.com<?php echo $data['thumbnail'] ?>">
<meta name="twitter:site" content="@profitproton">


<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "https://www.profitproton.com<?php echo $data['link'] ?>"
        },
        "headline": "<?php echo $data['title'] ?>",
        "description": "<?php echo $data['description'] ?>",
        "image": "https://www.profitproton.com<?php echo $data['thumbnail'] ?>",
        "author": {
            "@type": "Person",
            "name": "<?php echo $data['author'] ?>"
        },
        "datePublished": "<?php echo $data['date'] ?>",
        "publisher": {
            "@type": "Organization",
            "name": "ProfitProton",
            "logo": {
                "@type": "ImageObject",
                "url": "https://www.profitproton.com/logo.png",
                "width": 600,
                "height": 60
            }
        }
    }
</script>

<script>
    function addAttributesToImages() {
        var images = document.querySelectorAll('.post-content img');
        images.forEach(function(img) {
            var src = img.getAttribute('src');
            var srcset = src;

            // Create a new image element to load the image and get its natural width and height
            var tempImg = new Image();
            tempImg.src = src;
            tempImg.addEventListener('load', function() {
                var naturalWidth = tempImg.naturalWidth;
                var naturalHeight = tempImg.naturalHeight;

                var sizes = "(max-width: " + 700 + "px) 100vw, " + 700 + "px";

                // Get the directory path of the image
                var directory = src.substring(0, src.lastIndexOf('/'));

                // Get the filename without extension and file type
                var filename = src.substring(src.lastIndexOf('/') + 1, src.lastIndexOf('.'));
                var fileType = src.substring(src.lastIndexOf('.'));

                // Get the width and height of the original image
                var originalWidth = parseInt(filename.substring(filename.lastIndexOf('-') + 1, filename.lastIndexOf('x')));
                var originalHeight = parseInt(filename.substring(filename.lastIndexOf('x') + 1));

                // Generate the srcset attribute
                srcset += " " + naturalWidth + "w";
                if (originalWidth && originalHeight) {
                    srcset += ", " + directory + "/" + filename.replace("-" + originalWidth + "x" + originalHeight, "-" + (originalWidth * 2) + "x" + (originalHeight * 2)) + fileType + " " + (originalWidth * 2) + "w";
                    srcset += ", " + directory + "/" + filename.replace("-" + originalWidth + "x" + originalHeight, "-" + (originalWidth * 3) + "x" + (originalHeight * 3)) + fileType + " " + (originalWidth * 3) + "w";
                }

                // Add the attributes to the image element
                img.setAttribute('srcset', srcset);
                img.setAttribute('sizes', sizes);
                img.setAttribute('loading', 'lazy');
                img.setAttribute('decoding', 'async');
            });
        });
    }
</script>