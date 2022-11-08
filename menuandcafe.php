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

    <ul>
        <li>
                <img src="img/ChamplainCollege.png" alt= "Champlain College Logo">
                <p>Champlain College</p>
        </li>
        <li>
                <img src="img/Lady Eaton Crest-Gradient.jpeg" alt= "Champlain College Logo">
                <p>Lady Eaton College</p>
        </li>
        <li>
                <img src="img/otonabee_college_logo.png" alt= "Champlain College Logo">
                <p>Otonabee College</p>
        </li>
        <li>
                <img src="img/Peter Gzowski College Loon Red Eye_0.png" alt= "Champlain College Logo">
                <p>Peter Gzowski College</p>
        </li>
</ul>

  <!--
     
     <div class="dropdown">
  <button class="dropbtn"> Trent College - Dining Halls </button>
  <div class="dropdown-content">
    <a href="Champlain.php">Champlain</a>
    <a href="Gzowski.php">Gzowski</a>
    <a href="LadyEaton.php">LadyEaton</a>
   <a href="Otonabee.php">Otonabee</a>
  </div>
</div>
     
<nav class="navbar">
 <ul>
  <li><a href="Champlain.php">Champlain</a>
        <ul>
         <li><a href="ChamplainBreakfastMenu.pdf">Champlain Grill & Co - All day breakfast</a></li>
         <li><a href="ChamplainLunch&DinnerMenu.pdf">Champlain Grill & Co - Lunch & dinner</a></li>
         <li><a href="ChamplainElDiablitoTaqueria.pdf">El Diablito Taqueria</a></li>
         <li><a href="RevolutionNoodleMenu.pdf">Revolution Noodle</a></li>
   </ul>
  </li>
  <li><a href="Gzowski.php">Gzowski</a></li>
  <ul>
         <li><a href="GzowskiLocalGrillMenu.pdf"> The Local Grill </a></li>
         <li><a href="PereaMediterraneanMenu.pdf"> Parea </a></li>
  </ul>
  </li>
  <li><a href="LadyEaton.php">LadyEaton</a></li>
   <ul>
         <li><a href="Chef'sTableBreakfastMenu.pdf"> Chef's Table Breakfast </a></li>
         <li><a href="Chef'sTableLunchDinnerMenu.pdf"> Chef's Table Lunch & Dinner </a></li>
         <li><a href="LadyEatonChopdWrapdMenu.pdf"> Chop'd & Wrap'd </a></li>
         <li><a href="SanMarzanoMenu.pdf"> San Marzano </a></li>
   </ul>
  <li><a href="Otonabee.php">Otonabee</a></li>
 <ul>
         <li> <a href="OtonabeeBreakfastMenu.pdf"> Grill & Co - All day breakfast </a></li>
         <li><a href="OtonabeeLunch&DinnerMenu.pdf"> Chef's Table Lunch & Dinner </a></li>
         <li><a href="PizzaPizzaMenu.pdf"> Pizza Pizza </a></li>
         <li><a href="https://order.subway.com/en-CA/MenuNutrition/Menu"></li>
   </ul>
 </ul>
     </nav>
   

         Search bar 
    <div>
        <label for="search">Search for a dish:</label>
        <input type="text" name="search" id="search" placeholder="Search" />
        <span class="error <?=!isset($errors['search']) ? 'hidden' : "";?>">Please enter item to be searched!</span>
    </div>

     Button to submit 

    <div id="buttons">
    <button type="submit" name="submit">Search</button>
    </div>
    </form>

    Search Results

     The result section is hidden until there is aything found
    <div id="searchresult" class = "<?=//!isset($food) ? 'hidden':"";?>"> 
    <h2>Search Result: </h2>
    <?php //foreach($food as $fooditem):?>
        <ul>
            <li>Name: <?=// $fooditem?></li>
        </ul>
    <?php //endforeach; ?>
    </div>
    
     -->
    </main>
    
    <?php
        //include 'includes/footer.php';
    ?>

   
    
</body>
</html>
