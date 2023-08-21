<?php
  session_start();
?>
<?php
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
  print "<form name='UploadImages' action='upload_photos1.php' ENCTYPE='multipart/form-data' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'>";

  print "<INPUT TYPE='FILE' SIZE='40' NAME='image'><BR>";
  print "Allowed Formats: *.jpg,*.jpeg,*.png,*.tif,*.gif";
  print "</td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Save Changes'></p></td></tr>";
  print "</form>";

// Upload Image Code


    print "</table><br>";
      include("includes/people.class.php");
      $people=new people;
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Manage your Gallery</h3></td></tr>";


  print "<tr><td colspan='2' class='login'>";
  print "<table>";

        $sql="select * from photos where member_id = $_SESSION[member_id]";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows!=0)
  {
    $a=0;
    while($RSUser1=mysql_fetch_array($result1))
    {

      if ($a%4==0)
      {

        print "</tr>";
        print "<tr>";
      }


      print "<td width='25%'class='txt_label'>";
      print "<p align='center'>&nbsp;";
      print "<a href='view_photo.php?member_id=$_SESSION[member_id]&photo_id=$RSUser1[photo_id]'>";
      $pic_name=str_replace('user_images/', '', $RSUser1["photo_url"]);
      $image = "<img src='image_gd/image.php?$pic_name' border='0'>";
      print $image;
      
      print "</a>";
      print "<br><a href='delete_pic.php?photo_id=$RSUser1[photo_id]'>Delete Pic</a>";
            $check=$people->check_main_image($RSUser1["photo_id"]);
            if($check==0)
            {
             print "<br><a href='make_main.php?photo_id=$RSUser1[photo_id]'>Make this Image Main</a>";
            }
            else
            {
             print "<br>Main Image";
            }
      print "</p>";
      print "</td>";
      $a=$a+1;
    }
  }
    else
  {

    print "<tr>";
    print "<td width='100%' class='login'>";
    print "<p align='center'>There are no images yet.</p>";
    print "</td></tr>";
  }


  print "</table>";
    print "</td></tr></table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
