<?php
$host="localhost";
$user="root";
$password="";
$db="scolarite1";
try
{
    
    $idcon = new PDO("mysql:host=$host;dbname=$db",$user,$password);
    $idcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo("ERReur :".$e->getMessage());exit();
}
?>