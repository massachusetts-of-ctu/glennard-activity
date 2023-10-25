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

    $username = $password = "";
    $username_err = $password_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a <strong>username</strong>.";
        } else {
            $username = trim($_POST["username"]);
        }

        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your <strong>password</strong>.";
        } else {
            $password = trim($_POST["password"]);
        }

        if (empty($username_err) && empty($password_err)) {
            $stmt = $conn->prepare("SELECT id, username, password FROM user_login WHERE username=?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $username, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {
        
                        session_start();

                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;

                        header("location: Main.php");
                    } else {
                        $password_err = "The <strong>password</strong> you entered was not valid.";
                    }
                }
            } else {
                $username_err = "No account found with that <strong>username</strong>.";
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
                                <input type="password" required="required" name="password"> 
                                <span class="passw">Password</span>
                            </div>
                            <p class="error"><?php echo $username_err; ?><?php echo $password_err; ?></p>
                            <div class="custom-control custom-checkbox mb-3"> 
                                <input id="customCheck1" type="checkbox" checked class="custom-control-input"> 
                                <label for="customCheck1" class="custom-control-label">Remember password</label> 
                            </div> 
                            <button type="submit" class="btn butn">Sign in</button> 
                            <div class="text-center d-flex justify-content-between mt-4 lower">
                                <p> OR &nbsp<a href="reg.php" class="font-italic text-muted"> 
                                    <u>Create Account</u></a></p></div> </form> </div> </div> </div> </div>

        </div> </div> </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>