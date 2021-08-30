<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "memory";

$db = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
mysqli_set_charset($db,"utf8");

CLASS CONNECTPDO {
private $con;
private $host = "localhost";
private $user = "root";
private $pass = "";
private $name = "memory";
private $char = "utf8";

public function __construct()
    {
        $dsn = "mysql::host=".$this->host."dbname=".$this->name."charset=".$this->char;
        try{$this->con = new PDO($dsn,$this->user,$this->pass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }
        catch (PDOException $e) {
            echo "ERROR: ".$e->getMessage();
        }
    }

    public function reID ($dbname){
        echo "ok";
    }


}
