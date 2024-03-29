<?php
// Set the base URL of your website
$baseUrl = "https://profitproton.com";

// Define the directory to scan for files
$scanDirectory = __DIR__;

// Set the location of the sitemap file
$sitemapFile = __DIR__ . "/sitemap.xml";

// Array to store URLs with modified time and image data
$urls = array();

// Function to recursively scan files and directories
function scan($directory, $rootDirectory)
{
    global $urls, $baseUrl;

    $items = scandir($directory);

    foreach ($items as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        $path = $directory . '/' . $item;

        if (is_dir($path)) {
            scan($path, $rootDirectory);
        } else {
            // Check if file contains the required meta element
            $modifiedTime = getModifiedTime($path);
            $robotsIndexFollow = checkMetaElement($path);

            if ($modifiedTime !== null || $robotsIndexFollow) {
                // Extract the relative path from the root directory
                $relativePath = substr($path, strlen($rootDirectory));

                // Remove the .php extension from the URL
                $url = $baseUrl . preg_replace('/\.php$/', '', $relativePath);

                // Avoid adding "index" to the URL
                if (basename($url) === 'index') {
                    $url = rtrim($url, 'index');
                }

                // Find images with class name "indeximg"
                $images = findImages($path, $baseUrl, dirname($relativePath));


                // Add URL and image data to the array
                $urls[] = array(
                    'url' => $url,
                    'lastmod' => $modifiedTime ? $modifiedTime : date('c'),
                    'images' => $images
                );
            }
        }
    }
}


// Function to find images with class name "indeximg"
function findImages($file)
{
    $html = file_get_contents($file);
    $images = array();

    if (!empty($html)) {
        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        $imageElements = $dom->getElementsByTagName('img');

        foreach ($imageElements as $image) {
            if ($image->hasAttribute('class') && strpos($image->getAttribute('class'), 'indeximg') !== false) {
                $imageData = array('loc' => 'https://profitproton.com' . $image->getAttribute('src'));

                if ($image->hasAttribute('alt')) {
                    $imageData['caption'] = $image->getAttribute('alt');
                    $imageData['title'] = $image->getAttribute('alt');
                }

                $images[] = $imageData;
            }
        }
    }

    return $images;
}


// Function to check if file contains the required meta element
function checkMetaElement($file)
{
    $html = file_get_contents($file);

    // Skip files with no content
    if (empty($html)) {
        return false;
    }

    // Create a DOM document and load the HTML content
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    // Get all meta elements
    $metaElements = $dom->getElementsByTagName('meta');

    foreach ($metaElements as $meta) {
        // Check if the meta element has the robots directive
        if ($meta->hasAttribute('name') && $meta->getAttribute('name') == 'robots') {
            $content = $meta->getAttribute('content');
            // Check if the content contains "index" and "follow" but not "noindex"
            if (strpos($content, 'index') !== false && strpos($content, 'follow') !== false && strpos($content, 'noindex') === false) {
                return true;
            }
        }
    }

    return false;
}


// Function to extract modified time from meta element
function getModifiedTime($file) {
    $html = file_get_contents($file);

    // Skip files with no content
    if (empty($html)) {
        return null;
    }

    // Create a DOM document and load the HTML content
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    // Get the article:modified_time meta element
    $metaElements = $dom->getElementsByTagName('meta');

    foreach ($metaElements as $meta) {
        if ($meta->hasAttribute('name') && $meta->getAttribute('name') == 'article:modified_time') {
            $content = $meta->getAttribute('content');
            // Check if the content is a valid date/time format
            $modifiedTime = strtotime($content);
            if ($modifiedTime !== false) {
                return date('c', $modifiedTime);
            }
        }
    }

    return null;
}

// Start scanning the directory
scan($scanDirectory, $scanDirectory);

// Create the sitemap XML
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
$sitemap .= '      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n";
$sitemap .= '      xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"' . "\n";
$sitemap .= '      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . "\n";
$sitemap .= '            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

foreach ($urls as $urlData) {
    $sitemap .= "\t<url>\n";
    $sitemap .= "\t\t<loc>{$urlData['url']}</loc>\n";
    $sitemap .= "\t\t<lastmod>{$urlData['lastmod']}</lastmod>\n";

    foreach ($urlData['images'] as $image) {
        $sitemap .= "\t\t<image:image>\n";
        $sitemap .= "\t\t\t<image:loc>{$image['loc']}</image:loc>\n";

        if (isset($image['caption'])) {
            $sitemap .= "\t\t\t<image:caption>{$image['caption']}</image:caption>\n";
        }

        if (isset($image['title'])) {
            $sitemap .= "\t\t\t<image:title>{$image['title']}</image:title>\n";
        }

        $sitemap .= "\t\t</image:image>\n";
    }

    $sitemap .= "\t</url>\n";
}

$sitemap .= '</urlset>';

// Save the sitemap XML to the file
file_put_contents($sitemapFile, $sitemap);

// Output success message
echo "Sitemap generated and saved to sitemap.xml";
?>