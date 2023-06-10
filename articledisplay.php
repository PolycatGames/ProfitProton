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
                // Usage example
                $entryNumber = 2;
                $data = getDataFromTextFile($entryNumber);
                echo "Title: " . $data['title'] . "<br>";
                echo "Description: " . $data['description'] . "<br>";
                echo "Date: " . $data['date'];
                ?>
            </section>
        </article>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/footer.html'; ?>
</body>

</html>