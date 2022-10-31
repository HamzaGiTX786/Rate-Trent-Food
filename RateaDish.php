<?php
   session_start();
   
   if(!isset($_SESSION['user']))
   {
       header("Location:login.php");
       exit();
   }
   
   include 'includes/library.php';
   
   $errors = array(); 
   
   $rating = $_POST['rating'] ??  null;
   $review = $_POST['review'] ?? null;
   $selectedDish = $_POST['dish'] ?? null;
   
   
   $query = "SELECT * FROM fooditems ORDER BY itemname ASC"; //change it to fooditem database 
   $stmt = mysqli_stmt_init($conn);
   
   if(!mysqli_stmt_prepare($stmt,$query))
       {
           echo "SQL prepare failed";
       }
       else{
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   $getdish =  mysqli_fetch_all($result);
       }
   
   if(isset($_POST['submit']))
   {
       if(empty($rating) ) 
       {
           $errors['ratings'] = true;
       }
   
       
   
      
       
       // add the rating to the rating database
       if(count($errors) === 0)
       {   
           $query = "INSERT INTO userratings (userID, itemID, rating, review) values (null,?,?,?)";
           $stmt = mysqli_stmt_init($conn);
           if(!mysqli_stmt_prepare($stmt,$query))
           {
               echo "SQL prepare failed";
           }
           else{
               mysqli_stmt_bind_param($stmt,"sss", $selectedDish,$rating,$review,);
               mysqli_stmt_execute($stmt);
              
               header("Location: menuandcafe.php");
               exit();
               
           }
       }
   }
   
   ?> 
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Rate Dish&colon; Leave a Review</title>
      <link rel="stylesheet" href="styles/master.css" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
      <link rel="stylesheet" href="styles/ratestyles.css" />
      <style>
      </style>
   </head>
   <body>
      <?php 
         include 'includes/header.php';
         include 'includes/nav.php';
         ?>
      <main>
         <h2> Rate a Dish</h2>
         <form id="review" name="review" method="post" novalidate>
            <div>
               <label for="dish">Please select a Dish</label>
               <select name="dish" id="dish">
                  <?php foreach($getdish as $dish):?>
                  <option value = <?=$dish[0];?>> <?php echo $dish[1]." - ".$dish[4]." - ".$dish[5]?> </option>
                  <?php endforeach ?>
               </select>
            </div>
           
            <div>
               <div class="wrapper">
                  <div class="item1"></div>
                  <div class="item2">
                     <p>What would you rate this item out of 5?</p>
                     <div class="rating">
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                     </div>
                     <span class="error <?=!isset($errors['ratings']) ? 'hidden' : "";?>">Please select a rating.</span>
                  </div>
               </div>
               <p>Would you like to leave a review?</p>
               <br>
               <textarea rows="14" cols="40" name="review" maxlength="250">
            </textarea>
            </div>
            </div>
            <div id="buttons">    
               <button type="submit" name="submit">Submit Review</button>
            </div>
         </form>
      </main>
      <?php
         include 'includes/footer.php';
         ?>
   </body>
</html>
