<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'bloger');

if (isset($_POST['upd_admin'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $update = array();
    $sql = "UPDATE adminaccount SET  email = '$email', username = '$username', WHERE admin_id = '$admin_id'";

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
    $query = "UPDATE adminaccount set password='$password' where admin_id='$admin_id'";
    mysqli_query($db, $query);

  $db->close();
}
//////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['del_profi'])) {
    $sql = "DELETE FROM adminaccount where admin_id='$admin_id'";

    if ($db->query($sql) === TRUE) {
        header("location: index.php");
      } else {
        echo "Error deleting record: " . $db->error;
      }
    
      $db->close();
}

if (isset($_GET['logout'])) {
    header("location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloger</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https:?/stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="script-adminpanel.js"></script>
    <link rel="stylesheet" href="style-adminsettings.css">

<body>

    <section class="menu">
        <div class="logo">
            <img src="image/logo.png">
            <h2>Bloger</h2>
        </div>

        <div class="items">
            <ul>
                <li><a href="admin_panel.php"><i class="bi bi-pie-chart-fill"> Dashboard</i></a></li>
                <li><a href="admin_addbloger.php"><i class="bi bi-person-plus-fill"> Add Bloger</i></a></li>
                <li><a href="admin_blogs.php"><i class="bi bi-pencil-square"> Blogs</i></a></li>
                <li><a href="admin_blogers.php"><i class="bi bi-people-fill"> Blogers</i></a></li>
                <li class="active"><a href="admin_settings.php"><i class="bi bi-gear-fill"> Settings</i></a></li>

            </ul>
        </div>
    </section>

    <section class="interface">
        <div class="navigation">
            <div class="n1">
                <div class="search">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="profile">
                <a href = "admin_settings.php?logout='1'"><i class="bi bi-box-arrow-right"></i></a>
                <img src="image/user.png" alt="">
            </div>
        </div>

        <h3 class="i-name">Settings</h3>

        <section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Admin editor</h4>
            </div>
            <div class="card-body">
              <form method="post" action="edit.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="username">Admin username:</label>
                  <input type="text" class="form-control" name="username" value="<?= $_SESSION['username'] ?>">
                </div>
                <div class="form-group">
                  <label for="email">Admin email:</label>
                  <input type="email" class="form-control" name="email" value="<?= $_SESSION['email'] ?>">
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



    </section>

</body>



</head>

</html>