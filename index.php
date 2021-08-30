<?php
session_start();
setcookie("packet", "", time() - 3600);
require "db.php";
$emptyLogin = 0;
$emptyPass = 0;

if (isset($_POST['login'])){
         if (strlen($_POST['login']) <1){
             $emptyLogin = 1;
         }

        if (strlen($_POST['pass']) <1){
            $emptyPass = 1;

        }

    if (!$emptyLogin || !$emptyPass){
            $login = $_POST['login'];
            $passEntry = $_POST['pass'];
            $query = "SELECT * from users WHERE user = '$login' ";
            $reslut = mysqli_query($db, $query);
            $row = $reslut->fetch_assoc();
            if ($row){
                $user = $row['user'];
                $pass = $row['pass'];

                if (password_verify($passEntry, $pass)) {

                    $_SESSION['login'] = $user;

                  header('location: settings.php');

                    } else {echo "pass is wrong";}

                } else {
                echo "no such user in database";}

        }
}

?>


<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="icon" href="images/brain.png">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
          rel="stylesheet">
    <title>Memory</title>
</head>
<body>
<form action="" class="login-form" method="post">

    <h1>Login</h1>

    <div class="textb">

        <input type="text" name="login">
        <span data-placeholder="Username"></span>

    </div>    <?php if ($emptyLogin) {echo "<p class='emptyPass'>emptyLogin</p>";
        $emptyLogin = 0;}?>

    <div class="textb">


        <input type="password" name="pass" id="pass">


        <span data-placeholder="Password"></span>
        <p class="material-icons" id="eyePass">visibility_off</p>
<!--            <p class="material-icons-sharp" id="eyePass">visibility_off</p>-->

    </div>
    <?php if ($emptyPass) {echo "<p class='emptyPass'>emptyPass</p>";
    $emptyPass =0;}?>
    <input type="submit" class="logbtn" value="Login">

    <div class="bottom-text">
        Don't have a account? <a href="register.php">Sign Up</a>

    </div>

</form>


<script type="text/javascript" src="login.js">



</script>
</body>
</html>