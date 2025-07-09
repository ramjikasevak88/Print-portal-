<?php
include('includes/config.php');

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "SELECT * FROM `usertable` WHERE (phone='$username' OR emailid='$username') AND emailid='$email'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result) == 1){
            // Generate a random six-digit password
            function generatePassword($length = 18) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    $password = '';
    $max = strlen($characters) - 1;
    
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $max)];
    }
    
    return $password;
}

$newPassword = generatePassword(12); // You can specify the length you prefer here


            // Hash the password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $row = mysqli_fetch_assoc($result);
            $userid = $row['userid'];

            // Update user's password in the database
            $updateQuery = "UPDATE `usertable` SET `password`='$hashedPassword' WHERE `userid`='$userid'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if($updateResult){
                // Send the new password to the user's email
                $to = $email;
                $subject = 'Password Reset';

                // Constructing the message with a table styled as a box
                $message = '
                <html>
                <head>
                <title>Password Reset</title>
                <style>
                .table-box {
                    border-collapse: collapse;
                    border: 1px solid #ddd;
                    padding: 8px;
                }
                .table-box th, .table-box td {
                    border: 1px solid #ddd;
                    padding: 8px;
                }
                </style>
                </head>
                <body>
                <p>Hello ' . $name . ',</p>
                <p>Your new password is: <strong>' . $newPassword . '</strong></p>
                <p>Please change your password after logging in for security reasons.</p>
                <table class="table-box">
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>New Password</th>
                </tr>
                <tr>
                <td>' . $name . '</td>
                <td>' . $email . '</td>
                <td>' . $newPassword . '</td>
                </tr>
                </table>
                </body>
                </html>
                ';

                // Additional headers for HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: newapis.online@example.com' . "\r\n" .
                    'Reply-To: newapis.online@example.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                // Send email
                $mailSent = mail($to, $subject, $message, $headers);

                if($mailSent) {
                    // Display success message
                    echo '<script>
                            $(document).ready(function(){
                                Swal.fire(
                                    "Password Reset Successful!",
                                    "Your new password has been sent to your email.",
                                    "success"
                                );
                            });
                          </script>';
                } else {
                    // Display error message if email sending fails
                    echo "Failed to send email. Please contact support.";
                }
            } else {
                echo "Failed to reset password. Please try again later.";
            }
        } else {
            echo "Username and email do not match our records.";
        }
    } else {
        // Output error message if query fails
        echo "Error: " . mysqli_error($conn);
    }
}
?>
