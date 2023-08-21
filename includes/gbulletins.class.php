<?php
     // class for group bulletins
       class bulletin
       {
           function add_topic($subject,$body,$group_id,$member_id)
           {
               $posted_on=date("m/d/Y");
               $sql="insert into group_bulletin";
               $sql.="(group_id";
               $sql.=", member_id";
               $sql.=", subject";
               $sql.=", body";
               $sql.=", posted_on)";

               $sql.=" values($group_id";
               $sql.=", $member_id";
               $sql.=", '$subject'";
               $sql.=", '$body'";
               $sql.=", '$posted_on')";

               $res=mysql_query($sql);
               print mysql_error();
               if($res)
               {
                   return 1;
               }
               else
               {
                   return 0;
               }
           }

           function add_topic_reply($topic_id, $subject,$body,$group_id,$member_id)
           {
               $posted_on=date("m/d/Y");
               $sql="insert into group_topic_reply";
               $sql.="(group_id";
               $sql.=", member_id";
               $sql.=", topic_id";
               $sql.=", subject";
               $sql.=", body";
               $sql.=", posted_on)";

               $sql.=" values($group_id";
               $sql.=", $member_id";
               $sql.=", $topic_id";
               $sql.=", '$subject'";
               $sql.=", '$body'";
               $sql.=", '$posted_on')";

               $res=mysql_query($sql);
               print mysql_error();
               if($res)
               {
                   return 1;
               }
               else
               {
                   return 0;
               }
           }

           function get_num_replies($topic_id)
           {
               $sql="select count(*) as a from group_topic_reply where topic_id=$topic_id";
               $res=mysql_query($sql);
               $data_set=mysql_fetch_array($res);
               return $data_set["a"];
           }

           function get_last_topic($topic_id)
           {
               $sql="select max(id) as a from group_topic_reply where topic_id=$topic_id";
               $res=mysql_query($sql);
               $data_set=mysql_fetch_array($res);

               $sql="select * from group_topic_reply where id = $data_set[a]";
               $mem_res=mysql_query($sql);
               return $mem_res;
           }

           function display_forum_bulletin($group_id)
           {
               $forum=new forum;
               $people=new people;

               $sql="select * from group_bulletin";
               $sql.=" where group_id = $group_id order by posted_on";
               $sql.=" limit 0,5";

               $res=mysql_query($sql);
               while($data_set=mysql_fetch_array($res))
               {

                   print "<tr bgcolor='#FFFFFF'>";
                   print "<td height=24><b><font face='Verdana' size='2' color='#000000'>";
                      $poster_name=$people->get_name($data_set["member_id"]);
                       $num_images=$people->get_num_images($data_set["member_id"]);
                       if($num_images==0)
                       {
                          $image="<IMG alt='' src='images/no_pic.gif' width=90 border=0>";
                       }
                       else
                       {
                          $image_url=$people->get_image($data_set["member_id"]);
									  			$pic_name = str_replace('user_images/', '', $image_url);
									        $image="<IMG alt='' src='image_gd/image_browse.php?$pic_name' width=90 border=0>";
                       }
                       
                       print "<font face='Verdana' color=#000000 size=2>";
                       print "<table width='100%'>";
                       print "<tr>";
                       print "<td width='50%'>";
                             print "<a href='view_profile.php?member_id=$data_set[member_id]'>";
                             print $image;
                             print "</a>";
                       print "</td>";

                       print "<td width='50%' valign='top' class='style9'>";
                             print $data_set["posted_on"];
                             print "&nbsp;by:<br>";
                             print "<a href='view_profile.php?member_id=$data_set[member_id]'>";
                             print "$poster_name";
                             print "</a>";
												if ($people->check_online($data_set[member_id])) echo '<br><font color="#ff0000">Online</font>';
                       print "</td>";
                       print "</tr>";
                       print "</table>";


                   print "</font></b></td>";
                   print "<td align=middle><b><font face='Verdana' size='2' color='#000000'>$data_set[posted_on]</font></b></td>";
                   print "<td><b><font face='Verdana' size='2' color='#000000'><a href='view_group_bulletin.php?bulletin_id=$data_set[id]&group_id=$group_id'>$data_set[subject]</font></b>";
                   print "</td></tr>";
               }
           }


           function get_topic_creator($topic_id)
           {
               $sql="select member_id from group_bulletin where id=$topic_id";
               $res=mysql_query($sql);
               print mysql_error();
               $data_set=mysql_fetch_array($res);
               return $data_set["member_id"];
           }

           function get_bulletin($bulletin_id)
           {
               $sql="select * from group_bulletin where id = $bulletin_id";
               $res=mysql_query($sql);
               return $res;
           }

             function delete_topic($topic_id)
             {
                 $sql="delete from group_bulletin where id=$topic_id";
                 $res=mysql_query($sql);
                 if($res)
                 {
                     return 1;
                 }
                 else
                 {
                     return 0;
                 }

             }

       }
     // class for group bulletins
?>
