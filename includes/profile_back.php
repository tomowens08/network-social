<form name='interests' action='edit_profile1.php?type=back' method='post'>

<table bordercolor="#000000" height="80%" cellspacing="0" cellpadding="0" bgcolor="ffffff" border="0">
<tr>
<td height="33">
<table border="0" cellspacing="0" cellpadding="20">
<tr>

<td class='txt_label'>
Edit Profile
<font size="2">&gt;&gt; <font color="003399">Background & Lifestyle</font></font></span>
<br><br>You may enter HTML/DHTML or CSS in any text field.<br>
Javascript is not allowed.<br>
Do not use HTML/CSS to cover <?=$site_name?> advertisements.<br>
</td>
<td align="right"><a href="view_profile.php?member_id=<?=$_SESSION["member_id"]?>">View My Profile</a></td>
</tr>
</table>
</td>
</tr>

<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="FFFFFF">
<tr valign="top">
<td class='txt_label'>
Please separate all interests with comma.
<br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">


<table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr valign="top">
<td width="20%" class='txt_label'>
Marital Status:&nbsp;&nbsp;
</td>
<td width='80%' class="txt_label">
<input type="radio" name="MaritalStatus" value="O"
<?php
    if($int["marital_status"]=="O")
    {
?>
checked
<?php
    }
?>
>Swinger<br>
<input type="radio" name="MaritalStatus" value="R"
<?php
    if($int["marital_status"]=="R")
    {
?>
checked
<?php
    }
?>
>In a Relationship<br>
<input type="radio" name="MaritalStatus" value="S"

<?php
    if($int["marital_status"]=="S")
    {
?>
checked
<?php
    }
?>
>Single<br>
<input type="radio" name="MaritalStatus" value="D"
<?php
    if($int["marital_status"]=="D")
    {
?>
checked
<?php
    }
?>
>Divorced<br>
<input type="radio" name="MaritalStatus" value="M"
<?php
    if($int["marital_status"]=="M")
    {
?>
checked
<?php
    }
?>
>Married<br>
<br>
</td>
</tr>

<tr valign="top">
<td width="20%" class='txt_label'>
Sexual Orientation:&nbsp;&nbsp;
</td>
<td width='80%' class="txt_label">
<input type="radio" name="SexualPreference" value="3"
<?php
    if($int["sexual"]=="3")
    {
?>
checked
<?php
    }
?>
>Bi<br>
<input type="radio" name="SexualPreference" value="2"
<?php
    if($int["sexual"]=="2")
    {
?>
checked
<?php
    }
?>
>Gay<br>
<input type="radio" name="SexualPreference" value="1"
<?php
    if($int["sexual"]=="1")
    {
?>
checked
<?php
    }
?>
>Straight<br>
<input type="radio" name="SexualPreference" value="4"
<?php
    if($int["sexual"]=="4")
    {
?>
checked
<?php
    }
?>
>Not Sure<br>
<input type="radio" name="SexualPreference" value="0"
<?php
    if($int["sexual"]=="0")
    {
?>
checked
<?php
    }
?>
>No Answer<br>
<br>
</td>
</tr>

<tr valign="top">
<td width="20%" class="txt_label">
Hometown:&nbsp;&nbsp;
</td>
<td width='80%' class="txt_label"><input type='text' name='hometown' value='<?=$int["home_town"]?>'>
</td>
</tr>

<tr valign="top">
<td width="20%" class="txt_label">Religion:&nbsp;&nbsp;</td>
<td width='80%' class="txt_label">
<select name="ReligionID">
<?php
    $sr_no=1;
    while($sr_no<=15)
    {
        if($int["religion"]==$sr_no)
        {
?>
        <option value='<?=$sr_no?>' selected><?=$religion[$sr_no]?></option>
<?php
        }
        else
        {
?>
        <option value='<?=$sr_no?>'><?=$religion[$sr_no]?></option>
<?php
        }
        $sr_no=$sr_no+1;
    }
?>
</select>
<br><br>
</td>
</tr>

<tr valign="top">
<td width="20%" class="txt_label">Smoker:&nbsp;&nbsp;</td>
<td width='80%' class="txt_label">
<?php
    if($int["smoker"]=="Yes")
    {
?>
<input type="radio" name="smoker" value="Yes"  checked>Yes
<input type="radio" name="smoker" value="No">No
<input type="radio" name="smoker" value="No Answer">No Answer
<?
    }
?>

<?php
    if($int["smoker"]=="No")
    {
?>
<input type="radio" name="smoker" value="Yes">Yes
<input type="radio" name="smoker" value="No" checked>No
<input type="radio" name="smoker" value="No Answer">No Answer
<?
    }
?>

<?php
    if($int["smoker"]=="No Answer" || $int["smoker"]==Null)
    {
?>
<input type="radio" name="smoker" value="Yes">Yes
<input type="radio" name="smoker" value="No">No
<input type="radio" name="smoker" value="No Answer" checked>No Answer
<?
    }
?>

<br><br>
</td>
</tr>

<tr valign="top">
<td width="20%" class="txt_label">Drinker:&nbsp;&nbsp;</td>
<td width='80%' class="txt_label">
<?php
    if($int["drinker"]=="Yes")
    {
?>
<input type="radio" name="drinker" value="Yes"  checked>Yes
<input type="radio" name="drinker" value="No">No
<input type="radio" name="drinker" value="No Answer">No Answer
<?
    }
?>

<?php
    if($int["drinker"]=="No")
    {
?>
<input type="radio" name="drinker" value="Yes">Yes
<input type="radio" name="drinker" value="No" checked>No
<input type="radio" name="drinker" value="No Answer">No Answer
<?
    }
?>

<?php
    if($int["drinker"]=="No Answer" || $int["drinker"]==Null)
    {
?>
<input type="radio" name="drinker" value="Yes">Yes
<input type="radio" name="drinker" value="No">No
<input type="radio" name="drinker" value="No Answer" checked>No Answer
<?
    }
?>
<br><br>
</td>
</tr>

<tr valign="top">
<td width="20%" class="txt_label">Children:&nbsp;&nbsp;</td>
<td class="txt_label" width='80%'>
<?php
    if($int["children"]=="I do not want kids")
    {
?>
<input type="radio" name="ChildrenID" value="I do not want kids"  checked>I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["children"]=="Someday")
    {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday" checked>Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["children"]=="Undecided")
    {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided" checked>Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["children"]=="Love kids, but not for me")
    {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me" checked>Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["children"]=="Proud parent")
    {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent" checked>Proud parent<br>
<input type="radio" name="ChildrenID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["children"]=="No Answer" || $int["children"]==Null)
    {
?>
<input type="radio" name="ChildrenID" value="I do not want kids">I do not want kids<br>
<input type="radio" name="ChildrenID" value="Someday">Someday<br>
<input type="radio" name="ChildrenID" value="Undecided">Undecided<br>
<input type="radio" name="ChildrenID" value="Love kids, but not for me">Love kids, but not for me<br>
<input type="radio" name="ChildrenID" value="Proud parent">Proud parent<br>
<input type="radio" name="ChildrenID" value="No Answer" checked>No Answer<br>
<br>
<?php
    }
?>

</td>
</tr>

<tr valign="top">
<td align="right" width="145"><b><font color="356BA2" face="verdana"  face="verdana"  size="2">Education:&nbsp;&nbsp;</font></b></td>
<td class="text" >

<?php
    if($int["education"]=="High school")
    {
?>
<input type="radio" name="EducationID" value="High school"  checked>High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["education"]=="Some college")
    {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college" checked>Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["education"]=="In college")
    {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college" checked>In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["education"]=="College graduate")
    {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate" checked>College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["education"]=="Grad / professional school")
    {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school" checked>Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["education"]=="Post grad")
    {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad" checked>Post grad<br>
<input type="radio" name="EducationID" value="No Answer">No Answer<br>
<br>
<?php
    }
?>

<?php
    if($int["education"]=="No Answer" || $int["education"]==Null)
    {
?>
<input type="radio" name="EducationID" value="High school">High school<br>
<input type="radio" name="EducationID" value="Some college">Some college<br>
<input type="radio" name="EducationID" value="In college">In college<br>
<input type="radio" name="EducationID" value="College graduate">College graduate<br>
<input type="radio" name="EducationID" value="Grad / professional school">Grad / professional school<br>
<input type="radio" name="EducationID" value="Post grad">Post grad<br>
<input type="radio" name="EducationID" value="No Answer" checked>No Answer<br>
<br>
<?php
    }
?>


</td>
</tr>

<tr valign="top">
<td width="20%" class="txt_label">Income:&nbsp;&nbsp;</td>
<td class="txt_label" width='80%'>
<select name="IncomeID">
<?php
    $sr_no=0;
    while($sr_no<=8)
    {
        if($int["income"]==$sr_no)
        {
?>
<option value="<?=$sr_no?>" selected><?=$income[$sr_no]?></option>
<?php
        }
        else
        {
?>
<option value="<?=$sr_no?>"><?=$income[$sr_no]?></option>
<?php
        }
        $sr_no=$sr_no+1;
    }
?>
</select>

<br><br>
</td>
</tr>

<tr valign="top">
<td width="100%" colspan='2'>
<div align='center'>
<input type='submit' name='submit' value='Edit Background and Lifestyle'>
</div>
</td></tr>

</form>


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

