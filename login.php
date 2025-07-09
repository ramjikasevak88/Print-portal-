<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

include('includes/config.php');

// Check if the user is already logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("Location: admin");
    exit();
}

if(isset($_POST['secret']) && $_POST['secret'] == "ahkwebsolutions" && !empty($_POST['username']) && !empty($_POST['password'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $res = mysqli_query($conn, "SELECT * FROM `usertable` WHERE phone='$username' OR emailid='$username' OR userid='$username'");

    if(mysqli_num_rows($res) == 1 ){
        $userdata = mysqli_fetch_assoc($res);
        $vpass = password_verify($password, $userdata['password']);
        
        if($vpass){
            if($userdata['status'] == "verified"){
                
                // Set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['userid'] = $userdata['userid'];
                $_SESSION['name'] = $userdata['name'];
                $_SESSION['emailid'] = $userdata['emailid'];
                $_SESSION['phone'] = $userdata['phone'];
                $_SESSION['walletamount'] = $userdata['walletamount'];
                $_SESSION['usertype'] = $userdata['usertype'];

                // Display personalized welcome message
                $welcomeMessage = "Welcome back, " . $userdata['username']; // Adjust 'username' based on your actual column name
                
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Success!',
                            '<?php echo $welcomeMessage; ?>',
                            'success'
                        ).then(function() {
                            window.location.href = "admin";
                        });
                    });
                </script>
                <?php

                // End the script execution here
                exit();
            } else {
                ?>
                <script>
                    $(function(){
                        Swal.fire(
                            'Opps!',
                            'आपका खाता निष्क्रिय किया गया है क्योंकि आपने अभी तक अपने खाते में रिचार्ज नहीं किया था। अगर आपका खाता फिर से सक्रिय करवाना है, तो tiwarihost.in@gmail.com पर संपर्क करें। ',
                            'error'
                        )
                    });
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                $(function(){
                    Swal.fire(
                        'Opps!',
                        'Password Wrong!',
                        'error'
                    )
                });
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            $(function(){
                Swal.fire(
                    'Opps!',
                    'Entered username Wrong or Not Exist',
                    'error'
                )
            });
        </script>
        <?php
    }
}
?>
 
 
 <!DOCTYPE html><html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free"><head>

</head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script>
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });
</script>
    <title>Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 50px;
}
.social i{
  margin-right: 4px;
}

    </style>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
          <form action="" method="POST">
                         <div class="row g-3">
		<div class="col-12">
                                
                                 <input type="hidden" name="secret" value="ahkwebsolutions">
                                 <label for="username"><class="label-above">Username</label> 
                                     <input type="text" class="form-control"  id="username" name="username" placeholder="Username, phone, emailid">
                                     
                                 </div>
                             </div>
                             <div class="col-12">
                                 
                                     <label for="password"> <class="label-above">Password</label> 
                                     <input type="password" class="form-control"  id="password" name="password" placeholder="password">
                                 </div>
                             </div>
            
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
            <br>
            <a href="forgot_password.php" class="button">FORGOT PASSWORD</a>
  
  <!-- Add some space between the buttons -->
  <div style="margin-top: 20px;"></div>
  
  <a href="register.php" class="button">Register Here</a>
            <br><br>
              

            <style>
            

    /* Define styles for the white button */
    .white-button {
      display: inline-block;
      padding: 10px 140px;
      background-color: #ffffff; /* White background */
      color: #000000; /* Black text color */
      text-decoration: none;
      border: 1px solid #000000; /* Black border */
      border-radius: 5px; /* Rounded corners */
      cursor: pointer;
    }

    /* Hover effect for the button */
    .white-button:hover {
      background-color: #f2f2f2; /* Light gray background on hover */
    }
  </style>
</head>
<body>

  <!-- White button HTML -->
 <style>
    .hide-button {
        display: none;
    }
</style>



          </form>

          
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<!-- / Content -->

  

  
  
    </form>
</body>
</html>
