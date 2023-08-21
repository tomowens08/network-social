<?php
@session_start();
if ($_SESSION['member_id']) {

	header('Location: logincomplete.php');
	exit;
}
include("includes/top.php");
include("includes/nav2.php");
include("includes/conn.php");
//include("includes/right.php");
?>
