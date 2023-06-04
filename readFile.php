<?php
$filePath = 'data/output.txt';
$fileContent = file_get_contents($filePath);
echo $fileContent;
file_put_contents($filePath, '');
?>
