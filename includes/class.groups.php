<?php

     // class for groups

     class groups
     {
        function add_category($cat_name, $cat_desc)
        {
            $sql="insert into group_cat";
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
        
        function edit_category($cat_id, $cat_name, $cat_desc)
        {
            $sql="update group_cat";
            $sql.=" set cat_name = '$cat_name'";
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


        function delete_category($cat_id)
        {
            $sql="delete from group_cat";
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

        
            function display_admin_cat()
            {

                    $sql="select * from group_cat order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["cat_name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_group_cat.php?id=".$RSUser["id"]."'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_group_cat.php?id=".$RSUser["id"]."'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }
             
             function get_cat($cat_id)
             {
                 $sql="select * from group_cat where id = $cat_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }
             
             function get_all_cats()
             {
                 $sql="select * from group_cat order by cat_name";
                 $res=mysql_query($sql);
                 return $res;
             }
             
             function get_num_groups($cat_id)
             {
                 $sql="select count(*) as a from groups where category = $cat_id and hidden_group != '1'";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }
             
             function add_group($group_name,$category,$type,$hidden_group,$members_invite,$public_forum,$post_bulletins,$post_images,$country,$city,$state,$zip_code,$description,$member_id,$hide_from_all)
             {
                 $posted_on=date("m/d/Y");
                 
                 $sql="insert into groups";
                 $sql.="(group_name";
                 $sql.=", category";
                 $sql.=", type";
                 $sql.=", hidden_group";
                 $sql.=", members_invite";
                 $sql.=", public_forum";
                 $sql.=", post_bulletins";
                 $sql.=", post_images";
                 $sql.=", country";
                 $sql.=", city";
                 $sql.=", state";
                 $sql.=", zip_code";
                 $sql.=", description";
                 $sql.=", posted_on";
                 $sql.=", member_id";
                 $sql.=", hide_from_all)";
								 
                 $sql.=" values('$group_name'";
                 $sql.=", $category";
                 $sql.=", '$type'";
                 $sql.=", '$hidden_group'";
                 $sql.=", '$members_invite'";
                 $sql.=", '$public_forum'";
                 $sql.=", '$post_bulletins'";
                 $sql.=", '$post_images'";
                 $sql.=", $country";
                 $sql.=", '$city'";
                 $sql.=", '$state'";
                 $sql.=", '$zip_code'";
                 $sql.=", '$description'";
                 $sql.=", '$posted_on'";
                 $sql.=", $member_id";
                 $sql.=", $hide_from_all)";

                 //print $sql;
                 $res = mysql_query($sql);
                 
                 print mysql_error();
                 
                 if($res)
                 {
                     return mysql_insert_id();
                 }
                 else
                 {
                     return 0;
                 }
                 
             }

             function edit_group($group_id,$group_name,$category,$type,$hidden_group,$members_invite,$public_forum,$post_bulletins,$post_images,$country,$city,$state,$zip_code,$description,$member_id,$hide_from_all)
             {
                 $sql="update groups";
                 $sql.=" set group_name='$group_name'";
                 $sql.=", category=$category";
                 $sql.=", type='$type'";
                 $sql.=", hidden_group='$hidden_group'";
                 $sql.=", members_invite='$members_invite'";
                 $sql.=", public_forum='$public_forum'";
                 $sql.=", post_bulletins='$post_bulletins'";
                 $sql.=", post_images='$post_images'";
                 $sql.=", country=$country";
                 $sql.=", city='$city'";
                 $sql.=", state='$state'";
                 $sql.=", zip_code='$zip_code'";
                 $sql.=", description='$description'";
                 $sql.=", member_id='$member_id'";
	               $sql.=", hide_from_all = '$hide_from_all'";
                 $sql.=" where id = $group_id";
	
	
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

             function delete_group($group_id)
             {
                 $sql="delete from groups";
                 $sql.=" where id = $group_id";

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

             function set_featured_group($group_id)
             {
                 $sql="update groups";
                 $sql.=" set featured='1'";
                 $sql.=" where id = $group_id";

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

             function set_unfeatured_group($group_id)
             {
                 $sql="update groups";
                 $sql.=" set featured='0'";
                 $sql.=" where id = $group_id";

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
             
             function display_my_groups($member_id, $n)
             {
                $group=new groups;

                           // paging
                           $n=$n-1;
                           $n_next=$n+20;

                           $sql="select count(*) as a from groups a, invitations b";
                           $sql.=" where a.id = b.group_id and a.member_id != $member_id ";
                           $sql.="and b.member_id = $member_id";
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
                           $sql="select a.id as group_id, a.*,b.* from groups a, invitations b ";
                           $sql.=" where a.id = b.group_id and a.member_id != $member_id ";
                           $sql.=" and b.member_id = $member_id ";
                           $sql.=" and hidden_group = '0' order by group_name desc limit $n, 20";
                           $result=mysql_query($sql);
                           print mysql_error();
                           //print mysql_num_rows($result);
                           //print $sql;

                           // paging
                           
                           // Start Displaying
                           
                              $sr_no=1;
                              while($data_set=mysql_fetch_array($result))
                              {
                                  if($sr_no%5==0)
                                  {
                                       print "</tr><tr valign=top>";
                                  }

                                       print "<td><table cellSpacing=0 cellPadding=0 width='100%' bgColor='#ffffff' border='0'>";
                                       print "<tbody><tr vAlign=top><td height=117><table cellSpacing=0 cellPadding=5 width='100%' border=0>";
                                       print "<tbody><tr align=middle><td vAlign=top align=middle width=68 bgColor=#ffffff>";
                                       print "<table cellSpacing=0 align=center border=0><tbody><tr><td vAlign=top align=middle>";
                                       // Group Name
                                       print "<a href='view_group.php?group_id=$data_set[group_id]'>$data_set[group_name]</a></td></tr>";
                                       print "<tr><td vAlign=top align=middle><a href='view_group.php?group_id=$data_set[group_id]'>";
                                             $num_images=$group->get_group_num_images($data_set["group_id"]);
                                             if($num_images==0)
                                             {
                                                 print "<img height=75 alt='' src='images/no_pic.gif' width=75 border=0></A>";
                                             }
                                             else
                                             {
                                                 $image_url=$group->get_group_image($data_set["group_id"]);
                                                 print "<img height=75 alt='' src='$image_url' width=75 border=0></A>";
                                             }
                                             
                                              $group_creator=$group->get_member_id($data_set["group_id"]);

                                              if($group_creator==$member_id)
                                              {
                                                  print "<br><img src='images/mod.bmp'>";
                                              }

                                               print "</td></tr></tbody></table></td></tr></table></table>";
                                $sr_no=$sr_no+1;
                              }

             // paging
                print "<tr><td width='100%' colspan='4' class='content'>";
                               if($n!=0)
                               {
                                $n_previous=$n-20;
                                print "&#187; <a href='joined_groups.php?n=$n_previous'>Previous</a>";
                               }
                               if($next==1)
                               {
                                print "&nbsp;&#187; <a href='joined_groups.php?n=$n_next'>Next</a>";
                               }
                print "</td></tr>";
            // paging


             }
             
             function display_joined_groups($member_id, $n)
             {
                $group=new groups;

                           // paging
                           $n=$n-1;
                           $n_next=$n+20;
                           $sql="select count(*) as a from groups where member_id = $member_id";
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
                           $sql="select * from groups where member_id = $member_id and hidden_group = '0' order by group_name desc limit $n, 20";
                           $result=mysql_query($sql);
                           print mysql_error();
                           //print mysql_num_rows($result);
                           //print $sql;

                           // paging

                           // Start Displaying

                              $sr_no=1;
                              while($data_set=mysql_fetch_array($result))
                              {
                                  if($sr_no%5==0)
                                  {
                                       print "</tr><tr valign=top>";
                                  }

                                       print "<td><table cellSpacing=0 cellPadding=0 width='100%' bgColor='#ffffff' border='0'>";
                                       print "<tbody><tr vAlign=top><td height=117><table cellSpacing=0 cellPadding=5 width='100%' border=0>";
                                       print "<tbody><tr align=middle><td vAlign=top align=middle width=68 bgColor=#ffffff>";
                                       print "<table cellSpacing=0 align=center border=0><tbody><tr><td vAlign=top align=middle>";
                                       // Group Name
                                       print "<a href='view_group.php?group_id=$data_set[id]'>$data_set[group_name]</a></td></tr>";
                                       print "<tr><td vAlign=top align=middle><a href='view_group.php?group_id=$data_set[id]'>";
                                             $num_images=$group->get_group_num_images($data_set["id"]);
                                             if($num_images==0)
                                             {
                                                 print "<img height=75 alt='' src='images/no_pic.gif' width=75 border=0></A>";
                                             }
                                             else
                                             {
                                                 $image_url=$group->get_group_image($data_set["id"]);
                                                 print "<img height=75 alt='' src='$image_url' width=75 border=0></A>";
                                             }

                                              $group_creator=$group->get_member_id($data_set["id"]);

                                              if($group_creator==$member_id)
                                              {
                                                  print "<br><img src='images/mod.bmp'>";
                                              }

                                               print "</td></tr></tbody></table></td></tr></table></table>";
                                $sr_no=$sr_no+1;
                              }

             // paging
                print "<tr><td width='100%' colspan='4' class='content'>";
                               if($n!=0)
                               {
                                $n_previous=$n-20;
                                print "&#187; <a href='my_groups.php?n=$n_previous'>Previous</a>";
                               }
                               if($next==1)
                               {
                                print "&nbsp;&#187; <a href='my_groups.php?n=$n_next'>Next</a>";
                               }
                print "</td></tr>";
            // paging


             }
             
             
             function display_groups($cat_id, $n)
             {
                $group=new groups;

                           // paging
                           $n=$n-1;
                           $n_next=$n+20;
                           $sql="select count(*) as a from groups where category = $cat_id";
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
                           $sql="select * from groups where category = $cat_id and hidden_group = '0' order by group_name desc limit $n, 20";
                           $result=mysql_query($sql);
                           print mysql_error();
                           //print mysql_num_rows($result);
                           //print $sql;

                           // paging

                           // Start Displaying
                           print "<table>";
                              $sr_no=0;
                              while($data_set=mysql_fetch_array($result))
                              {
                                  if($sr_no%5==0)
                                  {
                                       print "</tr><tr valign=top>";
                                  }

                                       print "<td><table cellSpacing=0 cellPadding=0 width='100%' bgColor='#ffffff' border='0'>";
                                       print "<tbody><tr vAlign=top><td height=117><table cellSpacing=0 cellPadding=5 width='100%' border=0>";
                                       print "<tbody><tr align=middle><td vAlign=top align=middle width=68 bgColor=#ffffff>";
                                       print "<table cellSpacing=0 align=center border=0><tbody><tr><td vAlign=top align=middle>";
                                       // Group Name
                                       print "<a href='view_group.php?group_id=$data_set[id]'>$data_set[group_name]</a></td></tr>";
                                       print "<tr><td vAlign=top align=middle><a href='view_group.php?group_id=$data_set[id]'>";
                                             $num_images=$group->get_group_num_images($data_set["id"]);
                                             if($num_images==0)
                                             {
                                                 print "<img height=75 alt='' src='images/no_pic.gif' width=75 border=0></A>";
                                             }
                                             else
                                             {
                                                 $image_url=$group->get_group_image($data_set["id"]);
                                                 print "<img height=75 alt='' src='$image_url' width=75 border=0></A>";
                                             }

                                              $group_creator=$group->get_member_id($data_set["id"]);

                                              if($group_creator==$member_id)
                                              {
                                                  print "<br><img src='images/mod.bmp'>";
                                              }

                                               print "</td></tr></tbody></table></td></tr></table></table>";
                                $sr_no=$sr_no+1;
                              }

             // paging
                print "<tr><td width='100%' colspan='4' class='content'>";
                               if($n!=0)
                               {
                                $n_previous=$n-20;
                                print "&#187; <a href='my_groups.php?n=$n_previous'>Previous</a>";
                               }
                               if($next==1)
                               {
                                print "&nbsp;&#187; <a href='my_groups.php?n=$n_next'>Next</a>";
                               }
                print "</td></tr>";
            // paging
            
               print "</table>";


             }
             
             function get_group_image($group_id)
             {
                 $sql="select * from group_photos where group_id=$group_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["photo_url"];
             }

             function get_group_num_images($group_id)
             {
                 $sql="select count(*) as a from group_photos where group_id=$group_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }
             
             function get_member_id($group_id)
             {
                 $sql="select member_id from groups where id=$group_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["member_id"];
             }
             
             function get_group_name($group_id)
             {
                 $sql="select group_name from groups where id = $group_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["group_name"];
             }

             function get_group_info($group_id)
             {
                 $sql="select * from groups where id = $group_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function get_group_members($group_id)
             {
                 $sql="select id from invitations where group_id = $group_id and status = '1' group by member_id";

                 $res=mysql_query($sql);
                 return mysql_num_rows($res);
             }

             function get_country($id)
             {
                 $sql="select state_name from states where state_id = $id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["state_name"];
             }


             function check_group_member($group_id,$member_id)
             {
                 $sql="select * from invitations where member_id = $member_id and group_id=$group_id AND status";
                 $res=mysql_query($sql);
                 $num_rows=mysql_num_rows($res);
                 if($num_rows==0)
                 {
                     $sql="select member_id from groups where id=$group_id";
                     $res=mysql_query($sql);
                     $data_set=mysql_fetch_array($res);
                     if($data_set["member_id"]==$member_id)
                     {
                         $yes=1;
                     }
                     else
                     {
                         $yes=0;
                     }
                 }
                 else
                 {
                     $yes=1;
                 }
                 
                 return $yes;
                 
             }
             
             function get_group($group_id)
             {
                 $sql="select * from groups where id = $group_id";
                 $res=mysql_query($sql);
                 return $res;
             }


             function get_my_groups($member_id)
             {
                $sql="select * from groups ";
                $sql.=" where member_id = $member_id ";
                $sql.=" and hidden_group = '0' order by group_name desc";
                $result=mysql_query($sql);
                print mysql_error();
                return $result;

             }

             function add_to_group($group_id,$member_id)
             {
                global $_SESSION;
								
								$sql = "SELECT count(*) as num FROM invitations WHERE member_id = '".$member_id."' AND group_id = '".$group_id."'";
								$res = mysql_fetch_array(mysql_query($sql));
								if (!$res['num']) {
									$sql = "SELECT count(*) as num FROM groups g LEFT JOIN invitations i ON g.id = i.group_id WHERE
													(g.member_id = '".$_SESSION['member_id']."' 
													OR
													(i.member_id = '".$_SESSION['member_id']."' AND i.status = 1 AND g.members_invite = 1)) AND g.id = '".$group_id."'";
									$mem = mysql_fetch_array(mysql_query($sql));
									if ($mem['num']) {
										$is_invited = 1;
										$friend_id = $_SESSION['member_id'];
									}
									$sql = "INSERT INTO invitations SET 
													member_id = '".$member_id."',
													group_id = '".$group_id."',
													date = '".time()."',
													is_invited = '".$is_invited."',
													friend_id = '".$friend_id."'";

	                $res = mysql_query($sql);
									return $res;
             		} else return false;
								
						 }
     }

     // class for groups
?>
