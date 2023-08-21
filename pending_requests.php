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
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Friends who have contacted you!</h3></td></tr>";

  if (!count($approve_ids))
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>There are no new invites for you yet.</p></td></tr>";
  }
    else
  {
	
		foreach ($approve_ids as $approve_id)
    {
        $sql="select * from members where member_id = ".$approve_id;
        $result2=mysql_query($sql);
        $num_rows=mysql_num_rows($result2);
        $RSUser2=mysql_fetch_array($result2);

      if ($num_rows!=0)
      {
        print "<tr><td width='100%' colspan='2' class='login'>";
        print "<table width='100%'>";
        print "<tr><td width='20%' valign='top'>";

        $sql="select * from photos where member_id = ".$RSUser2["member_id"];
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
        print "<tr><td width='100%' class='login'>".$RSUser2["member_name"]." Last Login : ".$RSUser2["last_login"]."</td></tr>";
        print "<tr><td width='100%' class='login'><a href='view_profile.php?member_id=".$RSUser2["member_id"]."'>View Profile</a></td></tr>";
        print "</table>";
        print "</td>";

        print "<td width='20%' valign='top'>";

        print "<table width='100%'>";
        print "<tr><td width='100%' class='login'><a href='approve_friend.php?friend_id=".$RSUser2["member_id"]."'>Approve</a></td></tr>";
        print "<tr><td width='100%' class='login'><a href='delete_friend.php?friend_id=".$approve_id."'>Delete</a></td></tr>";
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
