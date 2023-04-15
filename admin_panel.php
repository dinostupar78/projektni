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
    <link rel="stylesheet" href="style-adminpanel.css">

<body >

    <section class="menu">
        <div class="logo">
            <img src="image/logo.png">
            <h2>Bloger</h2>
        </div>

        <div class="items">
            <ul>
                <li class = "active"><a href="admin_panel.php"><i class="bi bi-pie-chart-fill"> Dashboard</i></a></li>
                <li><a href="admin_addbloger.php"><i class="bi bi-person-plus-fill"> Add Bloger</i></a></li>
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

        <h3 class="i-name">Dashboard</h3>

        <div class="values">
            <div class="val-box">
                <i class="bi bi-people-fill"></i>
                <div>
                    <h3>8,267</h3>
                    <span>New Users</span>
                </div>
            </div>

            <div class="val-box">
                <i class="bi bi-people-fill"></i>
                <div>
                    <h3>8,267</h3>
                    <span>Total Orders</span>
                </div>
            </div>

            <div class="val-box">
                <i class="bi bi-people-fill"></i>
                <div>
                    <h3>8,267</h3>
                    <span>Products Sell</span>
                </div>
            </div>

            <div class="val-box">
                <i class="bi bi-people-fill"></i>
                <div>
                    <h3>8,267</h3>
                    <span>This Month</span>
                </div>
            </div>

        </div>

    </section>

</body>



</head>

</html>