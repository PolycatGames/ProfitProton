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

    // Check if the query parameter is present
    if (isset($_GET['page'])) {
        // Retrieve the value of page from the URL
        $page = $_GET['page'];
        // Use the value of page as needed
        echo $page;
    } else {
        $page = $highestNumber;
        echo $page;
    }
    ?>

    <script>
        var page = <?php echo $page; ?>;

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

    <button onclick="adjustpage(1);">Previous</button>
    <button onclick="adjustpage(-1);">Next</button>









    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>

</html>