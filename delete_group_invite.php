<?php
  session_start();
?>
<?php
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

<p align='center'>
<?

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Delete a Group Invite</h3></td></tr>";


  print "<tr><td width='100%' colspan='2' class='login'>";

        $sql="delete from group_invites where invite_id = ".$HTTP_GET_VARS["invite_id"];
        $result3=mysql_query($sql);
        $sql="delete from invitations where member_id = ".$_SESSION["member_id"];
        $result3=mysql_query($sql);

        if($result)
        {
                print "<table width='100%'>";
                print "<tr><td width='100%' class='login'><p align='center'><b>The invite has been deleted.</b></p></td></tr>";
                print "<tr><td width='100%' class='login'><p align='center'><a href='past_group_invites.php?page=1'>Back</a></b></p></td></tr>";
                print "</table>";
        }
        else
        {
                print "<table width='100%'>";
                print "<tr><td width='100%' class='login'><p align='center'><b>There was an error!</b></p></td></tr>";
                print "<tr><td width='100%' class='login'><p align='center'><a href='past_group_invites.php?page=1'>Back</a></b></p></td></tr>";
                print "</table>";
        }
}







    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
