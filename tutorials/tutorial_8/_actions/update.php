<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    // Include config file
    require_once "../config.php";
    
    // Define variables and initialize with empty values
    $fname = $lname =  $email = $salary = $position = "";
    $fname_err = $lname_err = $email_err = $position_err = $salary_err = "";
    
    // Processing form data when form is submitted
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Get hidden input value
        $id = $_POST["id"];
        
        // Validate fname
        $input_fname = trim($_POST["fname"]);
        if(empty($input_fname)){
            $fname_err = "Please enter a name.";
        } else {
            $fname = $input_fname;
        }
        // Validate lname
        $input_lname = trim($_POST["lname"]);
        if(empty($input_lname)){
            $lname_err = "Please enter a name.";
        } else {
            $lname = $input_lname;
        }    
        // Validate email
        $input_email= trim($_POST["email"]);
        if(empty($input_email)){
            $email_err = "Please enter an email.";     
        } else {
            $email = $input_email;
        }
        // Validate position
        $input_position= trim($_POST["position"]);
        if(empty($input_position)){
            $position_err = "Please enter a position.";     
        } else {
            $position = $input_position;
        }
        // Validate salary
        $input_salary = trim($_POST["salary"]);
        if(empty($input_salary)){
            $salary_err = "Please enter the salary amount.";     
        } else {
            $salary = $input_salary;
        }
        
        // Check input errors before inserting in database
        if(empty($fname_err) && empty($lname_err)  && empty($email_err)  && empty($position_err)  && empty($salary_err)){
            // Prepare an update statement
            $sql = "UPDATE employees SET firstname=?, lastname=?, email=?, position=?, salary=? WHERE id=?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssi", $param_fname, $param_lname, $param_email, $param_position, $param_salary, $param_id);
                
                // Set parameters
                $param_fname = $fname;
                $param_lname = $lname;
                $param_email = $email;
                $param_position = $position;
                $param_salary = $salary;
                $param_id = $id;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records updated successfully. Redirect to landing page
                    header("location: ../index.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($link);
    } else {
        // Check existence of id parameter before processing further
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            // Get URL parameter
            $id =  trim($_GET["id"]);
            
            // Prepare a select statement
            $sql = "SELECT * FROM employees WHERE id = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                
                // Set parameters
                $param_id = $id;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
        
                    if(mysqli_num_rows($result) == 1){
                        /* Fetch result row as an associative array. Since the result set
                        contains only one row, we don't need to use while loop */
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
                        // Retrieve individual field value
                        $fname = $row["firstname"];
                        $lname = $row["lastname"];
                        $email = $row["email"];
                        $position = $row["position"];
                        $salary = $row["salary"];
                        } else{
                        // URL doesn't contain valid id. Redirect to error page
                        header("location: error.php");
                        exit();
                    }
                    
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
            
            // Close connection
            mysqli_close($link);
        }  else {
            // URL doesn't contain id parameter. Redirect to error page
            header("location: error.php");
            exit();
        }
    }
    ?>
    
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Information</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                            <span class="invalid-feedback"><?php echo $fname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control <?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lname; ?>">
                            <span class="invalid-feedback"><?php echo $lname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" class="form-control <?php echo (!empty($position_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $position; ?>">
                            <span class="invalid-feedback"><?php echo $position_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="number" name="salary" min="0" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>