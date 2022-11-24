<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/master.css"/>
    <title>Terms and Conditions</title>
</head>
<body>
     
<?php
        include 'includes/header.php';
        include 'includes/nav.php';
 ?>
    <main>
    <p>You are being logged out!</p>
</main>
<?php
        include 'includes/footer.php';
    ?>
</body>
</html>