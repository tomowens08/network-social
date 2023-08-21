<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{

?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<?php
    include("classes/videos.class.php");
    include("includes/people.class.php");

    $videos=new videos;
    $people=new people;
?>

<!-- Classified Entry -->

<table height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/video_side.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'>
<font size="2"><b>Videos<br>Post Comment</b></font>
</td>
<td class='txt_label' align="right" valign="bottom">
<a href="videos.php">Back to Videos &gt;&gt;</a>
</td>
</tr>
</table>

<form name='AddListing' action='post_video_comment1.php?id=<?=$HTTP_GET_VARS["id"]?>' method='post'>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="C5D8EB">


<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Rate:</td>
<td width="86%" class='txt_label'>
<?php
$sr_no=1;
while($sr_no!=10)
{
if($HTTP_GET_VARS["rating"]==$sr_no)
{
?>
<input type='radio' name='rate' value='<?=$sr_no?>' checked>&nbsp;<?=$sr_no?>&nbsp;
<?php
}
else
{
?>
<input type='radio' name='rate' value='<?=$sr_no?>'>&nbsp;<?=$sr_no?>&nbsp;
<?php
}
?>
<?php
$sr_no=$sr_no+1;
}
?>

</td>
</tr>


<tr valign="middle" bgcolor="ffffff">
<td width="14%" class='txt_label' valign='top'>Comment:</td>
<td width="86%">
<textarea name="comment" rows="5" cols="50" class="verdana12">
</textarea>
</span>
</td>
</tr>



</table>
<br>
<input type="submit" name="submit" value="- Post My Comment -"><br>
</td>
</tr>
</form>
</table>

<!-- End -->
<!-- middle_content -->

<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
