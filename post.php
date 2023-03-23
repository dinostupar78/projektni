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
      background: linear-gradient(rgba(255, 255, 255, 0.932), rgba(255, 255, 255, 0.8)), url('image/Long-road-wallpaper.jpg');
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
      border: 10px solid #dedede;
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
            <img src="<?php echo $row["avatar"]; ?>" class="image img-fluid  d-none d-md-block about-img"
              style="border-radius: 50%;">
          </div>
          <div class="styl">
            <p>
              <?php echo $row["fname"]; ?>
            </p>
            <p style="padding-left:30px;">
              <?php echo $row["lname"]; ?>
            </p>
          </div>
        </div>
    </section>

    <section id="profile">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="border-radius: 0rem;border:0;">
              <div class="card-header text-right" style="border-bottom: 0;">
                <h3>
                  <?php echo $row['title']; ?>
                </h3>
                <p class="card-text"><small class="text-muted">Updated:
                    <?php echo $row["posted"]; ?>
                  </small></p>
              </div>
              <div class="card-body">
                <p>
                  <?php echo $row['text']; ?>
                </p>
                <div class="container">
                </div>
              </div>
            </div>
    </section>
    <?php
    $i++;
    }
    ?>
 
 


</body>

</html>