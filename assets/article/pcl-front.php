<div class="pcl-front">
    <div>
        <div class="pcl-category"><?= $data['category'] ?></div>
    </div>
    <h1><?= $data['title'] ?></h1>
    <div class="pcl-front-flex">
        <div class="pcl-date">
            <time datetime="<?= date('Y-m-d', strtotime($data['date'])) . 'T00:00:00'; ?>"><?= $data['date'] ?></time>
            <span>-</span>
            <span>by <?= $data['author'] ?></span>
        </div>
        <a href="https://www.instagram.com/profitproton" target="_blank" aria-label="Follow instagram profile"><button class="pcl-button"><img src="/icons/socials/instagram.png" alt="Follow ProfitProton on Instagram"><span>Follow</span></button></a>
    </div>
    <img class="article-thumbnail" src=<?= $data['thumbnail'] ?> alt="<?= $data['title'] ?>">
</div>