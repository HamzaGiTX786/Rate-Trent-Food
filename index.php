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
       
    <p>Welcome to Rate Trent Food. This a website where you can give a rating to a dish served in any of Trent University's Cafes from 1-5</p>
    <form name="search" id="search" method="post" novalidate>

        <!-- Search bar -->
    <div>
        <label for="search">Search</label>
        <input type="text" name="search" id="search" placeholder="Search" />
        <span class="error <?=!isset($errors['search']) ? 'hidden' : "";?>">Please enter item to be searched!</span>
    </div>

    <!-- Button to submit -->

    <div id="buttons">
    <button type="submit" name="submit">Search</button>
    </div>
    </form>

    <!-- Search Results -->

    <!-- The result section is hidden until there is aything found -->
    <div id="searchresult" class = "<?=!isset($food) ? 'hidden':"";?>"> 
    <p>Search Result: </p>
    <?php foreach($food as $fooditem):?>
        <ul>
            <li>Name: <?= $fooditem?></li>
        </ul>
    <?php endforeach; ?>
    </div>

    <?php if(!isset($food)){?>
        <div>
        <p>Search Result: No results found </p>
        </div>
    <?php } ?>
    
    <?php
        include 'includes/footer.php';
    ?>
</body>
</html>