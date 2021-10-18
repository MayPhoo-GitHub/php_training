
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>Tutorial_1</title>
</head>
<body>
<?php
echo '<table>';
for ($i = 1; $i<9;$i++) {
    echo '<tr>';
    for ($j = 1; $j<9; $j++) {
        $total = $i+$j;
        if ($total %2 == 0) {
            echo '<td class="black"> </td>';
        } else {
            echo '<td> </td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
?>
</body>
</html>
