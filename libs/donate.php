<?php

include "config.php";
include "banco.php";


$query2 = "SELECT * FROM donate";
$run2 = $mysqli->query($query2);
while($f = $run2->fetch_assoc()){
	echo $f['arte_id']."<br>";
}