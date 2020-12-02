<?php

//in another php file, get a handle to the results of mysqli_connect. 
//In this case, it's literally named $dbhandle (see below).
require 'defaultConnector.php';


$gets = json_decode(file_get_contents('php://input'), true);

//var_dump($gets);

$text = html_entity_decode($gets['name']);
$text = $msqli->real_escape_string($text);

$qq = "INSERT INTO connTime(`time`, `location`) VALUES ('".gmdate('Y-m-d H:i:s')."', '".$text."')";

    

$result = mysqli_query($dbhandle, $qq);

//var_dump($result);
?>

