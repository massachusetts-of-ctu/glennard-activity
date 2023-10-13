<?php
session_start();
include "db_connect.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['uname']) && isset($_POST['password'])) {
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(empty($uname) || empty($pass)) {
        header("Location: index.php?error=Username and password are required");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM user_login WHERE username=?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if(password_verify($pass, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: Main.php");
            exit();
        } else {
            header("Location: index.php?error=Incorrect Username or Password");
            exit();
        }
    } else {
        header("Location: index.php?error=Incorrect Username or Password");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
