<?php
session_start();
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


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Upload Photographs</h3></td></tr>";


// Upload Image Code

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";


// Upload Image Code

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
$file_name_uploaded=$HTTP_POST_FILES["image"]["name"];
$ext = strtolower(end(explode('.', $file_name1)));

if($ext!="jpg"&&$ext!="jpeg"&&$ext!="png"&&$ext!="tif"&&$ext!="gif")
{
  print "<table width='100%'>";


// Links Message

  print "<tr>";
  print "<td width='70%' valign='top' class='txt_label'>";
  print "<br><b>Err# The image format you uploaded is not supported by our system.</b><br>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#E3E4E9'><b><p align='center'><span class='style18'>Upload Your Photographs</b></span></p></td></tr>";

// Upload Image Code
  print "<form name='UploadImages' action='upload_new_photo1.php?user_id=$HTTP_GET_VARS[user_id]' ENCTYPE='multipart/form-data' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'>";

  print "<INPUT TYPE='FILE' SIZE='40' NAME='image'><br>";
  print "Allowed Formats: *.jpg,*.jpeg,*.png,*.tif";
  print "</td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Save Changes'></p></td></tr>";
  print "</form>";

// Upload Image Code


  print "</table>";
}
else
{

$picture_name=$_SESSION["member_id"].$picture_id."90998.".$ext;

$picture_url="user_images/".$picture_name;

$result = move_uploaded_file($_FILES["image"]["tmp_name"], $uploaddir.$picture_name);

        $sql="insert into photos";
        $sql.="(member_id";
        $sql.=", photo_url)";
        $sql.=" values($HTTP_GET_VARS[user_id]";
        $sql.=", '$picture_url')";
        $result=mysql_query($sql);

                print "<b>Your image has been uploaded.</b>";
                print ("<script language='JavaScript'> window.location='invite.php?new=1'; </script>");

}
}
else
{
                print "<b>There was an error!</b>";
}





print "</td></tr>";

// Upload Image Code

?>

<!-- middle_content -->
</table>
</form>
</td></tr>
</table>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
