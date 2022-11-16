<?php

include 'includes/library.php'; 

$query = "SELECT * FROM Buildings"; //change it to fooditem database 
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$query))
       {
           echo "SQL prepare failed";
       }
       else{
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   $getbuidling=  mysqli_fetch_all($result);
       }

 
$errors = array();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/master.css" />
    <script defer src="scripts/master.js"></script>
    <title>Rate Trent Food&colon; Add new dish&dash; Backend</title>
</head>
<body>
<?php
        include 'includes/header.php';
        include 'includes/nav.php';
    ?>
    <main>
        <h2> Add new Dish to Trent University's Menu </h2>
                <form id="create" name="create" method="post" enctype="multipart/form-data"  novalidate>

                    <!-- buidling name input -->
                    <div>
                        <label for="dish_name">Dish Name</label>
                        <input type="text" name="dish_name" id="dish_name" placeholder="Enter the buidling name here" value="" required />
                         <span class="error <?=!isset($errors['dish_name']) ? 'hidden' : "";?>">Please enter the name of the dish</span>
                    </div>

                      <!-- buidling code input -->
                    <div>
                        <label for="dish_price">Dish Price</label>
                        <input type="text" name="dish_price" id="dish_price" placeholder="Enter the buidling code here" value="" required />
                        <span class="error <?=!isset($errors['dish_price']) ? 'hidden' : "";?>">Please enter the price of the dish</span>
                    </div>

                     <!-- buidling image input -->
                     <div>
                        <label for="dish_cal">Dish Calories </label>
                        <input type="text" name="dish_cal" id="dish_cal" placeholder="Enter a picture of the building here" required />
                        <span class="error <?=!isset($errors['dish_cal']) ? 'hidden' : "";?>">Please enter the amount of calories the dish contains</span>
                    </div>

                    <!-- buidling image input -->
                    <div>
                        <label for="buidling">Which buidling does the cafe belong to:</label>
                        <select name="build" id="build">
                        <option value="0">Select a building</option>
                            <?php foreach($getbuidling as $build):?>
                                <option value="<?= $build[0]?>"><?= $build[0]?></option>
                                <?php endforeach;?>
                            </select>
                        <span class="error <?=!isset($errors['dish_cal']) ? 'hidden' : "";?>">Please choose a buidling</span>
                    </div>

                    <div class="hidden">
                        <label for="cafe">Which cafe does it belong to: </label>
                        <select name="cafe" id="cafe">
                            <option value="0">Select a cafe</option> 
                            </select>
                        <span class="error <?=!isset($errors['dish_cal']) ? 'hidden' : "";?>">Please choose a cafe to add the dish</span>
                    </div>

                    <div id="buttons">    
                    <button type="submit" name="submit">Submit</button>
                    </div>
                    </form>
    </main>
        <?php
        include 'includes/footer.php';
        ?>
</body>
</html>