<?php
 $conn = new mysqli("localhost","root","","wampcrm");
 if($conn->connect_error){
 	die("connection Failed"+$conn->connect_error);
 }
?> 