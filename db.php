<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "memory";

$db = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
mysqli_set_charset($db,"utf8");

