<?php

// Read the data from the file
$data = file_get_contents('data.txt');

// Split the data into individual articles
$articles = preg_split('/(?<=\})\s*\n/', $data, -1, PREG_SPLIT_NO_EMPTY);

// Define the RSS feed content
$rssFeed = '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
<channel>
<title>ProfitProton</title>
<description>Learn how to make money online!</description>
<link>https://profitproton.com</link>';

// Iterate through each article and generate RSS items
$totalArticles = count($articles);
for ($index = 0; $index < $totalArticles - 1; $index++) {
    $article = $articles[$index];

    preg_match('/title: "(.*?)"/', $article, $titleMatch);
    preg_match('/preview: "(.*?)"/', $article, $previewMatch);
    preg_match('/description: "(.*?)"/', $article, $descriptionMatch);
    preg_match('/link: "(.*?)"/', $article, $linkMatch);
    preg_match('/time: "(.*?)"/', $article, $timeMatch);
    preg_match('/date: "(.*?)"/', $article, $dateMatch);

    $title = htmlspecialchars($titleMatch[1]);
    $preview = htmlspecialchars($previewMatch[1]);
    $description = htmlspecialchars($descriptionMatch[1]);
    $link = htmlspecialchars($linkMatch[1]);
    $time = $timeMatch[1];
    $date = $dateMatch[1];

    // Convert time and date to Unix timestamp
    $datetime = DateTime::createFromFormat('m-d-Y\TH:i:s', $date . $time, new DateTimeZone('UTC'));

    // Format the DateTime object as desired
    $pubdate = $datetime->format('D, d M Y H:i:s O');

    $rssFeed .= '
    <item>
        <title>' . $title . '</title>
        <description>' . $description . '</description>
        <link>https://profitproton.com' . $link . '</link>
        <pubDate>' . $pubdate . '</pubDate>
    </item>';
}

// Close the RSS feed
$rssFeed .= '
</channel>
</rss>';

// Write the RSS feed content to rss.php
file_put_contents('rss.xml', $rssFeed);
