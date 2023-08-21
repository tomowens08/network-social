<?php
     // class for forums
        class forum
        {
            function add_main_cat($cat_name,$cat_desc)
            {
                $sql="insert into forum_main_cat";
                $sql.="(cat_name";
                $sql.=", cat_desc)";
                
                $sql.=" values('$cat_name'";
                $sql.=", '$cat_desc')";
                
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
            
            function display_admin_cat()
            {

                    $sql="select * from forum_main_cat order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["cat_name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_cat.php?id=".$RSUser["id"]."'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_cat.php?id=".$RSUser["id"]."'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }


            
            function get_main_cat($cat_id)
            {
                $sql="select * from forum_main_cat where id = $cat_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                
                return $data_set;
            }
            
            function edit_main_cat($cat_id,$cat_name,$cat_desc)
            {
                $sql="update forum_main_cat";
                $sql.=" set cat_name='$cat_name'";
                $sql.=", cat_desc='$cat_desc'";
                $sql.=" where id = $cat_id";
                
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

            function delete_main_cat($cat_id)
            {
                $sql="delete from forum_main_cat";
                $sql.=" where id = $cat_id";

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
            
            function get_all_main_cat()
            {
                $sql="select * from forum_main_cat";
                $res=mysql_query($sql);
                return $res;
            }
            
            function add_sub_cat($main_cat,$cat_name,$cat_desc)
            {
                $sql="insert into forum_sub_cat";
                $sql.="(cat_name";
                $sql.=", main_cat_id";
                $sql.=", cat_desc)";

                $sql.=" values('$cat_name'";
                $sql.=", $main_cat";
                $sql.=", '$cat_desc')";

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


            function display_admin_main_cat()
            {

                    $sql="select * from forum_main_cat order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>$sr_no</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>$RSUser[cat_name]</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='modify_sub_cat1.php?id=$RSUser[id]'>Select</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }

            function display_admin_sub_cat($cat_id)
            {

                    $sql="select * from forum_sub_cat where main_cat_id = $cat_id order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>$sr_no</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>$RSUser[cat_name]</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_sub_cat.php?id=$RSUser[id]'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_sub_cat.php?id=$RSUser[id]'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }
             
             function get_sub_cat($id)
             {
                 $sql="select * from forum_sub_cat where id = $id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set;
             }
             
             function edit_sub_cat($id,$main_cat,$cat_name,$cat_desc)
             {
                 $sql="update forum_sub_cat";
                 $sql.=" set main_cat_id=$main_cat";
                 $sql.=", cat_name='$cat_name'";
                 $sql.=", cat_desc='$cat_desc'";
                 $sql.=" where id = $id";
                 
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

             function delete_sub_cat($id)
             {
                 $sql="delete from forum_sub_cat";
                 $sql.=" where id = $id";

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
             
             
            function display_admin_moderator()
            {

                    $sql="select * from forum_main_cat order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>$sr_no</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>$RSUser[cat_name]</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='add_moderator1.php?id=$RSUser[id]'>Select</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }

            function display_admin_sub_moderator($cat_id)
            {

                    $sql="select * from forum_sub_cat where main_cat_id = $cat_id order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>$sr_no</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>$RSUser[cat_name]</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='select_users.php?id=$RSUser[id]'>Select Users</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }


            function display_moderator_users($sub_cat_id)
            {

              $sql="select * from members";
              $res=mysql_query($sql);
              while($data_set=mysql_fetch_array($res))
              {

               print "<tr bgColor='#ffffff'>";
               print "<td class='textcell' valign='top' width='10%'>";

                    $sql="select * from forum_sub_cat where id = $sub_cat_id order by cat_name";
                    $result=mysql_query($sql);
                    $check_set=mysql_fetch_array($result);
                    $sel_p=explode(",", $check_set["moderators"]);

                if(in_array($data_set["member_id"], $sel_p))
                {
                 print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]' checked>";
                }
                else
                {
                 print "<input type='checkbox' name='member_id[]' value='$data_set[member_id]'>";
                }
               print "</p></td>";
               print "<td class='textcell' valign='top' width='60%'>$data_set[member_name]&nbsp;$data_set[member_lname]</td>";
               print "</tr>";


                    $sr_no=1;

               }
            }
            
            function edit_moderators($id,$mods)
            {
                $sql="update forum_sub_cat";
                $sql.=" set moderators = '$mods'";
                $sql.=" where id = $id";
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
            
            function get_main_num_forum_topics($main_cat_id)
            {
                $sql="select count(*) as a from forum_topics where main_forum_id = $main_cat_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                
                return $data_set["a"];
            }

            function get_sub_num_forum_topics($main_cat_id)
            {
                $sql="select count(*) as a from forum_topics where sub_forum_id = $main_cat_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);

                return $data_set["a"];
            }

            function get_main_num_forum_posts($main_cat_id)
            {
                $sql="select count(*) as a from forum_posts where main_forum_id = $main_cat_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);

                return $data_set["a"];
            }

            function get_sub_num_forum_posts($main_cat_id)
            {
                $sql="select count(*) as a from forum_topics where sub_forum_id = $main_cat_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);

                return $data_set["a"];
            }

            function get_main_last_forum_post($main_cat_id)
            {
                $sql="select max(id) as a from forum_posts where main_forum_id = $main_cat_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                
                if($data_set["a"]==0||$data_set["a"]==Null)
                {
                    return 0;
                }
                else
                {
                 $sql="select * from forum_posts where id = $data_set[a]";
                 $res_row=mysql_query($sql);
                 $data_row=mysql_fetch_array($res_row);
                 
                 return $data_row;
                }
            }

            function get_sub_last_forum_post($main_cat_id)
            {
                $sql="select max(id) as a from forum_posts where sub_forum_id = $main_cat_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);

                if($data_set["a"]==0||$data_set["a"]==Null)
                {
                    return 0;
                }
                else
                {
                 $sql="select * from forum_posts where id = $data_set[a]";
                 $res_row=mysql_query($sql);
                 $data_row=mysql_fetch_array($res_row);

                 return $data_row;
                }
            }

            function get_all_sub_cat($main_id)
            {
                $sql="select * from forum_sub_cat where main_cat_id = $main_id";
                $res=mysql_query($sql);
                return $res;
            }
            
            function get_topics($main_cat_id,$sub_cat_id,$n)
            {
                $sql="select * from forum_topics where main_forum_id = $main_cat_id";
                $sql.=" and sub_forum_id = $sub_cat_id";
                $sql.=" order by posted_on";
                $sql.=" limit $n,15";
                
                $res=mysql_query($sql);
                return $res;
            }
            
            function get_num_posts_topic($topic_id)
            {
                $sql="select count(*) as a from forum_posts where topic_id = $topic_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set["a"];
            }
            
            function get_last_topic_post($topic_id)
            {
                $sql="select max(id) as a from forum_posts where topic_id = $topic_id order by posted_on";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                if($data_set["a"]==0||$data_set["a"]==Null)
                {
                    return 0;
                }
                else
                {
                    $sql="select * from forum_posts where id = $data_set[a]";
                    $check_res=mysql_query($sql);
                    $check_set=mysql_fetch_array($check_res);
                    return $check_set;
                }
            }
            
            function add_topic($main_cat,$sub_cat,$subject,$body,$posted_by)
            {
               $posted_on=date("m-d-Y g:i:s");
               
               $sql="insert into forum_topics";
               $sql.="(main_forum_id";
               $sql.=", sub_forum_id";
               $sql.=", subject";
               $sql.=", message";
               $sql.=", posted_on";
               $sql.=", posted_by)";
               
               $sql.=" values($main_cat";
               $sql.=", $sub_cat";
               $sql.=", '$subject'";
               $sql.=", '$body'";
               $sql.=", '$posted_on'";
               $sql.=", '$posted_by')";
               
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
            
            function get_topic($topic_id)
            {
                $sql="select * from forum_topics where id = $topic_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set;
            }
            
            function get_replies($topic_id,$n)
            {
                $sql="select * from forum_posts where topic_id = $topic_id order by id desc limit $n,15";
                $res=mysql_query($sql);

                return $res;
            }
            
            
            function add_post($post_id,$main_cat,$sub_cat,$subject,$body,$posted_by)
            {
               $posted_on=date("m-d-Y g:i:s");

               $sql="insert into forum_posts";
               $sql.="(main_forum_id";
               $sql.=", sub_forum_id";
               $sql.=", topic_id";
               $sql.=", subject";
               $sql.=", message";
               $sql.=", posted_on";
               $sql.=", posted_by)";

               $sql.=" values($main_cat";
               $sql.=", $sub_cat";
               $sql.=", $post_id";
               $sql.=", '$subject'";
               $sql.=", '$body'";
               $sql.=", '$posted_on'";
               $sql.=", '$posted_by')";

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

            function get_mods($main_cat_id,$sub_cat_id)
            {
                $sql="select moderators from forum_sub_cat where id = $sub_cat_id and main_cat_id = $main_cat_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set["moderators"];
            }
            
            function edit_topic($post_id,$subject,$message)
            {
                $sql="update forum_topics";
                $sql.=" set subject='$subject'";
                $sql.=", message='$message'";
                $sql.=" where id = $post_id";
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
            
            function get_post($post_id)
            {
                $sql="select * from forum_posts where id = $post_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set;
            }

            function edit_post($post_id,$subject,$message)
            {
                $sql="update forum_posts";
                $sql.=" set subject='$subject'";
                $sql.=", message='$message'";
                $sql.=" where id = $post_id";
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
     // class for forums
?>
