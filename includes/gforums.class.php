<?php
     // class for group forums
       class forum
       {
           function add_topic($subject,$body,$group_id,$member_id)
           {
               $posted_on=date("m/d/Y");
               $sql="insert into group_topics";
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
           
           function display_forum_group($group_id)
           {
							 

							 $forum=new forum;
               $people=new people;
               
               $sql="select * from group_topics";
               $sql.=" where group_id = $group_id order by posted_on";
               $sql.=" limit 0,5";
               
               $res=mysql_query($sql);
               while($data_set=mysql_fetch_array($res))
               {
                   print "<tr vAlign=center bgColor=#eff3ff>";
                   print "<td width='29%' class='txt_label'><b>";
                   print "&nbsp;<a href='view_forum_topic.php?topic_id=$data_set[id]&group_id=$group_id'>$data_set[subject]</a></b></td>";
                   print "<td width='7%' class='txt_label'><div align=center><b>";
                   $num_posts=$forum->get_num_replies($data_set["id"]);
                   print "<font face='Verdana' color=#000000 size=2>$num_posts</font></b></div></td>";
                   if($num_posts==0)
                   {
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

                       
                       print "<td width='32%' class='txt_label'><b>";
                       print "<table width='100%'>";
                       print "<tr>";
                       print "<td width='50%' class='txt_label'>";
                             print "<a href='view_profile.php?member_id=$data_set[member_id]'>";
                             print $image;
                             print "</a>";

                       print "</td>";

                       print "<td width='50%' valign='top' class='txt_label'>";
                             print $data_set["posted_on"];
                             print "&nbsp;by:<br>";
                             print "<a href='view_profile.php?member_id=$data_set[member_id]'>";
                             print "$poster_name";
                             print "</a>";
											 if ($people->check_online($data_set["member_id"])) echo '<br><font color="#ff0000">Online</font>';
                       print "</td>";
                       print "</tr>";
                       print "</table>";
                       print "</font></b></td>";
                   }
                   
                   else
                   {
                       $last_post=$forum->get_last_topic($data_set["id"]);
                       $last_post_set=mysql_fetch_array($last_post);

                       $poster_name=$people->get_name($last_post_set["member_id"]);
                       $num_images=$people->get_num_images($last_post_set["member_id"]);
                       if($num_images==0)
                       {
                          $image="<IMG alt='' src='images/no_pic.gif' width=90 border=0>";
                       }
                       else
                       {
                          $image_url=$people->get_image($last_post_set["member_id"]);
									  			$pic_name = str_replace('user_images/', '', $image_url);
									        $image="<IMG alt='' src='image_gd/image_browse.php?$pic_name' width=90 border=0>";
                       }


                       print "<td width='32%' class='txt_label'><b>";
                       print "<table width='100%'>";
                       print "<tr>";
                       print "<td width='50%' class='txt_label'>";
                             print "<a href='view_profile.php?member_id=$data_set[member_id]'>";
                             print $image;
                             print "</a>";
                       print "</td>";

                       print "<td width='50%' class='txt_label' valign='top'>";
                             print $last_post_set["posted_on"];
                             print "&nbsp;by:<br>";
                             print "<a href='view_profile.php?member_id=$last_post_set[member_id]'>";
                             print "$poster_name";
                             print "</a>";
											 if ($people->check_online($last_post_set[member_id])) echo '<br><font color="#ff0000">Online</font>';
                       print "</td>";
                       print "</tr>";
                       print "</table>";
                       print "</font></b></td>";
                       

                   }

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


                       print "<td width='32%' class='txt_label'><b>";
                       print "<table width='100%'>";
                       print "<tr>";
                       print "<td width='50%' class='txt_label'>";
                             print "<a href='view_profile.php?member_id=$data_set[member_id]'>";
                             print $image;
                             print "</a>";
                       print "</td>";

                       print "<td width='50%' valign='top' class='txt_label'>";
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

                       print "</tr>";
                       print "<tr><td bgColor=#ffffff colSpan=4></td></tr>";
               }
           }

           function display_forum($group_id,$n)
           {

                           // paging
                           $n=$n-1;
                           $n_next=$n+20;
                           $sql="select count(*) as a from group_topics where group_id = $group_id";
                           $result=mysql_query($sql);
                           $data_set=mysql_fetch_array($result);
                           print mysql_error();
                           if($data_set["a"]<=$n_next)
                           {
                            $next=0;
                           }
                           else
                           {
                            $next=1;
                           }

               $forum=new forum;
               $people=new people;

               $sql="select * from group_topics";
               $sql.=" where group_id = $group_id order by posted_on";
               $sql.=" limit $n,20";

               $res=mysql_query($sql);
               while($data_set=mysql_fetch_array($res))
               {
                   print "<tr vAlign=center>";
                   print "<td width='29%'><b>";
                   print "<font face='Verdana' color=#000000 size=2>&nbsp;<a href='view_forum_topic.php?topic_id=$data_set[id]&group_id=$group_id'>$data_set[subject]</a></font></b></td>";
                   print "<td width='7%'><div align=center><b>";
                   $num_posts=$forum->get_num_replies($data_set["id"]);
                   print "<font face='Verdana' color=#000000 size=2>$num_posts</font></b></div></td>";
                   if($num_posts==0)
                   {
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


                       print "<td width='32%'><b>";
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
                       print "</td>";
                       print "</tr>";
                       print "</table>";
                       print "</font></b></td>";
                   }

                   else
                   {
                       $last_post=$forum->get_last_topic($data_set["id"]);
                       $last_post_set=mysql_fetch_array($last_post);

                       $poster_name=$people->get_name($last_post_set["member_id"]);
                       $num_images=$people->get_num_images($last_post_set["member_id"]);
                       if($num_images==0)
                       {
                          $image="<IMG alt='' src='images/no_pic.gif' width=90 border=0>";
                       }
                       else
                       {
                          $image_url=$people->get_image($last_post_set["member_id"]);
									  			$pic_name = str_replace('user_images/', '', $image_url);
									        $image="<IMG alt='' src='image_gd/image_browse.php?$pic_name' width=90 border=0>";
                       }


                       print "<td width='32%'><b>";
                       print "<font face='Verdana' color=#000000 size=2>";
                       print "<table width='100%'>";
                       print "<tr>";
                       print "<td width='50%'>";
                             print "<a href='view_profile.php?member_id=$data_set[member_id]'>";
                             print $image;
                             print "</a>";
                       print "</td>";

                       print "<td width='50%' valign='top' class='style9'>";
                             print $last_post_set["posted_on"];
                             print "&nbsp;by:<br>";
                             print "<a href='view_profile.php?member_id=$last_post_set[member_id]'>";
                             print "$poster_name";
                             print "</a>";
                       print "</td>";
                       print "</tr>";
                       print "</table>";
                       print "</font></b></td>";


                   }

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


                       print "<td width='32%'><b>";
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
                       print "</td>";
                       print "</tr>";
                       print "</table>";
                       print "</font></b></td>";

                       print "</tr>";
                       print "<tr><td bgColor=#ffffff colSpan=4></td></tr>";
               }
               
             // paging
                print "<tr><td width='100%' colspan='4' class='content'>";
                               if($n!=0)
                               {
                                $n_previous=$n-20;
                                print "&#187; <a href='view_group_forum.php?group_id=$group_id&n=$n_previous'>Previous</a>";
                               }
                               if($next==1)
                               {
                                print "&nbsp;&#187; <a href='view_group_forum.php?group_id=$group_id&n=$n_next'>Next</a>";
                               }
                print "</td></tr>";
            // paging
           }
           
           
           function get_topic_creator($topic_id)
           {
               $sql="select member_id from group_topics where id=$topic_id";
               $res=mysql_query($sql);
               $data_set=mysql_fetch_array($res);
               return $data_set["member_id"];
           }
           
           
             function display_topic($topic_id,$group_id)
             {
                 $forum=new forum;
                 $people=new people;

                 $sql="select * from group_topics where id=$topic_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);


                    print "<tr><td bgColor=#ffffff>";
                    print "<div align=center>";
                    
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


                       print "<p><a href='view_profile.php?member_id=$data_set[member_id]'>$poster_name</a>";
                       print "<br><img height=5 src='images/1by1.gif' width=60 border=0><br>";
                       print "<a href='view_profile.php?member_id=$data_set[member_id]'>$image</a>";
                       print "<br><a class=classifiedstext href='send_message.php?member_id=$data_set[member_id]'>Send Message</a>";
                       print "<p></p></div></td>";
                       print "<td vAlign=top align=left bgColor=#ffffff>";
                       print "<table cellSpacing=0 cellPadding=3 width='100%' bgColor=#ffffff border=0>";
                       print "<tbody>";
                       print "<tr colspan='2'>";
                       print "<td width='75%' style='style9'><B>Posted:</B>&nbsp;";
                       print "<span class=style9><B> $data_set[posted_on] </b>";
                       print "</span><br></td>";
                       print "<td align=right width='25%'><a href='group_topic_reply.php?topic_id=$topic_id&group_id=$group_id'>";
                       print "<img height=15 src='images/button_reply.jpg' width=49 border=0></a>";
                       print "</td></tr>";
                       print "<tr><td style='WORD-WRAP: break-word' width=500><span class=style9>";
                       print $data_set["body"];
                       print "</span></td></tr></tbody></table></td></tr>";
                       
                       // display replies
                       
                 $sql="select * from group_topic_reply where topic_id=$topic_id";
                 $res=mysql_query($sql);

                 while($data_set=mysql_fetch_array($res))
                 {


                    print "<tr><td bgColor=#ffffff>";
                    print "<div align=center>";

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


                       print "<p><a href='view_profile.php?member_id=$data_set[member_id]'>$poster_name</a>";
                       print "<br><img height=5 src='images/1by1.gif' width=60 border=0><br>";
                       print "<a href='view_profile.php?member_id=$data_set[member_id]'>$image</a>";
                       print "<br><a class=classifiedstext href='send_message.php?member_id=$data_set[member_id]'>Send Message</a>";
                       print "<p></p></div></td>";
                       print "<td vAlign=top align=left bgColor=#ffffff>";
                       print "<table cellSpacing=0 cellPadding=3 width='100%' bgColor=#ffffff border=0>";
                       print "<tbody>";
                       print "<tr colspan='2'>";
                       print "<td width='75%' style='style9'><B>Posted:</B>&nbsp;";
                       print "<span class=style9><B> $data_set[posted_on] </b>";
                       print "</span><br></td>";
                       print "<td align=right width='25%'><a href='group_topic_reply.php?topic_id=$topic_id&group_id=$group_id'>";
                       print "<img height=15 src='images/button_reply.jpg' width=49 border=0></a>";
                       print "</td></tr>";
                       print "<tr><td style='WORD-WRAP: break-word' width=500><span class=style9>";
                       print $data_set["body"];
                       print "</span></td></tr></tbody></table></td></tr>";


                  }
                       
                       

             }
             
             function delete_topic($topic_id)
             {
                 $sql="delete from group_topics where id=$topic_id";
                 $res=mysql_query($sql);

                 $sql="delete from group_topic_reply where topic_id=$topic_id";
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
     // class for group forums
?>
