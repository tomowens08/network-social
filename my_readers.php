<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF"> <blockquote>
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
<table>

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
<br><br>
<table width="100%" border="1" cellpadding="2" cellspacing="0">
<tr align="left" valign="middle">
<td width="100%" bgcolor="A5D5F5" class='txt_label' style="color:black; font-weight: bold; font-size: 10pt;">&nbsp;&nbsp;&nbsp;My Readers</td>
</tr>

<tr align="left" valign="top" bgcolor="FFFFFF">
<td colspan="2" class="blacktext7">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<tr align="left" valign="top" bgcolor="FFFFFF">
<td width="15" align="center"><img src="images/1by1.gif" width="15" height="8"></td>
<td align="left" valign="middle" class='txt_label'><strong>Name</strong></td>
<td width="75" align="center" valign="middle" class='txt_label'><strong>Subscribed</strong></td>
<td width="100" align="center" valign="middle" class='txt_label'><strong>Notify</strong></td>
<!--
<td width="100" align="center" valign="middle" class="blacktext7"><strong>Edit Options</strong></td>
-->
</tr>

<?php
     $sub_res=$blog->get_readers($_SESSION["member_id"]);
     while($sub_set=mysql_fetch_array($sub_res))
     {
        $name=$people->get_name($sub_set["member_id"]);
?>
<tr align="left" valign="top" bgcolor="FFFFFF">
<td width="15" class='txt_label' align="center" valign="middle">
<a href="view_profile.php?member_id=<?=$sub_set["member_id"]?>" target="_blank">
<img src="images/preview.bmp" alt="Preview" width="15" border="0"></a></td>
<td class='txt_label' valign="middle">
<a href="view_profile.php?member_id=<?=$sub_set["member_id"]?>" target="_blank"><?=$name?></a></td>
<td class='txt_label' width="75" align="center" valign="middle"><?=$sub_set["sub_on"]?></td>
<?php
     if($sub_set["notify"]=="1")
     {
?>
<td class='txt_label' width="100" align="center" valign="middle">Yes</td>
<?php
     }
     else
     {
?>
<td class='txt_label' width="100" align="center" valign="middle">No</td>
<?php
     }
?>
<!--
<td class='txt_label' width="100" align="center" valign="middle">
<a href="edit_subscription.php?id=<?=$sub_set["id"]?>" class="man">Edit</a> |
<a href="remove_subscription.php?id=<?=$sub_set["id"]?>" style="color:990000; font-weight:none; font-size: 8pt;" class="man" onclick="return confirmRemove()">Remove</a>
</td>
-->
</tr>
<?php
     }
?>
</table>
</table>
<!-- middle_content -->
</table>
</table>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
