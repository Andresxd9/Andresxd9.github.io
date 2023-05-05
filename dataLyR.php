<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'usuarios';

try{
    /*conn = new PDO("mysql:host=127.0.0.1;dbname=usuarios;charset=utf8","root","");*/
     $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
    
    } catch(PDOException $e){
        die('Connected failed:'.$e->getMessage());
    }
?>
