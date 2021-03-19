<?php
session_start();
?>
<?php
  if(isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['dob']) &&
  isset($_SESSION['about'])&& isset($_SESSION['address']) && isset($_SESSION['contactno'])&&
  isset($_SESSION['profilepic'])&& isset($_SESSION['github'])&&
  isset($_SESSION['linkedin'])&& isset($_SESSION['skills'])&& isset($_SESSION['interest'])&&
  isset($_SESSION['edu'])&& isset($_SESSION['gender']))
    {
            $name=$_SESSION['name'];
            $email=$_SESSION['email'];
            $dob=$_SESSION['dob'];
            $about=$_SESSION['about'];
            $address=$_SESSION['address'];
            $contactno=$_SESSION['contactno'];
            $profilepic=$_SESSION['profilepic'];
            $github=$_SESSION['github'];
            $linkedin=$_SESSION['linkedin'];
            $skills=$_SESSION['skills'];
            $interest=$_SESSION['interest'];
            $edu=$_SESSION['edu'];
            $gender=$_SESSION['gender'];
            

    }
    else{
        echo "redirecting to Registration page";
        header("Location:index.php");
    }
  
?>
<!doctype HTML>
<html>
 <head>
 <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
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
    
    
    <div class="container main-container">
        <h2 style="text-align:center;"> My Profile</h2>
        <div class="row">
            <div class="col-md-4 profileholder">
                <div class="imgpro">
                    <img src="uploads/<?php echo $profilepic;?>" />
                </div>
                <p style="text-align:center;"><span class="data"> <?php echo $name;?> </span></p>
                <div class="about">
                    <h5> About</h5>
                   <p> <span class="data"> <?php echo $about;?> </span></p>
                    
                </div> 
                <div class="skills">

                    <h5> Skills</h5>
                     <p> <span class="data"> <?php 
                        foreach($skills as $skill){
                            echo "$skill" ."<br>";
                        }
                     ?>
                     </span>
                     </p>

                </div> 
                <div class="social">
                    <h5> Social</h5>
                    <span> <a href="<?php echo $github; ?>" ><i class="fa fa-github"></i> </a></span>
                    <span> <a href="<?php echo $linkedin; ?>"> <i class="fa fa-linkedin"> </i></a></span>


                </div>
                
                 
            </div>
            <div class="col-md-6 profileholder2">
                
                    
                    <h5> Personal Details </h5>
                    <div class="">
                        <p>Gender: <span class="data"> <?php echo $gender;?> </span> </p>
                        <p>Date of Birth:  <span class="data"> <?php echo $dob;?></span> </p>
                        <p>Address:  <span class="data"> <?php echo $address;?> </span</p>
                    </div>
                    <div class="academic">
                        <h5> Academic Details and Interests </h5>

                        <p>Educational Qualification :<span class="data">  <?php echo $edu;?> </span> </p>
                        <p> Interested Areas: <span class="data">
                            <?php
                                foreach($interest as $inter)
                                    {
                                        echo $inter."<br>";
                                    }
                                
                            ?> </span>
                         </p>
                    
                </div>
            </div>
        </div>
    </div>

<?php 
session_destroy();
?>
 </body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> f4f418c0b0320c9a147221b5fb4fe9714bdbca10
