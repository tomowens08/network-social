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

  print "<table width='815'>";
  print "<tr>";
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#000000'>";
  print "<tr><td colspan='2' class='style18' bgcolor='#FF6600'>";
  print "<h3>Browse Users</h3></td></tr>";



// By name starts here

  if ($HTTP_GET_VARS["act"]=="school")
  {
        $sql="select * from members a, profile_school b";
        $sql.=" where a.member_id = b.member_id";
        $sql.=" and school_name in (select school_name from profile_school";
        $sql.=" where member_id = $_SESSION[member_id])";
  }
  
  if ($HTTP_GET_VARS["act"]=="college")
  {
        $sql="select college_name from members where member_id=$_SESSION[member_id]";
        $result=mysql_query($sql);
        $data_set=mysql_fetch_array($result);
        if($data_set["college_name"]==Null)
        {
             $sql="select * from members";
        }
        else
        {
             $sql="select * from members where college_name = $data_set[college_name]";
        }
  }
  
  if ($HTTP_GET_VARS["act"]=="state")
  {
        $sql="select current_state from members where member_id=$_SESSION[member_id]";
        $result=mysql_query($sql);
        $data_set=mysql_fetch_array($result);

     $sql="select * from members where current_state = '$data_set[current_state]'";
  }

        $result=mysql_query($sql);
        print mysql_error();
        $num_rows=mysql_fetch_array($result);

    $a=0;

// Paging Technique
    $page=$HTTP_GET_VARS["page"];
    if($page==Null)
    {
        $page=1;
    }
    $total=$num_rows;

    $loop_var=$page*10-10;
    print $sql;
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



// By name ends here




  print "</table>";
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
