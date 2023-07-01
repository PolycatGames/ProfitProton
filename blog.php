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



    <!--Styles-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/getdata.php'; ?>
    <?php include 'assets/head.php'; ?>
</head>

<body>
    <?php include 'assets/headernav.html'; ?>
    <main class="main-content">
        <article>
            <section class="blog-front">
                <a class="stickypost-large" <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular); ?> href=<?php echo $data['link'] ?>>
                    <div>
                        <img src=<?php echo $data['thumbnail'] ?>>
                        <span class="stickypost-large-category"><?php echo $data['category'] ?></span>
                        <h1 class="stickypost-large-title"><?php echo $data['title'] ?></h1>
                    </div>
                </a>
                <div class="articles-1x">
                    <div class="articles-1x-top">
                        <img src="icons/other/popular.png" alt="popular-articles-icon">
                        <h2>Most Popular</h2>
                    </div>
                    <div class="articles-1x-bottom">
                        <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular2); ?> href=<?php echo $data['link'] ?>>
                            <button>
                                <span class="articles-1x-bottom-category"><?php echo $data['category'] ?></span>
                                <h3 class="articles-1x-bottom-title"><?php echo $data['title'] ?></h3>
                            </button>
                        </a>
                        <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular3); ?> href=<?php echo $data['link'] ?>>
                            <button>
                                <span class="articles-1x-bottom-category"><?php echo $data['category'] ?></span>
                                <h3 class="articles-1x-bottom-title"><?php echo $data['title'] ?></h3>
                            </button>
                        </a>
                        <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular4); ?> href=<?php echo $data['link'] ?>>
                            <button>
                                <span class="articles-1x-bottom-category"><?php echo $data['category'] ?></span>
                                <h3 class="articles-1x-bottom-title"><?php echo $data['title'] ?></h3>
                            </button>
                        </a>
                        <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular5); ?> href=<?php echo $data['link'] ?>>
                            <button>

                                <span class="articles-1x-bottom-category"><?php echo $data['category'] ?></span>
                                <h3 class="articles-1x-bottom-title"><?php echo $data['title'] ?></h3>
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
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer_1" viewBox="0 0 290.5 291.99">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: none;
                                        stroke: #000;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                        stroke-width: 35px;
                                    }
                                </style>
                            </defs>
                            <polyline class="cls-1" points="252.5 156 252.5 274.49 17.5 274.49 17.5 35.39 137.66 35.39" />
                            <polyline class="cls-1" points="206.75 17.5 273 17.5 273 85 273 17.5 140.5 150" />
                        </svg>More</span>
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
                    <?php
                    // Read the contents of the text file
                    $data = file_get_contents('data.txt');

                    // Parse the data into an array of entries
                    $entries = preg_split('/(?<=})\s*(?=\d)/', $data, -1, PREG_SPLIT_NO_EMPTY);

                    // Initialize an array to store the numbers
                    $numberArray = array();

                    // Loop through the entries to extract the numbers
                    foreach ($entries as $entry) {
                        // Extract the number from each entry
                        preg_match('/(\d+)\s*{/', $entry, $matches);
                        $number = intval($matches[1]);

                        // Add the number to the array
                        $numberArray[] = $number;
                    }

                    // Reverse the order of the array
                    $numberArray = array_reverse($numberArray);

                    // Create an array with the format "arraynumber - datanumber"
                    $resultArray = array();
                    for ($i = 0; $i < count($numberArray); $i++) {
                        $resultArray[] = $numberArray[$i];
                    }


                    // Check if the query parameter is present
                    if (isset($_GET['page'])) {
                        // Retrieve the value of article from the URL
                        $page = $_GET['page'];

                    } else {
                        $page = 1;
                    }




                    $articleCount = 6; // Set the number of articles to display
                    $entryNumber = (count($resultArray) - 1) - ($page  - 1) * 6;
                    $dataArray = array();

                    for ($i = 0; $i < $articleCount; $i++) {
                        $data = getDataFromTextFile($resultArray[$entryNumber]);


                        $dataArray[$i] = $data;
                        if ($entryNumber >= 1) {
                            $entryNumber--;
                            $varr[$i] = 0;
                        } else {
                            $varr[$i] = 1;
                        }
                    }
                    ?>


                    <?php for ($i = 0; $i < $articleCount; $i++) : ?>
                        <?php if ($varr[$i] !== 1) : ?>
                            <a href="<?php echo $dataArray[$i]['link']; ?>">
                                <div class="article-3x">
                                    <img src="<?php echo $dataArray[$i]['thumbnail']; ?>" alt="">
                                    <span class="article-3x-tag article-3x-content">
                                        <?php echo $dataArray[$i]['category']; ?>
                                    </span>
                                    <h3 class="article-3x-title article-3x-content">
                                        <?php echo $dataArray[$i]['title']; ?>
                                    </h3>
                                    <p class="article-3x-description article-3x-content">
                                        <?php echo $dataArray[$i]['description']; ?>
                                    </p>
                                    <span class="article-3x-date article-3x-content">
                                        <?php echo $dataArray[$i]['date']; ?>
                                    </span>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </section>







            <section class="pagination">
                <?php $articleamount = 6; ?>
                <button class="pagination-button" onclick="adjustpage(<?php echo $articleamount ?>);" <?php if ($page == 1) { ?> disabled style="cursor:default;" <?php } ?>>Previous</button>
                <div class="pagination-page"><?php echo $page ?> / <?php echo ceil((count($resultArray) - 1) / $articleamount) ?></div>
                <button class="pagination-button" onclick="adjustpage(<?php echo -$articleamount ?>);" <?php if ($page == ceil((count($resultArray) - 1) / $articleamount)) { ?> disabled style="cursor:default;" <?php } ?>>Next</button>

                <script>
                    var page = <?php echo ((count($resultArray) - 1) - ($page - 1) * 6); ?>

                    function adjustpage(value) {
                        var updatedValue = page + value;
                        console.log(updatedValue);
                        // Check if the updated value is valid
                        if (updatedValue >= 1) {
                            page = Math.ceil((<?php echo (count($resultArray) - 1) ?> - updatedValue + 1) / <?php echo $articleamount ?>);
                            console.log("Updated page: " + page);

                            // Update the browser URL without reloading the article
                            var url = new URL(window.location.href);
                            url.searchParams.set('page', page);
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
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/subscribe.php'; ?>
        </article>
    </main>

    <?php include 'assets/footer.html'; ?>
</body>

</html>