<?php
//connect and check connection
$connection = mysqli_connect("localhost", "root", "", "inventory_management");
if (!$connection) {
    die(mysql_error());
}
//sleect db
mysqli_select_db($connection, "inventory_management");
?>