<?php

//in another php file, get a handle to the results of mysqli_connect. 
//In this case, it's literally named $dbhandle (see below).
require 'defaultConnector.php';

$qq = "SELECT * FROM connTime ORDER BY Id desc";
    

$result = mysqli_query($dbhandle, $qq);

$output = array();

//fetch tha data from the database
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


    array_push($output, array($row['id'], date_format(date_create($row['time']),"m/d/Y h:i:s A"), $row['location']));

}

echo json_encode($output);

?>

