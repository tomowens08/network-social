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
//include("includes/right3.php");
?>
<tr>
<td valign="top" bgcolor="#FFFFFF">
<div align="center">
  <!-- middle_content -->
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
</div>
<TABLE width='720' border=0 align="center" cellPadding=5 cellSpacing=0 bgColor=#ffffff>
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
<TD></TD></TR></TBODY></TABLE>

<TD class='txt_label' vAlign=top width=620>
<!-- blog_middle -->
<?php
     $num_sub=$blog->get_num_sub($_SESSION["member_id"]);
     if($num_sub==0)
     {
?>
You currently have no subscriptions. To subscribe to a friends Blog, view their blog and click "Subscribe".
<!-- blog_middle -->
<?php
     }
     else
     {
?>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr align="left" valign="top">
<td colspan="7" class='txt_label' bgcolor="A5D5F5" style="color:336699; font-weight: bold; font-size: 10pt;">
<font color="000000">&nbsp;&nbsp;&nbsp;Latest Updates </font>
</td>
</tr>

<tr align="left" valign="top" bgcolor="FFFFFF">
<td width="35" align="left" valign="middle" class="blacktext7"><img src="images/1by1.gif" width="1" height="1"></td>
<td width="20" align="right"><img src="images/1by1.gif" width="20" height="1"></td>
<td width="5" align="center" valign="middle" class="blacktext7"><img src="images/1by1.gif" width="1" height="1"></td>
<td align="left" valign="middle" class="blacktext7"><strong>NAME</strong></td>
<td width="250" align="left" valign="middle" class="blacktext7"><strong>SUBJECT</strong></td>
<td width="130" align="center" valign="middle" class="blacktext7" colspan="2"><strong>TIME UPDATED</strong></td>
</tr>

<?php
     $sub_res=$blog->get_subscriptions($_SESSION["member_id"]);
     while($sub_set=mysql_fetch_array($sub_res))
     {
      $blog_res=$blog->get_my_blogs($sub_set["sub_member_id"]);
      $sr_no=0;
        while($blog_set=mysql_fetch_array($blog_res))
        {

         $name=$people->get_name($blog_set["member_id"]);
         
        if($sr_no%2==0)
        {
?>
<tr align="left" valign="top" bgcolor="FFFFFF">
<?php
        }
        else
        {
?>
<tr align="left" valign="top" bgcolor="e5e5e5">
<?php
        }
?>
<td width="35" class='txt_label' align="center" class="redtext8"></td>
<td width="20" class='txt_label' align="right">&raquo;</td>
<td class='txt_label' width="5"><img src="images/1by1.gif" width="1" height="1"></td>
<td class='txt_label'><a href="view_profile.php?member_id=<?=$blog_set["member_id"]?>" class="man" target="_blank"><?=$name?></a></td>
<td class='txt_label' width="250"><a href="view_blog.php?id=<?=$blog_set["id"]?>" class="man" target="_blank"><b><?=$blog_set["subject"]?></b></a></td>
<td class='txt_label' align="center" nowrap><?=$blog_set["last_updated"]?></td><td align="center" nowrap>&nbsp;</td>
</tr>

<?php
       $sr_no=$sr_no+1;
       }
     }
?>

</table>

<?php
     }
?>

</TR></TBODY></DIV>
</table>
</table>

<div align="center">
  <!-- middle_content -->
  
  <!-- Middle Text -->
  <?php
include("includes/bottom.php");
}
?>
</div>
