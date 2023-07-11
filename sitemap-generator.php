<?php
// Set the base URL of your website
$baseUrl = "https://profitproton.com";

// Define the directory to scan for files
$scanDirectory = __DIR__;

// Set the location of the sitemap file
$sitemapFile = __DIR__ . "/sitemap.xml";

// Array to store URLs
$urls = array();

// Function to recursively scan files and directories
function scan($directory)
{
    global $urls, $baseUrl;

    $items = scandir($directory);

    foreach ($items as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        $path = $directory . '/' . $item;

        if (is_dir($path)) {
            scan($path);
        } else {
            // Check if file contains the required meta element
            if (checkMetaElement($path)) {
                // Add URL to the array
                $url = $baseUrl . substr($path, strlen(__DIR__));
                $urls[] = $url;
            }
        }
    }
}

function checkMetaElement($file)
{
    $html = file_get_contents($file);

    // Create a DOM document and load the HTML content
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    // Get all meta elements
    $metaElements = $dom->getElementsByTagName('meta');

    foreach ($metaElements as $meta) {
        // Check if the meta element has the robots directive
        if ($meta->hasAttribute('name') && $meta->getAttribute('name') == 'robots') {
            $content = $meta->getAttribute('content');

            // Check if the meta element contains both "index" and "follow" directives
            if (strpos($content, 'index') !== false && strpos($content, 'follow') !== false) {
                // Check if the meta element contains the "noindex" directive
                if (strpos($content, 'noindex') === false) {
                    return true;
                }
            }
        }
    }

    return false;
}


// Start scanning the directory
scan($scanDirectory);

// Create the sitemap XML
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($urls as $url) {
    $sitemap .= "\t<url>\n";
    $sitemap .= "\t\t<loc>{$url}</loc>\n";
    $sitemap .= "\t\t<lastmod>" . date('c') . "</lastmod>\n";
    $sitemap .= "\t</url>\n";
}

$sitemap .= '</urlset>';

// Save the sitemap XML to the file
file_put_contents($sitemapFile, $sitemap);

// Output success message
echo "Sitemap generated and saved to sitemap.xml";
