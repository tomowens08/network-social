<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
	
	if ($_POST['go']) {
		$sql = "INSERT INTO forum_sub_cat SET
						cat_name = '".addslashes($_POST['cat_name'])."',
						cat_desc = '".addslashes($_POST['cat_desc'])."',
						main_cat_id = '".$_POST['main_cat']."',
						creator_id = '".$_SESSION['member_id']."',
						creator_ip = '".$_SERVER['REMOTE_ADDR']."',
						date_created = '".time()."'";
		mysql_query($sql);
		echo '<script>document.location.replace(\'view_forum.php?main_cat='.$_POST[main_cat].'\')</script>';
		exit;
	}
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<table border="0" cellspacing="0" cellpadding="0" width="800" height="100%" bordercolor="000000" bgcolor="ffffff" align="center">
<tr>
<td valign="top" align="center">
<?php
     include("classes/forum.class.php");
     $forum=new forum;
     $main_forum_set=$forum->get_main_cat($HTTP_GET_VARS["main_cat"]);
?>
<table border="0" cellpadding="5" cellspacing="0" align="center" bgcolor="ffffff">
<tr>
<td colspan="2" class='txt_label'><b><a href='message_board.php'><?=$site_name?> Forum's</a> >> <a href="view_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>"><?=$main_forum_set["cat_name"]?></a></b></td>
</tr>
<tr><td align="center">
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
<input type="hidden" name="main_cat" value="<?=$HTTP_GET_VARS["main_cat"]?>">
<table border="0" cellspacing="1" cellpadding="5"  bgcolor="6699cc">
<tr><td bgcolor="EFF3FF" nowrap colspan="2" class='txt_label'><b>Add Sub Category</b></td></tr>
<tr><td bgcolor="ffffff" valign="top" class='txt_label'><b>Name:&nbsp;</b></td><td bgcolor="ffffff">
<input type="text" name="cat_name" size="40" maxlength="250"></td></tr>
<tr><td bgcolor="ffffff" valign="top" class='txt_label'><b>Description:&nbsp;</b></td><td bgcolor="ffffff">
<textarea cols="40" rows="8" name="cat_desc"></textarea></td></tr>
</table>
</td></tr>
<tr><td bgcolor="ffffff" colspan="2" align="center">
<input type="submit" value='Add Sub Category' name='go'>&nbsp;&nbsp;<input type="Button" value="Cancel" onclick="document.location.replace('view_forum.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>')">
</td></tr>
</form>
</table>

</td>
</tr>
</table>


<!-- middle_content -->
</td>


<!-- Middle Text -->
<?php
include("includes/bottom3.php");
}
?>