<!DOCTYPE html>
<html lang="en">

<head>
    <!--Get Data-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/getdata.php'; ?>

    <!--Meta Data-->
    <title>Dropshipping | ProfitProton</title>
    <meta name="description" content="ENTER DESCRIPTION" />
    <meta name="keywords" content="KEYWORDS" />
    <meta name="author" content="AUTHOR" />
    <!--<meta name="robots" content="index, follow">-->

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
                    $pattern = '/(\d+)\s+\{\s*title:\s*"[^"]*"\s*description:\s*"[^"]*"\s*date:\s*"[^"]*"\s*category:\s*"Blogging"/';

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
        </article>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>

</html>