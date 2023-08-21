<?php

// Left Column

  print "<table width='100%'>";
  print "<tr>";
  print "<td>";
  print "<table width='100%' border='1' cellpadding='4' bordercolor='#000000' style='border-collapse: collapse'>";


// Links Message

print "<tr><td width='100%' class='txt_label'><b><div align='center'>Music Center</div></b></td></tr>";
print "<tr><td width='100%'><b><a href='music.php' class='style11'>Directory</a></b></td></tr>";
//print "<tr><td width='100%'><b><a href='search_music.php' class='style11'>Search Music</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='top_artists.php' class='style11'>Top Artists</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='top_reviews.php' class='style11'>Top Reviewed</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='music_shows.php' class='style11'>Music Shows</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='music_features.php' class='style11'>Music Features</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='view_classifieds.php?cat_id=9' class='style11'>Music Classifieds</a></b></td></tr>";
print "<tr><td width='100%'><b><a href='music_signup.php' class='style11'>Music Signup</a></b></td></tr>";
print "</table>";

  print "<tr>";
  print "<td>";
  print "&nbsp;";
  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td>";
  print "<table width='100%' border='1' cellpadding='4' bordercolor='#000000' style='border-collapse: collapse'>";

session_start();
if ($_SESSION["logged_in"]!="yes")
{
   print "<tr><td width='100%' class='txt_label'><b><div align='center'>Manage Account</div></b></td></tr>";
  print "<tr><td width='100%'><b>";
  print "<a href='login.php'>You Must Login First</a></b></td></tr>";
  print "<tr><td width='100%'><b><a href='signup.php' class='style11'>Or Sign Up</a></b></td></tr>";
  print "</table>";
  print "</td></tr>";
  print "</table>";
}
  else
{
  print "<tr><td width='100%' class='txt_label'><b><div align='center'>Manage Account</div></b></td></tr>";
  print "<tr><td width='100%'><b>";
  print "<a href='edit_profile.php'>Edit Profile</a></b></td></tr>";
  print "<tr><td width='100%'><b><a href='upload_photos.php' class='style11'>Upload Photos</a></b></td></tr>";
  print "<tr><td width='100%'><b><a href='edit_testimonials.php' class='style11'>Edit Testimonials</a></b>&nbsp;";

        $sql="select count(*) as a from testimonials where member_id = ".$_SESSION["member_id"]." and approved = 0";
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "(".$RSUser1["a"].")";
  print "</td></tr>";
  print "<tr><td width='100%'><b><a href='myfriends.php?page=1' class='style11'>Edit Friends</a></b></td></tr>";
  print "</td>";
  print "</tr>";

// Links Message

  print "</table>";



  print "</td></tr>";
  print "</table>";
  }
?>
