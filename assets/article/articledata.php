<link rel="canonical" href="https://profitproton.com<?php echo $data['link'] ?>">

<meta property="og:title" content="<?php echo $data['title'] ?>">
<meta property="og:description" content="<?php echo $data['description'] ?>">
<meta property="og:image" content="https://profitproton.com<?php echo $data['thumbnail'] ?>">
<meta property="og:url" content="https://profitproton.com<?php echo $data['link'] ?>">
<meta property="og:type" content="article">
<meta property="og:site_name" content="ProfitProton">
<meta property="og:locale" content="en_US">
<meta property="article:published_time" content="<?php echo $data['date'] ?><?php echo $data['time'] ?>">

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $data['title'] ?>">
<meta name="twitter:description" content="<?php echo $data['description'] ?>">
<meta name="twitter:image" content="https://profitproton.com<?php echo $data['thumbnail'] ?>">
<meta name="twitter:site" content="@profitproton">
<meta name="twitter:creator" content="@profitproton">


<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "https://profitproton.com<?php echo $data['link'] ?>"
        },
        "headline": "<?php echo $data['title'] ?>",
        "description": "<?php echo $data['description'] ?>",
        "image": "https://profitproton.com<?php echo $data['thumbnail'] ?>",
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
                "url": "https://profitproton.com/images/logo/profitproton-logo.png",
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

                // Get the width of the original image
                var originalWidth = parseInt(filename.substring(filename.lastIndexOf('-') + 1));


                // Generate the srcset attribute
                srcset += " " + naturalWidth + "w";
                if (originalWidth) {
                    srcset += ", " + directory + "/" + filename.replace("-" + originalWidth, "-" + (originalWidth * 2)) + fileType + " " + (originalWidth * 2) + "w";
                    srcset += ", " + directory + "/" + filename.replace("-" + originalWidth, "-" + (originalWidth * 3)) + fileType + " " + (originalWidth * 3) + "w";
                }


                // Add the attributes to the image element
                img.setAttribute('srcset', srcset);
                img.setAttribute('sizes', sizes);
                img.setAttribute('loading', 'lazy');
                img.setAttribute('decoding', 'async');
            });
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        addAttributesToImages();
    });
</script>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const postContentDiv = document.querySelector('.post-content');
        const links = postContentDiv.querySelectorAll('a');

        links.forEach(link => {
            if (!link.classList.contains('nospecify')) {
                link.setAttribute('rel', 'noopener');
                link.setAttribute('target', '_blank');
            }
        });
    });
</script>