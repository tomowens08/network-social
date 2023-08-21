<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<table>
<tr>
<td width='750' height='232' valign='middle' colspan='2'>
<p align='center'>
<?php
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "<font face='verdana' size='2'><b>You need to login before you can view this page.</b></font>";
}
  else
{

  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";

  print "</table>";

  print "<table width='100%'>";
  print "<tr>";

  print "<td width='100%'>";
  print "<table width='100%' align='center' border='1' style='border-collapse: collapse' bordercolor='#2195DA'>";
  print "<tr><td colspan='2' class='login' bgcolor='#B0B0B0'><b><p align='center'>Delete profile</b></p></td></tr>";

        $sql="delete from members where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        $sql="delete from member_friends where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        $sql="delete from member_friends where friend_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        
        $sql="delete from bookmarks where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        $sql = "delete from bookmarks where member_book_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        $sql = "delete from invites where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        $sql = "delete from messages where mess_by = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from messages where mess_to = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        $sql = "delete from messages_sent where mess_to = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from messages_sent where mess_by = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from photos where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from profile_flag where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from testimonials where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from testimonials where test_user = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from address_book where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from admin_message where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from admin_reply where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();
        
        $sql = "delete from band_review where test_user = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();
        
        
        $sql = "delete from blog_comments where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();
        
        $sql = "delete from blog_preffered where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();
        
        $sql = "delete from blog_preffered where preffered_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from blog_subscriptions where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();



        $sql = "delete from blog_subscriptions where sub_member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();
        
        
        $sql = "delete from blogs where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();



        $sql = "delete from board_main where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        $sql = "delete from board_reply where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();
        
        $sql = "delete from board_sub where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();


        $sql = "delete from classified_listing where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();
        
        
        $sql = "delete from board_main where member_id = $HTTP_GET_VARS[member_id]";
        $result=mysql_query($sql);
        print mysql_error();

        $sql="select * from events where event_by = $HTTP_GET_VARS[member_id]";
        $res=mysql_query($sql);
        //print $sql;
        while($event_res=mysql_fetch_array($res))
        {
          $sql = "delete from events_comments where event_id = $event_set[id]";
          $result=mysql_query($sql);
          print mysql_error();

          $sql = "delete from events_rsvp where event_id = $event_set[id]";
          $result=mysql_query($sql);
          print mysql_error();
        }

          $sql = "delete from events where event_by = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();

          $sql = "delete from forum_posts where posted_by = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();

          $sql = "delete from forum_topics where posted_by = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


         $sql="select * from groups where member_id = $HTTP_GET_VARS[member_id]";
         $res=mysql_query($sql);
         while($data_set=mysql_fetch_array($res))
         {
            $sql="delete from group_bulletin where group_id = $data_set[id]";
            $res=mysql_query($sql);

            $sql="delete from group_bulletin_reply where group_id = $data_set[id]";
            $res=mysql_query($sql);

            $sql="delete from group_friends where group_id = $data_set[id]";
            $res=mysql_query($sql);

            $sql="delete from group_invites where group_id = $data_set[id]";
            $res=mysql_query($sql);
            
            $sql="delete from group_photos where group_id = $data_set[id]";
            $res=mysql_query($sql);


            $sql="delete from group_topic_reply where group_id = $data_set[id]";
            $res=mysql_query($sql);
            
            $sql="delete from group_topics where group_id = $data_set[id]";
            $res=mysql_query($sql);
         }
         
          $sql = "delete from groups where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from journal where journal_of = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();
          

          $sql = "delete from member_networking where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();
          
          $sql = "delete from member_profile where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from music_member_profile where user_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from music_members where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from music_profile where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from music_shows where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from music_songs where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from photo_rating where posted_by = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from photos where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from profile_back where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();

          $sql = "delete from profile_company where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from profile_flag where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();
          
          $sql = "delete from profile_flag where member_by = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from profile_interests where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from profile_school where member_id = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();


          $sql = "delete from song_critisize where posted_by = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();

          $sql = "delete from song_rating where rating_by = $HTTP_GET_VARS[member_id]";
          $result=mysql_query($sql);
          print mysql_error();

  print "<tr>";
  print "<td width='100%' colspan='2' class='login'>";
  print "<p align='center'>The member account has been deleted successfully.</p>";
  print "</td></tr>";

print "</table>";
print "</td></tr></table>";


print "<table width='100%' align='center'>";
print "<tr>";
print "<td width='100%'>&nbsp;</td>";
print "</tr>";
print "</table>";
}
?>
</td>
</tr>
</body>
</html>
