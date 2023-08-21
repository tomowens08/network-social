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
      $login_name=$login_name."@msn.com";
      
     global $file_name;
     include("includes/config.php");
     include("classes/hotmail.class.php");
     $hotmail=new hotmail_imports;

     $hotmail->passport=$login_name;
     $hotmail->password=$password;
     $hotmail->Grab();

     if($hotmail->list['Foward']==Null)
     {
      print "<tr>";
      print "<td width='100%' colspan='2' class='txt_label'>";
      print "<p align='center'><b>Invalid Login, Could not login to MSN.</b></p>";
      print "</td></tr>";
     }
     else
     {
       $sr_no=1;
       $sess_id=session_id();
      foreach ($hotmail->list['Foward'] as $email => $v)
      {
         $sr_no=$sr_no+1;

         $sql="select count(*) as a from address_book where member_id = $member_id and email like '$email'";
         $res=mysql_query($sql);
         $data_set=mysql_fetch_array($res);

         if($num_set==0)
         {
          $sql="insert into address_book";
          $sql.="(member_id, ";
          $sql.=" name, ";
          $sql.=" email)";
          $sql.="values ($_SESSION[member_id],";
          $sql.=" '$email',";
          $sql.=" '$email')";
          $result=mysql_query($sql);
          print mysql_error();
         }

      }
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
