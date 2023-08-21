<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "htmlareafiles/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>
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

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Send a reply</h3></td></tr>";



  if ($HTTP_GET_VARS["folder"]=="inbox"||$HTTP_GET_VARS["folder"]==Null)
  {
        $sql="select * from messages where mess_id = $HTTP_GET_VARS[mess_id]";
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);
        $member_id1=$RSUser1["mess_by"];
  } 


  print "<form name='AddTestimonial' action='send_message1.php?member_id1=$member_id1' method='post'>";
    include("includes/people.class.php");

     $people=new people;
     $name=$people->get_name($member_id1);
     $num_images=$people->get_num_images($member_id1);
     if($num_images==0)
     {
         $gender=$people->check_gender($member_id1);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width=90 border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width=90 border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($member_id1);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image.php?$pic_name' border='0'>";
     }


  print "<tr>";
  print "<td width='30%' class='txt_label' bgcolor='#CCCCFE' valign='top'>To:</td>";
  print "<td width='70%' class='txt_label'>";
  print $image;
  print "<br>";
  print $name;
  print "</td></tr>";

  print "<tr>";
  print "<td width='40%' class='txt_label' bgcolor='#E3E4E9' valign='top'>Subject:</td><td width='60%' class='txt_label'>";
  print "<input type='text' name='subject' size='30' value='Re: $HTTP_POST_VARS[subject]'>";
  print "</td></tr>";


  print "<tr>";
  print "<td width='40%' class='txt_label' bgcolor='#E3E4E9' valign='top'>Message:</td><td width='60%' class='txt_label'>";

  print "<textarea name='message' rows='5' cols='30' style='width:550; height:300'>";
?>
<br><br><br>


----- Original Message -----
<br>
Date: <?=myDate($HTTP_POST_VARS["posted_on"]);?>
<br>
Message: <?=stripslashes($HTTP_POST_VARS["message"])?>

<?php
  
  print "</textarea>";
?>
<script language="javascript1.2">
editor_generate('message');
</script>
<?php

  print "</td></tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'><p align='center'><input type='submit' name='submit' value='Send Message'></p></td></tr>";
  print "</form>";


  print "</table>";
  print "</td>";

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
