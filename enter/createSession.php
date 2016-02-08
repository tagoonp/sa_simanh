<?php
session_start();
$_SESSION['userSIMANHmother_record'] = $_GET['id'];
session_write_close();

header('Location: ./main.php?id='.$_GET['mid'].'&com='.$_GET['com']);
exit();
?>