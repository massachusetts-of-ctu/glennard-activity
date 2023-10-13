<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php
    include('db_connect.php');

    $username = $password = "";
    $username_err = $password_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } else {
            $username = trim($_POST["username"]);
        }

        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
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
                        $password_err = "The password you entered was not valid.";
                    }
                }
            } else {
                $username_err = "No account found with that username.";
            }

            $stmt->close();
        }

        $conn->close();
    }
    ?>

    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Login</h2>
        <div>
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <span><?php echo $username_err; ?></span>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
            <span><?php echo $password_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
        <a href="register.php">Sign UP</a>
    </form>
    <script src="script.js"></script>
</body>

</html>
