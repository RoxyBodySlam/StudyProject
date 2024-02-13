<?php
 
$hostname_inv = "127.0.0.1";
$database_inv = "dosprj";         
$username_inv = "root";  
$password_inv = "1234"; 

$conn = mysql_connect($hostname_inv, $username_inv, $password_inv) or trigger_error(mysql_error(),E_USER_ERROR); 

 mysql_select_db("dosprjdb") or die(mysql_error());
 mysql_query("SET character_set_results=utf8");
 mysql_query("SET character_set_client=utf8");
 mysql_query("SET character_set_connection=utf8"); 
 
?>



