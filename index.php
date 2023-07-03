<!DOCTYPE html>
<html lang="en">

<head>
    <!--Meta Data-->
    <title>ProfitProton | Your Guide to Making Money Online</title>
    <meta name="description" content="ProfitProton is a website dedicated to providing informative articles and guides on various ways to make money online. Explore our content and start your journey to financial success.">
    <meta name="keywords" content="make money online, online business, passive income, financial success, entrepreneurship, freelancing, e-commerce">
    <meta name="author" content="ProfitProton">
    <meta name="robots" content="index, follow">
    <!--Styles-->
    <link rel="stylesheet" href="styles/home.css">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/getdata.php'; ?>
    <?php include 'assets/head.php'; ?>
</head>



<body>
    <?php include 'assets/headernav.html'; ?>
    <main class="main-content">
        <article>
            <section class="banner">
                <div class="banner-area">
                    <div class="banner-area-left">
                        <div class="banner-area-left-title">Make your first $1000 online</div>
                        <div class="banner-area-left-description">Small beginnings lead to great achievements - start
                            your journey with us!</div>
                        <div class="banner-area-left-buttons">
                            <a href="/blog"><button class="banner-area-left-buttons-button1">Get Started Today</button></a>
                        </div>
                    </div>
                    <div class="banner-area-right">
                        <img src="images/illustrations/landing-page-illustration.jpg" alt="An illustration depicting a man sitting at a desk in an office, working on a laptop. Money is flowing out from the laptop, symbolizing the concept of earning money online. Next to the illustration is a button that says 'Start Earning.">
                    </div>
                </div>
            </section>
        </article>
        <section class="bar">
            <div class="bar-holder">
                <div class="bar-item">
                    <img class="bar-item-image" src="icons/topics/freelancing.png" alt="Explore Freelancing Articles">
                    <div class="bar-item-text">Freelancing</div>
                </div>
                <div class="bar-item">
                    <img class="bar-item-image" src="icons/topics/e-commerce.png" alt="Explore E-Commerce Articles">
                    <div class="bar-item-text">E-Commerce</div>
                </div>
                <div class="bar-item">
                    <img class="bar-item-image" src="icons/topics/content-creation.png" alt="Explore Content Creation Articles">
                    <div class="bar-item-text">Content Creation</div>
                </div>
                <div class="bar-item">
                    <img class="bar-item-image" src="icons/topics/ai.png" alt="Explore Artificial Intelligence Articles">
                    <div class="bar-item-text">Artificial Intelligence</div>
                </div>
                <div class="bar-item">
                    <img class="bar-item-image" src="icons/topics/marketing.png" alt="Explore Marketing Articles">
                    <div class="bar-item-text">Marketing</div>
                </div>
            </div>
        </section>
        <article>
            <div class="articles-title">
                Popular
            </div>
            <section class="articles-3x">
                <div class="articles-layout-3x-grid">
                    <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular); ?> href=<?php echo $data['link'] ?>>
                        <div class="article-3x">
                            <img src=<?php echo $data['thumbnail'] ?>>
                            <span class="article-3x-tag article-3x-content"><?php echo $data['category'] ?></span>
                            <h3 class="article-3x-title article-3x-content"><?php echo $data['title'] ?></h3>
                            <p class="article-3x-description article-3x-content truncate"><?php echo $data['preview'] ?></p>
                            <span class="article-3x-date article-3x-content"><?php echo $data['date'] ?></span>
                        </div>
                    </a>
                    <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular2); ?> href=<?php echo $data['link'] ?>>
                        <div class="article-3x">
                            <img src=<?php echo $data['thumbnail'] ?>>
                            <span class="article-3x-tag article-3x-content"><?php echo $data['category'] ?></span>
                            <h3 class="article-3x-title article-3x-content"><?php echo $data['title'] ?></h3>
                            <p class="article-3x-description article-3x-content truncate"><?php echo $data['preview'] ?></p>
                            <span class="article-3x-date article-3x-content"><?php echo $data['date'] ?></span>
                        </div>
                    </a>
                    <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular3); ?> href=<?php echo $data['link'] ?>>
                        <div class="article-3x">
                            <img src=<?php echo $data['thumbnail'] ?>>
                            <span class="article-3x-tag article-3x-content"><?php echo $data['category'] ?></span>
                            <h3 class="article-3x-title article-3x-content"><?php echo $data['title'] ?></h3>
                            <p class="article-3x-description article-3x-content truncate"><?php echo $data['preview'] ?></p>
                            <span class="article-3x-date article-3x-content"><?php echo $data['date'] ?></span>
                        </div>
                    </a>
                    <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular4); ?> href=<?php echo $data['link'] ?>>
                        <div class="article-3x">
                            <img src=<?php echo $data['thumbnail'] ?>>
                            <span class="article-3x-tag article-3x-content"><?php echo $data['category'] ?></span>
                            <h3 class="article-3x-title article-3x-content"><?php echo $data['title'] ?></h3>
                            <p class="article-3x-description article-3x-content truncate"><?php echo $data['preview'] ?></p>
                            <span class="article-3x-date article-3x-content"><?php echo $data['date'] ?></span>
                        </div>
                    </a>
                    <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular5); ?> href=<?php echo $data['link'] ?>>
                        <div class="article-3x">
                            <img src=<?php echo $data['thumbnail'] ?>>
                            <span class="article-3x-tag article-3x-content"><?php echo $data['category'] ?></span>
                            <h3 class="article-3x-title article-3x-content"><?php echo $data['title'] ?></h3>
                            <p class="article-3x-description article-3x-content truncate"><?php echo $data['preview'] ?></p>
                            <span class="article-3x-date article-3x-content"><?php echo $data['date'] ?></span>
                        </div>
                    </a>
                    <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular6); ?> href=<?php echo $data['link'] ?>>
                        <div class="article-3x">
                            <img src=<?php echo $data['thumbnail'] ?>>
                            <span class="article-3x-tag article-3x-content"><?php echo $data['category'] ?></span>
                            <h3 class="article-3x-title article-3x-content"><?php echo $data['title'] ?></h3>
                            <p class="article-3x-description article-3x-content truncate"><?php echo $data['preview'] ?></p>
                            <span class="article-3x-date article-3x-content"><?php echo $data['date'] ?></span>
                        </div>
                    </a>
                </div>
            </section>
            <div class="articles-title">
                Latest
            </div>
            <section class="articles-2x">
                <div class="articles-2x-grid">



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




                    $articleCount = 6; // Set the number of articles to display
                    $entryNumber = count($resultArray) - 1;
                    $dataArray = array();

                    for ($i = 0; $i < $articleCount; $i++) {
                        $data = getDataFromTextFile($resultArray[$entryNumber]);

                        $dataArray[$i] = $data;
                        if ($entryNumber >= 1) {
                            $entryNumber--;
                            $showarticle[$i] = 0;
                        } else {
                            $showarticle[$i] = 1;
                        }
                    }
                    ?>

                    <?php for ($i = 0; $i < $articleCount; $i++) : ?>
                        <?php if ($showarticle[$i] !== 1) : ?>
                            <a class="article-2x" href="<?php echo $dataArray[$i]['link']; ?>">
                                <img src="<?php echo $dataArray[$i]['thumbnail']; ?>" alt="">
                                <div class="article-2x-info">
                                    <div class="article-2x-title">
                                        <?php echo $dataArray[$i]['title']; ?>
                                    </div>
                                    <div class="article-2x-description">
                                        <?php echo $dataArray[$i]['author']; ?> - <?php echo $dataArray[$i]['date']; ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>

                </div>
            </section>
            <div class="articles-title">
                Top Freelancing Platforms
            </div>
            <section class="home-suggested-platforms">
                <div style="display: flex; justify-content: center;">
                    <div class="home-suggested-platforms-grid">
                        <div class="home-suggested-platforms-grid-item">
                            <img class="home-suggested-platforms-grid-item-image" src="images/company-logos/fiverr-logo.png" alt="Fiverr logo">
                            <button class="home-suggested-platforms-grid-item-button">VISIT SITE</button>
                        </div>
                        <div class="home-suggested-platforms-grid-item">
                            <img class="home-suggested-platforms-grid-item-image" src="images/company-logos/freelancer-logo.png" alt="Freelancer logo">
                            <button class="home-suggested-platforms-grid-item-button">VISIT SITE</button>
                        </div>
                        <div class="home-suggested-platforms-grid-item">
                            <img class="home-suggested-platforms-grid-item-image" src="images/company-logos/upwork-logo.png" alt="Upwork logo">
                            <button class="home-suggested-platforms-grid-item-button">VISIT SITE</button>
                        </div>
                        <div class="home-suggested-platforms-grid-item">
                            <button class="view-more">
                                <span class="view-more-circle" aria-hidden="true">
                                    <span class="view-more-arrow view-more-icon"></span>
                                </span>
                                <span class="view-more-text">View more</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <?php include 'assets/footer.html'; ?>
</body>

</html>