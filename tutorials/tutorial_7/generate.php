
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php

    //load the ar library
    if (!empty($_POST["text"])) {
        include "library/phpqrcode/qrlib.php";
        $text = $_POST["text"];
        $name = $_POST["name"];
        //file path
        $file = "images/" . $name . ".png";
        //other parameters
        $ecc = 'H';
        $pixel_size = 12;
        $frame_size = 5;
        
        // Generates QR Code and Save as PNG
        QRcode::png($text, $file, $ecc, $pixel_size, $frame_size);
        
        // Displaying the stored QR code if you want
        echo "<img src='" . $file . "'>";
        echo "<a href='index.php'>Generate New Code</a></div>";
    } else {
        header("location: index.php?error=1");
    }
    ?>
</body>
</html>