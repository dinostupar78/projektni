<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css\bootstrap.css">
  <script src="script-register.js"></script>
  <link rel="stylesheet" href="style-register.css">
  <title>Bloger</title>
</head>

<body class="register-back">
  <div class="loader">
    <img src="images\loader.gif" alt="loading..." />
  </div>

  <section class="wrap">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="login.php" style="color:white;">Back</a>
    </nav>
  </section>

  <section class="register" style="width: 23rem;">
    <form method="post" action="register.php" enctype="multipart/form-data">

      <div class="form-group">


        <label>First name</label>
        <input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>" required>

        <label>Last name</label>
        <input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>" required>

        <label>Username</label>
        <input class="form-control" type="text" name="username" value="<?php echo $username; ?>" required>

        <label>Email</label>
        <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" required>

        <label>Password</label>
        <input class="form-control" type="password" name="password_1" required>

        <label>Confirm password</label>
        <input class="form-control" type="password" name="password_2" required>

        <label>Insert image</label>
        <input type="file" name="avatar" id="image" accept="image/*" required>

        <button type="submit" class="btn btn-dark btn-block" style="margin-top:25px;" name="reg_user">Register</button>
      </div>

      <p>
        Already a member? <a class="link text-decoration-none" href="login.php">Sign in</a>
      </p>
      </div>
      <?php include('error.php'); ?>
      <?php include('success.php'); ?>
    </form>
  </section>
</body>

</html>