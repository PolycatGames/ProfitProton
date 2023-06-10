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


    <script>
        <?php
        $data = "Hello, World!";

        // Write data to a text file
        file_put_contents('data.txt', $data);
        ?>
    </script>





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