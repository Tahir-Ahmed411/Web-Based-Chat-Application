<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!-- my css     -->
    <link href="css/signin.css" rel="stylesheet"> 
</head>
<body>
    <div class="signin-form">
        <form action="" method="post">

            <div class="form-header">
                <h2>Sign in</h2>
                <p>Login to Chat App</p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="example@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Password" autocomplete="off" required>
            </div>
            <!-- <div class="small">Forgot Password! <a href="forgot_pass.php">Click Here.</a></div> -->
            <div class="form-group">
                <button type="submit" style="margin-top: 15px;" class="btn btn-primary btn-lg btn-block" name="sign_in">Sign in</button>
            </div>
            <?php include("signin_user.php");?> 
            <div class="text-center small" style="color:#67428B;">Don't have an Account <a href="signup.php">Create one</a></div>
        </form>
    </div>
</body>
</html>