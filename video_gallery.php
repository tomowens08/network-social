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

  print "<table width='780'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/video_side.php");
  print "</td>";


        $sql="select * from members where member_id = ".$HTTP_GET_VARS["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Videos of ".$RSUser["member_name"]."&nbsp;".$RSUser["member_lname"]."</h3></td></tr>";



  print "<tr><td colspan='2' class='txt_label'>";
  print "<table cellpadding='4' cellspacing='0'>";

  print "<tr><td colspan='4'>";
   print "<a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to profile >>></a>";
  print "</td></tr>";
  
  include("classes/videos.class.php");
  $videos=new videos;
  
  include("includes/people.class.php");
  $people=new people;

?>
<?php
     $sr_no=1;
     $album_res=$videos->get_member_videos($HTTP_GET_VARS["member_id"]);

     while($album_set=mysql_fetch_array($album_res))
     {
         if($sr_no%4==0)
         {
             print "</tr><tr>";
         }
?>

<td valign="top" width="158" align="center" class='txt_label'>
<a title="Watch this video" href="view_video.php?id=<?=$album_set["id"]?>">
<img src="<?=$album_set["video_thumbnail"]?>" width="100"  border="0">
</a>
<br>
<a  href="view_video.php?id=<?=$front_set["id"]?>">
<strong><?=$album_set["video_title"]?></strong>
</a>
<br><?=$album_set["posted_on"]?>
<?php
     $name=$people->get_name($album_set["member_id"]);
?>
<br> by <a href="view_profile.php?member_id=<?=$album_set["member_id"]?>"><?=$name?></a>
<br>Views: <?=$album_set["views"]?> | Comments:
<?php
     $num_comments=$videos->get_num_comments($album_set["id"]);
?>
<?=$num_comments?>
</td>

<?php
     $sr_no=$sr_no+1;
     }
?>

<?php

  print "<tr><td colspan='4'>";
   print "<a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to profile >>></a>";
  print "</td></tr>";



  print "</table>";
  print "</td>";
  print "</tr>";
  print "</table>";
  print "</td>";
  print "</table>";

//  print "</td></tr></table>";
?>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
