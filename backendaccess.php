<?php
session_start();

   
if(!isset($_SESSION['lname']) || !isset($_SESSION['empid']))
{
    header("Location:backend");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Trent Food&colon; Backend Access</title>
    <link rel="stylesheet" href="styles/master.css" />
</head>
<body>
<?php
        include 'includes/header.php';
        include 'includes/nav.php';
    ?>
        <main>
            <h2> Backend Access </h2>
            <ul class="menu">

            <li><a href="addnewbuilding.php"><p>Add a new Building</p>
            <img src="img/Building blue print.jpg" alt="Blue print of a building"/>
             </a></li>

            <li> <a href="addnewdish.php"><p>Add a new dish</p>
            <img src="img/restaurant-digital-menu-boards.png" alt= "Image of A digital restaurant menu">
            </a></li>
            </ul>
        </main>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>