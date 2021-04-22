<?php
session_start();

if (isset($_COOKIE['valid'])){
//    echo 'dupa';
    setcookie('valid','',time()- 3600);
    $username =  $_POST['username'];
    $email =  $_POST['email'];
    $pass = $_POST['pass2'];

    include 'db.php';

    $queryCheckUser ="SELECT * from users WHERE user = '$username' ";
    $result = mysqli_query($db, $queryCheckUser);
    $row = $result->fetch_all();
    if ($row){$UserExist = "Już istnieje taki użytkownik w bazie";}

    $queryCheckMail ="SELECT * from users WHERE mail = '$email' ";
    $result = mysqli_query($db, $queryCheckMail);
    $row = $result->fetch_all();

    if ($row){$MailExist = "Już istnieje taki email w bazie";}

    if (isset($UserExist) || isset($MailExist)) {
        echo "Validacja NIE OK";
    }

    else {
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

        $queryInsert = "INSERT INTO users (user, mail , pass) VALUES ('$username', '$email', '$pass_hash')";
        $result = mysqli_query($db, $queryInsert);

    header('location: index.php');

    }

} else {
    echo "Not Valid";
    }

?>

!<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Memory Register</title>

</head>
<body>
<div class="container">



        <form action="" class="register-form" id="register-form" method="post" name="register-form">
            <div class="header">
            <h2>Create Account</h2>
            </div>

<!--      Username input-->
            <div class="form-control">
                <label>UserName</label>
                <input type="text" placeholder="Username" id="username" name="username" value="<?php if (isset($username)) {echo $username;}?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
                <?php if (isset($UserExist)){ echo "<h4 style='color: red'>User allready Exists</h4>";
                unset($UserExist);}
                ?>
            </div>

<!--            email input-->
            <div class="form-control">
                <label>Email</label>
                <input type="email" placeholder="user@domain.com" id="email" name="email" value="<?php if (isset($email)) {echo $email;}?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
                <?php if (isset($MailExist)){ echo "<h4 style='color: red'>Mail already Exists</h4>";
                    unset($MailExist);}
                ?>

            </div>

<!--            pass first input-->

            <div class="form-control">
                <label>Password</label>
                <input type="password" placeholder="Enter Pass" id="password" name="pass1">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>

            </div>

<!--            pass secound input-->
            <div class="form-control">
                <label>Password Check</label>
                <input type="password" placeholder="Repeat pass" id="password2" name="pass2">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>

            </div>
<!--        <button>Submit</button>-->
            <input type="submit" value="Submit">
        </form>


</div>


<script type="text/javascript" src="script.js">




</script>
</body>
</html>
