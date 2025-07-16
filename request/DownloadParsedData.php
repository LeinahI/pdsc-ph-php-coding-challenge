<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['parsed_data'])) {
    // Decode it as json
    $parsedData = json_decode($_POST['parsed_data'], true);
    if ($parsedData && is_array($parsedData)) {
        // set headers for file download
        header('Content-Type: text/plain'); // Tell the browser the file will be plain text or .txt
        header('Content-Disposition: attachment; filename="output.txt"'); // Force download it with filename "output.txt"

        foreach ($parsedData as $line) {
            echo $line . "\n"; // Output teach line followed by a new line text
        }
        exit(); // Terminate execution after download
    }
}

header('Location: ../index.php'); // If something went wrong, redirect back
exit();
