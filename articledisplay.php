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
    // Function to extract specific data from the text file
    function getDataFromTextFile($entryNumber)
    {
        // Read the contents of the text file
        $data = file_get_contents('data.txt');

        // Remove line breaks while preserving spaces
        $data = str_replace(array("\r\n", "\r", "\n"), '', $data);

        // Extract the title, description, and date based on the provided entry number using regular expressions
        $pattern = '/' . $entryNumber . '\s*\{\s*title:\s*"([^"]+)"\s*description:\s*"([^"]+)"\s*date:\s*([\d\/]+)/';
        preg_match($pattern, $data, $matches);

        if (isset($matches[1]) && isset($matches[2]) && isset($matches[3])) {
            $title = $matches[1];
            $description = $matches[2];
            $date = $matches[3];
            return array('title' => $title, 'description' => $description, 'date' => $date);
        } else {
            return array('title' => 'No title found.', 'description' => 'No description found.', 'date' => 'No date found.');
        }
    }
    ?>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/head.php'; ?>

</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/headernav.html'; ?>
    <main class="main-content">
        <article>
            <section>
                <?php
                // Read the data file
                $data = file_get_contents('data.txt');

                // Parse the data into an array of entries
                $entries = preg_split('/(?<=})\s*(?=\d)/', $data, -1, PREG_SPLIT_NO_EMPTY);

                // Initialize the highest number variable
                $highestNumber = 0;

                // Loop through the entries to find the highest number
                foreach ($entries as $entry) {
                    // Extract the number from each entry
                    preg_match('/(\d+)\s*{/', $entry, $matches);
                    $number = intval($matches[1]);

                    // Check if the number is higher than the current highest number
                    if ($number > $highestNumber) {
                        $highestNumber = $number;
                    }
                }

                // Set the value of page as the highest number
                $page = $highestNumber;
                ?>

                <?php
                // Check if the query parameter is present
                if (isset($_GET['page'])) {
                    // Retrieve the value of page from the URL
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                ?>

                <div style="margin-bottom: 30px;">
                    <?php
                    // Usage example
                    $entryNumber = $page;
                    $data = getDataFromTextFile($entryNumber);
                    echo "Title: " . $data['title'] . "<br>";
                    echo "Description: " . $data['description'] . "<br>";
                    echo "Date: " . $data['date'];
                    ?>
                </div>

                <div style="margin-bottom: 30px;">
                    <?php
                    // Usage example
                    $entryNumber = $page - 1;
                    $data = getDataFromTextFile($entryNumber);
                    echo "Title: " . $data['title'] . "<br>";
                    echo "Description: " . $data['description'] . "<br>";
                    echo "Date: " . $data['date'];
                    ?>
                </div>
            </section>
            <section>
                <button onclick="adjustpage(-1);">Previous</button>
                <button onclick="adjustpage(1);">Next</button>
            </section>
        </article>
    </main>

    <script>
        var page = <?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>;

        function adjustpage(value) {
            var updatedValue = page + value;

            // Check if the updated value is valid
            if (updatedValue >= 1) {
                page = updatedValue;
                console.log("Updated page: " + page);

                // Update the browser URL without reloading the page
                var url = new URL(window.location.href);
                url.searchParams.set('page', page);
                window.history.replaceState(null, null, url);

                // Store the scroll position in local storage
                localStorage.setItem('scrollPosition', window.pageYOffset);

                // Reload the page with the updated URL
                window.location.href = url;
            }
        }

        // Restore the scroll position on page load
        window.onload = function() {
            var scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition !== null) {
                window.scrollTo(0, scrollPosition);
                localStorage.removeItem('scrollPosition');
            }
        };
    </script>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>

</html>