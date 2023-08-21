<table bordercolor="000000" height="80%" cellspacing="0" cellpadding="0" width="100%" bgcolor="ffffff" border="0">
<tr>
<td height="33">
<table width="100%" border="0" cellspacing="0" cellpadding="20">
<tr>
<td class='txt_label'>
Edit Profile <b>&gt;&gt;</b> View Basic Info </span></td>
<td align="right"><a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>

<?php
     $info=$music->get_basic($_SESSION["member_id"]);
?>
<form name="theForm" action="edit_mprofile1.php?type=basic" method="post">


<table width="625" border="0" cellspacing="0" cellpadding="2">
<tr valign="top">
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<tr valign="top">
<td height="190">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="red">
<tr>
<td align="right" width="30%" class='txt_label'><b>Band Name:&nbsp;&nbsp;</b></td>
<td class="spacetext" colspan="2">
<input type="text" name="firstname" value="<?=$info["member_name"]?>">&nbsp;
</td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>

<tr>
<td align="right" width="30%" class='txt_label'><b>Band Website:&nbsp;&nbsp;</b></td>
<td class="spacetext" colspan="2">
<input type="text" name="website" value="<?=$info["website"]?>">&nbsp;
</td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>


<tr>
<td align="right" class='txt_label'><b>City:&nbsp;&nbsp;</b></td>
<td class="spacetext" colspan="2">
<input type="text" name="city" value="<?=$info["city"]?>">
</td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
<tr>
<td align="right" class='txt_label'><b>State/Region:&nbsp;&nbsp;</b></td>
<td class="spacetext">
<input type="text" name="state" value="<?=$info["current_state"]?>">
</td>
<td class="spacetext" width="30%">
</td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
<tr>
<td align="right" class='txt_label'><b>Country:&nbsp;&nbsp;</b></td>
<td class="spacetext" colspan="2">
<?php
  print "<select name='country' size='1'>";
  // run loop to display all categories
     $sql="select * from states";
     $state_res=mysql_query($sql);
     while($state_set=mysql_fetch_array($state_res))
     {
         if($info["country"]==$state_set["state_id"])
         {
          print "<option value='$state_set[state_id]' selected>$state_set[state_name]</option>";
         }
         else
         {
          print "<option value='$state_set[state_id]'>$state_set[state_name]</option>";
         }
     }

  // run loop to display all categories

  print "</select>";
?>
&nbsp;
</td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
<tr>
<td align="right" class='txt_label'><b>Zip/Postal Code:&nbsp;&nbsp;</b></td>
<td colspan="2">
<input type="text" name="zip_code" value="<?=$info["zip_code"]?>">
</td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<br><input class=txt_topic type="submit" name='submit' value='Update'><br><br>
</form>
</td>
</tr>
</table>

