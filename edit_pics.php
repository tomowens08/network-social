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
      include("includes/people.class.php");
      $people=new people;



  print "<td width='80%' valign='top'>";
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
  print "</td></tr>";
  print "</table>";
//    print "</table>";
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
