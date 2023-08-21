<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<?php
    include("classes/videos.class.php");
    $videos=new videos;

    include("includes/people.class.php");
    $people=new people;
?>

<!-- Classified Entry -->

<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<?php
     include("includes/video_side.php");
?>

<td valign="top" width="580">
<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'><font size="2"><b>Videos<br>My Albums</b></font></td>
<td align="right" valign="bottom">
    <a href="videos.php">Back to Videos &gt;&gt;</a>
</td>
</tr>
</table>

<table cellspacing="0" cellpadding="5" border=1 bordercolor="6699CC" width="100%">
<tr>
<td valign="top">
<table border="0" align="center" cellspacing="1" cellpadding="5" bgcolor="639ACE" width="100%">
<tr bgcolor="EFF3FF" >
<td class='txt_label' height="24"><b>Date Posted</b></td>
<td class='txt_label' height="24"><b>Title</b></td>
<td class='txt_label' height="24"><b>&nbsp;</b></td>
</tr>

<?php
     $album_res=$videos->get_member_albums($_SESSION["member_id"]);

     while($album_set=mysql_fetch_array($album_res))
     {
         $num_videos=$videos->get_num_album_videos($album_set["id"]);
?>

<tr bgcolor="ffffff">
<td align="center" valign="top" class='txt_label'>
<?=$album_set["posted_on"]?>
</td>
<td width="60%" class='txt_label'>
<a href="view_album.php?id=<?=$album_set["id"]?>" class="mailtext"><?=stripslashes($album_set["album_title"])?></a>
<br>
Number of Videos: <?=$num_videos?>
</td>
<td align="center" class='txt_label'>
[<a href='edit_album.php?id=<?=$album_set["id"]?>'>Edit Album</a>]<br>
[<a href='delete_album.php?id=<?=$album_set["id"]?>'>Delete Album</a>]
</td>
</tr>
<?php
     }
?>

</td>
</tr>
</table>
</td></tr>
</table>
</td></tr>
</table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
 }
include("includes/bottom.php");
?>
