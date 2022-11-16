<?php
include 'includes/library.php';

$querycheck = "SELECT * FROM Buildings";
$statement = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($statement,$querycheck))
{
echo "SQL prepare failed";
}
else{
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$buildings = mysqli_fetch_all($result);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/master.css" />
    <title>Rate Trent Food&colon; Menu and Cafes</title>
</head>
<body>
 
<?php
        include 'includes/header.php';
        include 'includes/nav.php';
 ?>
    <main>
        <p> College with Dining Halls in Trent University</p>

        <ul class="menu">
       <li> <a href="Champlain.php">
                <img src="img/ChamplainCollege.png" alt= "Champlain College Logo">
                <p>Champlain College</p>
                </a></li>
        <li> <a href="LadyEaton.php">
                <img src="img/Lady Eaton Crest-Gradient.jpeg" alt= "Champlain College Logo">
                <p>Lady Eaton College</p>
        </a></li>
        <li> <a href="Otonabee.php">
                <img src="img/otonabee_college_logo.png" alt= "Champlain College Logo">
                <p>Otonabee College</p>
        </a></li>
        <li> <a href="Gzowski.php">
                <img src="img/Peter Gzowski College Loon Red Eye_0.png" alt= "Champlain College Logo">
                <p>Peter Gzowski College</p>
        </a></li>
        <?php 
        for($i =4; $i<count($buildings); $i++){ ?>
        <li><a href="<?= $buildings[$i][0]?>.php">
                <img src="https://loki.trentu.ca/~hamzasalimattarwala/www_data/img/<?= $buildings[$i][2]?>" alt="Image of new building in Trent University">
                <p><?= $buildings[$i][0]?></p>
        </a></li>
        <?php }  ?>
</ul>
</main>

<?php include 'includes/footer.php';?>
    
</body>
</html>
