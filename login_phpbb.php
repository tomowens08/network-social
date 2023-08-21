<?php
session_start();
define("IN_LOGIN", true);
define('IN_PHPBB', true);

// session id check
if (!empty($HTTP_POST_VARS['sid']) || !empty($HTTP_GET_VARS['sid']))
{
	$sid = (!empty($HTTP_POST_VARS['sid'])) ? $HTTP_POST_VARS['sid'] : $HTTP_GET_VARS['sid'];
}
else
{
	$sid = '';
}
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<form name='login' action='forum/login.php' method='post'>
<input type='hidden' name='login' value='<?=$HTTP_GET_VARS["user_name"]?>'>
<input type='hidden' name='password' value='<?=$HTTP_GET_VARS["password"]?>'>
</form>
<script language='JavaScript'>
document.login.submit();
</script>
</body>
</html>
