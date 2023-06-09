<?php

session_start();
$user_id = $_SESSION['user_id'];
$bio = $_SESSION['bio'];
$db = mysqli_connect('localhost', 'root', '', 'bloger');

if (isset($_POST['upd_user'])) {
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $bio = mysqli_real_escape_string($db, $_POST['bio']);
  $update = array();
  $sql = "UPDATE useraccount SET fname = '$fname', lname = '$lname', email = '$email', username = '$username', bio = '$bio' WHERE user_id = '$user_id'";

  if ($db->query($sql) === TRUE) {
    array_push($update, "Registration successful");
    header("location: login.php");
  } else {
    echo "Error deleting record: " . $db->error;
  }

  $db->close();
}
/////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['upd_pass'])) {
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  echo $password_1;
  if (empty($password_1)) {
    echo "Password is required";
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  $password = md5($password_1); //encrypt the password before saving in the databqse

  $query = "UPDATE useraccount set password='$password' where user_id='$user_id'";
  mysqli_query($db, $query);

  $db->close();
}

//////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['del_profi'])) {
  $sql = "DELETE FROM useraccount where user_id='$user_id'";

  if ($db->query($sql) === TRUE) {
    header("location: index.php");
  } else {
    echo "Error deleting record: " . $db->error;
  }

  $db->close();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css\bootstrap.css">
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="script-edit.js"></script>
  <link rel="stylesheet" href="style-edit.css">

</head>

<body>
  <div class="loader">
    <img src="images\loader.gif" alt="loading..." />
  </div>

  <section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Profile editor</h4>
            </div>
            <div class="card-body">
              <form method="post" action="edit.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="fname">First Name:</label>
                  <input type="text" class="form-control" name="fname" value="<?= $_SESSION['fname'] ?>">
                </div>
                <div class="form-group">
                  <label for="lname">Last Name:</label>
                  <input type="text" class="form-control" name="lname" value="<?= $_SESSION['lname'] ?>">
                </div>
                <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" name="username" value="<?= $_SESSION['username'] ?>">
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" name="email" value="<?= $_SESSION['email'] ?>">
                </div>
                <div class="form-group">
                  <label for="bio">Bio:</label></br>
                  <small class="text-muted text-right">About you in a few sentences</small></br>
                  <textarea class="form-control" rows="10" name="bio"
                    value="<?= $_SESSION['bio'] ?>"><?php echo $_SESSION['bio']; ?></textarea>
                </div>
                <section id="actions" class="py-3 mb-3">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4">
                        <a href="profile.php" class=2btn btn-outline-dark btn-block">
                          Back To Profile
                        </a>
                      </div>
                      <div class="col-md-4">
                        <a href="#" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#Modal2">
                          Change Password
                        </a>
                      </div>
                      <div class="col-md-4">
                        <a href="#" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#Modal1">
                          Delete Account
                        </a>
                      </div>
                      <div class="col-md-12 py-3 ">
                        <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="upd_user">
                          Save changes
                        </button>
                      </div>
                    </div>
                  </div>
                </section>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="Modal1lLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content border-danger">
        <div class="modal-header">
          <h5 class="modal-title" id="Modal1Label">Delete account</h5>
          <button type="button" class="close" data-dismiss="modal2" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          You realy want to delete your Bloger account?
        </div>
        <div class="modal-footer">
          <form method="post" action="edit.php" enctype="multipart/form-data">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-outline-danger" name="del_profi">Yes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="Modal1lLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content border-primary">
        <div class="modal-header">
          <h5 class="modal-title" id="Modal1Label">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal2" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="edit.php" enctype="multipart/form-data">
            <label>New password</label>
            <input class="form-control" type="password" name="password_1">

            <label>Confirm new password</label>
            <input class="form-control" type="password" name="password_2">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-outline-primary" name="upd_pass">Change</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6 id="about">About</h6>
          <p class="text-justify"><i>BLOG WANTS TO BE SIMPLE </i>-
            Blogger is a free platform for writing your own<br> stories.
            The blogger provides the most effective publication of stories.</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            <li><a href="https://en.wikipedia.org/wiki/HTML">HTML</a></li>
            <li><a href="https://en.wikipedia.org/wiki/CSS">CSS</a></li>
            <li><a href="https://en.wikipedia.org/wiki/PHP">PHP</a></li>
            <li><a href="https://en.wikipedia.org/wiki/MySQL">MySQL</a></li>

          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">User</a></li>
            <li><a href="blogs.php">Blogs</a></li>
            <li><a href="blogers.php">Blogers</a></li>

          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
            Bloger.
          </p>
        </div>

        <div class="col-md-4 col-s}-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"><img
                    src="images\facebook_1.png" style="width:25px;padding-bottom: 5px;"></i></a></li>
            <li><a class="twitter" href="https://twitter.com/?lang=en"><i class="fa fa-twitter"><img
                    src="images\twitter.png" style="width:25px;padding-bottom: 5px;"></i></a></li>
            <li><a class="dribbble" href="https://www.youtube.com/"><i class="fa fa-dribbble"><img
                    src="images\youtube.png" style="width:25px;padding-bottom: 5px;"></i></a></li>
            <li><a class="linkedin" href="https://www.skype.com/en/"><i class="fa fa-linkedin"><img
                    src="images\skype.png" style="width:25px;padding-bottom: 5px;"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>