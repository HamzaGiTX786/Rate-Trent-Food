<?php

$itemid = $_GET['item'] ?? null;

if (!isset($itemid) || strlen($itemid) === 0) // check if user entered anything into the search bar
{
    $errors['itemname'] = true;
}

if(count($errors) === 0) //check if there are any errors
{
    $query = "SELECT itemname,rank FROM fooditems WHERE itemname=$itemid; ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL prepare failed";
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$searchquery);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rating = mysqli_fetch_assoc($result); // get output for the searched item
        var_dump($result);
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta item="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating:<?= $item;?></title>
</head>
<body>
<?php
        include 'includes/header.php';
        include 'includes/nav.php';
 ?>

    <main>
        <h2><?= 

    </main>

<?php
        include 'includes/footer.php';
    ?>
    
</body>
</html>