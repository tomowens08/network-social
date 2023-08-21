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

<table width="830" border="0" cellspacing="0" cellpadding="2" align="center" bordercolor="#6699CC" bgcolor="#FFFFFF" height=100%>


<tr>
<td align="left" valign="top" width="20"></td>
<td align="left" valign="top" width="780" class='txt_label'>
<br><strong><font size="3">Friend Finder</font>

<script language="javascript">
	function DropDownSelect(obj, val) {
		var i;
		var len = obj.options.length;
		for (i=0; i<len; i++)
		{
			if (obj.options[i].value == val)
			{
				obj.selectedIndex = i;
				break;
			}
		}
	}

	function yearType()
	{
		var form = document.SchoolSearch;
		if ( form.YearType[3].checked )
		{
			form.StartYear.disabled = false;
			form.EndYear.disabled = false;
			form.GradYear.disabled = true;
		}
		else if ( form.YearType[2].checked )
		{
			form.StartYear.disabled = true;
			form.EndYear.disabled = true;
			form.GradYear.disabled = false;
		}
		else
		{
			form.StartYear.disabled = true;
			form.EndYear.disabled = true;
			form.GradYear.disabled = true;
		}
	}

	function checkYears()
	{
		var form = document.SchoolSearch;

		if( document.SchoolSearch.noDetail.checked == true )
			form.noDetail.value = 1;
		else
			form.noDetail.value = 0;

		if( form.YearType[3].checked ) // if searching the years attended
		{
			if( form.StartYear.value != '' && form.EndYear.value != '' ) // if both start and end years specified
			{
				if( parseInt( form.StartYear.value ) == 0 ) // if the start year is specified as the present, just set the end year to empty
					form.EndYear.value = '';
				else if( parseInt( form.EndYear.value ) != 0 && ( parseInt( form.StartYear.value ) > parseInt( form.EndYear.value ) ) ) // else if the start year is greater than the end year
				{
					alert( 'Please select a Start Year that comes before the End Year' );  // alert the user
					form.SearchButton.disabled = false;
					return;
				}

			}
			else if( form.StartYear.value == '' && form.EndYear.value == '' ) // else if nothing was specified
			{
				form.InterestType.value = "SCH";
			}
		}

		else if( form.YearType[2].checked )
		{
			if( form.GradYear.value == '' )
			{
				form.InterestType.value = "SCH";
			}
		}

		form.submit();
	}
</script>
<?php
     $type=$HTTP_GET_VARS["type"];
?>
<form action="search_profiles_advanced.php" method="get" name="PageForm">
<input type='hidden' name='type' value='<?=$type?>'>
<?php
     if($type==2)
     {
         print "<input type='hidden' name='f_first_name' value='$HTTP_GET_VARS[f_first_name]'>";
     }

     if($type==1)
     {
         print "<input type='hidden' name='searchrequest' value='$HTTP_GET_VARS[searchrequest]'>";
     }

     if($type==3)
     {
         print "<input type='hidden' name='school_name' value='$HTTP_GET_VARS[school_name]'>";
         print "<input type='hidden' name='state' value='$HTTP_GET_VARS[state]'>";
     }

?>

<table width="95%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
<tr valign="middle">
<td width = "100%" bgcolor="#ffffff">
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#6699cc" bgcolor="#FFFFFF">
<tr>
<td align="left">
<font color="#000000"><strong><font size="2">
<?php
     if($type==2)
     {
?>
Friend Finder Results for&quot;<font color = "red"><?=$HTTP_GET_VARS["f_first_name"]?></font>&quot;
<?php
     }
?>
<?php
     if($type==1)
     {
?>
Friend Finder Results for&quot;<font color = "red"><?=$HTTP_GET_VARS["searchrequest"]?></font>&quot;
<?php
     }
?>

<?php
     if($type==3)
     {
?>
Friend Finder Results for&quot;<font color = "red"><?=$HTTP_GET_VARS["school_name"]?> in <?=$HTTP_GET_VARS["state"]?></font>&quot;
<?php
     }
?>

</strong></font>
</td>
</tr>

<tr>
<td>
<script language="JavaScript">
function checkcountry(frmObj)
{
	if (frmObj.country.options[frmObj.country.selectedIndex].value == "1")
	{
		frmObj.distance.disabled = false
		frmObj.postal.disabled = false
	}
	else
	{
		frmObj.distance.disabled = true
		frmObj.postal.disabled = true
	}
}
</script>



<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
<tr valign="middle">
<td width="5%">&nbsp;</td>
<td bgcolor="#ffffff">

<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#6699cc" bgcolor="#FFFFFF">
<TR>
<td align="left" width="50%">
<table width="100%" border="2" class='dark_b_border2' cellspacing="0" cellpadding="0" bordercolor="#6699cc">
<tr>
<td width="79%" valign="middle" class='dark_blue_white2' colspan="2"><font color="#FFFFFF" size="2"><b><strong>Filter your Friend Search</font></td>
</tr>
<tr>
<td>
<table width="100%" border="2" cellspacing="0" cellpadding="2" bordercolor="#FFFFFF">
<tr>
<td colspan="2">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td colspan="2" class='txt_label'><b><font color="336699">located within:</font></b></td>
</tr>
<?php
     include("includes/profile.class.php");
     $profile=new profile;
     $my_country=$profile->get_my_country($_SESSION["member_id"]);
?>
<tr>
<td class='txt_label'><b><font color="336699">Country: </b></td>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;
<select name="country" style="FONT-SIZE: 10px; FONT-FAMILY: Verdana, Geneva, Arial, Helvetica, sans-serif" onchange="javascript:checkcountry(document.PageForm)">
<option value = "">Any</option>
<?
$sql="select * from states order by state_name";
$result=mysql_query($sql);
while($RSUser=mysql_fetch_array($result))
{
     print "<option value='$RSUser[state_id]'>".$RSUser["state_name"]."</option>";
}
?>
</select></td>
</tr>
<tr>
<td class='txt_label'><b><font color="336699">Postal Code: </b></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;
<select name="distance" disabled style="FONT-SIZE: 10px; FONT-FAMILY: Verdana, Geneva, Arial, Helvetica, sans-serif">
<option value="0">Any
<option value="5" >5
<option value="10" >10
<option value="20" >20
<option value="50" >50
<option value="100" >100
</select>
<b><font color="336699">miles of</b>
<input type="text" name="postal" size="10" disabled maxlength="8" style="FONT-SIZE: 10px; FONT-FAMILY: Verdana, Geneva, Arial, Helvetica, sans-serif" >
</td>
</tr>
</table>
</td>
<td>
<table>
<tr>
<td class='txt_label' width="36%" valign="top" align="right">
Only show users who have photos&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Photos" value="1" ><br>
Show name and photos no text&nbsp;&nbsp;<input type="checkbox" name="NoDetail" value="1" >
<br>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr><td colspan="2" align="right">
<input name="SubmitSearch" id="formSubmit" value="Update" class=txt_topic type="submit" width="70" height="26" border="0" onclick="javascript:document.PageForm.formSubmit.disabled=true;document.PageForm.formSubmit.bgcolor='#000000';document.PageForm.formSubmit.value='Updating...';document.PageForm.submit();">
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td width="5%">&nbsp;</td>
</tr>
</table>
</td>
</tr>
</form>
</td>
</tr>
</table>
</td>
<td width="10%">&nbsp;&nbsp;&nbsp;</td>
</tr>
<br>


<table class='dark_b_border2' cellspacing="0" cellpadding="0" align="center" width="750">
<tr>
<td class='dark_blue_white2'>
Search Results
</td>
</tr>

<tr>
<td>
<table border="0" cellspacing="0" cellpadding="0" align="center" bordercolor="#6699CC" width="750">
<td>
<table width="710" border="0" cellspacing="0" cellpadding="0" align="left" bordercolor="#6699CC" bgcolor="#FFFFFF">
<tr>
<td colspan=4 height="25"></td>
</tr>

<?php
     // search sql
     
        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+10;
        
        
        
     // type 1
     if($type==1)
     {

        $sql_paging="select count(*) as a from members where 1=1";

        if($HTTP_GET_VARS["searchrequest"]!=Null)
        {
         $sql_paging.=" and (member_name like '%$HTTP_GET_VARS[searchrequest]%'";
         $sql_paging.=" or display_name like '%$HTTP_GET_VARS[searchrequest]%'";
         $sql_paging.=" or member_email like '%$HTTP_GET_VARS[searchrequest]%'";
         $sql_paging.=" or country like '%$HTTP_GET_VARS[searchrequest]%')";
        }

        $sql="select * from members where 1=1";
        if($HTTP_GET_VARS["searchrequest"]!=Null)
        {
         $sql.=" and (member_name like '%$HTTP_GET_VARS[searchrequest]%'";
         $sql.=" or display_name like '%$HTTP_GET_VARS[searchrequest]%'";
         $sql.=" or member_email like '%$HTTP_GET_VARS[searchrequest]%'";
         $sql.=" or country like '%$HTTP_GET_VARS[searchrequest]%')";
        }

        $sql.=" limit $n, 10";
     }


     // type 1

     // type 2
     if($type==2)
     {

        $sql_paging="select count(*) as a from members where 1=1";
        if($HTTP_GET_VARS["searchBy"]=="First")
        {
         $sel_p=explode(" ", $HTTP_GET_VARS["f_first_name"]);
         $sql_paging.=" and (member_name like '%$sel_p[0]%'";
         $sql_paging.=" or member_lname like '%$sel_p[1]%')";
        }
        if($HTTP_GET_VARS["searchBy"]=="EMail")
        {
         $sql_paging.=" and email like '%$HTTP_GET_VARS[f_first_name]%'";
        }


        $sql="select * from members where 1=1";
        if($HTTP_GET_VARS["searchBy"]=="Display")
        {
         $sql.=" and display_name like '%$HTTP_GET_VARS[f_first_name]%'";
        }

        if($HTTP_GET_VARS["searchBy"]=="First")
        {
         $sel_p=explode(" ", $HTTP_GET_VARS["f_first_name"]);
         $sql.=" and (member_name like '%$sel_p[0]%'";
         $sql.=" or member_lname like '%$sel_p[1]%')";
        }

        if($HTTP_GET_VARS["searchBy"]=="Email")
        {
         $sql.=" and member_email like '%$HTTP_GET_VARS[f_first_name]%'";
        }
        
        $sql.=" limit $n, 10";
     }
     // type 2

     // type 3
     if($type==3)
     {

        $sql_paging="select count(*) as a from members a, profile_school b where a.member_id=b.member_id";
        if($HTTP_GET_VARS["school_name"]!=Null)
        {
         $sql_paging.=" and school_name like '%$HTTP_GET_VARS[school_name]%'";
        }
        if($HTTP_GET_VARS["state"]!=Null)
        {
         $sql_paging.=" and school_state like '%$HTTP_GET_VARS[state]%'";
        }


        $sql="select * from members a, profile_school b where a.member_id=b.member_id";
        if($HTTP_GET_VARS["school_name"]!=Null)
        {
         $sql.=" and school_name like '%$HTTP_GET_VARS[school_name]%'";
        }
        if($HTTP_GET_VARS["state"]!=Null)
        {
         $sql.=" and school_state like '%$HTTP_GET_VARS[state]%'";
        }

        $sql.=" limit $n, 10";
     }

     // type 3

        $result=mysql_query($sql_paging);
        print mysql_error();
        $data_set=mysql_fetch_array($result);
        if($data_set["a"]<=$n_next)
        {
                $next=0;
        }
        else
        {
                $next=1;
        }



      //print $sql;
      
        $result=mysql_query($sql);

include("includes/people.class.php");
$people=new people;

        while($data_set=mysql_fetch_array($result))
        {
            $sql="select * from profile_back where member_id = $data_set[member_id]";
            $back_res=mysql_query($sql);
            print mysql_error();
            $back_set=mysql_fetch_array($back_res);

            $sql="select * from profile_interests where member_id = $data_set[member_id]";
            $int_res=mysql_query($sql);
            $int_set=mysql_fetch_array($int_res);

         $num_images=$people->get_num_images($data_set["member_id"]);
         if($num_images==0)
         {
          $gender=$people->check_gender($data_set["member_id"]);
          if($gender=="Male")
          {
           $image="<img alt='' src='images/male.gif' width='90' border=0>";
          }
          else
          {
           $image="<img alt='' src='images/female.gif' width='90' border=0>";
          }
         }
         else
         {
          $image_url=$people->get_image($data_set["member_id"]);
          $pic_name=str_replace('user_images/', '', $image_url);
          $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
         }

?>

<tr>
<td width="5%">&nbsp;</td>
<td width="22%" align="left" class="text" valign="top" >
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$image?>
</a>
<br><a href="view_profile.php?member_id=<?=$data_set["member_id"]?>"> <?=$data_set["display_name"]?> </a><br>
</td>
<td width =45% height="90" align="left"  class="text" valign="top">
<span class="btext">Headline:</span>&nbsp;<?=$int_set["headline"]?><br>
<span class="btext">Orientation:</span>&nbsp;
<?php
if($back_set["sexual"]=="1")
{
?>
Straight
<?php
}
?>

<?php
if($back_set["sexual"]=="2")
{
?>
Gay
<?php
}
?>

<?php
if($back_set["sexual"]=="3")
{
?>
Bi
<?php
}
?>

<?php
if($back_set["sexual"]=="4")
{
?>
Not Sure
<?php
}
?>

<?php
if($back_set["sexual"]=="0" || $back_set["sexual"]==Null)
{
?>
No Answer
<?php
}
?>

<br>
<span class="btext">HereFor:</span>&nbsp;<?=$data_set["here_for"]?>,
<br>
<span class="btext">Gender:</span>&nbsp;<?=$data_set["gender"]?><br>
<span class="btext">Age:</span>&nbsp;
<?php
        $days=datediff($data_set["dob"], GetTodayDate(0));
        $years=Round($days/365, 0);
?>
<?=$years?>
<br>
<span class="btext">Location:</span>&nbsp;<?=$data_set["city"]?>, <?=$data_set["state"]?> , <?=$data_set["country"]?> <br>
<span class="btext">Last On:</span>&nbsp;<?=$data_set["last_login"]?>
</td>
<td width=3%>&nbsp;</td>
<td width="25%" valign="top" align="left">
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">View Profile</a><br>
<a href="send_message.php?member_id=<?=$data_set["member_id"]?>">Send Message</a><br>
<a href="forward_friend.php?member_id=<?=$data_set["member_id"]?>">Forward to a Friend</a><br>
<a href="add_preffered.php?friend_id=<?=$data_set["member_id"]?>">Add to Blog Preferred List</a><br>
<a href="add_bookmark.php?friend_id=<?=$data_set["member_id"]?>">Add to Bookmark</a>
</td>
</tr>
<tr>
<td width="5%" height="20"></td>
<td colspan="4">
<br>
<hr>
<br>
</td>
</tr>
<?php
     }
?>
</table>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
</tr>
</table>
</td>
</tr>
</table>

<table border="0" cellspacing="5" cellpadding="0" width="100%" bordercolor="#000000" bgcolor="white">
<tr>
<td colspan="4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan='4' align="center">

<?php
if($type==1)
{
        if($n!=0)
        {
        $n_previous=$n-10;
?>
&#187; <a href='search_profiles.php?type=<?=$type?>&searchrequest=<?=$HTTP_GET_VARS["searchrequest"]?>&n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='search_profiles.php?type=<?=$type?>&searchrequest=<?=$HTTP_GET_VARS["searchrequest"]?>&n=<?=$n_next?>'>Next</a>
<?php
        }
}
?>

<?php
if($type==2)
{
        if($n!=0)
        {
        $n_previous=$n-10;
?>
&#187; <a href='search_profiles.php?type=<?=$type?>&searchBy=<?=$HTTP_GET_VARS["searchBy"]?>&f_first_name=<?=$HTTP_GET_VARS["f_first_name"]?>&n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='search_profiles.php?type=<?=$type?>&searchBy=<?=$HTTP_GET_VARS["searchBy"]?>&f_first_name=<?=$HTTP_GET_VARS["f_first_name"]?>&n=<?=$n_next?>'>Next</a>
<?php
        }
}
?>

<?php
if($type==3)
{
        if($n!=0)
        {
        $n_previous=$n-10;
?>
&#187; <a href='search_profiles.php?type=<?=$type?>&school_name=<?=$HTTP_GET_VARS["school_name"]?>&state=<?=$HTTP_GET_VARS["state"]?>&n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='search_profiles.php?type=<?=$type?>&school_name=<?=$HTTP_GET_VARS["school_name"]?>&state=<?=$HTTP_GET_VARS["state"]?>&n=<?=$n_next?>'>Next</a>
<?php
        }
}
?>

</td>
<td width="10%">&nbsp;&nbsp;</td>
</tr>
</table>
</td>
</tr>
</table>

</td>
</tr><!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
