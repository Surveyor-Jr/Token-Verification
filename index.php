<?php

$con= new mysqli('localhost',' fzhzf_relier','nkm10636','fzhzfxpv_relier_store')or die("Could not connect to mysql".mysqli_error($con));

//$msg = "Token is valid and has been registered successfully";
    $success = 0;
    $error = 0;
if(isset($_POST['submit'])) 
{

    $msg = "Token is valid and has been registered successfully";
    $success = 0;
$token_id = $_POST['token'];


$token_check = mysqli_query($con,"SELECT token_identity FROM tokens where token_identity='$token_id'");
   $rowcount=mysqli_num_rows($token_check);
   if($rowcount==0)
   {
    $verify = mysqli_query($con,"INSERT INTO tokens VALUES  ('$token_id')");
    $success = $success + 1;
    $msg = "Token is valid and has been registered successfully";
   }
   else
   {
	  // $msg="the token is already registered";
     // echo '<script>alert("Invalid")</script>';
     $invalid = "Invalid Entry! This token has expired.";
     $error = $error + 1;
	   
   }  

//$verify = mysqli_query($con,"INSERT INTO tokens VALUES  ('$token_id')");

}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HIGHLY CLASSIFIED. Only Relier employees are allowed to access this token portal. Add used tokens here and verify whether token submitted by an agent is valid and has never been used."
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Token Verification</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

  

    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="align-items-center">
                        <div class="banner_content">
                            <h3>TOKEN REGISTRATION & VERIFICATION PORTAL</h3>
                            <center>
                            
                                <?php 
                                if($success > 0){
                                    echo "<div class='row button-contactForm align-items-center' style='color:White;'>".$msg."</div>";
                                }
                                if($error > 0){
                                    echo "<div class='row invalid align-items-center' style='color:White;'>".$invalid."</div>";
                                }
                                ?>
                                                            
             <form class="form-contact contact_form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" class="banner_btn" id="token" name="token" placeholder="Token ID">
            <button type="submit" name="submit" class="button button-contactForm">Verify</button>
            </form>
            </center>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
</body>
</html>
