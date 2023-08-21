<?php
/*
  1 for Public album
  2 for Private album
*/
     // class for videos
      class videos
      {
         function add_cat($cat_name, $cat_desc)
         {
            $sql="insert into video_category";
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


         function edit_cat($cat_id, $cat_name, $cat_desc)
         {
            $sql="update video_category";
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


         function delete_cat($cat_id)
         {
            $sql="delete from video_category";
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

                    $sql="select * from video_category order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>$sr_no.</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>$RSUser[cat_name]</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_video_cat.php?id=$RSUser[id]'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_video_cat.php?id=$RSUser[id]'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }

             function get_cat($cat_id)
             {
                 $sql="select * from video_category where id = $cat_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function get_all_cat()
             {
                 $sql="select * from video_category order by cat_name";
                 $res=mysql_query($sql);

                 return $res;
             }

             function get_total_num_videos()
             {
                 $sql="select count(*) as a from video_members";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_cat_num_videos($cat_id)
             {
                 $sql="select count(*) as a from video_members where video_cat = $cat_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function display_main_vids($num_to_display)
             {
                 $sql="select * from video_members order by id desc limit 0,$num_to_display";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_num_comments($video_id)
             {
                 $sql="select count(*) as a from video_comments where video_id = $video_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }

             function add_album($album_title,$album_desc,$album_type,$member_id)
             {
                 $posted_on=date("m-d-Y g:i:s");

                 $sql="insert into video_albums";
                 $sql.="(album_title";
                 $sql.=", album_desc";
                 $sql.=", album_type";
                 $sql.=", member_id";
                 $sql.=", posted_on)";

                 $sql.=" values('$album_title'";
                 $sql.=", '$album_desc'";
                 $sql.=", '$album_type'";
                 $sql.=", $member_id";
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


             function get_member_albums($member_id)
             {
                 $sql="select * from video_albums where member_id = $member_id";
                 $res=mysql_query($sql);

                 return $res;
             }

             function get_num_album_videos($album_id)
             {
                 $sql="select count(*) as a from video_members where video_album=$album_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_album($album_id)
             {
                 $sql="select * from video_albums where id = $album_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function get_album_creator($album_id)
             {
                 $sql="select member_id from video_albums where id = $album_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["member_id"];
             }

             function edit_album($album_id,$album_title,$album_desc,$album_type)
             {
                 $sql="update video_albums";
                 $sql.=" set album_title = '$album_title'";
                 $sql.=", album_desc='$album_desc'";
                 $sql.=", album_type='$album_type'";
                 $sql.=" where id = $album_id";
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

             function delete_album($album_id)
             {
                 $sql="delete from video_albums where id = $album_id";
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

             function get_next_video_id()
             {
                 $sql="select max(id) as a from video_members";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 if($data_set["a"]==Null)
                 {
                     $next_id = 1;
                 }
                 else
                 {
                     $next_id = $data_set["a"]+1;
                 }

                 return $next_id;
             }

             function create_asx($video_virtual,$video_upload_name,$file_location,$file_name,$video_id,$site_name,$site_url,$video_title,$video_caption,$upload_by)
             {
                $file=$file_location."/".$file_name;
                //print "File = $file";
                $fp=fopen($file, "w");

                fwrite($fp,"<asx version=\"3.0\">");
                fwrite($fp,"\n");

                fwrite($fp,"<abstract>$video_caption Video! Click to visit $site_name</abstract>");
                fwrite($fp,"\n");

                fwrite($fp,"<title>Presented by $site_name</title>");
                fwrite($fp,"\n");

                fwrite($fp,"<moreinfo href=\"$site_url\" target=\"_blank\"></moreinfo>");
                fwrite($fp,"\n");

                fwrite($fp,"<entry>");
                fwrite($fp,"\n");

                fwrite($fp,"<title>$video_title by $upload_by</title>");
                fwrite($fp,"\n");

                fwrite($fp,"<moreinfo href=\"$site_url/view_video.php?id=$video_id\" target=\"_blank\"></moreinfo>");
                fwrite($fp,"\n");
                  $year=date("Y");

                fwrite($fp,"<copyright>All Copyrights, All trademarks and Copyrights Held By Respective Owners.</copyright>");
                fwrite($fp,"\n");

                fwrite($fp,"<author>$upload_by.</author>");
                fwrite($fp,"\n");

                fwrite($fp,"<ref href=\"$site_url/$video_virtual/$video_upload_name\"/>");
                fwrite($fp,"\n");

                fwrite($fp,"</entry></asx>");
                fwrite($fp,"\n");

                return $file_name;
             }

             function add_video($album_id,$video_url,$thumb_url,$asx_url,$category,$video_title,$video_caption,$video_tags,$video_type,$video_codes,$ip_address,$member_id)
             {
                 $posted_on=date("m-d-Y g:i:s");
                 $sql="insert into video_members";
                 $sql.="(video_album";
                 $sql.=", video_file";
                 $sql.=", video_thumbnail";
                 $sql.=", video_cat";
                 $sql.=", video_title";
                 $sql.=", video_caption";
                 $sql.=", video_tags";
                 $sql.=", video_type";
                 $sql.=", video_codes_allow";
                 $sql.=", member_id";
                 $sql.=", posted_on";
                 $sql.=", asx_file";
                 $sql.=", upload_ip)";

                 $sql.=" values($album_id";
                 $sql.=", '$video_url'";
                 $sql.=", '$thumb_url'";
                 $sql.=", $category";
                 $sql.=", '$video_title'";
                 $sql.=", '$video_caption'";
                 $sql.=", '$video_tags'";
                 $sql.=", '$video_type'";
                 $sql.=", '$video_codes'";
                 $sql.=", $member_id";
                 $sql.=", '$posted_on'";
                 $sql.=", '$asx_url'";
                 $sql.=", '$ip_address')";

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

             function display_cat_vids($cat_id,$n)
             {
                 $sql="select * from video_members where video_cat = $cat_id order by id desc limit $n,12";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_member_videos($member_id)
             {
                 $sql="select * from video_members where member_id = $member_id";
                 $res=mysql_query($sql);

                 return $res;
             }


             function delete_video($video_id,$video_dir)
             {
                 $sql="select * from video_members where id = $video_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 // delete all files
                    @unlink($video_dir.$data_set["video_file"]);
                    @unlink($video_dir.$data_set["video_thumbnail"]);
                    @unlink($video_dir.$data_set["asx_file"]);

                    $sql="delete from video_members where id = $video_id";
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

             function get_video_creator($video_id)
             {
                 $sql="select member_id from video_members where id = $video_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["member_id"];
             }

             function display_new_vids($n)
             {
                 $sql="select * from video_members order by id desc limit $n,12";
                 $res=mysql_query($sql);
                 return $res;
             }

             function display_most_viewed_vids($n)
             {
                 $sql="select * from video_members order by views desc limit $n,12";
                 $res=mysql_query($sql);
                 return $res;
             }

             function display_most_disscussed_vids($n)
             {
                 $sql="select * from video_members order by total_comments desc limit $n,12";
                 $res=mysql_query($sql);
                 return $res;
             }

             function display_most_favorite_vids($n)
             {
                 $sql="select * from video_members order by total_favorite desc limit $n,12";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_video($video_id)
             {
                 $sql="select * from video_members where id = $video_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set;
             }

             function get_front_comments($display,$video_id)
             {
                 $sql="select * from video_comments";
                 $sql.=" where video_id = $video_id";
                 $sql.=" order by id desc";
                 $sql.=" limit 0,$display";

                 $res=mysql_query($sql);
                 return $res;
             }

             function add_comment($video_id,$rate,$comment,$member_id)
             {
                 $posted_on=date("m-d-Y g:i:s");

                 $sql="insert into video_comments";
                 $sql.="(video_id";
                 $sql.=", posted_on";
                 $sql.=", rate";
                 $sql.=", comment";
                 $sql.=", posted_by)";

                 $sql.=" values($video_id";
                 $sql.=", '$posted_on'";
                 $sql.=", $rate";
                 $sql.=", '$comment'";
                 $sql.=", $member_id)";
                 $res=mysql_query($sql);
                 if($res)
                 {
                     $sql="update videos set total_comments = total_comments+1 where id = $video_id";
                     $res=mysql_query($sql);
                     return 1;
                 }
                 else
                 {
                     return 0;
                 }
             }

             function delete_comment($comment_id)
             {
                 $sql="delete from video_comments";
                 $sql.=" where id = $comment_id";
                 $res=mysql_query($sql);

                 if($res)
                 {
                     $sql="update videos set total_comments = total_comments-1 where id = $video_id";
                     $res=mysql_query($sql);
                     return 1;
                 }
                 else
                 {
                     return 0;
                 }
             }

             function update_view_counter($video_id)
             {
                 $sql="update video_members set views=views+1";
                 $sql.=" where id = $video_id";
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

             function get_avg_video_rating($video_id)
             {
                 $sql="select avg(rate) as a from video_comments where video_id = $video_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 $rating=round($data_set["a"],0);
                 return $rating;
             }

             function update_last_viewed($video_id,$member_id)
             {
                 $sql="update video_members set last_viewed = $member_id where id = $video_id";
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

             function display_user_videos($video_id,$member_id)
             {
                 $sql="select * from video_members where member_id = $member_id and id != $video_id order by id desc";
                 $res=mysql_query($sql);
                 print mysql_error();
                 return $res;
             }

             function check_favorite($member_id,$video_id)
             {
                 $sql="select * from video_favorite where video_id = $video_id and member_id = $member_id";
                 $res=mysql_query($sql);
                 print mysql_error();
                 $num_rows=mysql_num_rows($res);
                 return $num_rows;
             }

             function add_favorite($member_id,$video_id)
             {
                 $posted_on=date("m-d-Y g:i:s");

                 $sql="insert into video_favorite";
                 $sql.="(member_id";
                 $sql.=", video_id";
                 $sql.=", posted_on)";

                 $sql.=" values($member_id";
                 $sql.=", $video_id";
                 $sql.=", '$posted_on')";

                 $res=mysql_query($sql);
                 if($res)
                 {
                     $sql="update video_members set total_favorite=total_favorite+1 where id = $video_id";
                     $upd=mysql_query($sql);
                     return 1;
                 }
                 else
                 {
                     return 0;
                 }
             }

             function display_my_favorite($member_id,$n)
             {
                 $sql="select a.id as video_id, a.*, b.* from video_members a, video_favorite b";
                 $sql.=" where a.id = b.video_id order by a.id desc limit $n,12";
                 $res=mysql_query($sql);
                 print mysql_error();
                 return $res;
             }

             function check_playlist($member_id,$video_id)
             {
                 $sql="select * from video_playlist where video_id = $video_id and member_id = $member_id";
                 $res=mysql_query($sql);
                 print mysql_error();
                 $num_rows=mysql_num_rows($res);
                 return $num_rows;
             }

             function add_playlist($member_id,$video_id)
             {
                 $posted_on=date("m-d-Y g:i:s");

                 $sql="insert into video_playlist";
                 $sql.="(member_id";
                 $sql.=", video_id";
                 $sql.=", posted_on)";

                 $sql.=" values($member_id";
                 $sql.=", $video_id";
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

             function display_my_playlist($member_id,$n)
             {
                 $sql="select a.id as video_id, a.*, b.* from video_members a, video_playlist b";
                 $sql.=" where a.id = b.video_id and b.member_id = $member_id order by a.id desc limit $n,12";
                 $res=mysql_query($sql);
                 print mysql_error();
                 return $res;
             }

             function search_videos($keyword)
             {
                 $sql="select * from video_members ";
                 $sql.=" where video_tags like '%$keyword%' order by id desc";
                 $res=mysql_query($sql);
                 print mysql_error();
                 return $res;
             }


             function create_playlist_asx($file_path,$file_name,$member_id,$site_name,$site_url)
             {
                $file=$file_path."/".$file_name;
                //print "File = $file";
                $fp=fopen($file, "w");

                fwrite($fp,"<asx version=\"3.0\">");
                fwrite($fp,"\n");

                fwrite($fp,"<abstract>PlayList Click to visit $site_name</abstract>");
                fwrite($fp,"\n");

                fwrite($fp,"<title>Presented by $site_name</title>");
                fwrite($fp,"\n");

                fwrite($fp,"<moreinfo href=\"$site_url\" target=\"_blank\"></moreinfo>");
                fwrite($fp,"\n");

                fwrite($fp,"<entry>");
                fwrite($fp,"\n");
                fwrite($fp,"<moreinfo href=\"$site_url/videos.php\" target=\"_blank\"></moreinfo>");
                fwrite($fp,"\n");
                  $year=date("Y");

                fwrite($fp,"<copyright>$year $site_name. All Rights Reserved.</copyright>");
                fwrite($fp,"\n");

                 $sql="select a.id as video_id, a.*, b.* from video_members a, video_playlist b";
                 $sql.=" where a.id = b.video_id and b.member_id  = $member_id order by a.id desc";
                 $res=mysql_query($sql);
                 print mysql_error();
                 while($data_set=mysql_fetch_array($res))
                 {
                  fwrite($fp,"<ref href=\"$site_url/$data_set[video_file]\"/>");
                  fwrite($fp,"\n");
                 }

                fwrite($fp,"</entry></asx>");
                fwrite($fp,"\n");

                return $file_name;
             }


      }
     // class for videos
?>
