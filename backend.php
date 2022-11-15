<?php  
include 'includes/library.php';

$lname = $_POST['lname'] ?? null;
$empid = $_POST['empID'] ?? null;
$remember = $_POST['remember']?? null;

$errors = array();

if (isset($_POST['submit'])) 
{
        
    $query = "SELECT * FROM backend WHERE lname =?"; //select the row of the table with the given username
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL prepare failed";
    }
    else{
    mysqli_stmt_bind_param($stmt,"s",$lname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    }
        
    if($row == false) //if row is false then no row with that username exists and user is invalid
    { 
        $errors['login'] = true;
    }
    else //if the row was valid
    {
        if($empid == $row['empID']) //verify that the password is correct
        //if($password == $row['password'])
        {
            session_start(); //start the session
            $_SESSION['lname'] = $row['lname']; //load session credentials
            $_SESSION['empid'] = $row['empID'];

            if(!empty($_POST["remember"])) // if remeber was checked
            {
                setcookie ("lname",$lname,time()+ (10 * 365 * 24 * 60 * 60));
            }
            else
            {
                if(isset($_COOKIE["lname"])) {
                    setcookie ("lname","");
                }
            }

            header("Location: backendaccess");
        }
        else
        {
            $errors['login'] = true;    //incorrect password
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rate Trent Food&colon; Login </title>
        <link rel="stylesheet" href="styles/master.css" />
    </head>
    <body>
    <?php
        include 'includes/header.php';
        include 'includes/nav.php';
    ?>
        <main>
            <h2>LOGIN</h2>
             <form id="login" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" >
                <div>
                     <label for="lname">lname:</label> 
                     <input type="text" id="lname" name="lname" size="40" autocomplete="new-password" placeholder="Enter your last name here" value="<?php if(isset($_COOKIE["lname"])) { echo $_COOKIE["lname"]; }?>"/>
                </div>
                <div>
                    <label for="empID">Password</label> 
                    <input type="text" id="empID" name="empID" autocomplete="new-password"  placeholder="Enter your Employee number here" size="40"/>
                </div>
                <div>
                    <span class="error <?=!isset($errors['login']) ? 'hidden' : "";?>"> Your last name or Employee number was invalid</span>
                </div>
                <div>
                    <label for="remember">Remember me</label>
                    <input type="checkbox" name="remember" id="remember" value="checked" />
                </div>

                <div id="buttons">    
                    <button type="submit" name="submit">Login</button>
                </div>
             </form>
        </main>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>