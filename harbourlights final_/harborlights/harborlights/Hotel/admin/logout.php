<?php
session_start();
unset($_SESSION["usname"]);
header("location:../../index.php");
?>