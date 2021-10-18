<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo "<pre>";
for ($row = 1; $row < 6; $row++) {
    for ($output = $row; $output < 6; $output++)
        echo "&nbsp;&nbsp;";
    for ($output = 2 * $row - 1; $output > 0; $output--)
        echo ("&nbsp;*");
    echo "<br>";
}
$row_count = 6;
for ($row = 6; $row > 0; $row--) {
    for ($output = $row_count - $row; $output > 0; $output--)
        echo "&nbsp;&nbsp;";
    for ($output = 2 * $row - 1; $output > 0; $output--)
        echo ("&nbsp;*");
    echo "<br>";
}
echo "</pre>";
?>
</body>
</html>