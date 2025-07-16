<?php
function PageHeader($page_name = "")
{
    echo ('
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathaniel Gatpandan psdc coding challenge ' . $page_name . '</title>
    <link rel="stylesheet" href="css/tailwind/tailwind.min.css">
</head>

<body>
');
}

function PageFooter()
{
    echo ('
        <script src="css/tailwind/tailwind.js"></script>
</body>

</html>
        ');
}
