
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tutorial 5</title>
</head>
<style>
body{
    background: #fafafa;
    font-family: sans-serif;
    color: #242424;
}
.container{
    width: 50%;
    margin: 0 auto;
    background: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.10), 0 1px 2px rgba(0,0,0,0.10);
    border-radius: 15px;
    padding: 30px;
    margin-top: 30px;
}
h2{
    color: #2e7eff;
}
</style>
<body>

<div class="container">
<h2>Reading TEXT Files</h2>

<?php
$myfile = fopen("test.txt", "r");
while (!feof($myfile)) {
    echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>

</div>

<div class="container">
<h2>Reading EXCEL Files</h2>

<?php
require_once "src/SimpleXLSX.php";

if ($xlsx = SimpleXLSX::parse('test.xlsx')) {
    echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
    foreach ($xlsx->rows() as $r) {
        echo '<tr><td>' . implode('</td><td>', $r) . '</td></tr>';
    }
    echo '</table>';
} else {
    echo SimpleXLSX::parseError();
}
?>

</div>

<div class="container">
<h2>Reading CSV Files</h2>

<?php
require_once "src/SimpleCSV.php";
echo "<pre>";
if ($csv = SimpleCSV::import('test.csv')) {
    print_r($csv);
}
echo "<pre>";
?>

</div>

<div class="container">
<h2>Reading DOC Files</h2>

<?php
function read_doc_file($filename)
{
    if (file_exists($filename)) {
        if (($fh = fopen($filename, 'r')) !== false) {
            $headers = fread($fh, 0xA00);
            $n1 = (ord($headers[0x21C]) - 1);
            $n2 = ((ord($headers[0x21D]) - 8) * 256);
            $n3 = ((ord($headers[0x21E]) * 256) * 256);
            $n4 = (((ord($headers[0x21F]) * 256) * 256) * 256);
            $textLength = ($n1 + $n2 + $n3 + $n4);

            $extracted_plaintext = fread($fh, $textLength);
            return nl2br($extracted_plaintext);
        }
    }
}
$filename = "test.doc";
echo read_doc_file($filename);
?>
</div>

</body>
</html>