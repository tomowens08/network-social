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

<p align='center'>
<?

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Groups you are a member of!</h3></td></tr>";


        $sql="select * from invitations where member_id = ".$_SESSION["member_id"]." and status = 1";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows==0)
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>There are no new invites for you yet.</p></td></tr>";
  }
    else
  {

    while($RSUser1=mysql_fetch_array($result1))
    {
        $sql="select * from groups where id = ".$RSUser1["group_id"];
        $result2=mysql_query($sql);
        $num_rows=mysql_num_rows($result2);
        $RSUser2=mysql_fetch_array($result2);

      if ($num_rows!=0)
      {
        print "<tr><td width='100%' colspan='2' class='login'>";
        print "<table width='100%'>";
        print "<tr><td width='20%' valign='top'>";

        $sql="select * from group_photos where group_id = ".$RSUser2["id"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);

        if ($num_rows==0)
        {
          print "<img src='images/nophoto.jpg' width='50' height='50'>";
        }
        else
        {
          print "<img src='$RSUser[photo_url]' width='50' height='50'>";
        }

        print "</td>";

        print "<td width='60%' valign='top'>";

        print "<table width='100%'>";
        print "<tr><td width='100%' class='login'>".$RSUser2["group_name"]."</td></tr>";
        print "<tr><td width='100%' class='login'><a href='view_group.php?group_id=".$RSUser2["id"]."'>View Profile</a></td></tr>";
        print "</table>";
        print "</td>";

        print "<td width='20%' valign='top'>";

        print "<table width='100%'>";
        print "<tr><td width='100%' class='login'><a href='delete_group_invite.php?group_id=".$RSUser1["id"]."'>Delete</a></td></tr>";
        print "</table>";

        print "</td>";


        print "</table>";
        print "</td></tr>";
      }

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
}
?>
