<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
$res2 = $conn->query("SELECT * FROM users");
$users = mysqli_fetch_array($res2, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hello,<?php echo $userRow['email']; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
</head>
<body>

<!-- Navigation Bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Website Name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">First Link</a></li>
                <li><a href="#">Second Link</a></li>
                <li><a href="#">Third Link</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span
                            class="glyphicon glyphicon-user"></span>&nbsp;Logged
                        in: <?php echo $userRow['nombre']; ?>
                        &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div class="container">
    <!-- Jumbotron-->
    <div class="jumbotron">
        <h1>Hello, <?php echo $userRow['username']; ?></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at auctor est, in convallis eros. Nulla
            facilisi. Donec ipsum nulla, hendrerit nec mauris vitae, lobortis egestas tortor. </p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
    </div>

    <div class="row">
        <div class="col-lg-12">
        <?php 
            $res2 = $conn->query("SELECT * FROM users");
            // $users = mysqli_fetch_array($res2, MYSQLI_ASSOC);
            
            echo "<table border = '1'> \n"; 
            echo "<tr><td>Nombre</td><td>E-Mail</td></tr> \n"; 
            while ($row = mysql_fetch_row($res2)){ 
                echo ""<tr><td>$row[0]</td><td>$row[1]</td></tr> \n"; 
            } 
            echo "</table> \n"; 
            ?> 

        </div>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
