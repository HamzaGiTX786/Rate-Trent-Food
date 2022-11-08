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
        <p> College with Dining Halls in Trent University</p>

    <ul>
       <li> <a href="Champlain.php">
                <img src="img/ChamplainCollege.png" alt= "Champlain College Logo">
                <p>Champlain College</p>
                </a></li>
        <li> <a href="LadyEaton.php">
                <img src="img/Lady Eaton Crest-Gradient.jpeg" alt= "Champlain College Logo">
                <p>Lady Eaton College</p>
        </a></li>
        <li> <a href="Otonabee.php">
                <img src="img/otonabee_college_logo.png" alt= "Champlain College Logo">
                <p>Otonabee College</p>
        </a></li>
        <li> <a href="Gzowski.php">
                <img src="img/Peter Gzowski College Loon Red Eye_0.png" alt= "Champlain College Logo">
                <p>Peter Gzowski College</p>
        </a></li>
</ul>
</main>

<?php include 'includes/footer.php';?>
    
</body>
</html>
