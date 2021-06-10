<?php
include("include/connection.php");
    if(isset($_POST['sign_up']))
    {
        $name=htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
        $name=str_replace(" ","_",$name);
        $pass=htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
        $email=htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
        $country=htmlentities(mysqli_real_escape_string($con,$_POST['user_country']));
        $gender=htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
        $rand=rand(1,2);

        if($name=="")
        {   
            echo "<script> alert('Name is not given') </script>" ;
        }
        if(strlen($pass)<8)
        {
            echo "<script> alert('Password should not be less than 8 characters.') </script>" ;
            exit();
        }
        $check_email="select * from users where user_email='$email'";
        $run_email=mysqli_query($con, $check_email);
        
        $check = mysqli_num_rows($run_email);
        
        if($check==1){
            echo "<script> alert('Email already exist please try again!') </script>" ;
            echo "<script>window.open('signup.php',_self)</script>" ;
            exit();
        }

        $profile_pic="images/empty1.png";

        $insert = "insert into users(user_name,user_pass,user_email,user_profile,user_country,user_gender) values('$name','$pass','$email','$profile_pic','$country','$gender')";

        $query = mysqli_query($con,$insert);

        if($query)
        {
            echo "<script> alert('Congrats $name Your account is successfully created!') </script>" ;
            echo "<script> window.open('signin.php', '_self') </script>" ;
        }
        else
        {
            echo "<script> alert('Resistration Failed, try again!') </script>" ;
            echo "<script> window.open('signup.php', '_self') </script>" ;

        }

    }
?>