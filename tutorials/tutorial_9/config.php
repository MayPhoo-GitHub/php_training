<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config DB</title>
</head>
<body>
    <?php
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'mayphoowai');
        define('DB_NAME', 'tutorial8');

        /* Attempt to connect to MySQL*/
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $msg = '';
        //Check Connection
        if($link == false) {
            echo "ERROR: Cound not connect";
        }
    ?>
</body>
</html>