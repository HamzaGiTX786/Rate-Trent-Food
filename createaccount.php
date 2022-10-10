<?php
include 'includes/library.php';

$errors = array(); //declare empty array to add errors too

//get name from post or set to NULL if doesn't exist
$fname = $_POST['fname'] ?? null;
$lname = $_POST['lname'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordre = $_POST['passwordre'] ?? null;
$agree = $_POST['agree'] ?? null;
$username = $_POST['username'] ?? null;
$major = $_POST['major'] ?? null;
$date_start =$_POST['date_start']??null;
$date_end = $_POST['date_end']?? null; 

if (isset($_POST['submit'])) 
{ //only do this code if the form has been submitted
    
    //validate user has entered a first name
    if (!isset($fname) || strlen($fname) === 0) 
    {
        $errors['fname'] = true;
    }
    
    //validate user has entered a last name
    if (!isset($lname) || strlen($lname) === 0) 
    {
        $errors['lname'] = true;
    }
    
    //validate and sanitize email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = true;
    }

    //validate user has entered a major
    if (!isset($major) || strlen($major) === 0)
    {
        $errors['major'] = true;
    }

    //validate user has entered a start date to school
    if (!isset($date_start) || strlen($date_start) === 0)
    {
        $errors['date_start'] = true;
    }

    //validate user has entered a end date to school
    if (!isset($date_end) || strlen($date_end) === 0)
    {
        $errors['date_end'] = true;
    }

    //validate user has checked the terms and conditions
    if(empty($agree)){
        $errors['agree'] = true;
    }
    
    if (!isset($username) || strlen($username) === 0) // make sure a username was entered
    {
        $errors['username'] = true;
    }
    
    if(!isset($password) || strlen($password) < 8) //make sure a password was given and is 8 char long
    {
        $errors['password'] = true;
    }
    
    if(!isset($passwordre) || strlen($passwordre) === 0 || $password !== $passwordre) //make sure password was re-entered and is the same as the original
    {
        $errors['passwordre'] = true;
    }
    
    if(count($errors)===0) //if no errors are encountered
    {
        $querycheck = "SELECT * FROM Users";
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement,$querycheck))
        {
            echo "SQL prepare failed";
        }
        else{
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            $accounts = mysqli_fetch_all($result);
        }

        foreach($accounts as $row) //check through all existing accounts
        {
            if ($username == $row[1]) //if the given username is the same as one already in the database
            {
                $errors['uniqueUser'] = true; //username is already in use
            }
            if ($email == $row[3])
            {
                $errors['uniqueEmail'] = true; //email is already in use
            }
        }

        if(count($errors)===0) //check if there are still no errors
        {
            $query = "INSERT INTO Users values (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
            echo "SQL prepare failed";
        }
        else{
            mysqli_stmt_bind_param($stmt,"ssssssss",$username, password_hash($password, PASSWORD_BCRYPT) , $email, $fname, $lname,$major,$date_start,$date_end);
            mysqli_stmt_execute($stmt);

            header("Location: login");
            exit();
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
        <title>Rate Trent Food&colon; Create an Account</title>
        <link rel="stylesheet" href="styles/master.css" />
    </head>
    <body>
    <?php
        include 'includes/header.php';
        include 'includes/nav.php';
    ?>
        <main>
            <h2> Create Account </h2>
                <form id="create" name="create" method="post" novalidate>

                    <!-- First name input -->
                    <div>
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" placeholder="Enter your first name here" value="" required />
                         <span class="error <?=!isset($errors['fname']) ? 'hidden' : "";?>">Please enter your First name</span>
                    </div>

                      <!-- last name input -->
                    <div>
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" placeholder="Enter your last name here" value="" required />
                        <span class="error <?=!isset($errors['lname']) ? 'hidden' : "";?>">Please enter your Last name</span>
                    </div>

                      <!-- Email input -->
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="someone@something.com" value="" required />
                        <span class="error">Please enter a correct email</span>
                        <span class="error <?=!isset($errors['email']) ? 'hidden' : "";?>">Email already in use</span>
                    </div>

                    <!-- Major input -->
                    <div>
                        <label for="major">Major</label>
                        <input type="text" name="major" id="major" placeholder="Enter your major here" value="" required />
                        <span class="error <?=!isset($errors['major']) ? 'hidden' : "";?>">Please enter a major</span>
                    </div>

                    <!-- Date of Starting school input -->
                    <div>
                        <label for="start_date">Date of Starting School</label>
                        <input type="date" name="date_start" id="date_start" placeholder="Enter your date of beginning university/school here" value="" required />
                        <span class="error <?=!isset($errors['date_start']) ? 'hidden' : "";?>">Please enter a date of starting school</span>
                    </div>

                     <!-- Date of Graduation input -->
                    <div> 
                        <label for="date_graduation">Date of Graduation/Expected Date of Graduation</label>
                        <input type="date" name="date_end" id="date_end" placeholder="Enter your date of  ending university/school here" value="" required />
                        <span class="error <?=!isset($errors['date_end']) ? 'hidden' : "";?>">Please enter a date of graduation or expected for graduation</span>
                    </div>

                     <!-- Username input -->
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter your username here" value="" required />
                        <span class="error <?=!isset($errors['username']) ? 'hidden' : "";?>">Enter your username here</span>
                        <span class="error <?=!isset($errors['uniqueEmail']) ? 'hidden' : "";?>">Username already taken</span>
                    </div>

                    <!-- Password input -->
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password here" value="" required />
                        <span class="error <?=!isset($errors['password']) ? 'hidden' : "";?>">Please enter a password that is more than 8 charaters long</span>
                    </div>
 
                    <!-- Re-entering Password -->
                    <div>
                    <label for="passwordre">Re-enter Password</label>
                    <input type="password" name="passwordre" id="passwordre" placeholder="Re-enter password here" value="" required />
                    <span class="error <?=!isset($errors['passowrdre']) ? 'hidden' : "";?>">Passwords do not match!</span>
                    </div>

                    <!-- Confirming Terms and Conditions -->
                    <div id="checkbox">
                    <input type="checkbox" name="agree" id="agree" value="Y" required />
                    <label for="agree">I have read and accepted the <a href="termsandconditions.html">Terms and Conditions</a>
                    </label>
                    <span class="error <?=!isset($errors['agree']) ? 'hidden' : "";?>">You must agree to the terms</span>
                    </div>

                    <div id="buttons">    
                    <button type="submit" name="submit">Create Account</button>
                    </div>
                    </form>
        </main>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>