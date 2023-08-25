<!DOCTYPE html>
<html lang="en">

<head>
    <!--Get Data-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/getdata.php'; ?>
    <?php define('num', 1); ?>
    <?php $data = getDataFromTextFile(num); ?>

    <!--Meta Data-->
    <title><?= $data['title'] ?></title>
    <meta name="description" content="<?= $data['description'] ?>" />
    <meta name="keywords" content="<?= $data['keywords'] ?>" />
    <meta name="author" content="<?= $data['author'] ?>" />
    <!--<meta name="robots" content="index, follow">-->
    <!--<meta name="article:modified_time" content="2023-07-14T14:38:40Z">-->

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/articledata.php'; ?>

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
                    <div class="post-content">

                    </div>

                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/read-more.php'; ?>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/subscribe.php'; ?>
                </div>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/pcr.php'; ?>
            </section>
        </article>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>
<script>

</script>


</html>