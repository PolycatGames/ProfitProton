<div class="pcl-front">
    <div>
        <div class="pcl-category"><?php echo $data['category'] ?></div>
    </div>
    <h1><?php echo $data['title'] ?></h1>
    <div class="pcl-front-flex">
        <div class="pcl-date">
            <time datetime="<?php echo date('Y-m-d', strtotime($data['date'])) . 'T00:00:00'; ?>"><?php echo $data['date'] ?></time>
            <span>-</span>
            <span>by <?php echo $data['author'] ?></span>
        </div>
        <a href="https://www.instagram.com/profitproton" target="_blank" aria-label="Follow instagram profile"><button class="pcl-button"><img src="/icons/socials/instagram.png" alt="Follow ProfitProton on Instagram"><span>Follow</span></button></a>
    </div>
    <img class="article-thumbnail" src=<?php echo $data['thumbnail'] ?> alt="<?php echo $data['title'] ?>">
</div>