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
<TD width="50%" class='style9'><STRONG>Blog Control Center</STRONG></TD>
</TR></TBODY></TABLE></td></tr>

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


<TR>
<TD></TD></TR></TBODY></TABLE></TD>

<TD class='style9' vAlign=top width=620>

<!-- My Blogs Entry -->
<?php
     $people=new people;
?>
<br><br>

<td width="100%" valign="top" class="blacktext10nb">
<br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="003399">
<tr>
<td>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr align="left" valign="middle">
<td width="50%" bgcolor="A5D5F5" style="color:black; font-weight: bold; font-size: 10pt;">&nbsp;&nbsp;&nbsp;My Private List</td>
<td width="50%" align="right" bgcolor="A5D5F5"><a href="search_preffered.php">Find User To Be Added<br>to Your Private List</a></td>
</tr>
<tr align="left" valign="top" bgcolor="FFFFFF">
<td colspan="2" class="blacktext7">
<?php
     $blog=new blog;
     $res=$blog->remove_preffered($HTTP_GET_VARS["id"]);
     if($res==1)
     {
?>
The user has been removed from your preffered list.
<?php
     }
     else
     {
?>
There was an error.
<?php
     }
?>

</td>
</tr>
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


</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV>
<?php



  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";
?>

</td>
</tr>



<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
