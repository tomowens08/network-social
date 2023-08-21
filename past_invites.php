<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<!-- middle_content -->

<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_invite.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>

<table width='100%' cellpadding='4' cellspacing='0' class="dark_b_border2">
<tr>
<td class='dark_blue_white2'>My Invites
&nbsp;[<a href='past_invites.php?page=1' class='nav'>Past Invites</a>]&nbsp;
<?php
     if($HTTP_GET_VARS["new"]==1)
     {
?>
<a href='logincomplete.php' class='nav'>Skip for now</a>
<?php
     }
?>
</td></tr>

<?php

        $sql="select * from invites where member_id = ".$_SESSION["member_id"];
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows==0)
  {

    print "<tr>";
    print "<td width='100%' height='20' class='txt_label'><p align='center'>There are no invites yet.</p></td></tr>";
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
                
        print "<tr><td width='100%' width='100%' height='20' class='style18'>";

        print "<table width='100%'>";
        if (!isset($RSUser1["member_name"]) || !isset($RSUser1["member_lname"]))
        {
          print "<tr><td width='10%' class='txt_label'>$sr_no</td>";
          print "<td width='50%' class='txt_label'>$RSUser1[member_email]</td>";
        }
        else
        {
          print "<tr><td width='10%' class='txt_label'>$sr_no</td>";
          print "<td width='50%' class='txt_label'><a href='view_profile.php?member_id=$RSUser1[member_id]'>$RSUser1[member_name]&nbsp;$RSUser1[member_lname]</a></td>";
        } 

        if ($num_rows2==0)
        {

          print "<td width='20%' class='txt_label'>Not joined</td>";
        }
          else
        {

          $sql="select member_id from invitations where member_id = ".$_SESSION["member_id"]." and friend_id = ".$RSUser2["member_id"];
          $result3=mysql_query($sql);
          $num_rows3=mysql_num_rows($result3);
          if ($num_rows3==0)
          {

            print "<td width='20%' class='txt_label'>Not joined</td>";
          }
            else
          {

            print "<td width='20%' class='txt_label'>Joined</td>";
          } 

        }
        print "<td width='20%'><a href='delete_invite.php?invite_id=".$RSUser1["invite_id"]."'>Delete</a></td>";
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
  print "<tr><td width='100%' class='txt_label'>Goto Page : ";

  while($diff3!=$diff2)
  {

    $diff3=$diff3+1;
    print "<a href='past_invites.php?page=".$diff3."'>[".$diff3."]</a>&nbsp;";
  } 
  print "</td></tr></table>";
// Paging Technique

  print "</td>";
  print "</td>";
  print "</tr></table>";


  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";
?>

<?php
include("includes/bottom.php");
} 
?>
