<?php
  session_start();
?>
<?php
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
<td align="left" class='txt_label' valign="top" width="780">
<br>City Search</font>

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
	if (frmObj.country.options[frmObj.country.selectedIndex].value == "United States Of America")
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

<table border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#6699CC" width="750">
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

        $sql_paging="select count(*) as a from members a where 1=1 ";
        if($HTTP_GET_VARS["city_name"]!=Null)
        {
         $sql_paging.=" and a.city like '%$HTTP_GET_VARS[city_name]%'";
        }


        $sql="select * from members a where 1=1 ";
        if($HTTP_GET_VARS["city_name"]!=Null)
        {
         $sql.=" and a.city like '%$HTTP_GET_VARS[city_name]%'";
        }

        $sql.=" limit $n, 10";
        //print $sql;
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



     // search sql

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
          $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
         }
         else
         {
          $image_url=$people->get_image($data_set["member_id"]);
          $image="<img alt='' src='$image_url' width='60' height='60' border=0>";
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
</tr>
</table>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
