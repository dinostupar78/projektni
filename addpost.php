<?php
session_start();

$user_id=$_SESSION['user_id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloger";
 

$user_id= $_SESSION['user_id'];

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
move_uploaded_file($filetmpname, $folder.$filename);
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
  <title>Bloger</title>
</head>
<style>

.body{
    background-image: url('images/image3.jpg');
    background-size: cover;
    background-attachment: fixed;
    min-height: 100%;
    background-repeat: no-repeat;
}
.wrap{
  max-width: 100%;
  height: auto;
  display: block;
}
/* loader animacija */

.loader{
  position: fixed;
  z-index: 99;
  top:0;
  left: 0;
  width:100%;
  height: 100%;
  background-color: white;
  display: flex;
  justify-content: center;
  align-items: center;
}

.loader > img {
  width: 90px;
}

@keyframes fadeOut{
  100%{
    opacity: 0;
    visibility: hidden;
  }
}

.loader.hidden{
animation: fadeOut 1s;
animation-fill-mode: forwards;
}
.login{
    border: 1px white;
    position: initial;
    opacity: 0.9;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    flex-shrink: 0;
    padding: 20px;
    background-color: white;
    margin-top: 5%;
    border-radius:5px;
}

.container {
    position: relative;
    width: 90%;
    padding-top:15px;
}

.image {
    display: block;
    width: 100%;
    height: auto;
}

.login-back{
    background-image: url('images/image12.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    min-height: 100%;
}

.link{
    color: #555555;
    text-decoration: none;
    background-color: transparent;
}

.link:hover{
    color:black;
    text-decoration: underline;
}
/** ********************************************************/
.site-footer
{
  background-color:#26272b;
  padding:45px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#737373;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:black;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color:#33353d
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
.img-fluid{
    border: 10px solid #dedede ;
    margin-top: -200px;
    max-width: 100%;
    
}

.container2 {
  position: relative;
}

.image {
  opacity: 1;
  transition: .5s ;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ;
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

.containeradd{
  padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-bottom: 50px;
}
</style>
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
                  <label for="title">Post background</label><br/>
                  <input type="file"  name="image"  required >  
                </div>
  
                <div class="form-group">
                  <label for="body">Text</label>
                  <textarea class="form-control" rows="8"  name="text" required></textarea>
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
              Blogger is a free platform for writing your own stories.
              The blogger provides the most effective publication of stories.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="#">Html</a></li>
              <li><a href="#">Css</a></li>
              <li><a href="#">PHP</a></li>
              <li><a href="#">MySql</a></li>
          0   <li><a href="#">Bootstrap</a></li>
              <li><a href="#">Javascript</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="blogs.php">Blogs</a></li>
              <li><a href="blogers.php">Blogers</a></li>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="index.php">Home</a></li>
              <li><a href="aboutus.php">About us</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
         <a href="#">Bloger</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"><img src="images\facebook_1.png" style="width:25px;padding-bottom: 5px;"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"><img src="images\twitter.png" style="width:25px;padding-bottom: 5px;"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"><img src="images\youtube.png" style="width:25px;padding-bottom: 5px;"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"><img src="images\skype.png" style="width:25px;padding-bottom: 5px;"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>



</body>
</html>



