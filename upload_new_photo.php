<?php
include("includes/top.php");
?>
<link href="styles/layout.css" type=text/css rel=stylesheet>
<link href="styles/color.css" type=text/css rel=stylesheet>
<link href="styles/frontpage.css" type=text/css rel=stylesheet>
<?php
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<?php

  print "<table width='100%'>";
  print "<tr>";
  print "<td width='30%'  valign='top'>";


// Left Column

  print "<table width='100%'>";


// Links Message

  print "<tr>";
  print "<td width='70%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#E3E4E9'><b><p align='center'><span class='style18'>Upload Your Photographs</b></span></p></td></tr>";

// Upload Image Code
  print "<form name='UploadImages' action='upload_new_photo1.php?user_id=$HTTP_GET_VARS[user_id]' ENCTYPE='multipart/form-data' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='txt_label'>";

  print "<INPUT TYPE='FILE' SIZE='40' NAME='image'><br>";
  print "Allowed Formats: *.jpg,*.jpeg,*.png,*.tif,*.gif";
  print "</td></tr>";

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Save Changes'></p></td></tr>";
  print "</form>";

// Upload Image Code


  print "</table>";
  print "</td></tr></table>";
  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";
?>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
