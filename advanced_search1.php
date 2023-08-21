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

// By name starts here

  if ($HTTP_POST_VARS["sex"]=="" && $HTTP_POST_VARS["location"]=="" && $HTTP_POST_VARS["keywords"]=="")
  {
        $sql="select member_id as a from members";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  } 

  if ($HTTP_POST_VARS["sex"]!="" && $HTTP_POST_VARS["location"]=="" && $HTTP_POST_VARS["keywords"]=="")
  {

        $sql="select member_id as a from members where gender like '".$HTTP_POST_VARS["Sex"]."'";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  } 

  if ($HTTP_POST_VARS["sex"]!="" && $HTTP_POST_VARS["location"]!="" && $HTTP_POST_VARS["keywords"]=="")
  {
        $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%'";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
  } 

  if ($HTTP_POST_VARS["sex"]!="" && $HTTP_POST_VARS["location"]=="" && $HTTP_POST_VARS["keywords"]!="")
  {

        $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);
    if ($num_rows==0)
    {
        $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.favourite_music like '%".$HTTP_GET_VARS["keywords"]."%'";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
        $num_rows=mysql_num_rows($result);
      if ($num_rows==0)
      {
        $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.favourite_books like '%".$HTTP_GET_VARS["keywords"]."%'";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
        $num_rows=mysql_num_rows($result);
        if ($num_rows==0)
        {
          $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.favourite_tv like '%".$HTTP_GET_VARS["keywords"]."%'";
          $result=mysql_query($sql);
          $num_rows=mysql_num_rows($result);
          $RSUser=mysql_fetch_array($result);
          if ($num_rows==0)
          {
            $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.favourite_movies like '%".$HTTP_GET_VARS["keywords"]."%'";
            $result=mysql_query($sql);
            $RSUser=mysql_fetch_array($result);
          } 

        } 

      } 

    } 

  } 

  if ($HTTP_POST_VARS["sex"]!="" && $HTTP_POST_VARS["location"]!="" && $HTTP_POST_VARS["keywords"]!="")
  {
        $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.interests like '%".$HTTP_GET_VARS["keywords"]."%'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);
    if ($num_rows==0)
    {
        $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.favourite_music like '%".$HTTP_GET_VARS["keywords"]."%'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($sql);
      if ($num_rows==0)
      {
        $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.favourite_books like '%".$HTTP_GET_VARS["keywords"]."%'";
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);
        if ($num_rows==0)
        {
          $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.favourite_tv like '%".$HTTP_GET_VARS["keywords"]."%'";
          $result=mysql_query($sql);
          $num_rows=mysql_num_rows($result);
          $RSUser=mysql_fetch_array($result);
          if ($num_rows==0)
          {
            $sql="select a.member_id as a from members a, member_profile b where a.member_id = b.member_id and a.gender like '".$HTTP_POST_VARS["Sex"]."' and b.hometown like '%".$HTTP_POST_VARS["location"]."%' and b.favourite_movies like '%".$HTTP_GET_VARS["keywords"]."%'";
            $result=mysql_query($sql);
            $num_rows=mysql_num_rows($result);
            $RSUser=mysql_fetch_array($result);
          } 

        } 

      } 

    } 



    $a=0;

// Paging Technique
    $page=$HTTP_GET_VARS["page"];
    $total=$num_rows;

    $loop_var=$page*10-10;
    while(!$loop_var==0)
    {
        $RSUser=mysql_fetch_array($sql);
        $loop_var=$loop_var-1;
    }

// Paging Technique

    $loop_var=10;
    while($loop_var!=0)
    {
      $RSUser=mysql_fetch_array($result);
      if ($RSUser["member_name"]!=Null)
      {
        $a=1;

        $sql="select * from members where member_id = ".$RSUser["member_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);

        print "<tr><td width='100%' colspan='2' class='login'>";

        print "<table width='100%'>";
        print "<tr><td width='20%' valign='top'>";

        $sql="select * from photos where member_id = ".$RSUser2["member_id"];
        $result3=mysql_query($sql);
        $num_rows=mysql_num_rows($result3);
        $RSUser3=mysql_fetch_array($result3);
        if ($num_rows==0)
        {
           print "<img src='images/nophoto.jpg' width='50' height='50'>";
        }
          else
        {
           print "<img src='".$RSUser3["photo_url"]."' width='50' height='50'>";
        }

        print "</td>";

        print "<td width='60%' valign='top'>";

        print "<table width='100%'>";
        print "<tr><td width='100%' class='login'>".$RSUser2["member_name"]." Last Login : ".$RSUser2["last_login"]."</td></tr>";
        if ($_SESSION["member_id"]!=$RSUser["member_id"])
        {
          print "<tr><td width='100%' class='login'><a href='view_profile.php?member_id=".$RSUser2["member_id"]."'>View Profile</a></td></tr>";
        }
          else
        {
           print "<tr><td width='100%' class='login'><a href='view_profile.php?member_id=".$RSUser2["member_id"]."'>View Profile</a>&nbsp;(This is your profile)</td></tr>";
        }

        print "</table>";
        print "</td>";

        print "<td width='20%' valign='top'>";

        print "<table width='100%'>";

        $sql="select * from invitations where member_id = ".$_SESSION["member_id"]." and friend_id = ".$RSUser["member_id"];
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);
        $RSUser1=mysql_fetch_array($result1);
        if ($num_rows!=0)
        {
          print "<tr><td width='100%' class='login'><a href='myfriends.php?page=1'>Your Friend</a></td></tr>";
        }
          else
        {

          if ($_SESSION["member_id"]!=$RSUser["member_id"])
          {
            print "<tr><td width='100%' class='login'><a href='invite_friend.php?friend_id=".$RSUser["member_id"]."'>Invite</a></td></tr>";
          }
            else
          {
            print "<tr><td width='100%' class='login'>&nbsp;</td></tr>";
          }

        }


        print "</table>";
        print "</td>";


        print "</table>";
        print "</td></tr>";
      }

      $loop_var=$loop_var-1;
    }
    if ($a==0)
    {
      print "<tr>";
      print "<td width='100%' colspan='2' class='login'><p align='center'>";
      print "No friend found.";
      print "</p></td></tr>";
    }

  }

// By name ends here





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
