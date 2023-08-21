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
		$sql = "SELECT member_id FROM groups WHERE id = '".$_GET['group_id']."'";
		$res = mysql_fetch_array(mysql_query($sql));
		if ($res['member_id'] != $_SESSION['member_id'])
			die('You are not a moderator of this group');
		
	  $group_id=$HTTP_GET_VARS["group_id"];

     include("includes/class.groups.php");
     $group=new groups;

     include("includes/people.class.php");

     $people=new people;


     $group_name=$group->get_group_name($group_id);


  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%'>";
//    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
?>
<tr valign="top">
<td class='dark_blue_white2'>Members...
<?php
     $num_members=$group->get_group_members($group_id);
     $num_members=$num_members+1;
?>

&nbsp;&nbsp;&nbsp;(<?=$num_members?>)&nbsp;&nbsp;</td>
</tr>
<?php
  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'><p align='left'>";
  print "<table width='100%'>";

  print "</table>";
  print "</p></td></tr>";

?>

<table width="800" cellspacing="0" cellpadding="2" border="0" bgcolor="6699cc">
<tr valign="top">
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="FFFFFF">
<tr valign="top">
<td height="117">
<table width="100%" border="0" cellspacing="0" cellpadding="7" bgcolor="6699cc">
</table>

<table border="0" cellpadding="5" cellspacing="2" width="100%">
<tr>
<td align="center">
<tr vAlign=top align=middle>
<td width="20%">
<?php
         $creator=$group->get_member_id($group_id);

     $num_images=$people->get_num_images($creator);
     if($num_images==0)
     {
         $image="<IMG alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($creator);
         $image="<IMG alt='' src='$image_url' width=90 border=0>";
     }

     $leader_name=$people->get_name($creator);
?>
<a href="view_profile.php?member_id=<?=$creator?>"><?=$leader_name?></a><br><img height=3 src="images/1by1.gif" width=75><br>
<a href="view_profile.php?member_id=<?=$creator?>">
<?=$image?></a><br>
<div class=DataPoint=OnlineNow;UserID=4885511; id=UserDataNode0 style="WIDTH: 80px; HEIGHT: 20px"></div></td>
<?php
     $sr_no=1;
     $sql="select * from invitations where group_id = $HTTP_GET_VARS[group_id] AND status = 1 GROUP BY member_id ORDER BY date DESC";
     $res=mysql_query($sql);
     while($data_set=mysql_fetch_array($res))
     {

     $num_images=$people->get_num_images($data_set["member_id"]);
     if($num_images==0)
     {
         $image="<IMG alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($data_set["member_id"]);
         $image="<IMG alt='' src='$image_url' width=90 border=0>";
     }
     $leader_name=$people->get_name($data_set["member_id"]);

         if($sr_no%5==0)
         {
             print "</tr><tr>";
         }
?>

<td width="20%">
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>"><?=$leader_name?></a><br>
<img height=3 src="images/1by1.gif" width=75><br>
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$image?></a><br>
[<a href='delete_group_friend.php?id=<?=$data_set["id"]?>'>Delete Friend</a>]
</td>
<?php
       $sr_no=$sr_no+1;
     }
?>
</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
<br>
<div align='center'>
<a href='view_group.php?group_id=<?=$HTTP_GET_VARS["group_id"]?>'>Back to Group</a>
</div>

<?php


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
