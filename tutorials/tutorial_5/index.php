<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="css/style.css">
    <title>Tutorial 5</title>
</head>
<body>
    <?php
         require_once "vendor/autoload.php";
    ?>
    <div class="content">
        <h1>Files in Directory</h1>
            <?php
                $dir = "files/";
                $files = array_values(array_diff(scandir($dir), array('.','..')));
                foreach ($files as $file) {
                    echo $file,"<br>";
                }
            ?>
    </div>

	<div class="content">
		<h2>test.txt</h2>
		<?php
            $fileName = fopen("files/test.txt", "r");
            while (!feof($fileName)) {
                echo fgets($fileName) . "<br>";
            }
            fclose($fileName);
        ?>
	</div>

	<div class = "content">
		<h2>Book1.xlsx</h2>
		<?php
            require_once "./vendor/shuchkin/simplexlsx/src/SimpleXlsx.php";
            if ($xlsx = SimpleXLSX::parse('files/Book1.xlsx')) {
                echo '<table border = "1" cellpadding = "3" style = "border-collapse: collapse">';
                foreach ($xlsx->rows() as $r) {
                    echo '<tr><td>'.implode('</td><td>', $r).'</td></tr>';
                }
                echo '</table>';
            } else {
                echo SimpleXLSX::parseError();
            }
        ?>
	</div>

	<div class = "content">
	<h2>Book1.csv</h2>			
	<?php
        require_once "./vendor/shuchkin/simplecsv/src/SimpleCSV.php";
        if ( $csv = SimpleCSV::import('files/Book1.csv') ) {
            echo '<table border="1" cellpadding="0" style="border-collapse: collapse">';
            foreach ($csv as $r) {
                echo '<tr><td>'.implode('</td><td>', $r).'</td></tr>';
            }
            echo '</table>';
        } else {
            echo SimpleCSV::parseError();
        }        
    ?>
	</div>

	<div class = "content">
        <h2>test.docs</h2>
        <?php
            $fileName =	file_get_contents("files/test.doc");
            echo nl2br($fileName);
        ?>
    </div>
</body>
</html>