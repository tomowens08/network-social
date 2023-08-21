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
<TD width="50%" class='txt_label'><STRONG>Blog Control Center</STRONG></TD>
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

<TD class='txt_label' vAlign=top width=620>

<!-- My Blogs Entry -->
<?php
     $people=new people;
?>

<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr align="left" valign="top">
<td colspan="7" class='txt_label' bgcolor="A5D5F5" style="color:336699; font-weight: bold; font-size: 10pt;">
<font color="000000">&nbsp;&nbsp;&nbsp;My Blogs</font></td>
</tr>
<tr align="left" valign="top" bgcolor="FFFFFF">
<td width="35" align="left" valign="middle" class="style9"><img src="images/1by1.gif" width="1" height="1"></td>
<td width="20" align="right"><img src="images/1by1.gif" width="20" height="1"></td>
<td width="5" align="center" valign="middle" class="txt_label"><img src="images/1by1.gif" width="1" height="1"></td>
<td align="left" valign="middle" class="txt_label"><strong>NAME</strong></td>
<td width="250" align="left" valign="middle" class="txt_label"><strong>SUBJECT</strong></td>
<td width="130" align="center" valign="middle" class="txt_label" colspan="2"><strong>TIME UPDATED</strong></td>
</tr>

<?php
     $blog = new blog;
     $blog_res = $blog->get_my_blogs($_SESSION["member_id"]);

     while($blog_set=mysql_fetch_array($blog_res))
     {
         $name=$people->get_name($blog_set["member_id"]);
         $num_images=$people->get_num_images($blog_set["member_id"]);
         if($num_images==0)
         {
             $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
         }
         else
         {
             $image_url=$people->get_image($blog_set["member_id"]);
             $image="<img alt='' src='$image_url' width=90 border=0>";
         }

?>
<tr align="left" valign="top" bgcolor="FFFFFF">
<td width="35" align="center" class="redtext8"></td>
<td class="style9" width="20" align="right">&raquo;</td>
<td width="5"><img src="images/1by1.gif" width="1" height="1"></td>
<td class="style9"><a href="view_profile.php?member_id=<?=$blog_set["member_id"]?>"><?=$name?></a></td>
<td width="250"><a href="view_blog.php?id=<?=$blog_set["id"]?>"><b><?=$blog_set["subject"]?></b></a></td>
<td class="txt_label" align="center" nowrap><?=myDate($blog_set["last_updated"]);?></td>
<td align="center" nowrap>&nbsp;</td>
</tr>
<?php
     }
?>
</table>


</td>
</tr>


</table>
</td>
</tr>
</td></table>
<tr><td valign='center'>
<?php
include("includes/bottom.php");
}
?>
