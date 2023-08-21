<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td width='100%' valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<table width='100%' cellpadding='4' cellspacing='0'>
<tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">Search</td>
</tr>
<tr>
<td>

<form name=frmsearch action="update_rate.php" method=post>
<table width="100%" border="0" cellspacing="0" cellpadding="2" >
<tr>
<td width="62%">
<table width="100%" border="0">
<tr>
<td align="right" class="txt_topic">Show me
<select name="gender" size="1" class=box>
<?php
     if($_SESSION["rate_gender"]==Null)
     {
?>
<option value="" selected>men &amp; women</option>
<option value="Female">women only</option>
<option value="Male" >men only</option>
<?php
     }
?>
<?php
     if($_SESSION["rate_gender"]=="Female")
     {
?>
<option value="">men &amp; women</option>
<option value="Female" selected>women only</option>
<option value="Male" >men only</option>
<?php
     }
?>
<?php
     if($_SESSION["rate_gender"]=="Male")
     {
?>
<option value="">men &amp; women</option>
<option value="Female">women only</option>
<option value="Male" selected>men only</option>
<?php
     }
?>
</select>
&nbsp;</td>

<td>
<select name="age" class=box>
<?php
     if($_SESSION["rate_age"]==Null)
     {
?>
<option value="" selected>of any age</option>
<option value="1">ages 18-25</option>
<option value="2" >ages 26-32</option>
<option value="3" >ages 33-40</option>
<option value="4" >over 40</option>
<?php
     }
?>
<?php
     if($_SESSION["rate_age"]==1)
     {
?>
<option value="">of any age</option>
<option value="1" selected>ages 18-25</option>
<option value="2" >ages 26-32</option>
<option value="3" >ages 33-40</option>
<option value="4" >over 40</option>
<?php
     }
?>

<?php
     if($_SESSION["rate_age"]==2)
     {
?>
<option value="">of any age</option>
<option value="1">ages 18-25</option>
<option value="2" selected>ages 26-32</option>
<option value="3" >ages 33-40</option>
<option value="4" >over 40</option>
<?php
     }
?>

<?php
     if($_SESSION["rate_age"]==3)
     {
?>
<option value="">of any age</option>
<option value="1">ages 18-25</option>
<option value="2">ages 26-32</option>
<option value="3" selected>ages 33-40</option>
<option value="4" >over 40</option>
<?php
     }
?>

<?php
     if($_SESSION["rate_age"]==4)
     {
?>
<option value="">of any age</option>
<option value="1">ages 18-25</option>
<option value="2">ages 26-32</option>
<option value="3">ages 33-40</option>
<option value="4"  selected>over 40</option>
<?php
     }
?>
</select>
</td>
</tr>

<tr>
<td align="right" class="txt_topic" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From
<select name="state" class=box>
<?php
     if($_SESSION["rate_state"]=="U")
     {
?>
<option value="U" selected>anywhere</option>
<?php
     }
     else
     {
?>
<option value="U">anywhere</option>
<?php
     }
?>
<?php
     $count=count($state);
     $sr_no=0;
     while($sr_no<$count)
     {
         if($state[$sr_no]==$_SESSION["rate_state"])
         {
?>
<option value="<?=$state[$sr_no]?>" selected><?=$state[$sr_no]?></option>
<?php
         }
         else
         {
?>
<option value="<?=$state[$sr_no]?>"><?=$state[$sr_no]?></option>
<?php
         }
         $sr_no=$sr_no+1;
     }
?>
</select>
&nbsp; </td>
<td>
<input type="submit" name="submit1" value="GO" class=txt_topic>
</td>
</tr>
</table></td>
<td width="38%">
<table width="100%" border="0">
<tr>
<td><a href="top_women.php" class=txt_label>Top 25 Women</a></td>
<td><a href="top_men.php" class=txt_label>Top 25 Men</a></td>
</tr>
<tr>
<td><a href="most_rated_women.php" class=txt_label>Most Rated Women</a></td>
<td><a href="most_rated_men.php" class=txt_label>Most Rated Men</a></td>
</tr>

<tr>
<td><a href="upload_photos.php" class=txt_label>Add My Pictures</a></td>
<td><a href="my_score.php" class=txt_label>Show My Scores</a></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
</td>
</tr>
</table>

<?php
     // sql to get all images based on the criteria
        include("classes/photo_ratings.class.php");
        $photo_ratings=new photo_ratings;

        $num_women=$photo_ratings->get_num_rated_women();
?>



<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">Top 25 Women</td>
</tr>

<tr>
<td>
<table width=100% cellpadding=0 cellspacing=0 border=0 valign=top>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td valign=top>
<table  width=100% cellpadding=0 cellspacing=0 valign=top>
<tr>
<td valign=top align=center>
<table width=100% cellpadding=0 cellspacing=0 valign=top>
<?php
     if($num_women==0)
     {
?>
<tr>
<td class='text'>
No women profiles rated yet!
</td>
</tr>
<?php
     }
     else
     {
?>
<tr>
<td class='text'>

<table cellspacing=1 cellpadding=5 width="100%" align=center bgcolor=639ace border=0>
<tr bgcolor=eff3ff>
<td height=24 class='txt_label' align="center"><b>Rank</b></td>
<td class='txt_label' align="center"><b>Image</b></td>
<td class='txt_label' align="center"><b>Average</b></td>
<td class='txt_label' align="center"><b>Votes</b></td>
<td class='txt_label' align="center"><b>Rate</b></td>
</tr>

<?php
     $top_women=$photo_ratings->get_most_rated_women();
     $sr_no=1;
     while($top_set=mysql_fetch_array($top_women))
     {
?>

<tr class=text11 bgcolor=ffffff>
<td class='txt_label' align="center">
<?=$sr_no?>
</td>
<td class='txt_label' align="center">
<a href="rate_image.php?photo_id=<?=$top_set["photo_id"]?>">
<img src="<?=$top_set["photo_url"]?>" border="0" width=40 align=absMiddle height="40">
</a>
</td>
<td class='txt_label' bgcolor="ffffff" align="center">
<?=round($top_set["a"],2)?>
</td>
<td class='txt_label' align="center">
<?=$top_set["b"]?>
</td>
<td class='txt_label' align="center">
<a href="rate_image.php?photo_id=<?=$top_set["photo_id"]?>">Rate It!</a>
</td>
</tr>

<?php
       $sr_no=$sr_no+1;
     }
?>

</table>


</td>
</tr>
<?php
     }
?>

</table>
</table></table>


</td></tr>
</table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
