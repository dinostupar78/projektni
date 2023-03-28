<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'bloger');

$sec = (isset($_GET['id']) ? $_GET['id'] : 0);
$sec2 = (isset($_GET['id2']) ? $_GET['id2'] : 0);

$result = mysqli_query($db, "SELECT * FROM blog Left JOIN useraccount ON useraccount.user_id=blog.user_id where title='$sec' and posted='$sec2'");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css\bootstrap.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https:?/stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="script-post.js"></script>
  <link rel="stylesheet" href="style-post.css">
  <title>Bloger</title>

  <style>
   

    .home-header {
      position: relative;
      min-height: 500px;
      background: linear-gradient(rgba(255, 255, 255, 0.932), rgba(255, 255, 255, 0.8)), url('images/Long-road-wallpaper.jpg');
      background-attachment: fixed;
      background-repeat: no-repeat;
      text-align: center;
      color: #fff;
      transition: 0.5s;
    }

  
    .animate-header {
      position: relative;
      color: black;
      -webkit-animation-name: animatebottom;
      -webkit-animation-duration: 2s;
      animation-name: animatebottom;
      animation-duration: 2s;
      text-align: left;
      padding-top: 100px;
      padding-left: 100px;
      font-size: 50px;
      font-weight: 300;
      line-height: 1.15;
      ;
    }

   

    .img-fluid {
      border: 1px solid black;
      margin-top: -200px;
      max-width: 100%;

    }

    .container2 {
      position: relative;
    }

    .image {
      opacity: 1;
      transition: .5s;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .container2:hover .image {
      opacity: 0.2;
    }

    .container2:hover .middle {
      opacity: 1;
    }

    /* Transitions and transforms */
    .wow {
      opacity: 0;
      -webkit-transform: translate(0, 50px);
      -moz-transform: translate(0, 50px);
      -ms-transform: translate(0, 50px);
      transform: translate(0, 50px);
      -webkit-transition: opacity .6s .1s, transform .6s ease;
      transition: opacity .6s .1s, transform .6s ease;
      transition-delay: 0ms;
    }

    .wow-in-view {
      opacity: 1 !important;
      -webkit-transform: translate(0, 0) !important;
      -moz-transform: translate(0, 0) !important;
      -ms-transform: translate(0, 0) !important;
      transform: translate(0, 0) !important;
    }

    .image {
      backface-visibility: hidden;
      border-radius: 100%;
      height: 300px;
      width: 300px;
      margin-top: 1px;
    }

    .styl {
      margin-top: 90px;
    }

    .row {
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: 0px;
      margin-left: 0px;
    }
  </style>

</head>

<body>
  <div class="loader">
    <img src="images\loader.gif" alt="loading..." />
  </div>
  
  <section class="home-header">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="profile.php">
        Back
      </a>
    </nav>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
      ?>
      <div class="animate-header">
        <div class="row">
          <div class="col-3 col-md-4">
            <img src="<?php echo $row["avatar"]; ?>" class="image img-fluid  d-none d-md-block about-img">
          </div>
          <div class="styl">
          <p>
              <p style = "text-align:center;"><b><?php echo $row["username"]; ?>'s post</b></p>
            </p>
            <p>
              <h2>Name: <?php echo $row["fname"]; ?></h2>
            </p>
            <p >
              <h2>Surname: <?php echo $row["lname"]; ?></h2>
            </p>
            <p >
              <h2>Known as: <?php echo $row["username"]; ?></h2>
            </p>
          </div>
        </div>
    </section>

    <section id="profile">
      <br>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="border-radius: 0rem;border:0;">
              <div class="card-header text-center">
                <h1>
                  <?php echo $row['title']; ?>
                </h1>
                <h2 class="card-text"><b><small class="text-muted">Updated:
                    <?php echo $row["posted"]; ?>
                  </small></b></h2>
                  <p>
                  <?php echo $row['text']; ?>
    </p>
              </div>
            </div>
    </section>
    <?php
    $i++;
    }
    ?>
    <br>
    <br>
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
            <li><a class="facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"><img src="images\facebook_1.png"
                    style="width:25px;padding-bottom: 5px;"></i></a></li>
            <li><a class="twitter" href="https://twitter.com/?lang=en"><i class="fa fa-twitter"><img src="images\twitter.png"
                    style="width:25px;padding-bottom: 5px;"></i></a></li>
            <li><a class="dribbble" href="https://www.youtube.com/"><i class="fa fa-dribbble"><img src="images\youtube.png"
                    style="width:25px;padding-bottom: 5px;"></i></a></li>
            <li><a class="linkedin" href="https://www.skype.com/en/"><i class="fa fa-linkedin"><img src="images\skype.png"
                    style="width:25px;padding-bottom: 5px;"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
 
 


</body>

</html>