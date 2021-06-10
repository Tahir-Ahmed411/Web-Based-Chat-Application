<!DOCTYPE html>
<?php
    session_start();
    include('find_friends_function.php');
    include('connection.php');
    if(!isset($_SESSION['user_email']))
    {
        header('Location:signin.php');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for Friends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://naxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- my css file link     -->
    <link href="../css/find_people.css" rel="stylesheet">
</head>
  
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a href="#" class="nabbar-brand">
            <?php
                $user=$_SESSION['user_email'];
                $get_user="SELECT * FROM users where user_email='$user'";
                $run_user=mysqli_query($con,$get_user);
                $row = mysqli_fetch_array($run_user);
                
                $user_name=$row['user_name'];
                echo "<a class='navbar-brand' href='../home.php?user_name=$user_name'>My Chat</a>";
            ?>
        </a>
        <ul class="navbar-nav">
            <li>
                <a style="color:white; text-decoration:none; font-size:20px;" href="../account_settings.php">Account Settings</a>
            </li>
        </ul>
    </nav> <br>
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form class="search_form" action="" >
                <input type="text" name="search_query" placeholder="Search Friends" autocomplete="off" required>
                <button class="btn" type="submit" name="search_btn">Search</button>
            </form>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    <br><br>
    <?php search_user();?>
</body>
</html>