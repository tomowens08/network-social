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
//include("includes/right.php");
include("classes/forum.class.php");
$forum=new forum;
$post_id=addslashes($HTTP_GET_VARS["post_id"]);
$post_set=$forum->get_post($post_id);
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<table border="0" cellspacing="0" cellpadding="0" width="800" height="100%" bordercolor="000000" bgcolor="ffffff">
<tr>
<td valign="top">
<table border="0" cellpadding="5" cellspacing="0" width="100%" bgcolor="ffffff">
<tr>
<td colspan="2" class='txt_label'>Message Board: Edit Post</td>
</tr>
<tr><td align="center">
<form method="post" action='edit_topic_action.php?main_cat=<?=$HTTP_GET_VARS["main_cat"]?>&sub_cat=<?=$HTTP_GET_VARS["sub_cat"]?>&post_id=<?=$HTTP_GET_VARS["post_id"]?>'>
<table border="0" cellspacing="1" cellpadding="5"  bgcolor="6699cc">
<tr><td bgcolor="EFF3FF" nowrap colspan="2" class='txt_label'><b>Enter Your New Topic</b></td></tr>
<tr><td bgcolor="ffffff" class='txt_label'><b>Subject:&nbsp;</b></td>
<td bgcolor="ffffff"><input type="text" name="subject" size="80" maxlength="255" value="<?=$post_set["subject"]?>"></td></tr>
<tr><td bgcolor="ffffff" valign="top" class='txt_label'><b>Body:&nbsp;</b></td><td bgcolor="ffffff">
<textarea name="body" rows="10" cols="80"><?=$post_set["message"]?></textarea></td></tr>
</table>
</td></tr>
<tr><td bgcolor="ffffff" colspan="2" align="center">
<input type="submit" value='Edit Topic' name='submit'>&nbsp;&nbsp;
</td></tr>
</form>
</table>
</td>
</tr>
</table>

</div>

<!-- middle_content -->
</td>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
