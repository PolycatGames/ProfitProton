<!DOCTYPE html>
<html lang="en">

<head>
    <!--Meta Data-->
    <title>ProfitProton | Blog</title>
    <meta name="description" content="Learn the latest tips and strategies for earning money online." />
    <meta name="keywords" content="Side hustles, Online, Money, Earn, Passive income, Freelancing, E-commerce, Blog, Articles" />
    <meta name="author" content="ProfitProton" />
    <meta name="robots" content="index, follow">

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Blog",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://profitproton.com/blog"
            },
            "headline": "ProfitProton | Blog",
            "description": "Explore various profitable side hustles and learn how to make money online with the help of expert tips and guides on ProfitProton.com",
            "author": {
                "@type": "Person",
                "name": "Sjoerd Visser"
            },
            "publisher": {
                "@type": "Organization",
                "name": "ProfitProton",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://profitproton.com/images/logo/profitproton-logo.png"
                }
            }
        }
    </script>

    <link rel="canonical" href="https://profitproton.com/blog">

    <!-- Open Graph (OG) tags -->
    <meta property="og:url" content="https://profitproton.com/blog">
    <meta property="og:type" content="website">
    <meta property="og:title" content="ProfitProton | Blog">
    <meta property="og:description" content="Learn the latest tips and strategies for earning money online.">
    <meta property="og:image" content="https://profitproton.com/images/logo/profitproton-logo.png">
    <meta property="og:site_name" content="ProfitProton">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="ProfitProton | Blog">
    <meta name="twitter:description" content="Learn the latest tips and strategies for earning money online.">
    <meta name="twitter:image" content="https://profitproton.com/images/logo/profitproton-logo.png">
    <meta name="twitter:site" content="@profitproton">
    <meta name="twitter:creator" content="@profitproton">

    <!--Styles-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/getdata.php'; ?>
    <?php include 'assets/head.php'; ?>
</head>

<body>
    <?php include 'assets/headernav.html'; ?>
    <main class="main-content">
        <article>
            <section class="blog-front">
                <a class="stickypost-large" <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular); ?> href=<?= $data['link'] ?> aria-label="Link to <?= $data['title'] ?>">
                    <div>
                        <img src="<?= $data['thumbnail'] ?>-400x.webp" alt="<?= $data['title'] ?>" srcset="<?= $data['thumbnail'] ?>-400x.webp 400w, <?= $data['thumbnail'] ?>-800x.webp 800w,<?= $data['thumbnail'] ?>-1200x.webp 1200w" sizes="(max-width: 800px) 100vw, (min-width: 1240px) 670px, 50vw" loading="eager" decoding="async">
                        <span class="stickypost-large-category"><?= $data['category'] ?></span>
                        <h1 class="stickypost-large-title"><?= $data['title'] ?></h1>
                    </div>
                </a>
                <div class="articles-1x">
                    <div class="articles-1x-top">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512">
                            <g>
                                <g>
                                    <path fill="var(--main-color)" d="m12 23c-4.8 0-8.5-3.6-8.5-8.3 0-1.7.3-3 .9-4 .6-.9.9-1.3 1.4-1.8.2-.1.3-.3.5-.5l.3-.4c.5-.5.6-.6 1.1-1.5s.9-3 .9-4.5c0-.4.2-.7.6-.9.3-.2.7-.1 1 .1l.5.4c1.1.8 2.5 2 3.6 3.7.7 1.1 1.4 2.6 1.8 3.8.2-.4.4-.9.5-1.5.1-.4.4-.8.8-.9s.9.1 1.1.5c.7 1.2.8 1.4 1.4 3.2.6 1.9.7 3.1.7 4.2-.1 4.6-3.9 8.4-8.6 8.4zm-1.6-19c-.2 1.3-.5 2.6-1 3.5-.6 1-.8 1.3-1.3 1.9l-.3.3c-.2.2-.4.4-.5.6-.4.5-.7.8-1.2 1.5-.4.7-.6 1.7-.6 3 0 3.5 2.9 6.3 6.5 6.3s6.5-2.9 6.5-6.5c0-1 0-1.9-.6-3.5-.1-.3-.2-.5-.2-.7-.5.8-1.1 1.3-1.4 1.5s-.7.3-1.1.1c-.3-.2-.6-.5-.6-.9 0-.3-.8-3-1.9-4.7-.7-1-1.5-1.8-2.3-2.4z" fill="rgb(0,0,0)" />
                                </g>
                            </g>
                        </svg>
                        <h2>Most Popular</h2>
                    </div>
                    <div class="articles-1x-bottom">
                        <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular2); ?> href=<?= $data['link'] ?> aria-label="Link to <?= $data['title'] ?>">
                            <button>
                                <span class="articles-1x-bottom-category"><?= $data['category'] ?></span>
                                <h3 class="articles-1x-bottom-title"><?= $data['title'] ?></h3>
                            </button>
                        </a>
                        <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular3); ?> href=<?= $data['link'] ?> aria-label="Link to <?= $data['title'] ?>">
                            <button>
                                <span class="articles-1x-bottom-category"><?= $data['category'] ?></span>
                                <h3 class="articles-1x-bottom-title"><?= $data['title'] ?></h3>
                            </button>
                        </a>
                        <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular4); ?> href=<?= $data['link'] ?> aria-label="Link to <?= $data['title'] ?>">
                            <button>
                                <span class="articles-1x-bottom-category"><?= $data['category'] ?></span>
                                <h3 class="articles-1x-bottom-title"><?= $data['title'] ?></h3>
                            </button>
                        </a>
                        <a <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/data/config.php'; ?> <?php $data = getDataFromTextFile(Popular5); ?> href=<?= $data['link'] ?> aria-label="Link to <?= $data['title'] ?>">
                            <button>

                                <span class="articles-1x-bottom-category"><?= $data['category'] ?></span>
                                <h3 class="articles-1x-bottom-title"><?= $data['title'] ?></h3>
                            </button>
                        </a>
                    </div>
                </div>
            </section>
        </article>

        <nav id="categories-holder">
            <section class="categories">
                <div class="categories-grid">
                    <a href="/category/e-commerce" class="categories-item c1i1" aria-label="Explore E-commerce Category">E-commerce</a>
                    <a href="/category/freelancing" class="categories-item c1i2" aria-label="Explore Freelancing Category">Freelancing</a>
                    <a href="/category/marketing" class="categories-item c1i3" aria-label="Explore Marketing Category">Marketing</a>
                    <a href="/category/ai" class="categories-item c1i4" aria-label="Explore AI Category">AI</a>
                    <a href="/category/blogging" class="categories-item c1i5" aria-label="Explore Blogging Category">Blogging</a>
                    <a href="/categories" class="categories-item" id="categories-item-more" aria-label="Explore More Categories">
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
                        </svg>
                        More
                    </a>
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
                            $showarticle[$i] = 0;
                        } else {
                            $showarticle[$i] = 1;
                        }
                    }
                    ?>


                    <?php for ($i = 0; $i < $articleCount; $i++) : ?>
                        <?php if ($showarticle[$i] !== 1) : ?>
                            <a href="<?= $dataArray[$i]['link']; ?>" aria-label="<?= $dataArray[$i]['title']; ?>">
                                <div class="article-3x">
                                    <img src="<?= $dataArray[$i]['thumbnail'] ?>-400x.webp" alt="<?= $dataArray[$i]['title'] ?>" srcset="<?= $dataArray[$i]['thumbnail'] ?>-400x.webp 400w, <?= $dataArray[$i]['thumbnail'] ?>-800x.webp 800w,<?= $dataArray[$i]['thumbnail'] ?>-1200x.webp 1200w" sizes="(min-width: 1240px) 340px, (min-width: 1080px) 33.3vw, (min-width: 730px) 50vw, 100vw" loading="lazy" decoding="async">
                                    <span class="article-3x-tag article-3x-content">
                                        <?= $dataArray[$i]['category']; ?>
                                    </span>
                                    <h3 class="article-3x-title article-3x-content">
                                        <?= $dataArray[$i]['title']; ?>
                                    </h3>
                                    <p class="article-3x-description article-3x-content truncate">
                                        <?= $dataArray[$i]['preview']; ?>
                                    </p>
                                    <span class="article-3x-date article-3x-content">
                                        <time datetime="<?= date('Y-m-d', strtotime($dataArray[$i]['date'])) . $dataArray[$i]['time']; ?>"><?= $dataArray[$i]['date']; ?></time>
                                    </span>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            </section>







            <section class="pagination" aria-label="Pagination">
                <?php $articleamount = 6; ?>
                <button class="pagination-button" onclick="adjustpage(<?= $articleamount ?>);" <?php if ($page == 1) { ?> disabled style="cursor:default;" <?php } ?> aria-label="Previous page">Previous</button>
                <div class="pagination-page"><?= $page ?> / <?= ceil((count($resultArray) - 1) / $articleamount) ?></div>
                <button class="pagination-button" onclick="adjustpage(<?= -$articleamount ?>);" <?php if ($page == ceil((count($resultArray) - 1) / $articleamount)) { ?> disabled style="cursor:default;" <?php } ?> aria-label="Next page">Next</button>

                <script>
                    var page = <?= ((count($resultArray) - 1) - ($page - 1) * 6); ?>

                    function adjustpage(value) {
                        var updatedValue = page + value;
                        console.log(updatedValue);
                        // Check if the updated value is valid
                        if (updatedValue >= 1) {
                            page = Math.ceil((<?= (count($resultArray) - 1) ?> - updatedValue + 1) / <?= $articleamount ?>);
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

                <script>
                    if (<?= $page ?> > Math.ceil(<?= (ceil(count($resultArray) - 1)) ?> / <?= $articleamount ?>)) {

                        var url = new URL(window.location.href);
                        url.searchParams.set('page', Math.ceil(<?= (ceil(count($resultArray) - 1)) ?> / <?= $articleamount ?>));
                        window.history.replaceState(null, null, url);
                        window.location.href = url;
                    }
                    if (<?= $page ?> < 1) {

                        var url = new URL(window.location.href);
                        url.searchParams.set('page', 1);
                        window.history.replaceState(null, null, url);
                        window.location.href = url;
                    }
                </script>
            </section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/subscribe.php'; ?>
        </article>
    </main>
    <script>
        setDimensions(); // Call the function directly without relying on window.onload
    </script>
    <?php include 'assets/footer.html'; ?>
</body>

</html>