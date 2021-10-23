<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <form  method="post" action="update_pwd.php">
            <h1>Reset Password</h1>
            <?php if(isset($_GET["pwdFail"])) : ?>
                <p class="text-danger">Password and confirm password must be same !</p>
            <?php else : ?> 
                <p class="text-muted">Please enter new password.</p>
            <?php endif; ?>                     
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="confirm_pwd" placeholder="Confirm Password">
            <input type="submit" value="Submit">
        </form>      
    </div> 
</body>
</html>