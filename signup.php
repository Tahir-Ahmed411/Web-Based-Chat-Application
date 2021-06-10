<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!-- my css     -->
    <link href="css/signup.css" rel="stylesheet"> 
</head>
<body>
    <div class="signup-form">
        <form action="" method="post">

            <div class="form-header">
                <h2>Sign up</h2>
                <p>Fill Out this form and start chating with your friends.</p>
            </div>
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" class="form-control" name="user_name" placeholder="Example: Tahir" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="user_email" placeholder="example@site.com" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="user_country">Country</label>
                <select class="form-control" name="user_country" required>
                <option disabled selected>Select Country</option>
                <option>Pakistan</option>
                <option>USA</option>
                <option>India</option>
                <option>UK</option>
                <option>Bangladesh</option>
                <option>Dubai</option>
                </select>
            </div>

            <div class="form-group">
                <label for="user_gender">Gender</label>
                <select class="form-control" name="user_gender" required>
                <option disabled selected>Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
                </select>
            </div>

            <div class="form-group">
                <label class="checkbox-inline" for="checkbox"><input type="checkbox" name="checkbox"> I accept the <a href="#">Terms of use
                </a> &amp; <a href="#">Privacy Policy</a> </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="sign_up">Sign up</button>
            </div>
            <?php include("signup_user.php");?> 
            <div class="text-center small" style="color:#67428B;">Already have an Account <a href="signin.php">Sign in here</a></div>
        </form>
    </div>
</body>
</html>