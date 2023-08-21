<?php
include("includes/top.php");
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
include("includes/nav.php");
include("includes/conn.php");
include("includes/blog.class.php");
	if (count($HTTP_POST_VARS)) {

     $month=$HTTP_POST_VARS["month"];
     $date=$HTTP_POST_VARS["date"];
     $subject=$HTTP_POST_VARS["subject"];
     $body=$HTTP_POST_VARS["body"];
     $mode=$HTTP_POST_VARS["mode"];
     $mood=$HTTP_POST_VARS["mood"];
     $allow_comments=$HTTP_POST_VARS["allow_comments"];
     if($allow_comments!="on")	{
         $allow_comments=0;
     } else {
         $allow_comments=1;
     }
     $privacy=$HTTP_POST_VARS["privacy"];
     if($subject==Null||$body==Null) {

			$_SESSION['msg'] =  'You did not enter a subject or a body for the blog.';
     } else {
        $blog=new blog;
        $res = $blog->add_blog($_SESSION["member_id"],$date,$subject,$body,$mode,$mood,$allow_comments,$privacy);
     		if($res==1)	{
					$_SESSION['msg'] = 'Your blog has been saved successfully.';
				} else {
						$_SESSION['msg'] = 'There was an error and the blog was not saved at this time. Please check back later.';
        }
     }
		echo '<script>document.location.replace(\''.$_SERVER['PHP_SELF'].'\')</script>';
	}
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->
<table width='100%'>

<?php

  print "<table width='100%'>";
  print "<tr>";
  print "<td width='30%'  valign='top'>";
  print "<table width='100%'>";

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
<TD width="50%" class='style9'><STRONG>Post a New Blog Entry</STRONG></TD>

<TD class=text align=right width="50%" class='style9'>
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

<TD class='style9' vAlign=top width=620>
<!-- blog_middle -->
<?
echo $_SESSION['msg'];
?>
<!-- blog_middle -->
</td>
</tr>


</table>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
