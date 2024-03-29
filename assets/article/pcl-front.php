<div class="pcl-front">
    <div>
        <div class="pcl-category"><?= $data['category'] ?></div>
    </div>
    <h1><?= $data['title'] ?></h1>
    <div class="pcl-front-flex">

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const lastmodElement = document.getElementById("lastmod");
                const modifiedTime = document.querySelector('meta[name="article:modified_time"]').getAttribute("content");
                const modifiedDate = new Date(modifiedTime).toLocaleDateString();

                lastmodElement.setAttribute("datetime", modifiedTime);

                // Replace '<?= $data['date'] ?>' with the actual PHP value
                const phpDate = '<?= $data['date'] ?>';

                // Replace slashes with dashes in the modifiedDate
                const formattedModifiedDate = modifiedDate.replace(/\//g, '-');

                if (phpDate === formattedModifiedDate) {
                    lastmodElement.textContent = formattedModifiedDate;
                } else {
                    lastmodElement.textContent = "Last Updated: " + formattedModifiedDate;
                }
            });
        </script>


        <div class="pcl-info">
            <time id="lastmod"></time>
            <div class="pcl-author">
                <img src="/images/logo/profitproton-logo-120x.png" alt="ProfitProton Logo">
                <span><?= $data['author'] ?></span>
            </div>
        </div>
        <a href="https://www.instagram.com/profitproton" target="_blank" aria-label="Follow instagram profile"><button class="pcl-button">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 409.61 409.61" style="enable-background:new 0 0 409.61 409.61;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M307.205,0h-204.8C46.09,0,0.005,46.085,0.005,102.4v204.81c0,56.3,46.085,102.4,102.4,102.4h204.8    c56.315,0,102.4-46.1,102.4-102.4V102.4C409.605,46.085,363.52,0,307.205,0z M375.47,307.21c0,37.632-30.612,68.265-68.265,68.265    h-204.8c-37.637,0-68.265-30.633-68.265-68.265V102.4c0-37.642,30.628-68.265,68.265-68.265h204.8    c37.653,0,68.265,30.623,68.265,68.265V307.21z"></path>
                        </g>
                    </g>
                    <g>
                        <g>
                            <circle cx="315.755" cy="93.865" r="25.6"></circle>
                        </g>
                    </g>
                    <g>
                        <g>
                            <path d="M204.805,102.4c-56.566,0-102.4,45.839-102.4,102.4c0,56.54,45.834,102.41,102.4,102.41c56.55,0,102.4-45.87,102.4-102.41    C307.205,148.239,261.355,102.4,204.805,102.4z M204.805,273.075c-37.699,0-68.265-30.566-68.265-68.275    s30.566-68.265,68.265-68.265s68.265,30.556,68.265,68.265S242.504,273.075,204.805,273.075z"></path>
                        </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                </svg>
                <span>Follow</span></button></a>
    </div>
    <img class="article-thumbnail" src="<?= $data['thumbnail'] ?>-400x.webp" alt="<?= $data['title'] ?>" srcset="<?= $data['thumbnail'] ?>-400x.webp 400w, <?= $data['thumbnail'] ?>-800x.webp 800w,<?= $data['thumbnail'] ?>-1200x.webp 1200w" sizes="(max-width: 700px) 100vw, 700px" loading="eager" decoding="async">
</div>