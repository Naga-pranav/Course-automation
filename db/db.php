<?php 

$conn = new mysqli('localhost','root','','facinf');
if(!$conn.mysqli_connect_error())
{
    echo "Connection Denied";
}
?>