<?php
$conn =mysqli_connect ('localhost', 'root', '');

$create ="CREATE DATABASE IF NOT EXISTS friendslink";
$result = mysqli_query($conn, $create);

$connect_db = mysqli_select_db($conn, 'friendslink');

?>