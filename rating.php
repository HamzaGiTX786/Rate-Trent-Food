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
    $query = "SELECT itemname,rank FROM fooditems WHERE itemid=?; ";
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
        }

    $query1 = "SELECT review,userID FROM userratings WHERE itemID=?";
    
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
        <h2><?= $itemname;?></h2>
            <div class="wrapper">
                <div class="item1"></div>
                <div id="rank" class="rating"><?= $rank;?> / 5</div>
                <div>
                    Comments:
                    <?php foreach($comments as $comment):
                    foreach($name as $user):?>
                    <ul class="comments">
                        <li><?= $comment[0]."-".$user[0]." ".$user[1];?></li>
                    </ul>
                    <?php 
                        endforeach; 
                    endforeach;
                    ?>
                </div>
            </div>

    </main>

<?php
        include 'includes/footer.php';
    ?>
    
</body>
</html>