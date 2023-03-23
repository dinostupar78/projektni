<?php
session_start();

// Inicijalizacija varijabli
$fname = "";
$lname  = "";
$username = "";
$email = "";
$errors = array(); 
$success = array();

// Konekcija s bazom podataka
$db = mysqli_connect('localhost', 'root', '', 'bloger');

// Registracija korisnika
if (isset($_POST['reg_user'])) {
  // dohvat podataka s forme registr.php
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
 //putanja gdje će se slika spremiti
  $avatar_path = mysqli_real_escape_string($db,'image/'.$_FILES['avatar']['name']);

 
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($lname)) { array_push($errors, "Last name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  //Provjeri bazu ako vec postiji korisnik s ovim podacima
  $user_check_query = "SELECT * FROM useraccount WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result); 
  if ($user) { // Poruke ako korisnik postoji
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (preg_match("!image!",$_FILES['avatar']['type'])) {         
    //copy image u images/ folder 
    if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){
        
        //postavi session variable da se prikazuju na profilnoj stranici
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['avatar'] = $avatar_path;
    }
  }
  if (count($errors) == 0) {
  	$password = md5($password_1);//enkripcija lozinke prije spremanja u bazu
  	$query = "INSERT INTO useraccount (fname, lname, username, email, password, avatar) 
  			  VALUES('$fname','$lname', '$username', '$email', '$password', '$avatar_path')";
    mysqli_query($db, $query);
   
  	$_SESSION['username'] = $username;
    array_push($success, "Registration successful");
  }
}
?>
