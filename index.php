<?php
<<<<<<< HEAD
//session started
=======
>>>>>>> f4f418c0b0320c9a147221b5fb4fe9714bdbca10
session_start();
?>
<?php
$nameErr = $emailErr = $genderErr = $aboutErr = $addressErr =$githubErr =$linkedinErr= "";
$profilepicErr = $skillsErr = $interestErr = $eduErr = $contactnoErr = $dobErr="";
$name = $email = $gender = $about = $profilepic= $address = $github =$linkedin="";
$skills = $interest = $edu = $dob =  $contactno="";
$error =false;
if(isset($_POST['submit']))
{
   //data sanitization
   function sanitize($data) 
   {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }
   

   if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {
       //validate the name field
       if (empty($_POST["name"]) && isset($_POST['name'])) 
           {
               $nameErr = "Name is required";
               $error =true;
           } 
       else 
       {
           $name = sanitize($_POST["name"]);
   
           if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
               {
                   $nameErr = "Only letters and white space allowed";
                   $error =true;
               }
           }
       
       //validate the email field
       if (empty($_POST["email"])) 
           {
               $emailErr = "Email is required";
               $error =true;
           } 
       else 
           {
               $email = sanitize($_POST["email"]);
   
               if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                   {
                       $emailErr = "Invalid email format";
                       $error =true;
                   }
           }
       //gender validation
       if (empty($_POST["gender"])) 
           {
               $genderErr = "Gender is required";
               $error=true;
           } 
       else 
           {
               $gender = $_POST["gender"];
           }


       //checklist validation
       if(empty($_POST['check_list']))
           {
               $skillsErr="You must select an skill";
               $error =true;
           }
       else
           {
               $skills= $_POST["check_list"];
           }
       //education 
       
       if(empty($_POST['edu']))
           {
               $eduErr="You must select education profile";
               $error =true;
           }
       else
           {
               $edu= $_POST["edu"];
           }
       //interest
       if(empty($_POST['interest']))
           {
               $interestErr="You must select an interest.";
               $error =true;
           }
       else
           {
               $interest= $_POST["interest"];
           }
        //dob
        if (empty($_POST["dob"])) 
           {
               $dobErr = "You must not leave this field empty";
               $error =true;
           } 
       else 
           {
                $dob=$_POST["dob"];
           }
       //about
       if (empty($_POST["about"])) 
           {
               $aboutErr = "You must not leave this field empty";
               $error =true;
           } 
       else 
           {
                $about = sanitize($_POST["about"]);
           }
       //address
       if (empty($_POST["address"])) 
           {
               $addressErr = "You must not leave this field empty";
               $error =true;
           } 
       else 
           {
                $address = sanitize($_POST["address"]);
           }
       //contact no
       if(empty($_POST['contactno']))
           {
               $contactnoErr="You can't leave this field empty";
               $error =true;
           }
       else
           {
               $contactno=$_POST['contactno'];
               if(!preg_match('/^[0-9]{10}+$/', $contactno))
                   {
                       $contactnoErr="enter a valid mobile no";
                       $error =true;
                   }

           }
        //profile pic validation/upload

        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        
        $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
        if($check !== false) {
            
            $uploadOk = 1;
        } else {
            $profilepicErr="File is not an image.";
            $uploadOk = 0;
            $error=true;
        }
        

        // Check if file already exists
        //if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        //$uploadOk = 0;
        //}

        // Check file size
        if ($_FILES["profilepic"]["size"] > 500000) {
        
        $profilepicErr="Sorry, your file is too large.";
        $uploadOk = 0;
        $error=true;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $profilepicErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $error=true;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
            {
                $profilepicErr= "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
            } 
        else 
            {
                if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) 
                    {
        
                        //echo "The file ". . " has been uploaded.";
                        $profilepic=htmlspecialchars( basename( $_FILES["profilepic"]["name"]));
                    } 
                else 
                    {
                        $profilepicErr="Sorry, there was an error uploading your file.";
                        $error=true;
                    }
            }

        //check github link
       if (empty($_POST["github"])) 
           {
               $githubErr = "You must have a github account to log in";
               $error =true;
           } 
       else 
           {
               $github= sanitize($_POST["github"]);
   
               if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$github)) 
               {
                   $githubErr = "Invalid URL";
                   $error =true;
               }    
           }
       // check linkedin link 
       if (empty($_POST["linkedin"])) 
           {
               $linkedinErr = "You must have a linkedin account to Sign up ";
           } 
       else 
           {
               $linkedin= sanitize($_POST["linkedin"]);
   
               if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)) 
               {
                   $linkedinErr = "Invalid Linkedin Profile Link";
                   $error =true;
                   
               }    
           }
   }
   if(!$error)
        {   
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            $_SESSION['dob']=$dob;
            $_SESSION['about']=$about;
            $_SESSION['address']=$address;
            $_SESSION['contactno']=$contactno;
            $_SESSION['profilepic']=$profilepic;
            $_SESSION['github']=$github;
            $_SESSION['linkedin']=$linkedin;
            $_SESSION['skills']=$skills;
            $_SESSION['interest']=$interest;
            $_SESSION['edu']=$edu;
            $_SESSION['gender']=$gender;
            
            header("Location:profile.php");
        }
   
}



?>
<!doctype HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<<<<<<< HEAD
        <link rel="stylesheet" href="style.css" />
=======
        <link rel="stylesheet" href="css/style.css" />
>>>>>>> f4f418c0b0320c9a147221b5fb4fe9714bdbca10
    </head>
    <body>
        <div class="container indexcontainer">
            <h2 style="text-align:center;"> Register Yourself</h2>
        </div>

            <div class="container indexcontainer2">
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputname4">Name</label>
                            
                            <input type="text" class="form-control" id="inputname4" placeholder="name" name="name"required>
                            <span class="error"> <?php echo $nameErr; ?> </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDate4">Date of Birth</label>
                            <input type="date" class="form-control" id="inputDate4" name="dob"required>
                            <span class="error"> <?php echo $dobErr; ?> </span>
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email"required>
                        <span class="error"> <?php echo $emailErr; ?> </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNumber4">Contact Number</label>
                        <input type="number" class="form-control" id="inputNumber4" placeholder="contact no" name="contactno" required>
                        <span class="error"> <?php echo $contactnoErr; ?> </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNumber4">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Transgender">
                            <label class="form-check-label" for="inlineRadio3">Transgender</label>

                        </div>

                        <p class="error"> <?php echo $genderErr; ?> </p>
                    
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNumber4">Skills</label> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="check_list[]" value="PHP" checked>
                            <label class="form-check-label" for="inlineCheckbox1">PHP</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="check_list[]" value="Python" checked>
                            <label class="form-check-label" for="inlineCheckbox2">Python</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="check_list[]" value="Java">
                            <label class="form-check-label" for="inlineCheckbox3">Java</label>
                        </div>

                        <p class="error"> <?php echo $skillsErr; ?> </p>
                    </div>
                    
                </div>

                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <label for="inputProfilePic">Upload profile photo</label>
                        <input type="file" id="inputProfilePic" class="form-control" name="profilepic" required/>
                        <p class="error"> <?php echo $profilepicErr; ?> </p>
                    </div>
                
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAbout">About</label>
                        <textarea class="form-control" id="inputAbout" name="about"  required> AI Enthusiast</textarea>
                        <p class="error"> <?php echo $aboutErr; ?> </p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress2">Address </label>
                        <textarea class="form-control" id="inputAddress2" name="address" value="" required>87-B Saileshree Vihar, Bhubaneswar </textarea>
                        <p class="error"> <?php echo $addressErr; ?> </p>
                    </div>
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <label for="inputQualification">Education Qualification</label>
                        <select id="inputQualification" class="form-control" name="edu" required>
                            
                            <option> Graduate</option>
                            <option> Under Graduate </option>
                            <option> Post Graduate </option>
                            <option> Phd </option>

                        </select>
                        <p class="error"> <?php echo $eduErr; ?> </p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputInterestedArea">Interested Area</label>
                        <select id="inputInterestedArea" class="form-control" name="interest[]" multiple>
                            <option value="politics" selected>Politics</option>
                            <option value="sports" selected>Sports</option>
                            <option value="reading">Reading</option>
                            <option value="foreign affairs">Foreign Affairs</option>
                            
                            
                        </select>
                        <p class="error"> <?php echo $interestErr; ?> </p>
                        
                    </div>
                    
                </div>
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <label for="inputGithub">Github Link</label>
                        <input type="text" class="form-control" id="inputGithub" name="github" value="https://www.github.com/" required/>
                        <p class="error"> <?php echo $githubErr; ?> </p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLinkedin">Linkedin Link</label>
                        <input type="text" class="form-control" id="inputLinkedin" name="linkedin" value="https://www.linkedin.com/in/" required>
                        <p class="error"> <?php echo $linkedinErr; ?> </p>
                    </div>
                    
                </div>

                
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
                </form>
            </div>
        
    </body>
</html>
