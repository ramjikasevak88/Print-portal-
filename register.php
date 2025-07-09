<?php
include('includes/config.php');
if (isset($_POST['reg']) && $_POST['reg'] == "ahkweb"  ) {
  
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $userid = mysqli_real_escape_string($conn, $_POST['userid']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $profilepic = mysqli_real_escape_string($conn, $_POST['profilepic']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

  if (!empty($password) && !empty($cpassword) && $phone != "ADMIN" && $email != "ADMIN") {
    if ($password == $cpassword) {

      $fpassword = password_hash($cpassword, PASSWORD_DEFAULT);
      $checksql = mysqli_query($conn, "SELECT * FROM usertable WHERE emailid='$email' OR phone='$phone'");
      if (
        !empty($name) &&
        !empty($phone) &&
        !empty($email) &&
        !empty($password) &&
        !empty($cpassword)
      ) {
        if (mysqli_num_rows($checksql) == 0) {
    
          $sql = "INSERT INTO `usertable` (`phone`, `emailid`, `name`,`psaid`,`cprize`, `password`, `city`, `state`, `userid`, `status`, `profilepic`, `createdby`, `joineddate`, `joinedtime`, `usertype`, `walletamount`,`otp`) VALUES ('$phone', '$email', '$name','NOT ALOTED', '98',  '$fpassword', 'cc', 'sdds', '$userid', 'verified', '$profilepic', NULL, '', '', 'OPERATER', '0','');";
          $res = mysqli_query($conn,$sql);
          // 
          if($res){
            ?>
            <script>
              // alert('Your Account Register Successfully!, You can Login');
              $(function() {
        Swal.fire(
            'Success',
            'Register Successfully You can Login',
            'success'
        )
    });

  
  window.setTimeout(function() {
  window.location.href = "index.php";
  }, 1500);

    
            </script>
            <?php
          }else{
            ?>
            <script>
              // alert('Account Not Created ,Try Again!!');
              $(function(){
                Swal.fire(
                  'Opps!',
                  'Internet Server Error, Please Try Again Later!',
                  'error'
                )
    
              });
            </script>
            <?php
          }
          // 
        }else{
          ?>
          <script>
            // alert('Your  email or phone  already exist!');
            $(function() {
        Swal.fire(
            'Opps!',
            'Your  email or phone  already exist!',
            'error'
        )
    });
      
  window.setTimeout(function() {
  window.location.href = "reg.php";
  }, 1500);
          </script>
          <?php
        }
      }else{
        ?>
        <script>
             $(function() {
        Swal.fire(
            'Opps!',
            'Please Fill All data',
            'error'
        )
    });
        </script>
        <?php
      }
    }else{
      // echo "Confirm Password Not Match";
      ?>
      <script>
           $(function() {
    Swal.fire(
        'Opps!',
        'Confirm Password Not Match!',
        'error'
    )
});
      </script>
      <?php
    }
  }else{
    ?>
      <script>
           $(function() {
    Swal.fire(
        'WOW trying to Cheat!!!',
        'You Are A Cheater  GET OUT!',
        'error'
    )
});
      </script>
      <?php

  }


}
?>
<!-- Data Tabled Css  --><html lang="en"><head><link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <!-- Fav  -->
    <script src="js/sweetalert.min.js"></script>
    <link href="css/jquery.fancybox.min.css" rel="stylesheet">
    <!-- Style for Dialog Box -->
<script src="js/jquery.min_1.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="css/jquery.fancybox.min.css">
  
<!-- font awesome icon -->
<link rel="stylesheet" href="css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
  
  


<link rel="icon" href="images/favicon-16x16.png">

<script>
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });
</script>
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>RTPS-4 || Sign up for</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="https://serviceonline.bihar.gov.avth.us/_web/img/favicon.png" rel="icon">
  <link href="https://serviceonline.bihar.gov.avth.us/_web/img/favicon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com/" rel="preconnect">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css_1" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-icons.css" rel="stylesheet">
  <link href="css/boxicons.min.css" rel="stylesheet">
  <link href="css/quill.snow.css" rel="stylesheet">
  <link href="css/quill.bubble.css" rel="stylesheet">
  <link href="css/remixicon.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style%281%29.css" rel="stylesheet">
  <link rel="stylesheet" href="css/getStarted1.css">
  <link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/font-awesome.min%281%29.css">
<link rel="stylesheet" href="css/goole_fonts_jp.css">
<style>
 body {  
    background-image: linear-gradient(rgba(237, 255, 255, 0.8), rgba(237, 255, 255, 0.8)), url("images/background.jpg");
    background-repeat: repeat;
    background-size: cover;
    font-family: 'Nunito', sans-serif;
 }
 .float-item1{
   color: #fff;	
   display: inline-block;
   text-transform: uppercase;
   text-decoration: none;
   position: relative;
   z-index:100;
   background: red;
   width: 30px;
   text-align: center;
   font-size: 11px;
   padding: 10px 0;
   height: 40px;
   border-bottom: 1px solid hsla(0,0%,100%,.45);
   margin: 0;
   width: 33.3%;
   float: left;
   }
</style>
</head>
<body style="">
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-5" style="border-radius: 15px;border:2px solid #d5d5d5!important;border-bottom: 5px solid #673efd !important;">
                <div class="card-body">					
                  <div class="" align="justify"><br>
                    <p class="text-center fs-5" style="color:black;" align="justyfy">Sign up for <b style="color:#007bff;">JanParichay&nbsp;<img src="https://serviceonline.bihar.gov.avth.us/SignUp_files/menu.svg" height="15"></b></p>
                    <p class="text-center small">
										</p>
					<div id="extraTabs">
					<ul class="tab-group pt-4">
						<a href="login.php" class="btn1 float-item1 " style="border-bottom: 2px solid #2c78db;border-right: 3px solid white;">Login</a>
						<a href="register.php" class="btn1 float-item1 active" style="border-bottom: 2px solid #2c78db;border-right: 3px solid white;">Signup</a>
						<a href="#" class="btn1 float-item1 " style="border-bottom: 2px solid #2c78db;">Forgot</a>
					</ul>
					</div>
                  </div>
                 <form action="" method="POST">
                         <div class="row g-3">
                             <div class="col-md-6">
                                 <div class="form-floating"> 
                                 <input type="hidden" name="reg" value="ahkweb">
                                     <input type="text" class="form-control" style="text-transform:uppercase" id="name" name="name" placeholder="Your Name"required="" >
                                     <label for="name">Your Name</label>
                                 </div>
                             </div>
                             
                               <div class="col-md-6">
                                 <div class="form-floating"> 
                                 <input type="hidden" name="userid" value="ahkweb">
                                     <input type="text" class="form-control" style="text-transform:" id="userid" name="userid" placeholder="User Name "required="" >
                                     <label for="name">User Name</label>
                                 </div>
                             </div>
                             
            <!--                 <div class="col-md-6" >-->
            <!--                 <div class="col-md-6">-->
								    <!--   <img src="" id="blah" width="150px" height="150px" style="display: none;" alt="User profile picture">-->
							     <!--</div>-->
            <!--          <input  type="file" class="form-control" id="profilepic" name="profilepic" required="">-->
            <!--             <label for="profilepic" >Upload Image</label> -->
            <!--                   </div>-->
                             <div class="col-12">
                                 <div class="form-floating">
                                     <input type="number" class="form-control" id="phone" name="phone" placeholder="Your Email" required="">
                                     <label for="Mobie No">Your phone No.</label>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                     <input type="email" class="form-control" style="text-transform:uppercase" id="email" name="email" placeholder="Your Email Id">
                                     <label for="email">Your Email Id</label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="passwoard" class="form-control" style="text-transform:" id="password" name="password" placeholder="password" required="" >
                                     <label for="password">Passwoard</label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="cpassword" class="form-control" style="text-transform:uppercase" id="cpassword" name="cpassword" placeholder="conform password" required="" >
                                     <label for="email">Conform Passwoard</label>
                                 </div>
                             </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="submit" style="background-color:#28a745;" type="submit">Sign up</button>
                    </div>
                    <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="hidden" name="reg" value="ahkweb">
               
                <input type="hidden" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  <a href="#"></a>
                </label>
              </div>
            </div>
                  
				  					<h5 style="margin-top: 20px;">
					<span>OR</span>
					<div style="font-size: 15px; font-weight: 400">Continue with</div>
					</h5>
				   <div class="row">
				   <div class="col-4">
				   <img src="images/digiLocker_logo_01.png" width="100%">
				   </div>
				   <div class="col-4">
				   <img src="images/parichay_image.png" width="100%">
				   </div>
				   <div class="col-4">
				   <img src="images/e-pramaan1.jpeg" width="100%">
				   </div>
				   </div>
				   <h5 style="margin-top: 20px;">
					<br>
	</h5><h4 style="text-align: center; font-size: medium; font-weight: 500;">
			New user? <a href="register.php" class="text-primary cursor-pointer font-weight-bold" id="btnRegisterNow">Sign up for
				MeriPehchaan</a>
		</h4>
                </div></form>
              </div>
            </div>
          </div>
        </div>
      </div></section>
    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="apexcharts.min.js.download"></script>
  <script src="bootstrap.bundle.min.js.download"></script>
  <script src="chart.min.js.download"></script>
  <script src="echarts.min.js.download"></script>
  <script src="quill.min.js.download"></script>
  <script src="simple-datatables.js.download"></script>
  <script src="tinymce.min.js.download"></script>
  <script src="validate.js.download"></script>
  <script src="main.js.download"></script>

<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg></body></html>