<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
$school_id=$HTTP_POST_VARS["school_id"];
$city_id1=$HTTP_POST_VARS["city_id1"];
$school_id=$HTTP_POST_VARS["school_id"];
$city_id=$HTTP_POST_VARS["city_id"];
$state_id=$HTTP_POST_VARS["state_id"];
$high_state=$HTTP_POST_VARS["high_state"];
$college_state=$HTTP_POST_VARS["college_state"];
$college_id=$HTTP_POST_VARS["college_id"];
$high_graduated=$HTTP_POST_VARS["high_graduated"];
$high_first=$HTTP_POST_VARS["high_first"];
$high_last=$HTTP_POST_VARS["high_last"];
$high_first_name=$HTTP_POST_VARS["high_first_name"];
$high_last_name=$HTTP_POST_VARS["high_last_name"];
$month=$HTTP_POST_VARS["month"];
$day=$HTTP_POST_VARS["day"];
$year=$HTTP_POST_VARS["year"];
$coll_graduated=$HTTP_POST_VARS["coll_graduated"];
$coll_first=$HTTP_POST_VARS["coll_first"];
$coll_last=$HTTP_POST_VARS["coll_last"];
$coll_first_name=$HTTP_POST_VARS["coll_first_name"];
$coll_last_name=$HTTP_POST_VARS["coll_last_name"];
$salutation=$HTTP_POST_VARS["salutation"];
$last_name=$HTTP_POST_VARS["last_name"];
$email=$HTTP_POST_VARS["email"];
$zip_code=$HTTP_POST_VARS["zip_code"];
$password=$HTTP_POST_VARS["password"];
$last_login=strftime("%m/%d/%Y");

        $sql="select member_id from members where member_email like '".$email."'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);

  if ($num_rows==0)
  {
        $sql="insert into members";
        $sql.="(member_name";
        $sql.=", member_lname";
        $sql.=", member_email";
        $sql.=", member_password";
        $sql.=", email_verify";
        $sql.=", flag";
        $sql.=", last_login";
        $sql.=", enable";
        $sql.=", current_state";
        $sql.=", high_state";
        $sql.=", high_city";
        $sql.=", high_name";
        if($college_state!=Null)
        {
        $sql.=", college_state";
        }
        if($city_id1!=Null)
        {
        $sql.=", college_city";
        }
        if($college_id!=Null)
        {
        $sql.=", college_name";
        }
        $sql.=", high_year_graduated";
        $sql.=", high_first_attended";
        $sql.=", high_last_attended";
        $sql.=", first_name_high";
        $sql.=", last_name_high";
        $sql.=", birth_day";
        $sql.=", birth_month";
        $sql.=", birth_year";
        $sql.=", coll_year_graduated";
        $sql.=", coll_first_attended";
        $sql.=", coll_last_attended";
        $sql.=", first_name_coll";
        $sql.=", last_name_coll";
        $sql.=", salutation";
        $sql.=", zip_code";
        $sql.=")";
        
        $sql.=" values('$high_first_name'";
        $sql.=", '$last_name'";
        $sql.=", '$email'";
        $sql.=", '$password'";
        $sql.=", '0'";
        $sql.=", '0'";
        $sql.=", '$last_login'";
        $sql.=", 1";
        $sql.=", $state_id";
        $sql.=", $high_state";
        $sql.=", $city_id";
        $sql.=", $school_id";
        if($college_state!=Null)
        {
        $sql.=", $college_state";
        }
        if($city_id1!=Null)
        {
        $sql.=", $city_id1";
        }
        if($college_id!=Null)
        {
        $sql.=", $college_id";
        }
        $sql.=", '$high_graduated'";
        $sql.=", '$high_first'";
        $sql.=", '$high_last'";
        $sql.=", '$high_first_name'";
        $sql.=", '$high_last_name'";
        $sql.=", $day";
        $sql.=", '$month'";
        $sql.=", '$year'";
        $sql.=", '$coll_graduated'";
        $sql.=", '$coll_first'";
        $sql.=", '$coll_last'";
        $sql.=", '$coll_first_name'";
        $sql.=", '$coll_last_name'";
        $sql.=", '$salutation'";
        $sql.=", '$zip_code')";

        $result=mysql_query($sql);
        print mysql_error();

        

        
        // E-Mail Code
        print ("<script language='JavaScript'> window.location='edit_new_profile.php?user_id=$user_id'; </script>");
?>
</TD></TR>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
<? 
}
  else
{
?>
<TABLE cellSpacing=0 cellPadding=0 width=536 border=0>
<TBODY>
<TR>
<TD class=style1 width=375 valign='top'>
<BLOCKQUOTE>
<SPAN class=style1>
The E-Mail address you have chosen already exists.<br> Please choose another one by going back.
</TABLE></DIV>
<!-- middle_content --><!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
