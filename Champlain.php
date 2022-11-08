<?php
include 'includes/library.php';
 
$search = $_POST['search'] ?? null;

$errors = array(); //declare empty array to add errors too

if(isset($_POST['submit']))
{
    if (!isset($search) || strlen($search) === 0) // check if user entered anything into the search bar
    {
        $errors['search'] = true;
    }

    if(count($errors) === 0) //check if there are any errors
    {
        $searchquery = "%$search%";
        $query = "SELECT itemname FROM fooditems WHERE itemname LIKE ? ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
            echo "SQL prepare failed";
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$searchquery);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $food = mysqli_fetch_assoc($result); // get output for the searched item
    }
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/master.css" />
    <title>Rate Trent Food</title>
</head>
<body>
 
<?php
       include 'includes/header.php';
       include 'includes/nav.php';
 ?>
    <main>
     
<p> Champlain Dining Hall features the following:</p>

<ul>
    <li><a href="Menu/ChamplainBreakfastMenu.pdf">
        <img src="img/Grill and co.jpg" alt="Image of Grill and Co"/>
        <p>Champlain Grill & Co - All day breakfast<p>
        </a></li>

    <li> <a href="Menu/ChamplainLunch&DinnerMenu.pdf">
            <img src="img/Grill and co.jpg" alt= "Image of Grill and Co">
            <p>Champlain Grill & Co - Lunch & dinner</p>
    </a></li>

    <li> <a href="Menu/RevolutionNoodleMenu.pdf">
            <img src="img/Revolution noodle.jpg" alt= "Revolution Noodle logo">
            <p>Revolution Noodle - That familiar taste of classic Vietnamese to Japanese comfort foods</p>
    </a></li>
    <li> <a href="Menu/ChamplainElDiablitoTaqueria.pdf">
            <img src="img/El diabilito.jpg" alt= " El Diablito Taqueria logo">
            <p>l Diablito Taqueria</p>
    </a></li>

</ul>

    </main>
    <?php
        include 'includes/footer.php';
    ?>
    
</body>
</html>
