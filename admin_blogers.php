<?php
include_once 'server.php';
$result = mysqli_query($db, "SELECT * FROM useraccount");
$result1 = mysqli_query($db, "SELECT * FROM blog");

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
    <link rel="stylesheet" href="style-adminblogers.css">

    <section class="menu">
        <div class="logo">
            <img src="image/logo.png">
            <h2>Bloger</h2>
        </div>

        <div class="items">
            <ul>
                <li ><a href="admin_panel.php"><i class="bi bi-pie-chart-fill"> Dashboard</i></a></li>
                <li><a href="admin_addbloger.php"><i class="bi bi-person-plus-fill"> Add Bloger</i></a></li>
                <li><a href="admin_blogs.php"><i class="bi bi-pencil-square"> Blogs</i></a></li>
                <li class = "active"><a href="admin_blogers.php"><i class="bi bi-people-fill"> Blogers</i></a></li>
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

        <h3 class="i-name">Blogers</h3>

        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            ?>

            <div class="card" style="margin-top: 2%;margin-bottom: 2%;margin-left: 5%;margin-right: 5%;">
                <div class="media">
                    <img src="<?php echo $row["avatar"]; ?>" class="rounded-circle"
                        style="width: 130px; height: 130px; padding: 10px 10px 10px 10px ;" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0">
                            <?php echo $row["fname"]; ?>
                            <?php echo $row["lname"]; ?>
                        </h5>

                        <div class="bio"> Bio:</br>
                            <?php echo $row["bio"]; ?></br>
                            <small class="text-muted text-right">Created:
                                <?php echo $row["created"]; ?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>



    </section>

</head>

<body>

</body>

</html>