
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial_1</title>
</head>
<body>
<?php
echo '<table>';
for ($row = 1; $row <9;$row++) {
    echo '<tr>';
    for ($column = 1; $column<9; $column++) {
        $total = $row+$column;
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
