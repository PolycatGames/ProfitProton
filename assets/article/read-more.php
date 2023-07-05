<div class="articles-3x-small">
    <span class="articles-3x-small-title">Read More</span>
    <div class="articles-3x-small-grid">
        <?
        // Read the contents of the text file
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data.txt');

        // Parse the data into an array of entries
        $entries = preg_split('/(?<=})\s*(?=\d)/', $data, -1, PREG_SPLIT_NO_EMPTY);

        // Initialize an array to store the numbers
        $numberArray = array();

        // Loop through the entries to extract the numbers
        foreach ($entries as $entry) {
            // Extract the number from each entry
            preg_match('/(\d+)\s*{/', $entry, $matches);
            $number = intval($matches[1]);

            // Add the number to the array
            $numberArray[] = $number;
        }

        // Reverse the order of the array
        $numberArray = array_reverse($numberArray);

        // Create an array with the format "arraynumber - datanumber"
        $resultArray = array();
        for ($i = 0; $i < count($numberArray); $i++) {
            $resultArray[] = $numberArray[$i];
        }




        $articleCount = 3; // Set the number of articles to display
        $entryNumber = count($resultArray) - 1;
        $dataArray = array();

        for ($i = 0; $i < $articleCount; $i++) {
            $data = getDataFromTextFile($resultArray[$entryNumber]);

            $dataArray[$i] = $data;
            if ($entryNumber >= 1) {
                $entryNumber--;
                $showarticle[$i] = 0;
            } else {
                $showarticle[$i] = 1;
            }
        }
        ?>



        <? for ($i = 0; $i < $articleCount; $i++) : ?>
            <? if ($showarticle[$i] !== 1) : ?>
                <a href="<?= $dataArray[$i]['link']; ?>" aria-label="Link to <?= $dataArray[$i]['title']; ?>">
                    <div class="article-3x-small">
                        <img src=<?= $dataArray[$i]['thumbnail']; ?> alt="<?= $dataArray[$i]['title']; ?>">
                        <span class="article-3x-small-title"><?= $dataArray[$i]['title']; ?></span>
                        <span class="article-3x-small-date"><?= $dataArray[$i]['date']; ?></span>
                    </div>
                </a>
            <? endif; ?>
        <? endfor; ?>
    </div>
</div>