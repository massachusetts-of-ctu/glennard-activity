<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Masashutes</title>
  <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
  <link rel="stylesheet" href="test.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="assets/css/all.min.css?v=<?php echo time(); ?>"/>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time(); ?>">
</head>
<body>

<?php
    include('db_connect.php');

    $username = $email = $password = $confirm_password = "";
    $username_err = $email_err = $password_err = $confirm_password_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } else {
            $username = trim($_POST["username"]);
        }

      
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter an email.";
        } else {
            $email = trim($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Invalid email format.";
            }
        }

      
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } else {
            $password = trim($_POST["password"]);
        }

       
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if ($password != $confirm_password) {
                $confirm_password_err = "Password did not match.";
            }
        }

      
        $stmt = $conn->prepare("SELECT id FROM user_login WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $username_err = "This username is already taken.";
        }

        $stmt = $conn->prepare("SELECT id FROM user_login WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $email_err = "This email is already taken.";
        }

        
        if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user_login (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                
                header("location: index.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }

        $conn->close();
    }
    ?>

<div class="container-fluid"> 
    <div class="row no-gutter"> 
        <div class="col-md-5 panel">
        <div class="login d-flex align-items-center py-5"> 
            <div class="container"> 
            <div class="text-center logo">
                <img src="assets/img/logo.png" class="w-25 pb-3 rounded" alt="...">
                <h1>MASHASHUTES</h1>
            </div>
                <div class="row"> 
                    <div class="col-lg-7 col-xl-6 mx-auto"> 
                    
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
                            <div class="form-group mb-3 inputs"> 
                                <input type="text" required="required" name="username" value="<?php echo $username; ?>">
                                <span class="emails">Username</span>
                            </div> 
                            <div class="form-group mb-3 inputs"> 
                                <input type="text" required="required" name="email" value="<?php echo $email; ?>">
                                <span class="email">Email</span>
                            </div> 
                            <div class="form-group mb-3 inputs"> 
                                <input type="password" required="required" name="password"> 
                                <span class="passw">Password</span>
                            </div>
                            <div class="form-group mb-3 inputs"> 
                                <input type="password" required="required" name="confirm_password"> 
                                <span class="cpassw">Confirm Password</span>
                            </div>
                            <p class="error"><?php echo $username_err; ?></p>
                            <p class="error"><?php echo $email_err; ?></p>
                            <p class="error"><?php echo $password_err; ?></p>
                            <p class="error"><?php echo $confirm_password_err; ?></p>
                            
                            <button type="submit" class="btn butn">Create Account!</button> 
                            <div class="text-center d-flex justify-content-between mt-4 lower">
                                <p> OR &nbsp<a href="index.php" class="font-italic text-muted"> 
                                    <u>Login

                                    </u></a></p></div> </form> </div> </div> </div> </div>

        </div> </div> </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>