<?php

$articlesDir = __DIR__ . '/articles';
$generatedDir = __DIR__ . '/data/faq-data';

if (!is_dir($generatedDir)) {
    mkdir($generatedDir);
}

$articleFiles = glob($articlesDir . '/*.php');

foreach ($articleFiles as $articleFile) {
    $contents = file_get_contents($articleFile);
    preg_match('/define\(\'num\', (\d+)\);/', $contents, $matches);

    if (isset($matches[1])) {
        $articleNum = $matches[1];

        preg_match_all('/<[^>]*?class\s*=\s*[\'"]faqquestion[\'"][^>]*?>(.*?)<\/[^>]*?>\s*([\s\S]*?)<[^>]*?class\s*=\s*[\'"]faqanswer[\'"][^>]*?>(.*?)<\/[^>]*?>/s', $contents, $qaMatches, PREG_SET_ORDER);

        if (!empty($qaMatches)) {
            $generatedContent = '';

            foreach ($qaMatches as $qaMatch) {
                $question = trim(strip_tags($qaMatch[1]));
                $elements = trim($qaMatch[2]);
                $answer = trim(strip_tags($qaMatch[3]));

                // Replace HTML entities with actual characters
                $answer = str_replace('&nbsp;', ' ', $answer);
                $answer = str_replace('&apos;', "'", $answer);
                $answer = str_replace('&rsquo;', "'", $answer);
                $answer = str_replace('"', "", $answer);

                $generatedContent .= "{\n";
                $generatedContent .= "  \"@type\": \"Question\",\n";
                $generatedContent .= "  \"name\": \"$question\",\n";
                $generatedContent .= "  \"acceptedAnswer\": {\n";
                $generatedContent .= "    \"@type\": \"Answer\",\n";
                $generatedContent .= "    \"text\": \"$answer\"\n";
                $generatedContent .= "  }\n";
                $generatedContent .= "},\n";
            }

            $generatedFile = "$generatedDir/$articleNum.php";
            file_put_contents($generatedFile, substr($generatedContent, 0, -2));
        }
    }
}

echo "Generation complete.";
