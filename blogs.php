<?php
include_once 'server.php';

$result = mysqli_query($db, "SELECT * FROM blog");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https:?/stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style-blogs.css">
  <script src="script-blogs.js"></script>

  <title>Bloger</title>
</head>

<body onscroll="animateIfInView()">

  <div class="loader">
    <img src="images\loader.gif" alt="loading..." />
  </div>

  <section class="home-header">
    <nav class="navbar navbar-change sticky-top navbar-expand-md navbar-light">
      <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="index.php">Bloger</a>
      </nav>

      <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" style="padding-right: 50px;">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" style="font-size: 22px;" href="index.php"><i class="bi bi-house-add-fill">
                Home</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active " style="font-size: 22px;" href="login.php"><i class="bi bi-person-circle">
                User</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="font-size: 22px;" href="blogs.php"><i class="bi bi-pen-fill">
                Blogs</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="font-size: 22px;" href="blogers.php"><i class="bi bi-people-fill">
                Blogers</i></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="wow" style="transition-delay: 0ms;">
      <div class="animate-header">
        <p>Blogs</p>
      </div>
    </div>
  </section>

  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($result)) {
    ?>

    <div class="card" style="margin-top: 2%;margin-bottom: 2%;margin-left: 5%;margin-right: 5%;">
      <div class="media">
        <img src="post_images\<?php echo $row["image"]; ?>" class="rounded-circle"
          style="width: 130px; height: 130px; padding: 10px 10px 10px 10px ;" alt="Generic placeholder image">
        <div class="media-body">
          <h5 class="mt-0" id="<?php echo $row["title"]; ?>"><?php echo $row["title"]; ?> </h5>
          <?php echo $row["about"]; ?>...</br>
          <small class="text-muted text-right" id="<?php echo $row["posted"]; ?>">Updated: <?php echo $row["posted"]; ?></small></br>
          <a href="post.php?id=<?php echo $row['title']; ?>&id2=<?php echo $row["posted"]; ?>" class="btn btn-dark">See
            post</a>
        </div>
      </div>
    </div>
    </div>

    <?php
    $i++;
  }
  ?>

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