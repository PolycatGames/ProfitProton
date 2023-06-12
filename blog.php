<!DOCTYPE html>
<html lang="en">

<head>

    <!--Meta Data-->
    <title>ProfitProton | Blog</title>
    <meta name="description" content="ENTER DESCRIPTION" />
    <meta name="keywords" content="KEYWORDS" />
    <meta name="author" content="AUTHOR" />
    <!--<meta name="robots" content="index, follow">-->

    <!--Scripts-->
    <?php
    // Function to extract specific data from the text file
    function getDataFromTextFile($entryNumber)
    {
        // Read the contents of the text file
        $data = file_get_contents('data.txt');

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
    $data = file_get_contents('data.txt');

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


    <!--Styles-->

    <?php include 'assets/head.php'; ?>
</head>

<body>
    <?php include 'assets/headernav.html'; ?>
    <main class="main-content">
        <article>
            <section class="blog-front">
                <a href="/" class="stickypost-large">
                    <div>
                        <img src="images/placeholder/profitproton_placeholder.png" alt="">
                        <span class="stickypost-large-category">Category</span>
                        <h1 class="stickypost-large-title">Lorem ipsum dolor sit amet</h1>
                    </div>
                </a>
                <div class="articles-1x">
                    <div class="articles-1x-top">
                        <img src="icons/other/popular.png" alt="popular-articles-icon">
                        <h2>Most Popular</h2>
                    </div>
                    <div class="articles-1x-bottom">
                        <a href="">
                            <button>
                                <span class="articles-1x-bottom-category">CATEGORY</span>
                                <h3 class="articles-1x-bottom-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            </button>
                        </a>
                        <a href="">
                            <button>
                                <span class="articles-1x-bottom-category">CATEGORY</span>
                                <h3 class="articles-1x-bottom-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            </button>
                        </a>
                        <a href="">
                            <button>
                                <span class="articles-1x-bottom-category">CATEGORY</span>
                                <h3 class="articles-1x-bottom-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            </button>
                        </a>
                        <a href="">
                            <button>
                                <span class="articles-1x-bottom-category">CATEGORY</span>
                                <h3 class="articles-1x-bottom-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            </button>
                        </a>
                    </div>
                </div>
            </section>
        </article>

        <nav id="categories-holder">
            <section class="categories">
                <div class="categories-grid">
                    <button class="categories-item c1i1">E-commerce</button>
                    <button class="categories-item c1i2">Freelancing</button>
                    <button class="categories-item c1i3">Marketing</button>
                    <button class="categories-item c1i4">AI</button>
                    <button class="categories-item c1i5">Blogging</button>
                    <button class="categories-item" id="categories-item-more">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 348.78 214.66">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: none;
                                        stroke: var(--main-color);
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                        stroke-width: 50px;
                                    }
                                </style>
                            </defs>
                            <polyline class="cls-1" points="40 40.53 174.13 174.66 308.78 40" />
                        </svg>
                        <span>More</span>
                    </button>
                </div>
            </section>
        </nav>

        <article>
            <div class="articles-title">
                Latest posts
            </div>
            <section class="articles-3x">
                <div class="articles-layout-3x-grid">
                    <a <?php $entryNumber = $article;
                        $data = getDataFromTextFile($entryNumber); ?> href=<?php echo $data['link'] ?> <?php if ($data['title'] === "No title found.") { ?>style="visibility: hidden;" <?php } ?>>
                        <div class="article-3x">
                            <img src=<?php
                                        echo $data['thumbnail']
                                        ?>>
                            <span class="article-3x-tag article-3x-content">
                                <?php
                                echo $data['category']
                                ?>
                            </span>
                            <h3 class="article-3x-title article-3x-content">
                                <?php
                                echo $data['title']
                                ?>
                            </h3>
                            <p class="article-3x-description article-3x-content">
                                <?php
                                echo $data['description']
                                ?>
                            </p>
                            <span class="article-3x-date article-3x-content">
                                <?php
                                echo $data['date']
                                ?>
                            </span>
                        </div>

                    </a>
                    <a <?php $entryNumber = $article;
                        $data = getDataFromTextFile($entryNumber - 1); ?> href=<?php echo $data['link'] ?> <?php if ($data['title'] === "No title found.") { ?>style="visibility: hidden;" <?php } ?>>
                        <div class="article-3x">
                            <img src=<?php
                                        echo $data['thumbnail']
                                        ?>>
                            <span class="article-3x-tag article-3x-content">
                                <?php
                                echo $data['category']
                                ?>
                            </span>
                            <h3 class="article-3x-title article-3x-content">
                                <?php
                                echo $data['title']
                                ?>
                            </h3>
                            <p class="article-3x-description article-3x-content">
                                <?php
                                echo $data['description']
                                ?>
                            </p>
                            <span class="article-3x-date article-3x-content">
                                <?php
                                echo $data['date']
                                ?>
                            </span>
                        </div>

                    </a>
                    <a <?php $entryNumber = $article;
                        $data = getDataFromTextFile($entryNumber - 2); ?> href=<?php echo $data['link'] ?> <?php if ($data['title'] === "No title found.") { ?>style="visibility: hidden;" <?php } ?>>
                        <div class="article-3x">
                            <img src=<?php
                                        echo $data['thumbnail']
                                        ?>>
                            <span class="article-3x-tag article-3x-content">
                                <?php
                                echo $data['category']
                                ?>
                            </span>
                            <h3 class="article-3x-title article-3x-content">
                                <?php
                                echo $data['title']
                                ?>
                            </h3>
                            <p class="article-3x-description article-3x-content">
                                <?php
                                echo $data['description']
                                ?>
                            </p>
                            <span class="article-3x-date article-3x-content">
                                <?php
                                echo $data['date']
                                ?>
                            </span>
                        </div>

                    </a>
                    <a <?php $entryNumber = $article;
                        $data = getDataFromTextFile($entryNumber - 3); ?> href=<?php echo $data['link'] ?> <?php if ($data['title'] === "No title found.") { ?>style="visibility: hidden;" <?php } ?>>
                        <div class="article-3x">
                            <img src=<?php
                                        echo $data['thumbnail']
                                        ?>>
                            <span class="article-3x-tag article-3x-content">
                                <?php
                                echo $data['category']
                                ?>
                            </span>
                            <h3 class="article-3x-title article-3x-content">
                                <?php
                                echo $data['title']
                                ?>
                            </h3>
                            <p class="article-3x-description article-3x-content">
                                <?php
                                echo $data['description']
                                ?>
                            </p>
                            <span class="article-3x-date article-3x-content">
                                <?php
                                echo $data['date']
                                ?>
                            </span>
                        </div>

                    </a>
                    <a <?php $entryNumber = $article;
                        $data = getDataFromTextFile($entryNumber - 4); ?> href=<?php echo $data['link'] ?> <?php if ($data['title'] === "No title found.") { ?>style="visibility: hidden;" <?php } ?>>
                        <div class="article-3x">
                            <img src=<?php
                                        echo $data['thumbnail']
                                        ?>>
                            <span class="article-3x-tag article-3x-content">
                                <?php
                                echo $data['category']
                                ?>
                            </span>
                            <h3 class="article-3x-title article-3x-content">
                                <?php
                                echo $data['title']
                                ?>
                            </h3>
                            <p class="article-3x-description article-3x-content">
                                <?php
                                echo $data['description']
                                ?>
                            </p>
                            <span class="article-3x-date article-3x-content">
                                <?php
                                echo $data['date']
                                ?>
                            </span>
                        </div>

                    </a>
                    <a <?php $entryNumber = $article;
                        $data = getDataFromTextFile($entryNumber - 5); ?> href=<?php echo $data['link'] ?> <?php if ($data['title'] === "No title found.") { ?>style="visibility: hidden;" <?php } ?>>
                        <div class="article-3x">
                            <img src=<?php
                                        echo $data['thumbnail']
                                        ?>>
                            <span class="article-3x-tag article-3x-content">
                                <?php
                                echo $data['category']
                                ?>
                            </span>
                            <h3 class="article-3x-title article-3x-content">
                                <?php

                                echo $data['title']
                                ?>
                            </h3>
                            <p class="article-3x-description article-3x-content">
                                <?php
                                echo $data['description']
                                ?>
                            </p>
                            <span class="article-3x-date article-3x-content">
                                <?php
                                echo $data['date']
                                ?>
                            </span>
                        </div>

                    </a>
                </div>
            </section>
            <section class="pagination">
                <?php $articleamount = 6; ?>
                <button class="pagination-button" onclick="adjustarticle(<?php echo $articleamount ?>);" <?php if ($article == $highestNumber) { ?> disabled style="cursor:default;" <?php } ?>>Previous</button>
                <div class="pagination-page"><?php echo (($highestNumber - $article) / $articleamount + 1) ?> / <?php echo ceil($highestNumber / $articleamount) ?></div>
                <button class="pagination-button" onclick="adjustarticle(<?php echo -$articleamount ?>);" <?php if ($article - $articleamount <= 0) { ?> disabled style="cursor:default;" <?php } ?>>Next</button>

                <script>
                    var article = <?php echo $article; ?>;

                    function adjustarticle(value) {
                        var updatedValue = article + value;

                        // Check if the updated value is valid
                        if (updatedValue >= 1) {
                            article = updatedValue;
                            console.log("Updated article: " + article);

                            // Update the browser URL without reloading the article
                            var url = new URL(window.location.href);
                            url.searchParams.set('article', article);
                            window.history.replaceState(null, null, url);

                            // Store the scroll position in local storage
                            localStorage.setItem('scrollPosition', window.articleYOffset);

                            // Reload the article with the updated URL
                            window.location.href = url;
                        }
                    }

                    // Restore the scroll position on article load
                    window.onload = function() {
                        var scrollPosition = localStorage.getItem('scrollPosition');
                        if (scrollPosition !== null) {
                            window.scrollTo(0, scrollPosition);
                            localStorage.removeItem('scrollPosition');
                        }
                    };
                </script>
            </section>
        </article>
    </main>

    <?php include 'assets/footer.html'; ?>
</body>

</html>