<?php 
$hn = 'localhost';
$db = 'sas_db';
$un = 'root';
$pw = '';

$con = new mysqli($hn,$un,$pw,$db);
if($con->connect_error){
    die("Fatal Error");
}
?> 