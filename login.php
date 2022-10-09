<?php  
include 'includes/library.php';

$user = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$remember = $_POST['remember']?? null;

$errors = array();

if (isset($_POST['submit'])) 
{
        
    $query = "SELECT * FROM Users WHERE username =?"; //select the row of the table with the given username
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL prepare failed";
    }
    else{
    mysqli_stmt_bind_param($stmt,"s",$user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    }
        
    if($row === false) //if row is false then no row with that username exists and user is invalid
    { 
        $errors['login'] = true;
    }
    else //if the row was valid
    {
        if(password_verify($password, $row['password'])) //verify that the password is correct
        //if($password == $row['password'])
        {
            session_start(); //start the session
            $_SESSION['user'] = $row['username']; //load session credentials
            $_SESSION['id'] = $row['userid'];

            if(!empty($_POST["remember"])) // if remeber was checked
            {
                setcookie ("userrem",$user,time()+ (10 * 365 * 24 * 60 * 60));
            }
            else
            {
                if(isset($_COOKIE["userrem"])) {
                    setcookie ("userem","");
                }
            }

            header("Location: index.php"); //redirect to the homepage
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
                     <label for="username">Username:</label> 
                     <input type="text" id="username" name="username" size="40" autocomplete="new-password" placeholder="Enter your username here" value="<?php if(isset($_COOKIE["userrem"])) { echo $_COOKIE["userrem"]; }?>"/>
                </div>
                <div>
                    <label for="password">Password</label> 
                    <input type="password" id="password" name="password" autocomplete="new-password"  placeholder="Enter your password here" size="40"/>
                </div>
                <div>
                    <a href="forgotpassword.php">Forgot Password?</a>
                </div>
                <div>
                    <span class="error <?=!isset($errors['login']) ? 'hidden' : "";?>"> Your username or password was invalid</span>
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