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
  print "<h3>Upload Photographs</h3></td></tr>";


// Upload Image Code

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";

if(!empty($_FILES["image"]))
{
$result=mysql_query("select max(photo_id) as a from photos");
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
$ext = strtolower(end(explode('.', $file_name1)));
if($ext!="jpg"&&$ext!="jpeg"&&$ext!="png"&&$ext!="tif"&&$ext!="gif")
{
            print "<b>Err# The image format you uploaded is not supported by our system.</b>";
            print "<br><a href='manage_photos.php'>Back to manage photos</a>";
            print "<br><a href='logincomplete.php'>Return to home</a>";
}

else
{
$picture_name=$_SESSION["member_id"].$picture_id.time().".".$ext;

$picture_url="user_images/".$picture_name;

$result = move_uploaded_file($_FILES["image"]["tmp_name"], $uploaddir.$picture_name);

        $sql="insert into photos";
        $sql.="(member_id";
        $sql.=", photo_url)";
        $sql.=" values($_SESSION[member_id]";
        $sql.=", '$picture_url')";
        $result=mysql_query($sql);
        if ($result) {
					mysql_query("update members set uploaded_img = '1' where member_id = ".$_SESSION['member_id']);
				}
            print "<b>Your image has been uploaded.</b>";
            print "<br><a href='manage_photos.php'>Back to manage photos</a>";
            print "<br><a href='logincomplete.php'>Return to home</a>";

}
}
else
{
                print "<b>There was an error!</b>";
            print "<br><a href='manage_photos.php'>Back to manage photos</a>";
            print "<br><a href='logincomplete.php'>Return to home</a>";

}





print "</td></tr>";

// Upload Image Code


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
