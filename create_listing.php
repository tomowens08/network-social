<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
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

<?php
    include("includes/class.class.php");
    include("includes/people.class.php");

    $class=new classified;
    $people=new people;
?>

<!-- Classified Entry -->

<table width="830" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/class_side.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'>
<font size="2"><b>Classifieds<br>Create Listing</b></font>
</td>
<td class='txt_label' align="right" valign="bottom">
<a href="classified.php">Back to Classifieds &gt;&gt;</a>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='txt_label'>
<font color="#FF6600"><b>Before You POST. Read these rules:</b></font> <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* do not post the same ad in multiple categories. pick one. <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* do not post the same ad more than once in a 14 day period. <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* make sure the content matches the category (a biz op is NOT a job) <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* do not post jokes, foul language, or "adult" content <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* dont post ads for "adult" jobs<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* do not post affiliate links to commercial websites<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* listings can take up to 10 minutes to display on Classifieds Home Page<br><br>
<b><font color="red">If you post about internet money making opportunities (i.e. get paid to read email, win a Free iPod, etc.) your account WILL BE DELETED.</font></b>
</td>
</tr>
</table>

<form name='AddListing' action='create_listing_action.php' method='post'>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="C5D8EB">

<tr bgcolor="ffffff" valign="middle">
<td width="14%" bgcolor="#FF6600"><span class='white'>Category:</span></td>
<td width="86%">
<span class=default>
<select name="update" onChange="window.location=document.AddListing.update.options[document.AddListing.update.selectedIndex].value">
<option value=''> ~ Select Main Category ~ </option>
<?php
     $cat_res=$class->get_all_cats();
     while($cat_set=mysql_fetch_array($cat_res))
     {
         if($HTTP_GET_VARS["main_id"]==$cat_set["id"])
         {
?>
<option value="create_listing.php?main_id=<?=$cat_set["id"]?>" selected><?=$cat_set["cat_name"]?></option>
<?php
         }
         else
         {
?>
<option value="create_listing.php?main_id=<?=$cat_set["id"]?>"><?=$cat_set["cat_name"]?></option>
<?php
         }
     }
?>
</select>
<input type='hidden' name='cat_id' value='<?=$HTTP_GET_VARS["main_id"]?>'>
</span>
</td>
</tr>


<tr bgcolor="ffffff" valign="middle">
<td width="14%" bgcolor="#FF6600"><span class='white'>Sub Category:</span></td>
<td width="86%">
<span class=default>
<select name="sub_cat_id">
<?php
     if($HTTP_GET_VARS["main_id"]==Null)
     {
         print "<option value=''> ~ Select Main Category ~ </option>";
     }
     else
     {
     $sub_cat_res=$class->get_all_sub_cats($HTTP_GET_VARS["main_id"]);

     while($sub_cat_set=mysql_fetch_array($sub_cat_res))
     {
?>
<option value="<?=$sub_cat_set["id"]?>"><?=$sub_cat_set["cat_name"]?></option>
<?php
     }
}
?>
</select>
</span>
</td>
</tr>

<tr bgcolor="ffffff" valign="middle">
<td width="14%" bgcolor="#FF6600"><span class='white'>Subject:</span></td>
<td width="86%"><span class=default>
<input type="text" name="subject" value="" size="60" maxlength="60"></span></td>
</tr>
<tr valign="middle" bgcolor="ffffff">
<td width="14%" bgcolor="#FF6600"><span class='white'>Message:</span></td>
<td width="86%"><span class=default><textarea name="message" rows="20" cols="60" class="verdana12"></textarea>
</span>
</td>
</tr>
</table>
<br>
<input type="submit" name="submit" value="-Create-"><br>
</td>
</tr>
</form>
</table>

<!-- End -->
<!-- middle_content -->

<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
