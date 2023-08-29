<link rel="canonical" href="https://profitproton.com<?php echo $data['link'] ?>">

<meta property="og:title" content="<?php echo $data['title'] ?>">
<meta property="og:description" content="<?php echo $data['description'] ?>">
<meta property="og:image" content="https://profitproton.com<?php echo $data['thumbnail'] ?>-800x.webp">
<meta property="og:url" content="https://profitproton.com<?php echo $data['link'] ?>">
<meta property="og:type" content="article">
<meta property="og:site_name" content="ProfitProton">
<meta property="og:locale" content="en_US">
<?php
function convertToISO8601($dateString, $timeString)
{
    $dateParts = explode('-', $dateString);

    if (count($dateParts) !== 3) {
        return false; // Invalid date format
    }

    $month = intval($dateParts[0]);
    $day = intval($dateParts[1]);
    $year = intval($dateParts[2]);

    if ($month < 1 || $month > 12 || $day < 1 || $day > 31 || $year < 1000) {
        return false; // Invalid date values
    }

    // Assuming valid time format like "HH:MM:SS"
    $timeParts = explode(':', $timeString);
    if (count($timeParts) !== 3) {
        return false; // Invalid time format
    }

    $hour = intval($timeParts[0]);
    $minute = intval($timeParts[1]);
    $second = intval($timeParts[2]);

    if ($hour < 0 || $hour > 23 || $minute < 0 || $minute > 59 || $second < 0 || $second > 59) {
        return false; // Invalid time values
    }

    // Create DateTime object and format as ISO 8601
    $dateTime = new DateTime(sprintf('%04d-%02d-%02dT%02d:%02d:%02d', $year, $month, $day, $hour, $minute, $second));
    return $dateTime->format('Y-m-d\TH:i:s\Z');
}

            $dateString = $data['date'];
            $timeString = $data['time'];

            // Convert date string to ISO 8601 format (assuming "month-day-year" format)
            $dateTime = DateTime::createFromFormat('m-d-Y', $dateString);

            if ($dateTime) {
                $iso8601Date = $dateTime->format('Y-m-d');
                $iso8601DateTime = $iso8601Date . $timeString . 'Z';
                echo '<meta property="article:published_time" content="' . $iso8601DateTime . '">';
            } else {
                echo '<!-- Invalid date format -->';
            }
?>


<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $data['title'] ?>">
<meta name="twitter:description" content="<?php echo $data['description'] ?>">
<meta name="twitter:image" content="https://profitproton.com<?php echo $data['thumbnail'] ?>-800x.webp">
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
                "url": "https://profitproton.com<?php echo $data['thumbnail'] ?>-1200x.webp",
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
        },
        "mainEntity": [
            <?php
            $fileNumber = num;
            $file = $_SERVER['DOCUMENT_ROOT'] . '/data/faq-data/' . $fileNumber . '.php';

            if (file_exists($file)) {
                include $file;
            }
            ?>
        ]
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