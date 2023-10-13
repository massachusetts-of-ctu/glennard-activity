<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Masashutes</title>
  <link rel="stylesheet" href="dash_style.css?v=<?php echo time(); ?>" />
  
</head>
<body>
  <div class="container">
    <?php include("sidebar.php") ?>
    
    <section class="main">
    <?php include("main_top.php") ?>
    <div class="main-top">
        <h1>Skills</h1>
       <!-- <i class="session"><?php echo $_SESSION['username']; ?></i>-->
        </div>
      
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-laptop-code"></i>
          <h3>Web developemt</h3>
          <p>Join Over 1 million Students.</p>
          <button>Get Started</button>
        </div>
        <div class="card">
          <i class="fab fa-wordpress"></i>
          <h3>WordPress</h3>
          <p>Join Over 3 million Students.</p>
          <button>Get Started</button>
        </div>
        <div class="card">
          <i class="fas fa-palette"></i>
          <h3>graphic design</h3>
          <p>Join Over 2 million Students.</p>
          <button>Get Started</button>
        </div>
        <div class="card">
          <i class="fab fa-app-store-ios"></i>
          <h3>IOS dev</h3>
          <p>Join Over 1 million Students.</p>
          <button>Get Started</button>
        </div>
      </div>

      <section class="main-course">
        <h1>My courses</h1>
        <div class="course-box">
          <ul>
            <li class="active">In progress</li>
            <li>explore</li>
            <li>incoming</li>
            <li>finished</li>
          </ul>
          <div class="course">
            <div class="box">
              <h3>HTML</h3>
              <p>80% - progress</p>
              <button>continue</button>
              <i class="fab fa-html5 html"></i>
            </div>
            <div class="box">
              <h3>CSS</h3>
              <p>50% - progress</p>
              <button>continue</button>
              <i class="fab fa-css3-alt css"></i>
            </div>
            <div class="box">
              <h3>JavaScript</h3>
              <p>30% - progress</p>
              <button>continue</button>
              <i class="fab fa-js-square js"></i>
            </div>
          </div>
        </div>
      </section>
    </section>
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