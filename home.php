<!DOCTYPE html>
<?php
    ob_start();
    $user_name="";
    session_start();
    include('include/connection.php');
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
    <title>Chat App Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://naxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- my css file link     -->
    <link href="css/home.css" rel="stylesheet">
</head>
<body>

    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <center><a href="include/find_friends.php"> <button class="btn-default search-icon btn" name="search_user" type="submit">User Details</button> </a></center>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php include('include/get_users_data.php');?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!-- getting the user information whoe are loged in -->
                    <?php 
                        $user=$_SESSION['user_email'];
                        $get_user="select * from users where user_email='$user'";
                        $run_user=mysqli_query($con,$get_user);
                        $row=mysqli_fetch_array($run_user);

                        $user_id=$row['user_id'];
                        $user_name=$row['user_name'];
                     
                        // echo "<script> alert(". $_GET['user_name']. ");</script>";
                        if(isset($_GET['user_name']))
                        {
                            global $con;
                            $get_username=$_GET['user_name'];
                            $get_user="select * from users where user_name='$get_username'";
                            
                            $run_user=mysqli_query($con,$get_user);

                            $row_user=mysqli_fetch_array($run_user);

                            $username=$row_user['user_name'];
                            $user_profile_image=$row_user['user_profile'];
                        
                        }
                    $total_messages="select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";
                    $run_messages=mysqli_query($con,$total_messages);
                    $total=mysqli_num_rows($run_messages);
                    ?>
                    <div class="col-md-12 right-header">
                        <div class="right-header-img">
                            <img src='<?php echo "$user_profile_image";?>' alt="">
                        </div>
                        <div class="right-header-detail">
                            <form action="" method="post">
                                <p> <?php echo $username;?> </p>
                                <span> <?php echo $total;?> messages</span>
                                <button name="logout" class="btn btn-danger">Logout</button>
                            </form>
                            <?php
                                if(isset($_POST['logout']))
                                {
                                    $update_msg=mysqli_query($con,"UPDATE users SET log_in='Offline' WHERE user_name='$user_name'");
                                    session_unset();
                                    session_destroy();
                                    header('Location:signin.php');
                                    exit();
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="scrolling-to-bottom" class="col-md-12 right-header-contentChat">
                        <?php
                            $update_msg=mysqli_query($con,"UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$user_name'");
                            
                            $sel_msg="SELECT * FROM users_chat WHERE (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";
                            
                            $run_msg=mysqli_query($con,$sel_msg);

                            while($row = mysqli_fetch_array($run_msg))
                            {
                                $sender_username=$row['sender_username'];
                                $receiver_username=$row['receiver_username'];
                                $msg_content=$row['msg_content'];
                                $msg_date=$row['msg_date'];
                             ?>
                            <ul>
                                <?php
                                    if($user_name==$sender_username AND $username==$receiver_username)
                                    {
                                        echo "
                                        <li>
                                        <div class='rightside-right-chat'>
                                        <span>
                                        $user_name <small>$msg_date</small>
                                        </span> <br><br>
                                        <p> $msg_content</p>
                                        </div>
                                        </li>";
                                    }
                                    
                                    else if($user_name==$receiver_username AND $username==$sender_username)
                                    {
                                        echo "
                                        <li>
                                        <div class='rightside-left-chat'>
                                            <span>
                                            $username <small>$msg_date</small>
                                            </span><br><br>
                                            <p> $msg_content</p>
                                        </div>
                                        </li>";
                                    }
                                    
                                    ?>
                            </ul>
                            <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 right-chat-textbox">
                        <form action="" method="post">
                             <input type="text" autocomplete="off" name="msg_content" placeholder="Write your message.....">
                             <button class="btn" name="submit"> <i class="fa fa-telegram" aria-hidden="true"></i> Send</button>
                        </form>
                    </div>

                </div>

            </div>  
        </div>


    </div>
    
    <?php
        if(isset($_POST['submit']))
        {
            $msg=htmlentities($_POST['msg_content']);
            if($msg=="")
            {
                echo "
                <div class='alert alert-danger'>
                    <strong>
                        <center>Message was unable to send</center>
                    </strong>
                </div>";
            }
            else if(strlen($msg)>100)
            {
                echo "
                <div class='alert alert-danger'>
                    <strong>
                        <center>Message is too long. Use only 100 characters</center>
                    </strong>
                </div>";

            }
            else
            {
                $insert = "INSERT INTO users_chat(sender_username,receiver_username,msg_content,msg_status,msg_date) VALUES('$user_name','$username','$msg','unread', NOW());";
                $run_insert = mysqli_query($con,$insert);
                header("Refresh:0");

            }
            
            // $name=$_SESSION['user_name'];
            // echo "<script> 
            // window.open('home.php?user_name='" . $name ."'','_self');
            // </script>";
        }
    } 
    ob_end_flush();
     
     ?>

    <script>
        $('#scrolling_to_bottom').animate(
            {scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight},1000);
    </script>
    <script>
        $(document).ready(function(){
            var height = $(window).height();
            $('.left-chat').css('height',(height-163)+'px');
            $('.right-header-contentChat').css('height',(height-163)+'px');

        });
    </script>

</body>
</html>