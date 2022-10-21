<?php

session_start();

if(!isset($_SESSION['user']))
{
    header("Location:login.php");
    exit();
}

include 'includes/library.php';

$errors = array(); 

$university = $_POST['uni'] ??  null;
$overall = $_POST['overall'] ?? null;
$academic = $_POST['academic'] ?? null;
$faculty = $_POST['faculty'] ?? null;
$cost = $_POST['cost'] ?? null;
$supportAca = $_POST['supportAca'] ?? null;
$supportmen = $_POST['supportmen'] ?? null;
$rez = $_POST['Rez'] ?? null;
$club = $_POST['club'] ?? null;
$city = $_POST['city'] ?? null;
$party = $_POST['party'] ?? null;
$dining = $_POST['dining'] ?? null;

$query = "SELECT * FROM University"; //change it to fooditem database 
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL prepare failed";
    }
    else{
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$getuni =  mysqli_fetch_all($result);
    }

if(isset($_POST['submit']))
{
    if(!isset($university) || strlen($university) === 0)
    {
        $errors['uni'] = true;
    }

    if (empty($overall)) {
        $errors['overall'] = true; //throw an error the user has not made a choice
    }

    if (empty($academic)) {
        $errors['academic'] = true; //throw an error the user has not made a choice
    }

    if (empty($faculty)) {
        $errors['faculty'] = true; //throw an error the user has not made a choice
    }

    if (empty($cost)) {
        $errors['cost'] = true; //throw an error the user has not made a choice
    }

    if (empty($supportAca)) {
        $errors['supportAca'] = true; //throw an error the user has not made a choice
    }

    if (empty($supportmen)) {
        $errors['supportmen'] = true; //throw an error the user has not made a choice
    }

    if (empty($rez)) {
        $errors['Rez'] = true; //throw an error the user has not made a choice
    }

    if (empty($club)) {
        $errors['club'] = true; //throw an error the user has not made a choice
    }

    if (empty($city)) {
        $errors['city'] = true; //throw an error the user has not made a choice
    }

    if (empty($party)) {
        $errors['party'] = true; //throw an error the user has not made a choice
    }

    if (empty($dining)) {
        $errors['dining'] = true; //throw an error the user has not made a choice
    }
    
    // add the rating to the rating database
    if(count($errors) === 0)
    {
        $query = "INSERT INTO UserResponse values (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
            echo "SQL prepare failed";
        }
        else{
            if(!mysqli_stmt_bind_param($stmt,"sssssssssssss",$_SESSION['user'],$university,$overall,$academic,$faculty,$cost,$rez,$supportAca,$supportmen,$dining,$club,$city,$party))
            {
                echo "Bind fail";
            }
            var_dump(mysqli_stmt_execute($stmt))
            
        }
    }
}

?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Stars4Uni&colon; Leave a Review</title>
        <link rel="stylesheet" href="styles/master.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    </head>
    <body>
        <?php 
        include 'includes/header.php';
        include 'includes/nav.php';
        ?>
        <main>
            <h2> Leave a Review for your school </h2>
                <form id="review" name="review" method="post" novalidate>
                    <div>
                        <label for="uni">University/School</label>
                        <select name="uni" id="uni">
                <option value=""> Select a university</option>
                   <?php foreach($getuni as $uni):?>
                <option value = <?=$uni[1];?>> <?php echo $uni[0] ?> </option>
                <?php endforeach ?>
                </select>
                <span class="error <?=!isset($errors['uni']) ? 'hidden' : "";?>">Please select a University</span> 
                    </div> 

                    <div>
                    <div>
                        <p>How do you rate the University on an Overall basis?</p>
                    <div>
                        <input type="radio" name="overall" id="overall-rate5" value="5"/>
                        <label for="overall-rate5" class="fas fa-star"></label>
                        
                        <input type="radio" name="overall" id="overall-rate4" value="4"/>
                        <label for="overall-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="overall" id="overall-rate3" value="3"/>
                        <label for="overall-rate3"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="overall" id="overall-rate2" value="2"/>
                        <label for="overall-rate2"><i class="fas fa-star"></i></label>
                       
                        <input type="radio" name="overall" id="overall-rate1" value="1"/>
                        <label for="overall-rate1"><i class="fas fa-star"></i></label>
                    </div>
                        <span class="error <?=!isset($errors['overall']) ? 'hidden' : "";?>">Please enter an Overall rating</span> 
                    </div>

                    <div>
                        <p>How do you rate the University on an Academic basis?</p>

                        <div>
                        <input type="radio" name="academic" id="academic-rate5" value="5"/>
                        <label for="academic-rate5"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="academic" id="academic-rate4" value="4"/>
                        <label for="academic-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="academic" id="academic-rate3" value="3"/>
                        <label for="academic-rate3"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="academic" id="academic-rate2" value="2"/>
                        <label for="academic-rate2"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="academic" id="academic-rate1" value="1"/>
                        <label for="academic-rate1"><i class="fas fa-star"></i></label>
                        
                        </div>

                        <span class="error <?=!isset($errors['academic']) ? 'hidden' : "";?>">Please enter an rating based on the university academics</span>
                    </div>

                    <div>
                    <p>How do you rate the University on a Faculty basis?</p>

                    <div>
                        <input type="radio" name="faculty" id="faculty-rate5" value="5"/>
                        <label for="faculty-rate5"><i class="fas fa-star"></i></label>
                       
                        <input type="radio" name="faculty" id="faculty-rate4" value="4"/>
                        <label for="faculty-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="faculty" id="faculty-rate3" value="3"/>
                        <label for="faculty-rate3"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="faculty" id="faculty-rate2" value="2"/>
                        <label for="faculty-rate2"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="faculty" id="faculty-rate1" value="1"/>
                        <label for="faculty-rate1"><i class="fas fa-star"></i></label>

                    </div>
                    
                        <span class="error <?=!isset($errors['faculty']) ? 'hidden' : "";?>">Please enter an rating based on the university Faculty</span>
                    </div>

                    <div>
                    <p>How do you rate the University on how costly the school is?</p>

                        <div>
                        <input type="radio" name="cost" id="cost-rate5" value="5"/>
                        <label for="cost-rate5"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="cost" id="cost-rate4" value="4"/>
                        <label for="cost-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="cost" id="cost-rate3" value="3"/>
                        <label for="cost-rate3"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="cost" id="cost-rate2" value="2"/>
                        <label for="cost-rate2"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="cost" id="cost-rate1" value="1"/>
                        <label for="cost-rate1"><i class="fas fa-star"></i></label>
                        
                        </div>

                        <span class="error <?=!isset($errors['cost']) ? 'hidden' : "";?>">Please enter an rating based on the university Cost</span>
                    </div>

                    <div>
                    <p>How do you rate the University on its Residence and Housing Situation?</p>
                    
                    <div>

                        <input type="radio" name="Rez" id="Rez-rate5" value="5"/>
                        <label for="Rez-rate5"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="Rez" id="Rez-rate4" value="4"/>
                        <label for="Rez-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="Rez" id="Rez-rate3" value="3"/>
                        <label for="Rez-rate3"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="Rez" id="Rez-rate2" value="2"/>
                        <label for="Rez-rate2"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="Rez" id="Rez-rate1" value="1"/>
                        <label for="Rez-rate1"><i class="fas fa-star"></i></label>
                    
                        
                        </div>

                        <span class="error <?=!isset($errors['Rez']) ? 'hidden' : "";?>">Please enter an rating based on the university Residence and Housing</span>
                    </div>

                    <div>
                    <p>How do you rate the University on its Support Academically?</p>
                    
                    <div>
 
 
                        <input type="radio" name="supportAca" id="supportAca-rate5" value="5"/>
                        <label for="supportAca-rate5"><i class="fas fa-star"></i></label>
                        
                          <input type="radio" name="supportAca" id="supportAca-rate4" value="4"/>
                        <label for="supportAca-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="supportAca" id="supportAca-rate3" value="3"/>
                        <label for="supportAca-rate3"><i class="fas fa-star"></i></label>
                        
                         <input type="radio" name="supportAca" id="supportAca-rate2" value="2"/>
                        <label for="supportAca-rate2"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="supportAca" id="supportAca-rate1" value="1"/>
                        <label for="supportAca-rate1"><i class="fas fa-star"></i></label>
     
                        
                        </div>

                        <span class="error <?=!isset($errors['supportAca']) ? 'hidden' : "";?>">Please enter an rating based on the university's Support Academically</span>
                    </div>

                    <div>
                    <p>How do you rate the University on its Rebound/Mental health Support?</p>

                       <div>  
                       
                        <input type="radio" name="supportmen" id="supportmen-rate5" value="5"/>
                        <label for="supportmen-rate5"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="supportmen" id="supportmen-rate4" value="4"/>
                        <label for="supportmen-rate4"><i class="fas fa-star"></i></label>
                        
                         <input type="radio" name="supportmen" id="supportmen-rate3" value="3"/>
                        <label for="supportmen-rate3"><i class="fas fa-star"></i></label>
                        
                         <input type="radio" name="supportmen" id="supportmen-rate2" value="2"/>
                        <label for="supportmen-rate2"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="supportmen" id="supportmen-rate1" value="1"/>
                        <label for="supportmen-rate1"><i class="fas fa-star"></i></label>
                        
    
                        </div>

                        <span class="error <?=!isset($errors['supportmen']) ? 'hidden' : "";?>">Please enter an rating based on the university's Rebound/Mental health Support</span>
                    </div>

                    <div>
                    <p>How do you rate the University on its Dining Plans, Cafes, and off-campus dining experience?</p>
                    
                    <div>
                        
                         <input type="radio" name="dining" id="dining-rate5" value="5"/>
                        <label for="dining-rate5"><i class="fas fa-star"></i></label>
                        
                           <input type="radio" name="dining" id="dining-rate4" value="4"/>
                        <label for="dining-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="dining" id="dining-rate3" value="3"/>
                        <label for="dining-rate3"><i class="fas fa-star"></i></label>
                        
                         <input type="radio" name="dining" id="dining-rate2" value="2"/>
                        <label for="dining-rate2"><i class="fas fa-star"></i></label>

                        <input type="radio" name="dining" id="dining-rate1" value="1"/>
                        <label for="dining-rate1"><i class="fas fa-star"></i></label>
                        
                        </div>

                        <span class="error <?=!isset($errors['dining']) ? 'hidden' : "";?>">Please enter an rating based on the university's Dining Plans and Cafes</span>
                    </div>

                    <div>
                    <p>How do you rate the University on its Clubs and Extra-curriculars?</p>

                        <div>
                            
                        <input type="radio" name="club" id="club-rate5" value="5"/>
                        <label for="club-rate5"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="club" id="club-rate4" value="4"/>
                        <label for="club-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="club" id="club-rate3" value="3"/>
                        <label for="club-rate3"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="club" id="club-rate2" value="2"/>
                        <label for="club-rate2"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="club" id="club-rate1" value="1"/>
                        <label for="club-rate1"><i class="fas fa-star"></i></label>
                        
                       
                        
                        </div>

                        <span class="error <?=!isset($errors['club']) ? 'hidden' : "";?>">Please enter an rating based on the university's Clubs and Extra-curriculars</span>
                    </div>

                    <div>
                    <p>How do you rate the city or town the University is situated in?</p>
                    
                    <div>

                        <input type="radio" name="city" id="city-rate5" value="5"/>
                        <label for="city-rate5"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="city" id="city-rate4" value="4"/>
                        <label for="city-rate2"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="city" id="city-rate3" value="3"/>
                        <label for="city-rate3"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="city" id="city-rate2" value="2"/>
                        <label for="city-rate2"><i class="fas fa-star"></i></label>
                       
                        <input type="radio" name="city" id="city-rate1" value="1"/>
                        <label for="city-rate1"><i class="fas fa-star"></i></label>
                        
                        </div>

                        <span class="error <?=!isset($errors['city']) ? 'hidden' : "";?>">Please enter an rating based on where the university's is located</span>
                    </div>

                    <div>
                    <p>How do you rate the University's Social/Party Life?</p>

                    <div>
                        <input type="radio" name="party" id="party-rate5" value="5"/>
                        <label for="party-rate5"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="party" id="party-rate4" value="4"/>
                        <label for="party-rate4"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="party" id="party-rate3" value="3"/>
                        <label for="party-rate3"><i class="fas fa-star"></i></label>
                        
                        <input type="radio" name="party" id="party-rate2" value="2"/>
                        <label for="party-rate2"><i class="fas fa-star"></i></label>
                       
                        <input type="radio" name="party" id="party-rate1" value="1"/>
                        <label for="party-rate1"><i class="fa fa-star"></i></label>
                        
                        </div>

                        <span class="error <?=!isset($errors['party']) ? 'hidden' : "";?>">Please enter an rating based on the university's Socail/Party life</span>
                    </div>
                    </div>

                    <div id="buttons">    
                    <button type="submit" name="submit">Submit Review</button>
                    </div>
                    </form>
        </main>
    </body>
</html>