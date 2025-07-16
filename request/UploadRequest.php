<?php

function TextParser($text)
{
    $id = trim(substr($text, 0, 11)); // 58QV-Q26X
    $user_id =  trim(substr($text, 12, 6)); // GITB
    $bytes_tx = number_format(trim(substr($text, 18, 8))); // 660428
    $bytes_rx = number_format(trim(substr($text, 26, 8)));  // 424450
    $date_time = date("D, F d Y, h:i:s", strtotime(trim(substr($text, 34, 17)))); //Tue, September 10 2019, 06:05:00

    return "$user_id|$bytes_tx|$bytes_rx|$date_time|$id"; // Sample output: GITB|660,428|424,450|Tue, September 10 2019, 06:05:00|58QV-Q26X
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file_upload']['tmp_name'];
    if ($_FILES['file_upload']['error'] == UPLOAD_ERR_OK && is_uploaded_file($file)) { //checks that file is uploaded
        $filePointer = fopen($file, 'rb');

        while (($line = fgets($filePointer)) !== false) {
            $result[] = TextParser($line);
        }

        //Sort the data via ID
        usort($result, function ($a, $b) {
            $id_A = substr($a, strrpos($a, '|') + 1);
            $id_B = substr($b, strrpos($b, '|') + 1);
            return strcmp($id_A, $id_B);
        });
        session_start();
        $_SESSION['parsed_data'] = $result;
        fclose($filePointer);
        header('Location: ../index.php');
        exit();
    }
}
