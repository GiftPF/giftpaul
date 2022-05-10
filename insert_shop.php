<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "locations_db";

/*server connection*/
$link = mysqli_connect($hostname, $username, $password, $dbname);
 
//Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
//get query parameters
$shop_name = mysqli_real_escape_string($link, $_REQUEST['shop']);
$location_name = mysqli_real_escape_string($link, $_REQUEST['location']);

//Insert shop location
$sql = "INSERT INTO shop_locations (shop_name, shop_location) VALUES ('$shop_name', '$location_name')";

if(mysqli_query($link, $sql)){
    echo "success";
} else{
    echo "ERROR: ". $sql. " " . mysqli_error($link);
}
 
//Close connection
mysqli_close($link);

?>