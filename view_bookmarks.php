<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
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

  print "<table width='800'>";
  print "<tr>";

  print "<td width='20%'>";
    include("includes/right_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Your Bookmarked Friends</h3></td></tr>";

        $sql="select * from bookmarks where member_id = ".$_SESSION["member_id"];
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+10;
        if($num_rows<=$n_next)
        {
                $next=0;
        }
        else
        {
                $next=1;
        }

  if ($num_rows==0)
  {
    print "<tr>";
    print "<td width='100%' colspan='2' class='login'><p align='center'>There are no bookmarks yet.</p></td></tr>";
  }
    else
  {
   include("includes/people.class.php");
   $people=new people;

   include("includes/profile.class.php");
   $profile=new profile;


   $sql="select * from bookmarks where member_id = $_SESSION[member_id] limit $n,10";
   $result1=mysql_query($sql);

    while($RSUser1=mysql_fetch_array($result1))
    {
      if ($RSUser1["member_id"]!=Null)
      {

        $sql="select * from members where member_id = ".$RSUser1["member_book_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
        print "<tr><td width='100%' colspan='2' class='txt_label'>";

        print "<table width='100%'>";
        print "<tr><td width='20%' valign='top' class='txt_label'>";
        print "<div align='center'>";

        $sql="select * from photos where member_id = ".$RSUser2["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);
        $num_rows=mysql_num_rows($result);

        if ($num_rows==0)
        {
         $gender=$people->check_gender($RSUser2["member_id"]);
         if($gender=="Male")
         {
          print "<img alt='' src='images/male.gif' width=90 border=0>";
         }
         else
         {
          print "<img alt='' src='images/female.gif' width=90 border=0>";
         }
        }
        else
        {
         $image_url=$people->get_image($RSUser2["member_id"]);
         $pic_name=str_replace('user_images/', '', $image_url);
         print "<img src='image_gd/image.php?$pic_name' border='0'>";
        }

        $name=$people->get_name($RSUser2["member_id"]);
        $int=$profile->get_interests($RSUser2["member_id"]);
        $profile_back=$profile->get_back($RSUser2["member_id"]);
        $basic_info=$profile->get_basic($RSUser2["member_id"]);


        print "<br>$name";
        print "</div>";

        print "</td>";

        print "<td width='60%' valign='top'>";

        print "<table width='100%'>";
        print "<tr><td width='100%' class='txt_label'>";
              print "<b>Headline:</b> $int[headline]<br>";
              print "<b>Orientation:</b>";
              if($profile_back["sexual"]=="1")
              {
?>
              Straight
<?php
}
?>

<?php
if($profile_back["sexual"]=="2")
{
?>
Gay
<?php
}
?>

<?php
if($profile_back["sexual"]=="3")
{
?>
Bi
<?php
}
?>

<?php
if($profile_back["sexual"]=="4")
{
?>
Not Sure
<?php
}
?>

<?php
if($profile_back["sexual"]=="0" || $profile_back["sexual"]==Null)
{
?>
No Answer
<?php
}

              print "<br>";
              print "<b>Here For:</b> $basic_info[here_for]<br>";
              print "<b>Gender:</b> $basic_info[gender]<br>";
              print "<b>Age:</b>";
              $days=datediff($basic_info["dob"], GetTodayDate(0));
              $years=Round($days/365, 0);

              print " $years years<br>";
              print "<b>Location:</b>";

              if(is_numeric($basic_info["country"]))
              {
               $sql="select * from states where state_id = $basic_info[country]";
               $country_res=mysql_query($sql);
               $country_set=mysql_fetch_array($country_res);
              }
              print " $country_set[state_name]";
              print "<br>";
              print "<b>Last On:</b> ";

              if($basic_info["last_login"]!=Null)
              {
               print strftime("%B %d %Y",strtotime($basic_info["last_login"]));
              }
              else
              {
               print strftime("%B %d %Y",strtotime(date("m/d/Y")));;
              }
               print "<br>";


        print "</td></tr>";
        print "</table>";
        print "</td>";

        print "<td width='20%' valign='top'>";

        print "<table width='100%'>";
        print "<tr><td width='100%' class='login'>";
        print "<a href='delete_friend.php?folder=bookmark&friend_id=$RSUser2[member_id]' class='style11'>Delete</a><br>";
        print "<a href='view_profile.php?member_id=$RSUser2[member_id]' class='style11'>View Profile</a><br>";
        print "<a href='send_message.php?member_id=$RSUser2[member_id]' class='style11'>Send Message</a><br>";
        print "<a href='forward_friend.php?member_id=$RSUser2[member_id]' class='style11'>Forward to a Friend</a><br>";
        print "<a href='add_preffered.php?friend_id=$RSUser2[member_id]' class='style11'>Add to blog preffered List</a><br>";
        print "</td></tr>";
        print "</table>";

        print "</td>";


        print "</table>";
        print "</td></tr>";
      }

      $loop_var=$loop_var-1;
    } 

  } 

  print "</table>";


  print "<table width='100%'>";
  print "<tr><td width='100%' class='txt_label'>";
?>
<?php
        if($n!=0)
        {
        $n_previous=$n-10;
?>
&#187; <a href='view_bookmarks.php?n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='view_bookmarks.php?n=<?=$n_next?>'>Next</a>
<?php
        }
?>
<?php
  print "</td></tr></table>";
// Paging Technique

  print "</td>";
  print "</td>";
  print "</tr></table>";

?>

<!-- middle_content -->


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
