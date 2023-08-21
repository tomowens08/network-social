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
<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<?php
     include("includes/blog.class.php");
?>
<table width='100%'>

<?php

  print "<table width='100%'>";
  print "<tr>";

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

<?php
     $id=$HTTP_GET_VARS["id"];
     $notify=$HTTP_POST_VARS["notify"];
     if($notify!="on")
     {
         $notify=0;
     }
     else
     {
         $notify=1;
     }

         $blog=new blog;

         $res=$blog->edit_sub($id,$notify);
         if($res==1)
         {
?>
  Your blog subscription has been saved successfully.
<?php
         }
         else
         {
?>
   There was an error and the blog was not saved at this time. Please check back later.
<?php
         }
?>

<!-- blog_middle -->

</TD></TR></TBODY></TABLE></TBODY></TABLE></DIV>
<?php



  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";
?>

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
