<?php
$server = "localhost";
$login = "root";
$pwd = "";
try{
    $connexion = new PDO("mysql:host=$server; dbname=sc_immobilier", $login,$pwd);
}
catch(PDOException $e){

}
?>