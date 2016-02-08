<?php
session_start();
include "../../../lib/server-config.php";

require("../../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

print $_POST['ent_date'];
?>