<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Send Message</h3></td></tr>";


  print "<form name='AddTestimonial' action='send_message1.php?member_id1=".$HTTP_GET_VARS["member_id"]."' method='post'>";
    include("includes/people.class.php");

     $people=new people;
     $name=$people->get_name($HTTP_GET_VARS["member_id"]);
     $num_images=$people->get_num_images($HTTP_GET_VARS["member_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($HTTP_GET_VARS["member_id"]);
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
        $image_url=$people->get_image($HTTP_GET_VARS["member_id"]);
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
  print "<td width='30%' class='txt_label' bgcolor='#CCCCFE' valign='top'>Subject:</td>";
  print "<td width='70%' class='txt_label'>";
  print "<input type='text' name='subject' size='30'>";
  print "</td></tr>";


  print "<tr>";
  print "<td width='30%' class='txt_label' bgcolor='#CCCCFE' valign='top'>Message:</td>";
  print "<td width='70%' class='txt_label'>";
  print "<textarea name='message' rows='5' cols='30' style='width:550; height:300'></textarea>";
?>
<script language="javascript1.2">
editor_generate('message');
</script>
<?php
  print "</td></tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'>";
  print "<p align='center'><input type='submit' name='submit' value='Send Message'></p></td></tr>";
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
