<?php
// Function to extract specific data from the text file
function getDataFromTextFile($entryNumber)
{
    // Read the contents of the text file
    $data = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data.txt');

    // Remove line breaks while preserving spaces
    $data = str_replace(array("\r\n", "\r", "\n"), '', $data);

    // Modify the pattern to match the exact entry number
    $pattern = '/\b' . $entryNumber . '\s*{\s*title:\s*"([^"]+)"\s*preview:\s*"([^"]+)"\s*description:\s*"([^"]+)"\s*keywords:\s*"([^"]+)"\s*date:\s*"([^"]+)"\s*category:\s*"([^"]+)"\s*link:\s*"([^"]+)"\s*thumbnail:\s*"([^"]+)"\s*author:\s*"([^"]+)"\s*}/';

    // Use preg_match instead of preg_match_all to find a single match
    preg_match($pattern, $data, $matches);

    if (!empty($matches)) {
        $title = $matches[1];
        $preview = $matches[2];
        $description = $matches[3];
        $keywords = $matches[4];
        $date = $matches[5];
        $category = $matches[6];
        $link = $matches[7];
        $thumbnail = $matches[8];
        $author = $matches[9];

        return array(
            'title' => $title,
            'preview' => $preview,
            'description' => $description,
            'keywords' => $keywords,
            'date' => $date,
            'category' => $category,
            'link' => $link,
            'thumbnail' => $thumbnail,
            'author' => $author
        );
    } else {
        return array(
            'title' => 'No title found.',
            'preview' => 'No preview found.',
            'description' => 'No description found.',
            'keywords' => 'No keywords found.',
            'date' => 'No date found.',
            'category' => 'No category found.',
            'link' => 'No link found.',
            'thumbnail' => 'No thumbnail found.',
            'author' => 'No author found.'
        );
    }
}

// Read the data file
$data = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data.txt');

// Parse the data into an array of entries
$entries = preg_split('/(?<=})\s*(?=\d)/', $data, -1, PREG_SPLIT_NO_EMPTY);

// Initialize the highest number variable
$highestNumber = 0;

// Loop through the entries to find the highest number
foreach ($entries as $entry) {
    // Extract the number from each entry
    preg_match('/(\d+)\s*{/', $entry, $matches);
    $number = intval($matches[1]);

    // Check if the number is higher than the current highest number
    if ($number > $highestNumber) {
        $highestNumber = $number;
    }
}

// Check if the query parameter is present
if (isset($_GET['article'])) {
    // Retrieve the value of article from the URL
    $article = $_GET['article'];
} else {
    $article = $highestNumber;
}

/*()
// Check if the query parameter is present
if (isset($_GET['article'])) {
    // Retrieve the value of article from the URL
    $article = $_GET['article'];
} else {
    $article = $highestNumber;
}
*/
?>