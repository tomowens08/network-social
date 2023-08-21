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


<TABLE cellSpacing=0 cellPadding=0 width=536 border=0>
<TBODY>
<TR>
<TD class=style1 width='100%' valign='top'>
<p align='center'>
<table width='100%'>

<?php

  print "<table width='100%'>";
  print "<tr>";
  print "<td width='30%'  valign='top'>";


// Left Column

  print "<table width='100%'>";

  print "<tr>";

  print "<td width='70%'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#E3E4E9'><b><p align='center'><span class='style18'>Fill in your profile!</span></b></p></td></tr>";

        $sql="select * from member_profile where member_id = ".$HTTP_GET_VARS["user_id"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser1=mysql_fetch_array($result);
  if ($num_rows==0)
  {

    print "<form name='EditProfile' action='edit_new_profile1.php?status=New&user_id=$HTTP_GET_VARS[user_id]' method='post'>";
    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9' valign='top'>Status : </td><td width='60%' class='style9'>";

    print "<input type='radio' value='Single/Divorced/Separated' name='status'>Single/Divorced/Separated<br>";
    print "<input type='radio' value='In a relationship' name='status'>In a Relationship<br>";
    print "<input type='radio' value='Married' name='status'>Married<br>";
    print "<input type='radio' value='Open Marriage' name='status'>Open Marriage<br>";

    print "</td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Age : </td><td width='60%' class='login'><input type='text' name='age' size='3'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Occupation : </td><td width='60%' class='login'><input type='text' name='occupation' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Location : </td><td width='60%' class='login'><input type='text' name='location' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Hometown : </td><td width='60%' class='login'><input type='text' name='hometown' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Interests : </td><td width='60%' class='login'><textarea name='interests' rows='3' cols='20'></textarea></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Favourite Music : </td><td width='60%' class='login'><input type='text' name='favourite_music' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Favourite Books : </td><td width='60%' class='login'><input type='text' name='favourite_books' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Favourite TV Shows : </td><td width='60%' class='login'><input type='text' name='favourite_tv' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Favourite Movies : </td><td width='60%' class='login'><input type='text' name='favourite_movies' size='20'></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>About Me : </td><td width='60%' class='login'><textarea name='about_me' rows='3' cols='20'></textarea></td></tr>";

    print "<tr>";
    print "<td width='40%' class='style9' bgcolor='#E3E4E9'>Who I want to meet : </td><td width='60%' class='login'><textarea name='about_partner' rows='3' cols='20'></textarea></td></tr>";

    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'><input type='submit' name='submit' value='Save Changes'></p></td></tr>";
    print "</form>";
  }

  print "</table>";
  print "</td></tr></table>";


  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";
?>

</td>
</tr>
</table>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
