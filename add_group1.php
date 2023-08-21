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

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='80%' align='center' cellpadding='4' class='dark_b_border2' style='border-collapse: collapse' bordercolor='#000000'>";

   include("includes/people.class.php");
   $people=new people;
   $name=$people->get_name($HTTP_GET_VARS["member_id"]);

     include("includes/class.groups.php");
     $group=new groups;


  print "<tr><td colspan='2' class='dark_blue_white2'><b><p align='center'>";
  print "<span class='style18'>Add $name to Group</span></b></p></td></tr>";

  $member_id1=$HTTP_GET_VARS["member_id"];
  $group_id=$HTTP_POST_VARS["group_id"];
  $res = $group -> add_to_group($group_id,$member_id1);
  
	$sql = "SELECT notif_group_invitation FROM members WHERE member_id = '".$member_id1."'";
	$mem = mysql_fetch_array(mysql_query($sql));
	
  print "<tr>";
  print "<td width='100%' class='txt_label'>";
  if($res==1 && $mem['notif_group_invitation'])
  {
	/*
   $name = $people -> get_name($member_id1);
   $email = $people -> get_email($member_id1);
   $creator_name = $people -> get_name($_SESSION["member_id"]);
   $creator_email = $people -> get_email($_SESSION["member_id"]);
   
   include("classes/emails.class.php");
   $emails=new emails;
   $res=$emails -> send_group_add_notification($member_id,$creator_name,$creator_email,$name,$email,$site_url,$site_name,$from_name,$from_email);
	*/
		include_once 'includes/people.class.php';
		$people = new people;
		$people->notification('group_invitation',$member_id1,' ',$site_name,$site_url,$email_name,$site_email,array('group_id'=>$group_id));

    print "$name has been invited to your group.<br>";
    print "<a href='view_profile.php?member_id=$member_id1'>Back to Profile</a>";
  }
  else
  {
    print "There was an error and the friend was not added to the group yet.<br>";
    print "<a href='view_profile.php?member_id=$member_id1'>Back to Profile</a>";
  }
  print "</td></tr>";


  print "</form>";

  print "</td></tr></table>";

  print "</table>";
  print "</td>";
  print "</tr>";

//  print "</td></tr></table>";
?>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
