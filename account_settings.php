<!DOCTYPE html>
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
    <title>Search for Friends</title>
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://naxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- my css file link     -->
</head>
<body>
    
    <div class="row">
        <div class="col-sm-2">
        </div>
        <?php
            $user=$_SESSION['user_email'];
            $get_user="SELECT * FROM users where user_email='$user'";
            $run_user=mysqli_query($con,$get_user);
            $row = mysqli_fetch_array($run_user);
            
            $user_name=$row['user_name'];
            $user_pass=$row['user_pass'];
            $user_email=$row['user_email'];
            $user_profile=$row['user_profile'];
            $user_country=$row['user_country'];
            $user_gender=$row['user_gender'];
            // echo "<a class='navbar-brand' href='../home.php?user_name=$user_name'>My Chat</a>";
        ?>
        <div class="col-sm-8">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table table-bordered table-hover">
                    <tr align="center">
                        <td colspan="6" class="active"> 
                            <h2>Change Account Settings</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Change your Username</td>
                        <td>
                            <input type="text" name="u_name" class="form-control" required value= "<?php echo $user_name;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="upload.php" class="btn btn-default" style="text-decoration: none; font-size:15px"> <i class="fa fa-user" aria-hidden="true"></i> Change Profile</a>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold">Change your Email</td>
                        <td>
                            <input type="email" name="u_email" class="form-control" required value= "<?php echo $user_email;?>" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="font-weight: bold;">Country</td>
                        <td>
                            <select class="form-control" name="u_country" id="">
                                <option><?php echo $user_country;?> </option>
                                <option>USA</option>
                                <option>Pakistan</option>
                                <option>India</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>Srilanka</option>
                                <option>Africa</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Gender</td>
                        <td>
                            <select class="form-control" name="u_gender" id="">
                                <option><?php echo $user_gender;?> </option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <a class="btn btn-default" style="text-decoration:none; font-size:15px;" href="change_password.php"> <i class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" value="Update" name="update" class="btn btn-info">
                        </td>
                    </tr>

                </table>
            </form>
            <?php
                if(isset($_POST['update'])){
                    $user_name=htmlentities($_POST['u_name']);
                    $email=htmlentities($_POST['u_email']);
                    $u_country=htmlentities($_POST['u_country']);
                    $u_gender=htmlentities($_POST['u_gender']);

                    $update = "UPDATE users SET user_name='$user_name' , user_email='$email' , user_country='$u_country',user_gender='$u_gender' WHERE user_email='$user'";
                    $run = mysqli_query($con,$update);
                    if($run)
                    {
                        echo "<script> 
                        window.open('account_settings.php','_self');
                        </script>";
                    }
                }
            ?>
        </div>
        <div class="col-sm-2"></div>

    </div>

</body>
</html>
<?php
}
?>