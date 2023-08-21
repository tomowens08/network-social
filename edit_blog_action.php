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

<?php
include("includes/blog.class.php");
?>
<table width='100%'>

<?php

  print "<table width='100%'>";
  print "<tr>";
  print "<td width='30%'  valign='top'>";


// Left Column

  print "<table width='100%'>";


// Links Message

  //print "<tr>";
  //print "<td>";
  //include("includes/comm1.php");


  //print "<tr><td width='100%' bgcolor='#E3E4E9'><b><div align='center'><span class='style18'>Manage Account</span></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_profile.php' class='style11'>Edit Profile</a></b></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='upload_photos.php' class='style11'>Upload Photos</a></b></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_testimonials.php' class='style11'>Edit Testimonials</a></b>&nbsp;";

//        $sql="select count(*) as a from testimonials where member_id = ".$_SESSION["member_id"]." and approved = 0";
//        $result1=mysql_query($sql);
//        $RSUser1=mysql_fetch_array($result1);

//  print "(".$RSUser1["a"].")";
//  print "</td></tr>";
//  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='myfriends.php?page=1' class='style11'>Edit Friends</a></b></td></tr>";
//  print "</table>";
//  print "</td>";
//  print "</tr>";

// Links Message



//  print "</table>";

//  print "</td>";

  print "<td width='100%' valign='top'>";

?>
<TABLE cellSpacing=0 cellPadding=5 width='720' bgColor=#ffffff border=0>
<TBODY>
<TR>
<TD>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
<TBODY>
<TR>
<TD class=blacktext10nb colSpan=2>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD width="50%" class='txt_label'><STRONG>Post a New Blog Entry</STRONG></TD>

<TD class=text align=right width="50%" class='txt_label'>
<a href="my_blog.php">View My Blog</a>
</TD></TR></TBODY></TABLE></td></tr>

<!-- top -->

<?php
     include("includes/blog_top_links.php");
     include("includes/blog_my_profile.php");
     include("includes/blog_views.php");
     include("includes/blog_my_controls.php");
     include("includes/blog_groups.php");

?>



<TR>
<TD></TD></TR></TBODY></TABLE></TD>

<TD class='txt_label' vAlign=top width=620>
<!-- blog_middle -->

<?php
     $subject=$HTTP_POST_VARS["subject"];
     $body=$HTTP_POST_VARS["body"];
     $mode=$HTTP_POST_VARS["mode"];
     $mood=$HTTP_POST_VARS["mood"];
     $allow_comments=$HTTP_POST_VARS["allow_comments"];
     if($allow_comments!="on")
     {
         $allow_comments=0;
     }
     else
     {
         $allow_comments=1;
     }
     $privacy=$HTTP_POST_VARS["privacy"];
     if($subject==Null||$body==Null)
     {
?>
  You did not enter a subject or a body for the blog.
<?php
     }
     else
     {
         $blog_id=$HTTP_GET_VARS["id"];
         $blog=new blog;
         
         $res=$blog->edit_blog($blog_id,$subject,$body,$mode,$mood,$allow_comments,$privacy);
         if($res==1)
         {
             // send notification to all subscribers
                $sql="select * from blog_subscriptions a, members b";
                $sql.=" where a.sub_member_id = b.member_id and a.member_id = $_SESSION[member_id]";
                $sql.=" and a.notify = '1'";

                $res=mysql_query($sql);

                while($data_set=mysql_fetch_array($res))
                {
                    // send email
                    $to=$data_set["member_email"];
                    $subject="A blog was edited in your subscription on $site_name";

                    $message = "<html><head><title>$site_name</title></head><body>";
                    $message.= "<p>Dear $data_set[member_name]&nbsp;$data_set[member_lname],<br>&nbsp;<br>";
                    $message.= "A blog was edited in your subscription on $site_name. ";
                    $message.= "Please login to your account to check the blog.<br>";
                    $message.= "<b>Privacy -</b> Your privacy is extremely important to us. We do not sell or give your information to anybody without your permission except law enforcement agencies.<br>";
                    $message.= "&nbsp;<br>Please click here to see our <u><a href='$site_url/privacy_policy.php' target='_blank'>Privacy Policy</a></u>.<br>";
                    $message.= "&nbsp;<br>Have a great day and best of luck!<br>";
                    $message.= "&nbsp;<br>&nbsp;<br>Thank you,<br>";
                    $message.= "&nbsp;<br>$site_name Team<br></p>";
                    $message.= "</body></html>";

                    $headers  = "From:$from_name <$from_email>\r\n". "Content-Type: text/html; charset=ISO-8859-1\r\n". "Return-Path: <$from_email>\n";
                    mail($to, $subject, $message, $headers);
                    // send email
                }
             // send notification to all subscribers

?>
  Your blog has been saved successfully.
<?php
         }
         else
         {
?>
   There was an error and the blog was not saved at this time. Please check back later.
<?php
         }
     }
?>

<!-- blog_middle -->

</td>
</tr>


<!-- middle_content -->
</table>

<!-- Middle Text -->
<?php
}
     include("includes/bottom.php");
?>
