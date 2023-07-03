<div class="pcl-front">
    <div>
        <div class="pcl-category"><?php echo $data['category'] ?></div>
    </div>
    <h1><?php echo $data['title'] ?></h1>
    <div class="pcl-front-flex">
        <span class="pcl-date"><?php echo $data['date'] ?> - by <?php echo $data['author'] ?></span>
        <a href="https://www.instagram.com/profitproton" target="_blank"><button class="pcl-button"><img src="/icons/socials/instagram.png" alt="Follow ProfitProton on Instagram"><span>Follow</span></button></a>
    </div>
    <img class="article-thumbnail" src=<?php echo $data['thumbnail'] ?>>
</div>