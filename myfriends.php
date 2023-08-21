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
include("includes/profile.class.php");
$profile=new profile;
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
  print "<h3>Your Friends</h3></td></tr>";

// Paging Technique
  $page = $HTTP_GET_VARS["page"]?$HTTP_GET_VARS["page"]:1;

	$friend_ids = $profile->get_friends($_SESSION['member_id']);
	$num_rows = count($friend_ids);
	
	$rec_per_page = 10;
	
	$start = ($page-1)*$rec_per_page;
	$end = $page*$rec_per_page - 1;
	$i = 0;
	
	
	foreach ($friend_ids as $id => $v) {
		if ($i < $start || $i > $end) {
			unset($friend_ids[$id]);
		}
		$i++;
	}
	
  if ($num_rows==0)
  {
    print "<tr>";
    print "<td width='100%' colspan='2'  class='txt_label'><p align='center'>There are no friends yet.</p></td></tr>";
  }
    else
  {




// Paging Technique

    foreach ($friend_ids as $friend_id)
    {	

        if($friend_id)
        {
				
        $sql="select * from members where member_id = ".$friend_id;
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);

          print "<tr><td width='100%' colspan='2'  class='txt_label'>";

          print "<table width='100%'>";
          print "<tr><td width='20%' valign='top'>";

        $sql="select * from photos where member_id = ".$RSUser2["member_id"];
        $result3=mysql_query($sql);
        $num_rows3=mysql_num_rows($result3);
        $RSUser=mysql_fetch_array($result3);

         if ($num_rows==0)
          {
            print "<img src='images/nophoto.jpg' width='50' height='50'>";
          }
            else
          {

            print "<img src='".$RSUser["photo_url"]."' width='50' height='50'>";
          } 

          print "</td>";

          print "<td width='60%' valign='top'>";

          print "<table width='100%'>";
          print "<tr><td width='100%'  class='txt_label'>".$RSUser2["member_name"]." Last Login : ".$RSUser2["last_login"]."</td></tr>";
          print "<tr><td width='100%'  class='txt_label'><a href='view_profile.php?member_id=".$RSUser2["member_id"]."'>View Profile</a></td></tr>";
          print "</table>";
          print "</td>";

          print "<td width='20%' valign='top'>";

          print "<table width='100%'>";
          print "<tr><td width='100%'  class='txt_label'><a href='delete_friend.php?friend_id=".$friend_id."'>Delete</a></td></tr>";
          print "<tr><td width='100%'  class='txt_label'><a href='forward_friend.php?friend_id=".$friend_id."'>Forward</a></td></tr>";
          print "</table>";

          print "</td>";


          print "</table>";
          print "</td></tr>";
          }

    } 

  } 

  print "</table>";


  print "<table width='100%'>";
  print "<tr><td width='100%' align=\"center\">";

        if ($page-1)
        {
?>
<a href='myfriends.php?page=<?=($page-1)?>'>&lt; Previous</a>
<?
        }
        if ($page*$rec_per_page < $num_rows) {
?>
&nbsp;<a href='myfriends.php?page=<?=($page+1)?>'>Next &gt;</a>
<?php
				}

  print "</td></tr></table>";
// Paging Technique

    print "</td>";
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
