<link rel="canonical" href="https://profitproton.com<?php echo $data['link'] ?>">

<meta property="og:title" content="<?php echo $data['title'] ?>">
<meta property="og:description" content="<?php echo $data['description'] ?>">
<meta property="og:image" content="https://profitproton.com<?php echo $data['thumbnail']?>-800x">
<meta property="og:url" content="https://profitproton.com<?php echo $data['link'] ?>">
<meta property="og:type" content="article">
<meta property="og:site_name" content="ProfitProton">
<meta property="og:locale" content="en_US">
<meta property="article:published_time" content="<?php echo $data['date'] ?><?php echo $data['time'] ?>">

<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $data['title'] ?>">
<meta name="twitter:description" content="<?php echo $data['description'] ?>">
<meta name="twitter:image" content="https://profitproton.com<?php echo $data['thumbnail']?>-800x">
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
        "image": [{
                "@type": "ImageObject",
                "url": "https://profitproton.com<?php echo $data['thumbnail']?>-1200x.webp",
                "caption": "<?php echo $data['title'] ?>"
            }
            <?php
            $fileNumber = num;
            $file = $_SERVER['DOCUMENT_ROOT'] . '/data/image-data/' . $fileNumber . '.php';

            if (file_exists($file)) {
                include $file;
            }
            ?>
        ],
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
                "width": "720",
                "height": "720"
            }
        }
    }
</script>

<script>
    function addAttributesToImages() {
        var images = document.querySelectorAll('.post-content img');
        images.forEach(function(img) {
            var src = img.getAttribute('src');
            var srcset = "";

            var sizes = "(max-width: " + 700 + "px) 100vw, " + 700 + "px";

            // Extract the directory and filename without extension
            var directory = src.substring(0, src.lastIndexOf('/'));
            var filename = src.substring(src.lastIndexOf('/') + 1, src.lastIndexOf('.'));

            // Extract the file extension
            var fileType = src.substring(src.lastIndexOf('.'));

            // Generate the srcset attribute
            var newSrcset = [
                directory + "/" + filename.replace(/\d+x/, "400x") + fileType + " 400w",
                directory + "/" + filename.replace(/\d+x/, "800x") + fileType + " 800w",
                directory + "/" + filename.replace(/\d+x/, "1200x") + fileType + " 1200w"
            ];
            srcset = newSrcset.join(", ");

            // Add the attributes to the image element
            if (!img.hasAttribute('srcset')) {
                img.setAttribute('srcset', srcset);
            }

            if (!img.hasAttribute('sizes')) {
                img.setAttribute('sizes', sizes);
            }

            if (!img.hasAttribute('loading')) {
                img.setAttribute('loading', 'lazy');
            }

            if (!img.hasAttribute('decoding')) {
                img.setAttribute('decoding', 'async');
            }
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
            const isInternalLink = link.href.startsWith(window.location.origin);

            if (!link.classList.contains('nospecify') && !link.getAttribute('rel')) {
                if (isInternalLink) {
                    // If it's an internal link, we don't add the noopener attribute
                } else {
                    // If it's an external link, add the noopener attribute
                    link.setAttribute('rel', 'noopener');
                    link.setAttribute('target', '_blank');
                }
            } else if (!link.classList.contains('nospecify') && !link.getAttribute('rel').includes('noopener')) {
                // If rel attribute is set but doesn't contain "noopener"
                // and it's an external link, add the "noopener" attribute
                if (!isInternalLink) {
                    link.setAttribute('rel', link.getAttribute('rel') + ' noopener');
                }
            }
        });
    });
</script>