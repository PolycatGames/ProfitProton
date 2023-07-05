<!DOCTYPE html>
<html lang="en">

<head>
    <!--Get Data-->
    <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/getdata.php'; ?>
    <? define('num', 1); ?>
    <? $data = getDataFromTextFile(num); ?>

    <!--Meta Data-->
    <title><?= $data['title'] ?></title>
    <meta name="description" content="<?= $data['description'] ?>" />
    <meta name="keywords" content="<?= $data['keywords'] ?>" />
    <meta name="author" content="<?= $data['author'] ?>" />
    <!--<meta name="robots" content="index, follow">-->

    <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/metadata.php'; ?>

    <!--Styles-->
    <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/head.php'; ?>
</head>

<body>
    <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/headernav.html'; ?>

    <main class="main-content">
        <article class="content-holder">
            <section class="pc">
                <div class="pcl">
                    <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/pcl-front.php'; ?>

                    Content Here

                    <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/read-more.php'; ?>
                    <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/subscribe.php'; ?>
                </div>
                <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/article/pcr.php'; ?>
            </section>
        </article>
    </main>

    <? include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>

</html>