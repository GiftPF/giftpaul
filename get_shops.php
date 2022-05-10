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
$location_name = mysqli_real_escape_string($link, $_REQUEST['location']);

//Insert shop location
$sql = "SELECT * FROM shop_locations WHERE shop_location = '$location_name';";

$result = $link->query($sql);

if($result -> num_rows >0){
	if(mysqli_num_rows($result) > 0){
		//echo "id&#9;Shop nameLocation<br>"; 	
    	while($row = mysqli_fetch_array($result)){
			echo "\n".$row['shop_id']. " " . $row['shop_name']. " " . $row['shop_location'];
        }
	}
	else{
		echo "no shops under this area or this area does not exist";
	}
} else{
	echo "ERROR: ". $sql. " " . mysqli_error($link);
}
 
//Close connection
mysqli_close($link);

?>