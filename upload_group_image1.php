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
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Add a photograph</h3></td></tr>";

  print "<tr><td colspan='2' class='txt_label'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";

  // run loop to display all my_groups

     include("includes/class.groups.php");

     $group=new groups;
     $group_id=$HTTP_GET_VARS["group_id"];
     $group_info=$group->get_group_info($group_id);
     $creator=$group->get_member_id($group_id);

     if($group_info["post_images"]=="1" || $creator==$_SESSION["member_id"])
     {
// Upload Image Code

  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'>";

if(!empty($_FILES["image"]))
{
$result=mysql_query("select max(photo_id) as a from group_photos");
$num_rows=mysql_num_rows($result);
$data_set=mysql_fetch_array($result);
if($num_rows==0)
{
        $picture_id=1;
}
else
{
        $picture_id=$data_set["a"]+1;
}
$file_name1=$_FILES["image"]["name"];

$picture_name=$HTTP_GET_VARS["user_id"].$picture_id.$file_name1;
$picture_url="user_images/".$picture_name;

$result = move_uploaded_file($_FILES["image"]["tmp_name"], $uploaddir.$picture_name);

        $sql="insert into group_photos";
        $sql.="(group_id";
        $sql.=", group_by";
        $sql.=", photo_url)";
        $sql.=" values($group_id";
        $sql.=", $creator";
        $sql.=", '$picture_url')";
        $result=mysql_query($sql);
if($result)
{
                print "<b>Your image has been uploaded.</b><br><br><a href='view_group.php?group_id=$group_id'>Back to Group</a>";
}
else
{
                print "<b>There was an error!</b>";
}
}

print "</td></tr>";

     }
     else
     {
?>
This forum does not allow public image upload.
<?php
     }

  // run loop to display all my_groups
  print "</td></tr>";
  print "</table>";

    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
