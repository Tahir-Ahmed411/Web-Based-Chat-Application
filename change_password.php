<!DOCTYPE html>
<html>
<?php
    session_start();
    include('include/connection.php');
    include('include/header.php');

    if(!isset($_SESSION['user_email']))
    {
        header('Location:signin.php');
    }
    else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Picture</title>
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://naxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    
    <!-- my css  -->
        <style>
            body{
                overflow-x: hidden;
            }
        </style>
</head> 
<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-hover">
                    <tr align="center">
                        <td colspan="6" class="active"> 
                            <h2>Change Password</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Current Password</td>
                        <td>
                            <input type="password" name="current_pass" id="mypass" class="form-control" required placeholder="Current Password"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">New Password</td>
                        <td>
                            <input type="password" name="u_pass1" id="mypass" class="form-control" required placeholder="New Password"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Confirm Password</td>
                        <td>
                            <input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="Confirm Password"/>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" name="change" value="Change" class="btn btn-info"/>
                        </td>
                    </tr>
            </table>
            
            </form>
            <?php

                if(isset($_POST['change'])){
                    $c_pass=$_POST['current_pass'];
                    $pass1=$_POST['u_pass1'];
                    $pass2=$_POST['u_pass2'];

                    $user=$_SESSION['user_email'];
                    $get_user="SELECT * FROM users where user_email='$user'";
                    $run_user=mysqli_query($con,$get_user);
                    $row = mysqli_fetch_array($run_user);
        
                    $user_password=$row['user_pass'];   
                    
                    if($c_pass!=$user_password)
                    {
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Your Old Password did not matched.</strong>
                            </div>
                        ";
                    }
                    if($pass1!=$pass2){
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Your New Password did not matched with confirm password.</strong>
                            </div>
                        "; 
                    }
                    if(strlen($pass1) < 8 && strlen($pass2) < 8)
                    {
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Use 8 or more charaters in password.</strong>
                            </div>
                        "; 
                    }
                    if($pass1 == $pass2 && $c_pass==$user_password)
                    {
                        $update_pass=mysqli_query($con,"UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Your Password is Changed.</strong>
                            </div>
                        "; 
                    }
                }
            ?>
        </div>
        <div class="col-sm-2">
        </div>
    </div>

</body>
</html>
<?php
    }
?>