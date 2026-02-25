<?php
$conn = new mysqli("localhost","root","","sql_attendance_system");
if($conn->connect_error){ die("Connection failed: ".$conn->connect_error); }
?>