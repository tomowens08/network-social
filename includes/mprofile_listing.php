<table bordercolor=000000 height="80%" cellspacing=0 cellpadding=0 width="100%" bgcolor=ffffff border=0>
<tr>
<td height="33">
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<tr>
<td class='txt_label'>Edit Profile <b>&gt;&gt;</b> View Basic Info</td>
<td align="right">
<a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>


<table width="625" border="0" cellspacing="0" cellpadding="2">
<tr valign="top">
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<tr>
<?php
     $sql="select * from music_member_profile where user_id = $_SESSION[member_id]";
     $res=mysql_query($sql);
     $data_set=mysql_fetch_array($res);
?>
<form name="myForm" method="post" action="edit_mprofile1.php?type=listing">
<td class='txt_label' align="center">
<b>Band URL:&nbsp;&nbsp;</b><input type="text" name="username" value="<?=$data_set["user_name"]?>" disabled></td>
</tr>

<tr>
<td class='txt_label' align="center"><b>Genre 1:&nbsp;&nbsp;</b>
<select name="genre1">
<option value="0">- - choose one - -</option>
<?php
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
         if($data_set["genre1"]==$genre_set["id"])
         {
?>
<option value ="<?=$genre_set["id"]?>" selected><?=$genre_set["cat_name"]?></option>
<?php
         }
         else
         {
?>
<option value ="<?=$genre_set["id"]?>"><?=$genre_set["cat_name"]?></option>
<?php
         }
     }
?>
</select>
</td>
</tr>

<tr>
<td class='txt_label' align="center">
<b>Genre 2:&nbsp;&nbsp;</b>
<select name="genre2">
<option value="0">- - choose one - -</option>
<?php
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
         if($data_set["genre2"]==$genre_set["id"])
         {
?>
<option value ="<?=$genre_set["id"]?>" selected><?=$genre_set["cat_name"]?></option>
<?php
         }
         else
         {
?>
<option value ="<?=$genre_set["id"]?>"><?=$genre_set["cat_name"]?></option>
<?php
         }
     }
?>
</select>
</td>
</tr>

<tr>
<td class='txt_label' align="center">
<b>Genre 3:&nbsp;&nbsp;</b>
<select name="genre3">
<option value="0">- - choose one - -</option>
<?php
     $genre_res=$music->get_all_cat();
     while($genre_set=mysql_fetch_array($genre_res))
     {
         if($data_set["genre3"]==$genre_set["id"])
         {
?>
<option value ="<?=$genre_set["id"]?>" selected><?=$genre_set["cat_name"]?></option>
<?php
         }
         else
         {
?>
<option value ="<?=$genre_set["id"]?>"><?=$genre_set["cat_name"]?></option>
<?php
         }
     }
?>
</select>
</td>
</tr>
<tr>
<td align="center"></td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<input class=txt_topic type="submit" name='submit' value='Update'>
<br><br></td></tr></table>
