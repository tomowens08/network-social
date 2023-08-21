<?php
session_start();
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

<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">Search</td>
</tr>
<tr>
<td>

<form name=frmsearch action="update_rate.php" method=post>
<table width="800" border="0" cellspacing="0" cellpadding="2" >
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

        $photos=$photo_ratings->get_all_photos($_SESSION["rate_gender"],$_SESSION["rate_age"],$_SESSION["rate_state"]);

        if($photos!=Null)
        {
/*
         foreach($photos as $aa)
         {
            print $aa;
            print "<br>";
         }
*/
          // generate a random photo id
             $sess_id = session_id();

             $count=count($photos);
             $shown_images=$photo_ratings->get_num_shown_images($sess_id);

             if($count==$shown_images)
             {
                 $delete=$photo_ratings->delete_shown_images($sess_id);
             }

             $photo_id = $photo_ratings->generate_random($sess_id,$photos);

             //print "Selected Id = $photo_id";
          // generate a random photo id
            $display=1;
        }
        else
        {
            $display=0;
        }

     // sql to get all images based on the criteria
?>



<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">Rank & Rating Icons</td>
</tr>

<tr>
<td>
<table width=800 cellpadding=0 cellspacing=0 border=0 valign=top>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td valign=top>
<table  width=800 cellpadding=0 cellspacing=0 valign=top>
<tr>
<td valign=top align=center>
<table width=100% cellpadding=0 cellspacing=0 valign=top>

<?php
     if($display==1)
     {
?>
<tr>
<td colspan=9 width=75% valign=top>
<table width="97%" border="0" valign=top>
<tr>
<td width="100%" valign=top>&nbsp;
<table width=100%  border=0 cellpadding=0 cellspacing=0 align=center valign=top>
<tr>
<td width="90%" valign=top bgcolor=#ffffff>
<table width=100% border=0 cellpadding=0 cellspacing=0 align=center>

<form name='rate_form' action='rate_user.php' method='post'>
<input type='hidden' name='photo_id' value='<?=$photo_id?>'>
<tr>
<td align=center colspan=2 width=100%>
<table border=1 bgcolor=#cFD2F3 valign=top cellpadding="0" cellspacing="0" width=100% bordercolor=#00008a>
<tr>
<td width=100%>
<table class=text cellpadding="0" cellspacing="0" border=0 width=100%>
<tr>
<td width=100%>
<table cellpadding="0" cellspacing="0" width=100%>
<tr>
<td width=180 class='txt_label' align=right><b>Rate This Member : </b>
</td>
<td width=200>
<table width=100% >
<tr>
<td align=center width=10 class=text>
1 <input type=radio name=rdo_rate value="1" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
2 <input type=radio name=rdo_rate value="2" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
3 <input type=radio name=rdo_rate value="3" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
4 <input type=radio name=rdo_rate value="4" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
5 <input type=radio name=rdo_rate value="5" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
6 <input type=radio name=rdo_rate value="6" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
7 <input type=radio name=rdo_rate value="7" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
8 <input type=radio name=rdo_rate value="8" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
9 <input type=radio name=rdo_rate value="9" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
10 <input type=radio name=rdo_rate value="10" onclick="document.rate_form.submit();">
</td>
</tr>

</table>
</td>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td align=center class=txt_topic valign=top width=50% colspan=2 >&nbsp;&nbsp;&nbsp;&nbsp; </td>
</tr>

<tr>
<td>
</td>
</tr>

<?php
     $member_photo_id=$photo_ratings->get_member_id($photo_id);
?>

<tr>
<td align=center class=txt_topic colspan=2 height="25">
<a href="view_profile.php?member_id=<?=$member_photo_id?>">View Profile</a></td>
</tr>

<?php
     $photo_set=$photo_ratings->get_photo($photo_id);
?>
<tr>
<td align=center class=txt_topic colspan=2>

    <?php
$pic_name=str_replace('user_images/', '', $photo_set["photo_url"]);
print "<img src='image_gd/image2.php?$pic_name' border='0'><br>";
?>

  <p>&nbsp;    </p></td>
</tr>

<tr>
<td>
<table border=1 bgcolor=#cFD2F3 valign=top cellpadding="0" cellspacing="0" width=100% bordercolor=#00008a>
<tr>
<td width=100%>
<table class=text cellpadding="0" cellspacing="0" border=0 width=100%>
<tr>
<td width=100%>
<table cellpadding="0" cellspacing="0" width=100%>
<tr>
<td width=180 class='txt_label' align=right>
<b>Rate This Member : </b>
</td>
<td width=200 >
<table width=100% >
<tr>

<td align=center width=10 class=text>
1 <input type=radio name=rdo_rate value="1" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
2 <input type=radio name=rdo_rate value="2" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
3 <input type=radio name=rdo_rate value="3" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
4 <input type=radio name=rdo_rate value="4" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
5 <input type=radio name=rdo_rate value="5" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
6 <input type=radio name=rdo_rate value="6" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
7 <input type=radio name=rdo_rate value="7" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
8 <input type=radio name=rdo_rate value="8" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
9 <input type=radio name=rdo_rate value="9" onclick="document.rate_form.submit();">
</td>
<td align=center width=10 class=text>
10 <input type=radio name=rdo_rate value="10" onclick="document.rate_form.submit();">
</td>
</tr>

</table>
</td>
</tr>

</table>
</td>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>
</table>
</td>

</tr>
</table>
</td>
</tr>
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
<div align="center">
  <!-- middle_content -->
  <!-- Middle Text -->
  <?php
include("includes/bottom.php");
?>
</div>
