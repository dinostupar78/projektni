<?php
session_start();

$user_id = $_SESSION['user_id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloger";


$user_id = $_SESSION['user_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['create_post'])) {
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $text = mysqli_real_escape_string($conn, $_POST['text']);
  $about = mysqli_real_escape_string($conn, $_POST['text']);
  $filename = $_FILES['image']['name'];
  $filetmpname = $_FILES['image']['tmp_name'];
  //folder where images will be uploaded
  $folder = 'post_images/';
  //function for saving the uploaded images in a specific folder
  move_uploaded_file($filetmpname, $folder . $filename);
  //inserting image details (ie image name) in the database
  $sql = "INSERT INTO blog (title, image, text,about,user_id)
 VALUES('$title', '$filename', '$text', '$about', '$user_id')";


  if ($conn->query($sql) === TRUE) {
    header('location: blogs.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
  <script src="script-addpost.js"></script>
  <link rel="stylesheet" href="style-addpost.css">
  <title>Bloger</title>
</head>

<body class="login-back">

  <section class="wrap">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="profile.php">
        Back
      </a>
    </nav>
  </section>

  <section id="details">
    <div class="containeradd">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Add Post</h4>
            </div>
            <div class="card-body">
              <form method="post" action="addpost.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" placeholder="Post name" name="title" required>
                </div>

                <div class="form-group">
                  <label for="title">Post background</label><br />
                  <input type="file" name="image" required>
                </div>

                <div class="form-group">
                  <label for="body">Text</label>
                  <textarea class="form-control" rows="8" name="text" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="create_post">
                  Create Post
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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
            <li><a href="https://sqlite.org/index.html">SQLite</a></li>

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