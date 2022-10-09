<?php
include 'includes/library.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$errors = array(); //declare empty array to add errors too
$email = $_POST['email'] ?? null;

if (isset($_POST['submit']))
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = true;
    }

    if(count($errors)===0)
    {
        $query = "SELECT * FROM Users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
        echo "SQL prepare failed";
        }
        else{
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if($row)
        {

            $code = uniqid(true);

            $queryinsert = "INSERT INTO resetPassword values (NULL, ?, ?)";
            $statement = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($statement,$queryinsert))
            {
            echo "SQL prepare failed";
            }
            else{
            mysqli_stmt_bind_param($statement,"ss",$code,$email);
            mysqli_stmt_execute($statement);
            

            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer();

            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'ratetrentfood@gmail.com';                     //SMTP username
                $mail->Password   = 'TrentFood2022';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('ratetrentfood@gmail.com', 'RateTrentFood');
                $mail->addAddress($email);     //Add a recipient
                $mail->addReplyTo('noreply@ratetrentfood.com', 'No reply');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Password Reset Link - Rate Trent Food';
                $mail->Body    = "Click <a href='https://https://loki.trentu.ca/~hamzasalimattarwala/3850/forgotpasswordreset.php?code=$code'>here</a> to reset your password";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

                header("Location: forgotpasswordredirect.php"); //redirect to the homepage
                } 
                catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                die();
                }
        }
        }
        else{
             $errors['email'] = true;
        }
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
            <h2>Forgot Password</h2>
            <p>Please enter your email to reset your password.</p>
            <form id="forgot" name="forgot" method="post" enctype="multipart/form-data">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <span class="error <?=!isset($errors['email']) ? 'hidden' : "";?>">Please enter the email with which the account was made!</span>
                </div>
                <div>
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>
        </main>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>