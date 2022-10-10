<?php

include 'includes/library.php';

if(!isset($_GET["code"]))
{
    exit("Error! No code was sent");
    die();
}

$code = $_GET["code"];

$errors = array(); //declare empty array to add errors too
$passwordnew = $_POST['passwordnew'] ?? null;

if (isset($_POST['submit']))
{
    if(!isset($passwordnew) || strlen($passwordnew) === 0) //make sure a password was given
    {
        $errors['password'] = true;
    }
    else{
        $queryselectemail = "SELECT email FROM resetPassword WHERE code=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$queryselectemail))
        {
             echo "SQL prepare failed";
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$code);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            }
        if($row)
        {
            $queryupdate = 'UPDATE Users SET password=? WHERE email=?';
            $statement = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($statement,$queryupdate))
            {
                echo "SQL prepare failed";
            }
            else{
            mysqli_stmt_bind_param($statement,"ss",password_hash($passwordnew, PASSWORD_BCRYPT),$row[2]);
            mysqli_stmt_execute($stmt);

            $querydelete = "DELETE FROM resetPassword WHERE code=?";
            $stm = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stm,$querydelete))
            {
                echo "SQL prepare failed";
            }
            else{
            mysqli_stmt_bind_param($stm,"s",$code);
            mysqli_stmt_execute($stm);

            header("Location: forgotpasswordsuccess");
                }
            }
        }
        else{
            exit("Error! This link was already used");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rate Trent Food&colon; Forgot Password</title>
        <link rel="stylesheet" href="styles/master.css">
    </head>
    <body>
    <?php
        include 'includes/header.php';
        include 'includes/nav.php';
        ?>
       <main>
       <h2>Reset Password</h2>
            <p>Please enter your new password.</p>
            <form id="passwordnew" name="passwordnew" method="post" enctype="multipart/form-data">
                <div>
                    <label for="passwordnew">New Password:</label>
                    <input type="password" id="passwordnew" name="passwordnew" required>
                    <span class="error <?=!isset($errors['password']) ? 'hidden' : "";?>">Please enter a password</span>
                </div>
                <div>
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>

       </main>

<?php include "includes/footer.php";?>

</body>
</html>