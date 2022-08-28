<?php
$dbHost="localhost";
$dbUesr="root";
$dbPass="";
$dbName="islam";
try{
    $conn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUesr,$dbPass);
    echo"success";
}catch(Exception $e){
    echo $e->getMessage();

    exit();
}
