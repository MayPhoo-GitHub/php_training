<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <form  method="post" action="pwd_reset_token.php">
            <h1>Forgot Password</h1>  
            <?php if(isset($_GET["emailFail"])) : ?>
                <p class="text-danger">Email is incorrect !</p>
            <?php else : ?>
                <p class="text-muted">Please enter your email</p>
            <?php endif; ?>                  
            <input type="email" name="input_email" placeholder="Email Address">
            <input type="submit" name="password-reset-token" value="Submit">                        
        </form>      
    </div> 
</body>
</html>