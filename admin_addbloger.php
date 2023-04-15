<?php include('server.php') ?>
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
    <link rel="stylesheet" href="style-addbloger.css">

<body>

    <section class="menu">
        <div class="logo">
            <img src="image/logo.png">
            <h2>Bloger</h2>
        </div>

        <div class="items">
            <ul>
                <li><a href="admin_panel.php"><i class="bi bi-pie-chart-fill"> Dashboard</i></a></li>
                <li class="active"><a href="admin_addbloger.php"><i class="bi bi-person-plus-fill"> Add Bloger</i></a>
                </li>
                <li><a href="admin_blogs.php"><i class="bi bi-pencil-square"> Blogs</i></a></li>
                <li><a href="admin_blogers.php"><i class="bi bi-people-fill"> Blogers</i></a></li>
                <li><a href="admin_settings.php"><i class="bi bi-gear-fill"> Settings</i></a></li>

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
                <i class="bi bi-box-arrow-right"></i>
                <img src="image/user.png" alt="">
            </div>
        </div>

        <h3 class="i-name">Add Bloger</h3>

        <div class="register" style="width: 23rem;">
        <form method="post" action="admin_addbloger.php" enctype="multipart/form-data">

            <div class="form-group">


                <label>First name</label>
                <input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>" required>

                <label>Last name</label>
                <input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>" required>

                <label>Username</label>
                <input class="form-control" type="text" name="username" value="<?php echo $username; ?>" required>

                <label>Email</label>
                <input class="form-control" type="email" name="email" value="<?php echo $email; ?>" required>

                <label>Password</label>
                <input class="form-control" type="password" name="password_1" required>

                <label>Confirm password</label>
                <input class="form-control" type="password" name="password_2" required>

                <label>Insert image</label>
                <input type="file" name="avatar" id="image" accept="image/*" required>

                <button type="submit" class="btn btn-dark btn-block" style="margin-top:25px;"
                    name="reg_user">Register</button>
            </div>

           
            </div>
            

        </div>

        




    </section>

</body>



</head>

</html>