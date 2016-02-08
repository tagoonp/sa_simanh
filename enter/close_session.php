<?php
session_start();
unset($_SESSION['userSIMANHmother_record']);
header('Location: ../login/checkUser.php');
?>