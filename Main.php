<?php
require_once("db_connect.php");
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {

$sql = "SELECT * FROM members";
$all_members = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="card.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Mashasutes Dashboard</title>
</head>

<body>


    <div class="container">
        <div class="sidebar">
            <h1>Mashasutes</h1>
            <ul>
                <li><i class="fa-brands fa-windows"></i><a href="#">Dashboard</a></li>
                <li class="active"><i class="fa-solid fa-users"></i><a href="#">Teams</a></li>
                <li><i class="fas fa-cogs"></i><a href="#">Settings</a></li>
            </ul>
        </div>
        <div class="content-wrapper">
            <div class="navbar">
                <div class="navbar-left">
                    <h1>Dashboard</h1>
                </div>
                <div class="navbar-right">
                    <div class="search-bar">
                        <input type="text" placeholder="Search...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="notification-icon">
                        <i class="far fa-bell"></i>
                    </div>
                    <div class="avatar-dropdown">
                        <div class="avatar-icon">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="dropdown-content">
                            <strong><a href="#"><?php echo $_SESSION['username']; ?></a></strong>
                            <a href="#">Profile</a>
                            <a href="#">Settings</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <?php
                    while($row = mysqli_fetch_assoc($all_members)){
                ?>
            <div class="card">
                    <img src="<?php echo $row["image"]; ?>" alt="Member Image" style="width:100%">
                    <h2><?php echo $row["fullname"]; ?></h2>
                    <p class="title"><?php echo $row["position"]; ?></p>
                    <p><?php echo $row["school"]; ?></p>
                    <div>
                        <a href="#"><i class="fa fa-dribbble"></i></a> 
                        <a href="#"><i class="fa fa-twitter"></i></a>  
                        <a href="#"><i class="fa fa-linkedin"></i></a>  
                        <a href="#"><i class="fa fa-facebook"></i></a> 
                    </div>
                    <p><button class="btn">Contact</button></p>
                    </div>
                    <?php
                    }
                    ?>
            </div>






        </div>
    </div>
</body>

</html>
<?php
}
else {
    header("Location: index.php");
    exit();
}
?>