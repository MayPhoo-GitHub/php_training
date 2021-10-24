<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 9</title>    
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <?php
        // Include config file
        require_once "config.php";        

        $sqlQuery = "SELECT AVG(salary) AS avg_salary, position FROM employees GROUP BY position";
        $result = mysqli_query($link, $sqlQuery);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        mysqli_close($link);
        echo '<script>var data =' . json_encode($data) . '</script>';
    ?>
</head>
<body>
    <div class="wrapper">
        <canvas id="graphCanvas"></canvas>
    </div>
    <script src="js/library/jquery.min.js"></script>
    <script src="js/library/Chart.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>