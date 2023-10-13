<?php
    include('db_connect.php'); // Include your database connection file

    $username = $email = $password = $confirm_password = "";
    $username_err = $email_err = $password_err = $confirm_password_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } else {
            $username = trim($_POST["username"]);
        }

        // Validate email
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter an email.";
        } else {
            $email = trim($_POST["email"]);
        }

        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if ($password != $confirm_password) {
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check for existing username and email
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

        // If there are no errors, proceed to insert data into the database
        if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user_login (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                // Registration successful, redirect to login page
                header("location: index.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            $stmt->close();
        }

        $conn->close();
    }
    ?>