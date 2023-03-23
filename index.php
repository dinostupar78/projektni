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
  <script src="script-index.js"></script>
  <link rel="stylesheet" href="style-index.css">
  <title>Bloger</title>

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
        <h1>Bloger</h1>
        <p>Welcome</p>
        <button type="button" class="btn btn-outline-dark"><a href="login.php">Blog Now</a></button>
      </div>
    </div>
  </section>

  <section style="height:300px;margin-top:200px;">
    
      <div class="container">
        <div class="row">
          <div class="col-md-6 ">
            <img src="images\image4.jpg" alt="" class="img-fluid" style = "padding-top:70px;">
          </div>
          <div class="col-md-6">
            <h3 style = "margin-left:50px;">Become a successful blogger</h3>
            <p style = "margin-left:50px;">Everything you need in one place</p>
            <a href="login.php" class="btn btn-outline-dark" style = "margin-left:50px;">Create your free Bloger blog today</a>
          </div>
        </div>
      </div>
  </section>

  <section id="home-icons" class="py-5">
      <div class="row mb-4">

        <div class="col-md-4">
          <div class="card text-dark text-center">
            <div class="card-body">
              <img src="images\ipad.png" alt="">
              <h5 class="card-title">Easy to use</h5>
              <p class="card-text">Bloger is an easy site to write your stories</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card text-dark text-center">
            <div class="card-body">
              <img src="images\iphone.png" alt="">
              <h5 class="card-title">For each device</h5>
              <p class="card-text">You can write your stories anytime, anywhere</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card  text-dark text-center">
            <div class="card-body">
              <img src="images\imac.png" alt="">
              <h5 class="card-title">And it's free!</h5>
              <p class="card-text">Sign up and become a part of the blogging community</p>

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