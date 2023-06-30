<?php
// Function to extract specific data from the text file
function getDataFromTextFile($entryNumber)
{
  // Read the contents of the text file
  $data = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data.txt');

  // Remove line breaks while preserving spaces
  $data = str_replace(array("\r\n", "\r", "\n"), '', $data);

  // Modify the pattern to match the exact entry number
  $pattern = '/\b' . $entryNumber . '\s*{\s*title:\s*"([^"]+)"\s*description:\s*"([^"]+)"\s*date:\s*"([^"]+)"\s*category:\s*"([^"]+)"\s*link:\s*"([^"]+)"\s*thumbnail:\s*"([^"]+)"\s*}/';

  // Use preg_match instead of preg_match_all to find a single match
  preg_match($pattern, $data, $matches);

  if (!empty($matches)) {
    $title = $matches[1];
    $description = $matches[2];
    $date = $matches[3];
    $category = $matches[4];
    $link = $matches[5];
    $thumbnail = $matches[6];
    return array('title' => $title, 'description' => $description, 'date' => $date, 'category' => $category, 'link' => $link, 'thumbnail' => $thumbnail);
  } else {
    return array('title' => 'No title found.', 'description' => 'No description found.', 'date' => 'No date found.', 'category' => 'No category found.', 'link' => 'No link found.', 'thumbnail' => 'No thumbnail found.');
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
?>