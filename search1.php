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
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<?

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='70%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#E3E4E9'><b><p align='center'><span class='style18'>Search through your friend network!!</span></b></p></td></tr>";


  print "<tr>";
  print "<td width='100%' colspan='2' class='login'><p align='center'>";
  print "[<a href='search.php?value=interests' class='style11'>Search by interests</a>]&nbsp;[<a href='search.php?value=favourites' class='style11'>Search By Favourites</a>]&nbsp;[<a href='search.php' class='style11'>Search By Name</a>]<br>[<a href='advanced_search.php' class='style11'>Advanced Search</a>]";
  print "</p></td></tr>";

// By name starts here

  if ($HTTP_GET_VARS["value"]=="")
  {

    if ($HTTP_POST_VARS["first_name"]=="" && $HTTP_POST_VARS["last_name"]!="")
    {
      $sql="select * from members where member_lname like '".$HTTP_POST_VARS["last_name"]."'";
    } 

    if ($HTTP_POST_VARS["first_name"]!="" && $HTTP_POST_VARS["last_name"]=="")
    {
      $sql="select * from members where member_name like '".$HTTP_POST_VARS["first_name"]."'";
    } 

    if ($HTTP_POST_VARS["first_name"]!="" && $HTTP_POST_VARS["last_name"]!="")
    {
      $sql="select * from members where member_name like '".$HTTP_POST_VARS["first_name"]."' and member_lname like '".$HTTP_POST_VARS["last_name"]."'";
    } 

    if ($HTTP_POST_VARS["first_name"]=="" && $HTTP_POST_VARS["last_name"]=="")
    {
      $sql="select * from members";
    } 

        $result=mysql_query($sql);
        $num_rows=mysql_fetch_array($result);

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

// By interests starts here

  if ($HTTP_GET_VARS["value"]=="interests")
  {

    if ($HTTP_POST_VARS["interests"]!="")
    {
      $sql="select * from members a, member_profile b where a.member_id=b.member_id and b.interests like '%".$HTTP_POST_VARS["interests"]."%'";
    } 


    if ($HTTP_POST_VARS["interests"]=="")
    {
      $sql="select * from members";
    } 


    $a=0;

// Paging Technique
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
    $page=$HTTP_GET_VARS["page"];
    $total=$num_rows;

    $loop_var=$page*10-10;
    while($loop_var!=0)
    {
      $RSUser=mysql_fetch_array($result);
      $loop_var=$loop_var-1;
    } 

// Paging Technique

    $loop_var=10;
    while(!$loop_var==0)
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


// By interests ends here

// By favourites starts here


  if ($HTTP_GET_VARS["value"]=="favourites")
  {


    if ($HTTP_POST_VARS["music"]!="" && $HTTP_POST_VARS["books"]!="" && $HTTP_POST_VARS["tv"]!="" && $HTTP_POST_VARS["movies"]!="")
    {
      $sql="select * from members a, member_profile b where a.member_id=b.member_id and b.favourite_music like '%".$HTTP_POST_VARS["music"]."%' and b.favourite_books like '%".$HTTP_POST_VARS["books"]."%' and b.favourite_music like '%".$HTTP_POST_VARS["books"]."%' and b.favourite_tv like '%".$HTTP_POST_VARS["tv"]."%' and b.favourite_movies like '%".$HTTP_POST_VARS["movies"]."%'";
    } 


    if ($HTTP_POST_VARS["music"]!="" && $HTTP_POST_VARS["books"]=="" && $HTTP_POST_VARS["tv"]=="" && $HTTP_POST_VARS["movies"]=="")
    {
      $sql="select * from members a, member_profile b where a.member_id=b.member_id and b.favourite_music like '%".$HTTP_POST_VARS["music"]."%'";
    } 

    if ($HTTP_POST_VARS["music"]=="" && $HTTP_POST_VARS["books"]!="" && $HTTP_POST_VARS["tv"]=="" && $HTTP_POST_VARS["movies"]=="")
    {
      $sql="select * from members a, member_profile b where a.member_id=b.member_id and b.favourite_books like '%".$HTTP_POST_VARS["books"]."%'";
    } 


    if ($HTTP_POST_VARS["music"]=="" && $HTTP_POST_VARS["books"]=="" && $HTTP_POST_VARS["tv"]!="" && $HTTP_POST_VARS["movies"]=="")
    {
      $sql="select * from members a, member_profile b where a.member_id=b.member_id and b.favourite_tv like '%".$HTTP_POST_VARS["tv"]."%'";
    } 

    if ($HTTP_POST_VARS["music"]=="" && $HTTP_POST_VARS["books"]=="" && $HTTP_POST_VARS["tv"]=="" && $HTTP_POST_VARS["movies"]!="")
    {
      $sql="select * from members a, member_profile b where a.member_id=b.member_id and b.favourite_movies like '%".$HTTP_POST_VARS["movies"]."%'";
    } 

    if ($HTTP_POST_VARS["music"]=="" && $HTTP_POST_VARS["books"]=="" && $HTTP_POST_VARS["tv"]=="" && $HTTP_POST_VARS["movies"]=="")
    {
      $sql="select * from members";
    } 



    $a=0;

// Paging Technique
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
    $page=$HTTP_GET_VARS["page"];
    $total=$num_rows;

    $loop_var=$page*10-10;
    while($loop_var!=0)
    {
      $RSUser=mysql_fetch_array($result);
      $loop_var=$loop_var-1;
    }

// Paging Technique

    $loop_var=10;
    while(!$loop_var==0)
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

// By favourites ends here


  print "</table>";
  print "</td>";
  print "</td>";
    include("includes/right_menu.php");
  print "</td>";
  print "</tr></table>";

?>

<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
