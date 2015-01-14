<?php

	$conn = new mysqli("mysql.hostinger.com.br", "u175477054_root", "Riletho", "u175477054_shari");

            $art_id = $_GET['id'];
            $sid = $_GET['sid'];
            if(empty($sid)){
            	$sid = "0";
            }

            $query = "SELECT * FROM donate WHERE sid = '$sid' AND arte_id IS NULL ";
            $run = $conn->query($query);
            $n = $run->num_rows;

            if($n >= 1){
            	$query2 = "UPDATE donate SET arte_id='$art_id' WHERE sid='$sid'";
            	$run2 = $conn->query($query2);
            }
            else{
            	echo "<center><h3><font color='red'>Please, don't refresh this page.</font></h3></center>";
            }

            require_once("templates/success.php");