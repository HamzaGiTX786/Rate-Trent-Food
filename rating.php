<?php
   include 'includes/library.php';
   
   if (!isset($itemid) || strlen($itemid) === 0) // check if user entered anything into the search bar
   {
       $errors['itemname'] = true;
   }
   
   $errors = array();
   $itemid = $_GET['item'] ?? null;
   
   if(count($errors) === 0) //check if there are any errors
   {
       $query = "SELECT itemname,rank,cafe,building FROM fooditems WHERE itemid=?; ";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt,$query))
       {
           echo "SQL prepare failed";
       }
       else{
           mysqli_stmt_bind_param($stmt,"d",$itemid);
           mysqli_stmt_execute($stmt);
           $result = mysqli_stmt_get_result($stmt);
           $rating = mysqli_fetch_assoc($result); // get output for the searched item
   
           $itemname = $rating['itemname'];
           $rank = $rating['rank'];
           $cafe = $rating['cafe'];
           $build = $rating['building'];
           }
   
       $query1 = "SELECT review,userID, rating FROM userratings WHERE itemID=?";
       
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt,$query1))
       {
           echo "SQL prepare failed";
       }else{ 
           mysqli_stmt_bind_param($stmt,"d",$itemid);
           mysqli_stmt_execute($stmt);
           }
           $result_comments = mysqli_stmt_get_result($stmt);
           $comments = mysqli_fetch_all($result_comments);
   
           foreach($comments as $comment):
               $query = "SELECT fname,lname FROM Users WHERE userId=?";
               $stmt = mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$query))
               {
                   echo "SQL prepare failed";
               }
               else{
               mysqli_stmt_bind_param($stmt,"d",$comment[1]);
               mysqli_stmt_execute($stmt);
               $result = mysqli_stmt_get_result($stmt);
               $name = mysqli_fetch_all($result); // get output for the searched item
               }
           endforeach;
   
          //var_dump($name);
   
   }
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta item="viewport" content="width=device-width, initial-scale=1.0">
      <title>Rate Trent Food: Dish Rating</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="styles/master.css"/>
      <link rel="stylesheet" href="styles/ratestyles.css" />
      <script defer src="scripts/master.js"></script>
   </head>
   <body>
      <?php
         include 'includes/header.php';
         include 'includes/nav.php';
         ?>
      <main>
         <h2><?= $itemname;?> - <?= $cafe?> - <?= $build?></h2>
         <form id="review" name="review" method="post" novalidate>
            <div class="wrapper">
               <div class="item1"></div>
               <!--<div id="rank" class="rating"><?= $rank;?> / 5</div> -->
               <div class="item2">
                  <p>Rating: <?= $rank;?> / 5</p>
                  <div class="rating">
                     <input type="radio" name="rating" value="5" id="5" disabled <?php if($rank == 5){echo 'checked';} ?>><label for="5">☆</label>
                     <input type="radio" name="rating" value="4" id="4" disabled <?php if($rank == 4){echo 'checked';} ?>><label for="4" >☆</label>
                     <input type="radio" name="rating" value="3" id="3" disabled <?php if($rank == 3){echo 'checked';} ?>><label for="3">☆</label>
                     <input type="radio" name="rating" value="2" id="2" disabled <?php if($rank == 2){echo 'checked';} ?>><label for="2">☆</label>
                     <input type="radio" name="rating" value="1" id="1" disabled <?php if($rank == 1){echo 'checked';} ?>><label for="1">☆</label>
                  </div>
               </div>
            </div>
       
            <div class="list-group">
                Reviews:
               <?php foreach($comments as $comment):
                  foreach($name as $user):?>
               <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1"><?php echo $user[0]." ".$user[1]." - ".$comment[2]."/5"?></h5>
                  </div>
                  <p class="mb-1"><?php echo $comment[0];?></p>
               </a>
               <?php 
                  endforeach; 
                  endforeach;
                  ?>
            </div>
         </form>
      </main>
      <?php
         include 'includes/footer.php';
         ?>
   </body>
</html>
