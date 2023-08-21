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
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='100%'>";
  print "<tr>";
  
/*
  print "<td width='30%'  valign='top'>";


// Left Column

  print "<table width='100%'>";


// Links Message

  print "<tr>";
  print "<td>";
  include("includes/comm1.php");


  print "<tr><td width='100%' bgcolor='#E3E4E9'><b><div align='center'><span class='style18'>Manage Account</span></td></tr>";
  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_profile.php' class='style11'>Edit Profile</a></b></td></tr>";
  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='upload_photos.php' class='style11'>Upload Photos</a></b></td></tr>";
  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_testimonials.php' class='style11'>Edit Testimonials</a></b>&nbsp;";

        $sql="select count(*) as a from testimonials where member_id = ".$_SESSION["member_id"]." and approved = 0";
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "(".$RSUser1["a"].")";
  print "</td></tr>";
  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='myfriends.php?page=1' class='style11'>Edit Friends</a></b></td></tr>";
  print "</table>";
  print "</td>";
  print "</tr>";

// Links Message


  print "</table>";

  print "</td>";
*/

  print "<td width='100%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='login' bgcolor='#FF6600'><b><p align='center'><span class='style18'>Search through your friend network!!</span></b></p></td></tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'>";
  print "[<a href='search.php?value=interests' class='style11'>Search by interests</a>]&nbsp;[<a href='search.php?value=favourites' class='style11'>Search By Favourites</a>]&nbsp;[<a href='search.php' class='style11'>Search By Name</a>]<br>[<a href='advanced_search.php' class='style11'>Advanced Search</a>]";
  print "</p></td></tr>";


  print "<form name='Search' action='advanced_search1.php' method='post'>";
  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='left'>";
  print "<table width='100%'>";
  print "<tr><td width='30%'>Sex:</td>";
  print "<td width='70%'><input type='radio' value='Female' checked name='Sex'>Female<input type='radio' name='Sex' value='Male'>Male</td>";
  print "</tr>";
  print "<tr><td width='30%'>Location:</td>";
  print "<td width='70%'><input type='text' name='location' size='20'></td>";
  print "</tr>";
  print "</tr>";
  print "<tr><td width='30%'>Keywords:</td>";
  print "<td width='70%'><textarea name='keywords' rows='5' cols='40'></textarea></td>";
  print "</tr>";
  print "</tr>";
  print "<tr><td width='30%'>&nbsp;</td>";
  print "<td width='70%'><input type='submit' name='submit' value='Search'></td>";
  print "</tr>";
  print "</form>";
  print "</table>";
  print "</p></td></tr>";



  print "</table>";
  print "</td></tr></table>";

?>

</td>
</tr>

</table>

<!-- middle_content -->
</blockquote>
</TD>

</TR>
</TBODY>
</TABLE></TD>
</TR>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
