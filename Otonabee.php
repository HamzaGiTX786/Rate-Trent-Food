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

        include 'includes/navfood.php';
 ?>
    <main>
    <p>Welcome to Rate Trent Food. This a website where you can give a rating to a dish served in any of Trent University's Cafes from 1-5</p>
    <form name="search" id="search" method="post" novalidate>

<header>
    <h1>Otonabee</h1>
 <h2>Otonabee Menu </h2>
</header>
     
  <div class="dropdown">
  <button class="dropbtn"> Otonabee Dining Hall features the following: </button>
  <div class="dropdown-content">
   <a href="OtonabeeBreakfastMenu.pdf"> Grill & Co - All day breakfast </a>
   <a href="OtonabeeLunch&DinnerMenu.pdf"> Chef's Table Lunch & Dinner </a>
   <a href="PizzaPizzaMenu.pdf"> Pizza Pizza </a>
   <a href="https://order.subway.com/en-CA/MenuNutrition/Menu"> Subway </a>
  </div>
</div> 
     
<p> Otonabee Dining Hall features the following:

<p> Grill & Co - All day breakfast, classic grill menu featuring 100% Canadian beef and monthly features <a href="OtonabeeBreakfastMenu.pdf">Menu</a>.</p> 

<p> Grill & Co - Lunch & dinner  <a href="OtonabeeLunch&DinnerMenu.pdf">Menu</a>.</p>      
    
<p> Pizza Pizza - Offering both slices and full-size pizzas upon request <a href="PizzaPizzaMenu.pdf">Menu</a>.</p> 

<p> Subway - Classic or build your own subs & salads <a href="https://order.subway.com/en-CA/MenuNutrition/Menu">Menu</a>.</p>
     
 <p> 
</p>

    </main>
    
    <?php
        include 'includes/footer.php';
    ?>
    
</body>
</html>
