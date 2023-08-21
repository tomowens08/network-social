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

<p align='center'>
<?

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Group Bulletin</h3></td></tr>";

  print "<tr><td colspan='2' class='txt_label'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";

  // run loop to display all my_groups

     include("includes/class.groups.php");
     include("includes/people.class.php");

     $group=new groups;
     $people=new people;
     $group_id=$HTTP_GET_VARS["group_id"];
     $group_info=$group->get_group_info($group_id);

     if($group_info["post_bulletins"]=="1")
     {
?>

<table cellSpacing=0 cellPadding=5 width="500" bgColor=#ffffff border=0>
<tbody>
<tr>
<td vAlign='top' width='100%' colspan='2'><a href="view_group.php?group_id=<?=$group_id?>">Back to Group</a></td>
</tr>
<tr>
<td colSpan=2>

<!-- view forum -->
<?php
     include("includes/gbulletins.class.php");
     $bulletin=new bulletin;
     $creator=$bulletin->get_topic_creator($HTTP_GET_VARS["bulletin_id"]);
     
     $res=$bulletin->get_bulletin($HTTP_GET_VARS["bulletin_id"]);
     $data_set=mysql_fetch_array($res);
?>
<TABLE cellSpacing=0 cellPadding=5 width='650' bgColor=#ffffff>
  <TBODY>
  <TR>
    <TD></TD>
    <TD><BR><SPAN class=style9>Read Bulletin</SPAN></TD></TR>
  <TR>
    <TD vAlign=top width=120><BR><BR>&nbsp;&nbsp;</TD>
    <TD vAlign=top>
      <TABLE cellSpacing=6 cellPadding=0 width="90%" border=0>
        <TBODY>
        <TR>
          <TD><BR>
            <TABLE cellSpacing=1 cellPadding=5 width="100%" bgColor=#c5d8eb
            border=0>
              <TBODY>
              <TR vAlign=center bgColor=#ffffff>
                <TD width="14%" bgColor=#e8f1fa><SPAN
                  class='txt_label'>From:</SPAN></TD>
                <TD width="86%">
<?php
                       $poster_name=$people->get_name($data_set["member_id"]);
                       $num_images=$people->get_num_images($data_set["member_id"]);
                       if($num_images==0)
                       {
                          $image="<IMG alt='' src='images/no_pic.gif' width=90 border=0>";
                       }
                       else
                       {
                          $image_url=$people->get_image($data_set["member_id"]);
                          $image="<IMG alt='' src='$image_url' width=90 border=0>";
                       }
?>
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$image?>
</a> <SPAN class=text>
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$poster_name?></a></span><br><br>

<DIV class=DataPoint=OnlineNow;UserID=4885511; id=UserDataNode0 style="WIDTH: 80px; HEIGHT: 20px"></DIV></TD></TR>

<TR vAlign=center bgColor=#ffffff>
<TD width="14%" bgColor=#e8f1fa><SPAN class='txt_label'>Date:</SPAN></TD>
<TD width="86%"><FONT face=verdana size=2><?=$data_set["posted_on"]?></FONT></TD></TR>
<TR vAlign=center bgColor=#ffffff>
<TD width="14%" bgColor=#e8f1fa><SPAN class='txt_label'>Subject:</SPAN></TD>
<TD width="86%"><FONT face=verdana size=2><?=$data_set["subject"]?></FONT></TD></TR>
              <TR vAlign=center bgColor=#ffffff>
                <TD width="14%" bgColor=#e8f1fa><SPAN
                  class='txt_label'>Body:</SPAN></TD>
                <TD width="86%"><SPAN class=blacktextnb10><FONT face=verdana
                  size=2><?=$data_set["body"]?></FONT></SPAN></TD></TR></TBODY></TABLE>
<table cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD vAlign=center align=left><BR><input onclick="window.open('send_message.php?group_id=<?=$group_id?>&member_id=<?=$data_set["member_id"]?>', '_self')" type=button value="-Reply To Poster-">&nbsp;&nbsp;
<?php
     if($creator==$_SESSION["member_id"])
     {
?>
  <input onclick="window.open('delete_bulletin.php?group_id=<?=$group_id?>&bulletin_id=<?=$data_set["id"]?>', '_self')" type=button value=-Delete- name=action>
<?php
     }
?>

<?php
     }
     else
     {
?>
This forum does not allow to post bulletins.
<?php
     }

  // run loop to display all my_groups
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</table>
</table>
</table>
</table>
</table>
</table>

<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
