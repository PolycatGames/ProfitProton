<!DOCTYPE html>
<html lang="en">

<head>
    <!--Get Data-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/getdata.php'; ?>
    <?php define('num', 1); ?>
    <?php $data = getDataFromTextFile(num); ?>

    <!--Meta Data-->
    <title><?php echo $data['title'] ?></title>
    <meta name="description" content="<?php echo $data['description'] ?>" />
    <meta name="keywords" content="<?php echo $data['keywords'] ?>" />
    <meta name="author" content="<?php echo $data['author'] ?>" />
    <!--<meta name="robots" content="index, follow">-->

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/metadata.php'; ?>

    <!--Styles-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/head.php'; ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/headernav.html'; ?>

    <main class="main-content">
        <article class="content-holder">
            <section class="pc">
                <div class="pcl">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/pcl-front.php'; ?>

                    Content Here

                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/read-more.php'; ?>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/subscribe.php'; ?>
                </div>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/pcr.php'; ?>
            </section>
        </article>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>

</html>