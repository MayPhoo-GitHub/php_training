<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial-3</title>
  </head>

  <body>
    <h1>Choose Your Date Of Birth</h1>
    <form action = "" method="post">
      <input type = "date" name="dob"
       placeholder = "select Birth date"><br><br>
       <button type = "submit">Calculate Age</button><br><br>
       </form>
       <?php
       if(isset($_POST['dob'])){  
        $dateOfBirth = $_POST['dob'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        echo 'Age is '.$diff->format('%y') .'year '.$diff->format('%m').'month';
       }
      ?>
  </body>

  </html>