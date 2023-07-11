<!DOCTYPE html>
<html lang="en">

<head>
    <!--Get Data-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/getdata.php'; ?>

    <!--Meta Data-->
    <title>Blogging | ProfitProton</title>
    <meta name="description" content="ENTER DESCRIPTION" />
    <meta name="keywords" content="KEYWORDS" />
    <meta name="author" content="AUTHOR" />
    <meta name="robots" content="index, follow">

    <!--Styles-->


    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/head.php'; ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/headernav.html'; ?>

    <main class="main-content">
        <article>
            <section>
                <h1 class="category-title">Blogging</h1>
            </section>
            <section class="articles-3x category">
                <div class="articles-layout-3x-grid">
                    <?php
                    // Read the file contents
                    $fileContent = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data.txt');

                    // Define an empty array to store the matching numbers
                    $categoryNumbers = [];

                    // Regular expression pattern to match the desired category
                    $pattern = '/(\d+)\s+\{\s*title:\s*"([^"]*)"\s*preview:\s*"([^"]*)"\s*description:\s*"([^"]*)"\s*keywords:\s*"([^"]*)"\s*time:\s*"([^"]*)"\s*date:\s*"([^"]*)"\s*category:\s*"Blogging"/';

                    // Match all occurrences of the pattern in the file content
                    preg_match_all($pattern, $fileContent, $matches);

                    // Convert the matched numbers to an array
                    $numbersArray = (array) $matches[1];

                    // Loop through the matched categories
                    foreach ($numbersArray as $number) {
                        // Add the number to the array
                        $categoryNumbers[] = $number;
                    }

                    // Sort the array in descending order
                    rsort($categoryNumbers);

                    // Output the resulting array
                    //echo $categoryNumbers[0];




                    $entryNumber = count($categoryNumbers);
                    $dataArray = array();

                    for ($i = 0; $i < (count($categoryNumbers)); $i++) {
                        $data = getDataFromTextFile($categoryNumbers[$i]);


                        $dataArray[$i] = $data;
                        if ($entryNumber >= 1) {
                            $entryNumber--;
                            $showarticle[$i] = 0;
                        } else {
                            $showarticle[$i] = 1;
                        }
                    }
                    ?>


                    <?php for ($i = 0; $i < (count($categoryNumbers)); $i++) : ?>
                        <?php if ($showarticle[$i] !== 1) : ?>
                            <a href="<?php echo $dataArray[$i]['link']; ?>" aria-label="Link to <?php echo $dataArray[$i]['title']; ?>">
                                <div class="article-3x">
                                    <img src="<?= $dataArray[$i]['thumbnail'] ?>-400x.webp" alt="<?= $dataArray[$i]['title'] ?>" srcset="<?= $dataArray[$i]['thumbnail'] ?>-400x.webp 400w, <?= $dataArray[$i]['thumbnail'] ?>-800x.webp 800w,<?= $dataArray[$i]['thumbnail'] ?>-1200x.webp 1200w" sizes="(min-width: 1240px) 340px, (min-width: 1080px) 33.3vw, (min-width: 730px) 50vw, 100vw" loading="lazy" decoding="async">
                                    <span class="article-3x-tag article-3x-content">
                                        <?php echo $dataArray[$i]['category']; ?>
                                    </span>
                                    <h3 class="article-3x-title article-3x-content">
                                        <?php echo $dataArray[$i]['title']; ?>
                                    </h3>
                                    <p class="article-3x-description article-3x-content truncate">
                                        <?php echo $dataArray[$i]['preview']; ?>
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
        </article>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>

</html>