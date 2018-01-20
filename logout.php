<?php
session_start();
$id=$_SESSION['id'];
session_start();
session_unset();
session_destroy();
header("location: index.php");
?>