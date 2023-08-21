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

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/right_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2' style='border-collapse: collapse' bordercolor='#000000'>";


        $sql="select * from music_songs where id=".$HTTP_GET_VARS["id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "<tr><td colspan='2' class='dark_blue_white2'><b><p align='center'><span class='style18'>$RSUser[song_name]'s Construtive Critism</span></b></p></td></tr>";




        $sql="select * from song_critisize where song_id = $HTTP_GET_VARS[id]";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);
        
     include("includes/people.class.php");
     $people=new people;


  if ($num_rows==0)
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>";
    print "There are no critisim written for this song yet.";
    print "<br><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back to Profile</a>";
    print "</p></td></tr>";
  }
    else
  {
    $sr_no=1;
    while($RSUser1=mysql_fetch_array($result1))
    {
      print "<tr><td width='100%' colspan='2' class='login'>";
      print "<table width='100%'>";
      print "<tr><td width='20%' valign='top'>";

     $num_images=$people->get_num_images($RSUser1["posted_by"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($RSUser1["posted_by"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='90' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='90' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($RSUser1["posted_by"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }

      print $image;

      print "</td>";


        $sql="select * from members where member_id = ".$RSUser1["posted_by"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

      print "<td width='60%' valign='top'>";

      print "<table width='100%'>";
      print "<tr><td width='100%' class='txt_label'>";
      print "<b>Rated By:</b> <a href='view_profile.php?member_id=$RSUser[member_id]'>$RSUser[member_name]</a>";
      print "</td></tr>";
      print "<tr><td width='100%' class='txt_label'>";
      print "<b>Posted On:</b> $RSUser1[posted_on]";
      print "</td></tr>";

      print "<tr><td width='100%' class='txt_label'>$RSUser1[comments]</td></tr>";
      print "</table>";
      print "</td>";



      print "</table>";
      print "</td></tr>";
    }

  }

    print "<tr>";
    print "<td width='100%' colspan='2' class='txt_label'><p align='center'><a href='view_profile.php?member_id=$HTTP_GET_VARS[member_id]'>Back</a></p></td></tr>";

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
