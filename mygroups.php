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
  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";


  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Groups you are a member of!</h3></td></tr>";


        $sql="select * from invitations where member_id = ".$_SESSION["member_id"]." and approve = 1";
        $result1=mysql_query($sql);
        print mysql_error();
        $num_rows=mysql_num_rows($result1);


  if ($num_rows==0)
  {
    print "<tr>";
    print "<td width='100%' colspan='2'  class='txt_label'><p align='center'>There are no groups yet.</p></td></tr>";
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
    while(!$loop_var==0)
    {
        $RSUser1=mysql_fetch_array($result1);
        if($RSUser1["member_id"]!=Null)
        {

        $sql="select * from groups where id = ".$RSUser1["group_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);

          print "<tr><td width='100%' colspan='2'  class='txt_label'>";

          print "<table width='100%'>";
          print "<tr><td width='20%' valign='top'>";

        $sql="select * from group_photos where group_id = ".$RSUser2["id"];
        $result3=mysql_query($sql);
        $num_rows3=mysql_num_rows($result3);
        $RSUser=mysql_fetch_array($result3);

         if ($num_rows==0)
          {
            print "<img src='images/nophoto.jpg' width='50' height='50'>";
          }
            else
          {

            print "<img src='".$RSUser["photo_url"]."' width='50' height='50'>";
          }

          print "</td>";

          print "<td width='60%' valign='top'>";

          print "<table width='100%'>";
          print "<tr><td width='100%'  class='txt_label'>$RSUser2[group_name]</td></tr>";
          print "<tr><td width='100%'  class='txt_label'><a href='view_group.php?group_id=".$RSUser2["id"]."'>View Group</a></td></tr>";
          print "</table>";
          print "</td>";

          print "<td width='20%' valign='top'>";

          print "<table width='100%'>";
          print "<tr><td width='100%'  class='txt_label'><a href='delete_group.php?friend_id=".$RSUser1["id"]."'>Delete</a></td></tr>";
          print "</table>";

          print "</td>";


          print "</table>";
          print "</td></tr>";
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
    print "<a href='mygroups.php?page=".$diff3."'>[".$diff3."]</a>&nbsp;";
  }
  print "</td></tr></table>";
// Paging Technique

    print "</td>";
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
