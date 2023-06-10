<!DOCTYPE html>
<html lang="en">

<head>
    <!--Meta Data-->
    <title>ENTER TITLE</title>
    <meta name="description" content="ENTER DESCRIPTION" />
    <meta name="keywords" content="KEYWORDS" />
    <meta name="author" content="AUTHOR" />
    <meta name="robots" content="index, follow">

    <!--Styles-->


    <?php
    $num = 3;
    $category = "Example Category 2";
    $title = "Example Article 2";
    $description = "This is an example article. 2";
    $date = "2023-06-01";
    ?>


    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/head.php'; ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/headernav.html'; ?>
    <main class="main-content">
        <article class="content-holder">
            <section class="ft">
                Hi there
            </section>
        </article>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>

</html>