<?php
include 'includes/library.php';

$build_name = $_POST['build_name']?? null;
$build_code = $_POST['build_code']?? null;

$errors = array(); //declare empty array to add errors too

if (isset($_POST['submit'])) {

    if(!isset($build_name) || strlen($build_name) === 0){
        $errors['build_name'] = true;
    }

    if(!isset($build_code) || strlen($build_code) === 0){
        $errors['build_code'] = true;
    }

    if(count($errors) === 0)
    {
        $querycheck = "SELECT * FROM Buildings";
        $statement = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($statement,$querycheck))
        {
            echo "SQL prepare failed";
        }
        else{
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            $buildings = mysqli_fetch_all($result);
        }

        foreach($buildings as $row) //check through all existing buildings
        {
            if ($build_name == $row[0]) //if the given rname is the same as one already in the database
            {
                $errors['uniqueName'] = true; //name is already in use
            }
            if ($build_code == $row[1])
            {
                $errors['uniqueCode'] = true; //code is already in use
            }
        }


        $tempname = $_FILES['build_image']['tmp_name'];
        

        $direx = explode('/', getcwd());
        define('WEBROOT', "/$direx[1]/$direx[2]/$direx[3]/"); //home/username/public_html
        $folder = WEBROOT."www_data/img/";
        $filename = $_FILES['build_image']['name'];
        $exts = explode(".", $filename); // split based on period
        $ext = $exts[count($exts)-1]; //take the last split (contents after last period)

        $filename= substr($tempname, strrpos($tempname, '/') + 1).".".$ext;

        if(count($errors) === 0)
        {
            $query = "INSERT INTO Buildings values (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
            echo "SQL prepare failed";
        }
        else{
            mysqli_stmt_bind_param($stmt,"sss",$build_name,$build_code,$filename);
            mysqli_stmt_execute($stmt);

            echo "Data base texxt";
            var_dump($_FILES);
            //die();

            if(move_uploaded_file($tempname,$folder.$filename))
            {
               // header("Location: menuandcafe");
               echo " Test passed";
                exit();
            }
            else{
                echo "Image upload error";
                die();
            }

            
        }
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
    <title>Rate Trent Food&colon; Add new buidling &dash; Backend</title>
    <link rel="stylesheet" href="styles/master.css" />
</head>
<body>
<?php
        include 'includes/header.php';
        include 'includes/nav.php';
    ?>
    <main>
        <h2> Create Account </h2>
                <form id="create" name="create" method="post" enctype="multipart/form-data"  novalidate>

                    <!-- buidling name input -->
                    <div>
                        <label for="build_name">Building Name</label>
                        <input type="text" name="build_name" id="build_name" placeholder="Enter the buidling name here" value="" required />
                         <span class="error <?=!isset($errors['build_name']) ? 'hidden' : "";?>">Please enter a building name</span>
                    </div>

                      <!-- buidling code input -->
                    <div>
                        <label for="build_code">Buidling Code</label>
                        <input type="text" name="build_code" id="build_code" placeholder="Enter the buidling code here" value="" required />
                        <span class="error <?=!isset($errors['build_code']) ? 'hidden' : "";?>">Please enter a building code name</span>
                    </div>

                     <!-- buidling image input -->
                     <div>
                        <label for="build_image">Buidling Image</label>
                        <input type="file" name="build_image" id="build_image" placeholder="Enter a picture of the building here" required />
                        <span class="error <?=!isset($errors['build_image']) ? 'hidden' : "";?>">Please upload an image of the building</span>
                    </div>

                    
                    <div id="buttons">    
                    <button type="submit" name="submit">Submit</button>
                    </div>
                    </form>
    </main>
        <?php
        include 'includes/footer.php';
        ?>
</body>
</html>