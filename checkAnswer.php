<?php
session_start();
$answer = $_POST['answer'];
$pl = $_SESSION['pl'];
$en = $_SESSION['en'];

//$score = $_SESSION['score'];
if ($answer === $pl){

    $_SESSION['score']++;

}
$_SESSION['correctAnswer'] = "$pl === $en";
header("location: quiz.php");
