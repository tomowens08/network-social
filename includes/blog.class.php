<?php
     // class for blog
     class blog
     {
         function add_mood($name,$image)
         {
             $sql="insert into blog_mood";
             $sql.="(name";
             $sql.=", image)";
             $sql.=" values('$name'";
             $sql.=", '$image')";
             
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
         
         function edit_mood($id,$name,$image)
         {
             $sql="update blog_mood";
             $sql.=" set name='$name'";
             $sql.=", image='$image'";
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

         function delete_mood($id)
         {
             $sql="delete from blog_mood";
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

            function display_admin_mood()
            {

                    $sql="select * from blog_mood order by name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_mood.php?id=".$RSUser["id"]."'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_mood.php?id=".$RSUser["id"]."'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }
             
             function get_mood($id)
             {
                 $sql="select * from blog_mood where id = $id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set;
             }
             
             function get_mood_name($id)
             {
                 $sql="select name from blog_mood where id = $id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["name"];
             }
             
             function get_all_moods()
             {
                 $sql="select * from blog_mood";
                 $res=mysql_query($sql);

                 return $res;
             }
             
             function get_mood_image($id)
             {
                 $sql="select image from blog_mood where id = $id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["image"];

             }
             
             function get_today_posts($member_id)
             {
                 $today_date = mktime(0,0,0,date('m'),date('d'),date('Y'));
                 
                 $sql="select count(*) as a from blogs where last_updated > ".$today_date." AND member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["a"];
             }

             function get_week_posts($member_id)
             {
                 $today_date = mktime(0,0,0,date('m'),date('d'),date('Y')) - 7*24*3600;

                 $sql="select count(*) as a from blogs where last_updated > ".$today_date." AND member_id = $member_id";
                 
								 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }
             
             function get_total_posts($member_id)
             {

                 $sql="select count(*) as a from blogs where member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }
             
             function get_today_comments($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select count(*) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $sql.=" and posted_on1 like '$posted_on1'";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["a"];
             }

             function get_week_comments($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select count(*) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $sql.=" and posted_on1 like '$posted_on1'";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_total_comments($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select count(*) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_today_views($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select sum(view) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_week_views($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select sum(view) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_total_views($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select sum(view) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }


             function get_today_kudos($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select sum(kudos) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_week_kudos($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select sum(kudos) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_total_kudos($member_id)
             {
                 $posted_on1=date("m/d/Y");
                 $sql="select sum(kudos) as a from blog_comments a, blogs b where";
                 $sql.=" a.blog_id = b.id and b.member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }


             function add_blog($member_id,$date,$subject,$body,$currently,$mood,$comments_allowed,$privacy)
             {
						 		if (ereg ("([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})", $date, $regs)) {
									$last_updated = mktime($regs[4],$regs[5],$regs[6],$regs[1],$regs[2],$regs[3]);
								}
                 $sql="insert into blogs";
                 $sql.="(member_id";
								 $sql.=", last_updated";
                 $sql.=", am_pm";
                 $sql.=", subject";
                 $sql.=", body";
                 $sql.=", currently";
                 $sql.=", mood";
                 $sql.=", comments_allowed";
                 $sql.=", privacy)";
                 
                 $sql.=" values($member_id";
								 $sql.=", '$last_updated'";
                 $sql.=", '$am_pm'";
                 $sql.=", '$subject'";
                 $sql.=", '$body'";
                 $sql.=", '$currently'";
                 $sql.=", '$mood'";
                 $sql.=", '$comments_allowed'";
                 $sql.=", '$privacy')";
                 
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

             function edit_blog($blog_id,$subject,$body,$currently,$mood,$comments_allowed,$privacy)
             {
                 $last_update=date("D d M Y, H:m");
                 
                 $sql="update blogs";
                 $sql.=" set ";
                 $sql.=" subject='$subject'";
                 $sql.=", body='$body'";
                 $sql.=", currently='$currently'";
                 $sql.=", mood='$mood'";
                 $sql.=", comments_allowed='$comments_allowed'";
                 $sql.=", privacy='$privacy'";
                 $sql.=", last_updated='$last_update'";
                 $sql.=" where id = $blog_id";

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

             function get_blog($id)
             {
                 $sql="select * from blogs";
                 $sql.=" where id = $id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set;
             }
             
             function get_my_blogs($member_id)
             {
                 $sql="select * from blogs where member_id=$member_id";
                 $res=mysql_query($sql);
                 return $res;
             }
             
             function get_num_comments($blog_id)
             {
                 $sql="select count(*) as a from blog_comments where blog_id=$blog_id AND approved = 1";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["a"];
             }

             function get_num_kudos($blog_id)
             {
                 $sql="select sum(kudos) as a from blog_comments where blog_id=$blog_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 if($data_set["a"]==Null)
                 {
                     return 0;
                 }
                 else
                 {
                     return $data_set["a"];
                 }
             }
             
             function get_creator($blog_id)
             {
                 $sql="select member_id from blogs where id=$blog_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["member_id"];
             }
             
             function get_blog_comments($blog_id)
             {
                 $sql = "select * from blog_comments where blog_id=$blog_id AND approved = 1 order by id desc";
                 $res = mysql_query($sql);
                 return $res;
             }
             
             function add_comment($blog_id, $member_id,$posted_on,$body,$kudos)
             {
                 $posted_on1=date("m/d/Y");
                 
                 $sql="insert into blog_comments";
                 $sql.="(blog_id";
                 $sql.=", member_id";
                 $sql.=", posted_on";
                 $sql.=", body";
                 $sql.=", posted_on1";
                 $sql.=", kudos)";
                 
                 $sql.=" values($blog_id";
                 $sql.=", $member_id";
                 $sql.=", '$posted_on'";
                 $sql.=", '$body'";
                 $sql.=", '$posted_on1'";
                 $sql.=", $kudos)";
                 
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

             function add_comment1($comment_id, $blog_id, $member_id,$posted_on,$body,$kudos)
             {
                 $sql="insert into blog_comments";
                 $sql.="(blog_id";
                 $sql.=", member_id";
                 $sql.=", posted_on";
                 $sql.=", body";
                 $sql.=", comment_id";
                 $sql.=", kudos)";

                 $sql.=" values($blog_id";
                 $sql.=", $member_id";
                 $sql.=", '$posted_on'";
                 $sql.=", '$body'";
                 $sql.=", $comment_id";
                 $sql.=", $kudos)";

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

             
             function get_comment($comment_id)
             {
                 $sql="select * from blog_comments";
                 $sql.=" where id = $comment_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }
             
             function delete_comment($comment_id,$blog_id)
             {
                 $sql="delete from blog_comments where id=$comment_id and blog_id=$blog_id";
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

             function delete_blog($blog_id)
             {
                 $sql="delete from blog_comments where blog_id=$blog_id";
                 $res=mysql_query($sql);
                 $sql="delete from blogs where id=$blog_id";
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
             
             function update_counter($blog_id)
             {
                 $sql="update blogs";
                 $sql.=" set view=view+1";
                 $sql.=" where id = $blog_id";
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
             
             function get_subscriptions($member_id)
             {
                 $sql="select * from blog_subscriptions";
                 $sql.=" where member_id = $member_id";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_readers($member_id)
             {
                 $sql="select * from blog_subscriptions";
                 $sql.=" where sub_member_id = $member_id";
                 $res=mysql_query($sql);
                 return $res;
             }
             
             function delete_sub($sub_id)
             {
                 $sql="delete from blog_subscriptions where id=$sub_id";
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

             function get_sub($sub_id)
             {
                 $sql="select * from blog_subscriptions where id = $sub_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }
             
             function get_num_sub($member_id)
             {
                 $sql="select count(*) as a from blog_subscriptions where member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["a"];
             }
             
             function edit_sub($id,$notify)
             {
                 $sql="update blog_subscriptions";
                 $sql.=" set notify='$notify'";
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


             function add_sub($sub_member_id,$member_id)
             {
                 $sql="select * from blog_subscriptions where sub_member_id=$sub_member_id and member_id = $member_id";
                 $res=mysql_query($sql);
                 $num_rows=mysql_num_rows($res);
                 if($num_rows==0)
                 {
                     $posted_on=date("m/d/Y");
                  $sql="insert into blog_subscriptions";
                  $sql.="(member_id";
                  $sql.=", sub_member_id";
                  $sql.=", sub_on";
                  $sql.=", notify)";
                  $sql.=" values($member_id";
                  $sql.=", $sub_member_id";
                  $sql.=", '$posted_on'";
                  $sql.=", '1')";
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
                 else
                 {
                     return 1;
                 }
             }
             
             function check_preffered($member_id,$friend_id)
             {
                 $sql="select * from blog_preffered";
                 $sql.=" where member_id = $member_id";
                 $sql.=" and preffered_id = $friend_id";
                 $res=mysql_query($sql);
                 $num_rows=mysql_num_rows($res);
                 return $num_rows;
             }
             
             function add_preffered($member_id,$friend_id)
             {
                 $sql="insert into blog_preffered";
                 $sql.="(member_id";
                 $sql.=", preffered_id)";
                 $sql.=" values($member_id";
                 $sql.=", $friend_id)";
                 
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
             
             function get_preffered_list($member_id)
             {
                 $sql="select * from blog_preffered";
                 $sql.=" where member_id = $member_id";
                 
                 $res=mysql_query($sql);
                 return $res;
             }
             
             function remove_preffered($id)
             {
                 $sql="delete from blog_preffered";
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
             
     }
     // class for blog
?>
