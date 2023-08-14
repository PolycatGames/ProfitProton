<?php

// Define the path to the articles folder
$articlesPath = __DIR__ . '/articles';

// Get a list of all PHP files in the articles folder
$articleFiles = glob($articlesPath . '/*.php');

foreach ($articleFiles as $articleFile) {
    // Extract the article number from the PHP file
    $articleNumber = '';
    if (preg_match('/define\(\'num\',\s*(\d+)\);/', file_get_contents($articleFile), $matches)) {
        $articleNumber = $matches[1];
    }

    if ($articleNumber !== '') {
        // Get the content of the article file
        $articleContent = file_get_contents($articleFile);

        // Check if the article contains images with class "indeximg"
        if (strpos($articleContent, 'class="indeximg"') !== false) {
            // Create a new PHP file for the article
            $outputFile = __DIR__ . "/data/image-data/$articleNumber.php";
            $outputContent = '';

            // Extract images with class "indeximg" and their following text
            preg_match_all('/<img[^>]+class\s*=\s*["\']indeximg[^>]+>/i', $articleContent, $imageMatches);
            foreach ($imageMatches[0] as $imageTag) {
                preg_match('/src\s*=\s*["\']([^"\']+)["\']/', $imageTag, $srcMatches);
                $src = isset($srcMatches[1]) ? $srcMatches[1] : '';

                if ($src !== '') {
                    // Find the alt text (caption) of the image
                    preg_match('/alt\s*=\s*["\']([^"\']+)["\']/', $imageTag, $altMatches);
                    $alt = isset($altMatches[1]) ? $altMatches[1] : '';

                    // Format the image entry as JSON
                    $imageEntry = array(
                        '@type' => 'ImageObject',
                        'url' => "https://profitproton.com". $src,
                        'caption' => $alt
                    );
                    
                    $outputContent .= json_encode($imageEntry, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "," . "\n";

                    // Find the text following the image tag
                    $text = '';
                    $textPos = strpos($articleContent, $imageTag) + strlen($imageTag);
                    $textEndPos = strpos($articleContent, '</p>', $textPos);
                    if ($textEndPos !== false) {
                        $text = substr($articleContent, $textPos, $textEndPos - $textPos);

                    }
                }
            }

            // Write the content to the new file
            file_put_contents($outputFile,"," . substr($outputContent, 0, -2));
        }
    }
}

echo 'Files generated successfully!';
