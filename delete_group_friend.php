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
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->
<?php
    include("includes/class.class.php");
    include("includes/people.class.php");

    $class=new classified;
    $people=new people;
?>

<!-- Classified Entry -->

<table width="720" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/right_menu.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='style9'>
<font size="2"><b>Groups<br>Delete Friend</b></font>
</td>
<td class='style9' align="right" valign="bottom">
<a href="groups.php">Back to Groups&gt;&gt;</a>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<?php
     $id=$HTTP_GET_VARS["id"];
     $sql="delete from invitations where id = $id";
     $res=mysql_query($sql);
     
         if($res==1)
         {
?>

<tr>
<td class='style9'>
    Your friend has been deleted.
</td>
</tr>
<tr>
<td class='style9'>
    <a href='groups.php'>Return to groups</a>
</td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td class='style9'>
    There was an error and the friend was not deleted at this time. Please try again later.
</td>
</tr>
<tr>
<td class='style9'>
    <a href='groups.php'>Return to groups</a>
</td>
</tr>
<?php
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
</TR>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
