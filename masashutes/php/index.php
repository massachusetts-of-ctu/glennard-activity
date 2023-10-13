<?php include_once "header.php"; ?>
<body>
    <section class="wrap">
    <span><img src="../assets/img/logo.png"/> <h1 class="brand">MASHASHUTES</h1></span>
<!-- LOG IN -->
      <div class="container login">
        <div class="started loginTxt">
          <h2>Login</h2>
        </div>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div>
          <input class="input-box box" type="text" name="email" required>
          <label class="email">Email</label>
        </div>
        <div>
          <input class="input-box box" type="password" name="password" required>
          <label class="pass">Password</label>
          <i class="fas fa-eye eye"></i>
        </div>
        <div>
          <input class="btn submit" type="submit" name="submit" value="Login">
        </div>
        <div class="question">Don't have an account? <a href="create.php">Sign In</a></div>   
      </form>
      </div>
    </section>

    <script src="masashutes/javascript/hide-pass.js"></script>
</body>
</html>