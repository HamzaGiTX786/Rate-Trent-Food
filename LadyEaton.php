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
    <h1>Lady Eaton</h1>
 <h2>Lady Eaton Menu </h2>
</header>
     
          <div class="dropdown">
  <button class="dropbtn"> Lady Eaton Dining Hall features the following: </button>
  <div class="dropdown-content">
   <a href="Chef'sTableBreakfastMenu.pdf"> Chef's Table Breakfast </a>
   <a href="Chef'sTableLunchDinnerMenu.pdf"> Chef's Table Lunch & Dinner </a>
   <a href="LadyEatonChopdWrapdMenu.pdf"> Chop'd & Wrap'd </a>
   <a href="SanMarzanoMenu.pdf"> San Marzano </a>
  </div>
</div>  
     
<p> Lady Eaton Dining Hall features the following:

<p> Chop'd & Wrap'd - Classic or build your own fresh wraps or salads <a href="LadyEatonChopdWrapdMenu.pdf">Menu</a>.</p> 

<p> Chef's Table Breakfast - Breakfast items, comfort food and daily homestyle lunch & dinners <a href="Chef'sTableBreakfastMenu.pdf">Menu</a>.</p>      
    
<p> Chef's Table Lunch & Dinner - Breakfast items, comfort food and daily homestyle lunch & dinners  <a href="Chef'sTableLunchDinnerMenu.pdf">Menu</a>.</p> 
     
<p> San Marzano - Customizable, handmade pizzas featuring fresh ingredients that are ready in just 3 minutes! <a href="SanMarzanoMenu.pdf">Menu</a>.</p>      

</p>

    </main>
    
    <?php
        include 'includes/footer.php';
    ?>
    
</body>
</html>
