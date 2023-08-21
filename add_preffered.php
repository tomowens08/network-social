<?php
  session_start();
?>
<?php
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
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
<table width='830'>

<?php

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
?>
<td width='100%'>
<table>
<tr>
<td class='style11'><b>Add to Preffered List</b>&nbsp;[<a href='blog.php' class='style11'>Back to Blog Home</a>]&nbsp;</td></tr>


<tr><td class='login'>
<?php
     include("includes/blog.class.php");
     $blog=new blog;
     $num_rows=$blog->check_preffered($_SESSION["member_id"],$HTTP_GET_VARS["friend_id"]);
     
     if($num_rows!=0)
     {
?>
  The member is already in your preffered list.
<?php
     }
     else
     {
         $res=$blog->add_preffered($_SESSION["member_id"], $HTTP_GET_VARS["friend_id"]);
         if($res==1)
         {
?>
  The member has been added in your preffered list.
<?php
         }
         else
         {
?>
  There was an error and the member was not added in your preffered list.
<?php
         }
     }
?>
</td></tr>
</table>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
