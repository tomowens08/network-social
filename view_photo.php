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
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?php
     // sql to get all images based on the criteria
        include("classes/photo_ratings.class.php");
        $photo_ratings=new photo_ratings;
        $photo_id=addslashes($HTTP_GET_VARS["photo_id"]);
        $display=1;
     // sql to get all images based on the criteria
?>

<?

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>View Photo</h3></td></tr>";


  print "<tr><td colspan='2'  class='txt_label'>";
  print "<table>";
  
  print "<tr><td>";
   print "<a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to profile >>></a>";
  print "</td></tr>";

  print "<tr><td>";
   print "<a href='gallery.php?member_id=$HTTP_GET_VARS[member_id]'>Back to gallery >>></a>";
  print "</td></tr>";
?>  
 <table cellspacing="1"  border="0" cellpadding="0" align="center" width=100%>
<tr>
<td align="center"  class=text><b>Average Score</b>&nbsp;&nbsp;
<font color="cc0000" size="+2" class=text>
<?php
     $avg_rate=$photo_ratings->get_avg_rating($photo_id);
?>
<b><?=$avg_rate?></b> </font>&nbsp;&nbsp;
<?php
     $count_rate=$photo_ratings->get_total_rating($photo_id);
?>
Ranked <b><?=$count_rate?></b> times<br>
</td>
</tr>
</table>
<?php 


        $sql="select * from photos where photo_id = ".$HTTP_GET_VARS["photo_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);
        
				$sql = "SELECT photo_id FROM photos WHERE member_id = ".$RSUser1['member_id']." AND photo_id > ".$HTTP_GET_VARS["photo_id"]." ORDER BY photo_id LIMIT 0,1";
				$next = mysql_fetch_array(mysql_query($sql));
				
				$sql = "SELECT photo_id FROM photos WHERE member_id = ".$RSUser1['member_id']." AND photo_id < ".$HTTP_GET_VARS["photo_id"]." ORDER BY photo_id DESC LIMIT 0,1";
				$prev = mysql_fetch_array(mysql_query($sql));
				
  print "<tr>";
  print "<td width='100%' class='txt_label'>";
  print "<p align='center'>";

  $pic_name=str_replace('user_images/', '', $RSUser1["photo_url"]);
        print "<img src='image_gd/image2.php?$pic_name' border='0'><br>";
	if ($prev['photo_id'])
		echo '<a href="'.$_SERVER['view_photo'].'?member_id='.$RSUser1['member_id'].'&photo_id='.$prev['photo_id'].'">&lt; Previous</a>&nbsp;';
	if ($next['photo_id'])
		echo '&nbsp;<a href="'.$_SERVER['view_photo'].'?member_id='.$RSUser1['member_id'].'&photo_id='.$next['photo_id'].'">Next &gt;</a>';
  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td width='100%' class='txt_label'>";
?>

<?php
     include("classes/photo.comments.class.php");
     $photo_comments=new photo_comments;
     $num_comments=$photo_comments->get_num_comments($HTTP_GET_VARS["photo_id"],$HTTP_GET_VARS["member_id"]);

if($num_comments==0)
{
    $start=0;
}
else
{
    $start=1;
}
?>

<table border="0" cellspacing="2" cellpadding="0" bordercolor="##000000" width="100%">
<tr>
<td class='txt_label' align="left">Listing <?=$start?> - <?=$num_comments?> of <?=$num_comments?></td>
<td align="right">
</td>
</tr>
</table>
<table cellspacing="1" cellpadding="5" width="400" align="center" bgcolor="#639ace" border="0">
<tr bgcolor="#eff3ff">
<td class='txt_label' height=24 width="122"><b>From</b></td>
<td class='txt_label'><b>Comment</b></td>
</tr>

<?php
     include("includes/people.class.php");
     $people=new people;

     $comment_res=$photo_comments->get_all_ratings($HTTP_GET_VARS["photo_id"]);
     while($comment_set=mysql_fetch_array($comment_res))
     {
      $name=$people->get_name($comment_set["posted_by"]);
      $num_images=$people->get_num_images($comment_set["posted_by"]);
     if($num_images==0)
     {
         $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
     }
     else
     {
         $image_url=$people->get_image($comment_set["posted_by"]);
         $image="<img alt='' src='$image_url' width=90 border=0>";
     }

     $people_info=$people->get_info($comment_set["posted_by"]);
     $profile_info=$people->get_profile($comment_set["posted_by"]);
     $fname=$people->get_name($comment_set["posted_by"]);

?>
<tr class="text11" bgcolor="ffffff">
<td class='txt_label' width="122" align="center">
<A HREF="view_profile.php?member_id=<?=$comment_set["posted_by"]?>"><?=$fname?></a><br><br>
<A HREF="view_profile.php?member_id=<?=$comment_set["posted_by"]?>"><?=$image?></a>
<br>
<br><br>
</td>
<td class='txt_label' width="536" bgcolor="ffffff" valign="top" style="word-wrap:break-word">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td class='txt_label' valign="top"><b><?=$comment_set["posted_on"]?></b><br><?=$comment_set["comment"]?>
</td>
</tr>
</table>
</td>
</tr>

<?php
     }
?>

</table>
<center>
<a href="rate_photo.php?member_id=<?=$RSUser1['member_id']?>&photo_id=<?=$HTTP_GET_VARS["photo_id"]?>">Add a Comment</a><br>
</center>
<?php
  print "</td>";
  print "</tr>";

  print "</table>";
  print "</td></tr>";
  print "</table>";
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
