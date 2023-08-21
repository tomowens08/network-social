<?php
ob_start("ob_gzhandler");

session_start();

if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<p align='center'>

<table width='100%'>
<tr>
<td width='20%'>
<?php
    include("includes/right_menu.php");
?>
</td>


<td width='80%' valign='top'>
<table width='100%' align='center' cellspacing='0' cellpadding='4' class='dark_b_border2'>
<tr><td colspan='2' class='dark_blue_white2'>
Change Email
</td>
</tr>

<?php
  $current_email=addslashes($HTTP_POST_VARS["current_email"]);
  $new_email=addslashes($HTTP_POST_VARS["new_email"]);
  if($current_email==Null||$new_email==Null)
  {
?>
<tr>
<td width='100%' colspan='2' class='err_class'>
Err # You did not enter your current and new email.
</td>
</tr>
<?php
  }
  else
  {

      $sql="select member_email from members where member_id = $_SESSION[member_id]";
      $res=mysql_query($sql);
      $data_set=mysql_fetch_array($res);
      if($data_set["member_email"]!=$current_email)
      {
?>
<tr>
<td width='100%' colspan='2' class='err_class'>
Err # The current email you entered does not match with our records..
</td>
</tr>
<?php
      }
      else
      {
          $sql="select member_email from members where member_email like '$new_email'";
          $res=mysql_query($sql);
          $num_rows=mysql_num_rows($res);
          if($num_rows==1)
          {
?>
<tr>
<td width='100%' colspan='2' class='err_class'>
Err # The new email address you entered already has a separate account with us.
</td>
</tr>
<?php
          }
          else
          {

          $sql="update members set member_email = '$new_email' where member_id = $_SESSION[member_id]";
          $res=mysql_query($sql);
          if($res)
          {
?>
<tr>
<td width='100%' colspan='2' class='txt_label'>
Your email has been changed.
</td>
</tr>
<?php
          }
          else
          {
?>
<tr>
<td width='100%' colspan='2' class='err_class'>
Err # There was a mysql erorr and email could not be changed at this time, please try again later.
</td>
</tr>
<?php
          }
         }
      }
  }
?>

</td></tr>

</table>
</td></tr>
</table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
