<?php
session_start();
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
  print "<td width='20%' valign='top'>";
    include("includes/group_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Your Groups Invites</h3></td></tr>";


        $sql="select * from group_invites where member_id = ".$_SESSION["member_id"];
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows==0)
  {

    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>There are no invites yet.</p></td></tr>";
  }
    else
  {

// Paging Technique
    $page=$HTTP_GET_VARS["page"];
    if($page==Null)
    {
        $page=1;
    }
    $total=$num_rows;

    $loop_var=$page*10-10;
    while(!$loop_var==0)
    {
        $RSUser1=mysql_fetch_array($result1);
        $loop_var=$loop_var-1;
    }

// Paging Technique


    $loop_var=10;
    if ($page==1)
    {
      $sr_no=1;
    }
      else
    {
      $sr_no=($page-1)*10+1;
    }

    while(!$loop_var==0)
    {

         $RSUser1=mysql_fetch_array($result1);
         if($RSUser1["member_id"]!=Null)
         {
                $sql="select * from members where member_email = '".$RSUser1["member_email"]."'";
                $result2=mysql_query($sql);
                $num_rows2=mysql_num_rows($result2);
                $RSUser2=mysql_fetch_array($result2);

        print "<tr><td width='100%' colspan='2' class='login'>";

        print "<table width='100%'>";
        if (!isset($RSUser1["member_name"]) || !isset($RSUser1["member_lname"]))
        {
          print "<tr><td width='10%'>".$sr_no.".</td><td width='50%'>".$RSUser1["member_email"]."</td>";
        }
          else
        {
          print "<tr><td width='10%'>".$sr_no.".</td><td width='50%'><a href='view_profile.php?member_id=".$RSUser1["member_id"]."'>".$RSUser1["member_name"]."&nbsp;".$RSUser1["member_lname"]."</a></td>";
        }

        if ($num_rows2==0)
        {

          print "<td width='20%'>Not joined</td>";
        }
          else
        {

          $sql="select member_id from invitations where member_id = $_SESSION[member_id] and group_id=$RSUser1[group_id] and approve='1' and deleted='0'";
          $result3=mysql_query($sql);
          $num_rows3=mysql_num_rows($result3);
          if ($num_rows3==0)
          {

            print "<td width='20%'>Not joined</td>";
          }
            else
          {

            print "<td width='20%'>Joined</td>";
          }

        }
        print "<td width='20%'><a href='delete_group_invite.php?invite_id=".$RSUser1["invite_id"]."'>Delete</a></td>";
        print "</table>";
        $sr_no=$sr_no+1;
      }

      $loop_var=$loop_var-1;
    }
  }

  print "</table>";

// Paging Technique
  $diff=round($total/10,0);
  $diff1=$total/10;
  if ($diff<$diff1)
  {

    $diff2=$diff+1;
  }
    else
  {

    $diff2=$diff;
  }

  $diff3=0;
  print "<table width='100%'>";
  print "<tr><td width='100%'>Goto Page : ";

  while($diff3!=$diff2)
  {

    $diff3=$diff3+1;
    print "<a href='past_invites.php?page=".$diff3."'>[".$diff3."]</a>&nbsp;";
  }
  print "</td></tr></table>";
// Paging Technique

  print "</td>";
  print "</td></tr>";
//print "</table>";
  print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
