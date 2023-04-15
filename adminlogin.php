<?php
$errors = array();
$update = array();

// Konekcija s bazom podataka
$con = mysqli_connect('localhost', 'root', '', 'bloger');

session_start();

if (isset($_POST['username'])) {
  // brisanje backslashes
  $username = stripslashes($_REQUEST['username']);
  //brisanje specijalnih char u  stringu
  $username = mysqli_real_escape_string($con, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con, $password);
  //provjera korisnika da li postoji u bazi podataka

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  $query = "SELECT * FROM adminaccount WHERE username='$username'and password='" . md5($password) . "'";
  $result = mysqli_query($con, $query) or die(mysql_error());
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    /* postoji recordset pa se dohvaca u  array */
    $row = mysqli_fetch_assoc($result);
    $adminid = $row['admin_id'];
    $email = $row['email'];
    $_SESSION['username'] = $username;
    $_SESSION['admin_id'] = $adminid;
    $_SESSION['email'] = $email;

    header("Location: admin_panel.php");
  } else {
    array_push($errors, "Wrong username/password combination");
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="style-adminlogin.css">
  <script src="script-adminlogin.js"></script>
  <title>Bloger</title>
</head>

<body class="login-back">
  
  <section class="wrap">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="index.php">Back</a>
    </nav>
  </section>

  <section class="login" style="width: 23rem;">
    <form method="post" action="adminlogin.php">
      <div class="container">
        <img src="Images/user.png" alt="Avatar" class="image">
      </div>

      <div class="form-group">
        <label>Username</label>
        <input class="form-control" type="text" name="username">
        <label>Password</label>
        <input class="form-control" type="password" name="password">
        <button type="submit" class="btn btn-dark btn-block" style="margin-top:20px;" name="login">Login</button>
      </div>


      <?php include('error.php'); ?>
      <?php include('update.php'); ?>

    </form>
  </section>
</body>
</html>