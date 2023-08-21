<?php
  session_start();
?>
<?php
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
    include("includes/class.class.php");
    include("includes/people.class.php");

    $class=new classified;
    $people=new people;
?>

<!-- Classified Entry -->

<table width="830" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/class_side.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='login'>
<font size="2"><b>Classifieds<br>Create Listing</b></font>
</td>
<td class='style9' align="right" valign="bottom">
<a href="classified.php">Back to Classifieds &gt;&gt;</a>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<?php
     $cat_id=$HTTP_POST_VARS["cat_id"];
     $sub_cat_id=$HTTP_POST_VARS["sub_cat_id"];
     $subject=$HTTP_POST_VARS["subject"];
     $message=$HTTP_POST_VARS["message"];
     if($cat_id==Null||$sub_cat_id==Null||$subject==Null||$message==Null)
     {
?>
<tr>
<td class='style9'>
    You did not enter all the required fields.
</td>
</tr>

<?php
     }
     else
     {
         $res=$class->add_ad($_SESSION["member_id"],$cat_id,$sub_cat_id,$subject,$message);
         if($res==1)
         {
?>

<tr>
<td class='style9'>
    Your classified has been posted.
</td>
</tr>
<tr>
<td class='style9'>
    <a href='classified.php'>Return to classified</a>
</td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td class='style9'>
    There was an error and the classified was not posted at this time. Please try again later.
</td>
</tr>
<tr>
<td class='style9'>
    <a href='classified.php'>Return to classified</a>
</td>
</tr>
<?php
         }
   }
?>

</table>

<!-- End -->
<!-- middle_content -->
</blockquote>
</TD>

</TR>
</TBODY>
</TABLE></TD>



<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
