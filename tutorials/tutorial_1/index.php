<link rel="stylesheet" href="style.css">
<?php
echo '<table>';
for ($i=1; $i<9;$i++) {
    echo '<tr>';
    for ($j=1; $j<9; $j++) {
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