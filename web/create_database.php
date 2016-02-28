<?php
require('config.php');
$link = mysqli_connect($DB['host'], $DB['user'], $DB['pass'], $DB['db']);
mysqli_query($link, "CREATE TABLE stack(id int NOT NULL AUTO_INCREMENT PRIMARY KEY, `key` varchar(30), value varchar(255) );");
?>
