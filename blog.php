<!DOCTYPE html>
<html lang="en">

<head>



    <!--Meta Data-->
    <title>ProfitProton | Blog</title>
    <meta name="description" content="ENTER DESCRIPTION" />
    <meta name="keywords" content="KEYWORDS" />
    <meta name="author" content="AUTHOR" />
    <!--<meta name="robots" content="index, follow">-->

    <!--Styles-->
    <link rel="stylesheet" href="styles/blog.css">

    <?php include 'assets/head.php'; ?>
</head>

<body>
    <?php include 'assets/headernav.html'; ?>

    <main class="main-content">
        <article class="content-holder">
            <section class="blog-popular">
                <div class="blog-popular-main">
                    <img src="images/placeholder/profitproton_placeholder.png" alt="">
                    <span class="blog-popular-main-category">Category</span>
                    <h1 class="blog-popular-main-title">Lorem ipsum dolor sit amet</h1>
                </div>
                <div class="blog-popular-list">
                    <div class="blog-popular-list-top">
                        <img class="blog-popular-list-icon" src="icons/other/popular.png" alt="popular-articles-icon">
                        <h2>Most Popular</h2>
                    </div>
                    <div class="blog-popular-list-bottom">
                        <a href="">
                            <button class="blog-popular-list-bottom-button">
                                <span class="blog-popular-list-bottom-category">CATEGORY</span>
                                <h3 class="blog-popular-list-bottom-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            </button>
                        </a>
                        <a href="">
                            <button class="blog-popular-list-bottom-button">
                                <span class="blog-popular-list-bottom-category">CATEGORY</span>
                                <h3 class="blog-popular-list-bottom-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            </button>
                        </a>
                        <a href="">
                            <button class="blog-popular-list-bottom-button">
                                <span class="blog-popular-list-bottom-category">CATEGORY</span>
                                <h3 class="blog-popular-list-bottom-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            </button>
                        </a>
                        <a href="">
                            <button class="blog-popular-list-bottom-button">
                                <span class="blog-popular-list-bottom-category">CATEGORY</span>
                                <h3 class="blog-popular-list-bottom-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            </button>
                        </a>
                    </div>
                </div>
            </section>
            <section class="blog-categories">
                <div class="blog-categories-grid">
                    <button class="blog-categories-grid-item">Category</button>
                    <button class="blog-categories-grid-item">Category</button>
                    <button class="blog-categories-grid-item">Category</button>
                    <button class="blog-categories-grid-item">Category</button>
                    <button class="blog-categories-grid-item">Category</button>
                    <button class="blog-categories-grid-item" id="blog-categories-grid-more">
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
            <section>
                <div class="articles-title">
                    Latest posts
                </div>
            </section>
        </article>
    </main>

    <?php include 'assets/footer.html'; ?>
</body>

</html>