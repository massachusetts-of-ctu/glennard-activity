<?php include_once "header.php";?>
<body>
    <section class="wrap">
    <span><img src="../assets/img/logo.png"/> <h1 class="brand">MASHASHUTES</h1></span>
      <div class="container">
<!-- SIGN IN -->
      <div class="started">
          <h2>Create an Account</h2>
          <p>Let's get started!</p>
        </div>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div>
          <input class="input-box box" type="text" name="name" required>
          <label>Name</label>
        </div>
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
          <input class="btn submit" type="submit" name="submit" value="Sign Up">
        </div>
        <div>
          <input class="btn useMail" type="submit" name="EmailUse" value="Continue with Email">
        </div>   
        <div class="question">Already have an account? <a href="index.php">Log In</a></div>       
      </form>
      </div>  
    </section>
    <script src="javascript/hide-pass.js"></script>
</body>
</html>