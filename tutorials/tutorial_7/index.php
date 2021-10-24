<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial 7</title>

</head>
<body>
    <div class="container">
        <form action="generate.php" method="post">
            <h1>QR Code Generator</h1>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-warning">
                    Fail to Generate
                </div>
            <?php endif?>            
            <input type="text" name="name" placeholder="Enter QR code Name"><br><br>
            <textarea name="text" placeholder="Enter Your Data "></textarea><br>
            <input type="submit" text="generate"><br><br>
        
        </form>
    </div>
</body>
</html>