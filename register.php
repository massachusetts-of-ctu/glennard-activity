<!DOCTYPE html>
<html>

<head>
    <title>Signup Form</title>
    <link rel="stylesheet" href="styles.css">
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
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Signup</h2>
        <div>
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <span><?php echo $username_err; ?></span>
        </div>
        <div>
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span><?php echo $email_err; ?></span>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
            <span><?php echo $password_err; ?></span>
        </div>
        <div>
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password">
            <span><?php echo $confirm_password_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Signup">
        </div>
              <a href="index.php">Sign in</a>
    </form>
    <script src="script.js"></script>
</body>

</html>