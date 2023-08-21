<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
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

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_import.php");
  print "</td>";

?>
<td width='80%' valign='top'>
<table width='100%' cellpadding='0' cellspacing='0'>
<tr>
<td class='style9' valign='top'>

<?php

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='70%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<b><p align='center'>Import Address Book From Yahoo</b></p></td></tr>";

  $login_name=$HTTP_POST_VARS["login_name"];
  $password=$HTTP_POST_VARS["password"];

  if($login_name==Null||$password==Null)
  {
   print "<tr>";
   print "<td width='100%' colspan='2' class='txt_label'>";
   print "<p align='center'><b>You did not enter your email login and password.</b></p>";
   print "</td></tr>";
  }
  else
  {
     global $file_name;
     global $file_path;
     include("includes/config.php");
     include("classes/gmail.class.php");
     $gmail=new gmail_import();

     $login=$HTTP_POST_VARS["login_name"];
     $password=$HTTP_POST_VARS["password"];
     $login=$login."@gmail.com";

     $res=$gmail->login($login,$password,$file_location);
     if($res=="invalid login")
     {
      print "<tr>";
      print "<td width='100%' colspan='2' class='txt_label'>";
      print "<p align='center'><b>Invalid Login, could not login to GMail.</b></p>";
      print "</td></tr>";
     }
     else
     {
         $sess_id=session_id();
         print "Sucessfully Logged into gmail";
         //print $res;
         $emails=array();
         $emails[]=$gmail->get_emails($res,$file_location,$site_url,$sess_id,$_SESSION["member_id"]);

         // display all emails
         //$gmail->display_emails($sess_id);

      print "<tr>";
      print "<td width='100%' colspan='2' class='txt_label'>";
      print "<p align='center'><b>Address Book Successfully Imported.</b></p>";
      print "</td></tr>";
     }
  }


  print "</table>";
  print "</p></td></tr>";


  print "</table>";
  print "</td>";
  print "</tr></table>";

?>

</td>
</tr>
<!-- middle_content -->
</blockquote>


<?php
print "</td>";
?>
</tr>
</table>
<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
