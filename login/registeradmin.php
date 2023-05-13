<?php
// Include config file
require_once "config.php";
include_once('../include/config2.php');
 $sql11 = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC LIMIT 1");
                $print_data = mysqli_fetch_row($sql11);
                $temporaryid = $print_data[0];
                $temporarycount = 1;
                $temporaryid2 = ((int)$temporaryid+(int)$temporarycount);
            
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $firstname = $lastname = "";
$username_err = $password_err = $confirm_password_err = $email_err = $firstname_err = $lastname_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    //validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";

    }else{
         $sql = "SELECT id FROM users WHERE email = ?";
         if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

    }
    //validate firstname
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter a name.";     
    } else{
        $firstname = trim($_POST["firstname"]);
    }

    //validate lastname

     if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please enter a last name.";     
    } else{
        $lastname = trim($_POST["lastname"]);
    }

    

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($firstname_err) && empty($lastname_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password , email, firstname ,lastname) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password , $param_email , $param_firstname , $param_lastname);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            $param_firstname = $firstname;
            $param_lastname = $lastname;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo '<script type="text/javascript">
                alert("Registered Succesfully!");
                window.location = "../pages/client/account.php";
                </script>
        <?php';
               // header('Location:  .php?editId=' . $temporaryid2); 
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/dist/output.css" rel="stylesheet">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-dark"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                  <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstname"  class="form-control form-control-user <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" placeholder="First Name" value="<?php echo $firstname; ?>">
                                         <span class="invalid-feedback"><?php echo $firstname_err; ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                         <input type="text" name="lastname"  class="form-control form-control-user <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" placeholder="Last Name" value="<?php echo $lastname; ?>">
                                         <span class="invalid-feedback"><?php echo $lastname_err; ?></span>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <input type="text" name="username"  class="form-control form-control-user <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?php echo $username; ?>">
                                         <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                       <input type="text" name="email"  class="form-control form-control-user <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?php echo $email; ?>">
                                         <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                         <input type="password" name="password"  class="form-control form-control-user <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" value="<?php echo $password; ?>" >
        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                         <input type="password" name="confirm_password" class="form-control form-control-user <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                    </div>
                                </div>
                               <!-- <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div> -->
                               <button class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="submit" id="submit">Register Account</button>
                                <hr>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/css/jquery.min.js"></script>
    <script src="../js//bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../js/query.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>