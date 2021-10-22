<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php

    session_start();
    if (!isset($_SESSION['user'])) {
        header('location:index.php');
    }

    ?>
    <div class="container mt-5">
        <h1 class="mb-3">May Phoo Wai (OJT)</h1>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Email:</b>mayphoowai@gmail.com
            </li>
            <li class="list-group-item">
                <b>Phone:</b>(09)243 867 645
            </li>
            <li class="list-group-item">
                <b>Address:</b>No.321,Main Street,West City
            </li>
        </ul>
        <br>
        <a href="_actions/logout.php">Logout</a>
    </div>
</body>
</html>