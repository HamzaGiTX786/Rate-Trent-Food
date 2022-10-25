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
    <h1>Champlain</h1>
 <h2> Champlain Menu </h2>
</header>
     
     <div class="dropdown">
  <button class="dropbtn"> Champlain Dining Hall features the following: </button>
  <div class="dropdown-content">
    <a href="ChamplainBreakfastMenu.pdf"> Champlain Grill & Co - All day breakfast </a>
    <a href="ChamplainLunch&DinnerMenu.pdf.php">Champlain Grill & Co - Lunch & dinner</a>
    <a href="ChamplainElDiablitoTaqueria.pdf">El Diablito Taqueria</a>
   <a href="RevolutionNoodleMenu.pdf">Revolution Noodle</a>
  </div>
</div>     
     
<p> Champlain Dining Hall features the following:

<p> Champlain Grill & Co - All day breakfast, classic grill menu featuring 100% Canadian beef and monthly features <a href="ChamplainBreakfastMenu.pdf">Menu</a>.</p> 

<p> Champlain Grill & Co - Lunch & dinner  <a href="ChamplainLunch&DinnerMenu.pdf">Menu</a>.</p>      
    
<p> Revolution Noodle - That familiar taste of classic Vietnamese to Japanese comfort foods. This new station delivers authentic and electric flavours using the freshest produce, authentic noodles and delicious broths <a href="RevolutionNoodleMenu.pdf">Menu</a>.</p> 
 
<p> El Diablito Taqueria <a href="ChamplainElDiablitoTaqueria.pdf">Menu</a>.</p>  
     
</p>
 
 
     
     

    </main>
    
    <?php
        include 'includes/footer.php';
    ?>
    
</body>
</html>
