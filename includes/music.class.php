<?php
     // class for music
     class music
     {
        function add_genre($cat_name, $cat_desc)
        {
            $sql="insert into music_genre";
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

        function edit_genre($cat_id, $cat_name, $cat_desc)
        {
            $sql="update music_genre";
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


        function delete_genre($cat_id)
        {
            $sql="delete from music_genre";
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

                    $sql="select * from music_genre order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["cat_name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_genre.php?id=".$RSUser["id"]."'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_genre.php?id=".$RSUser["id"]."'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }

             function get_cat($cat_id)
             {
                 $sql="select * from music_genre where id = $cat_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function get_all_cat()
             {
                 $sql="select * from music_genre";
                 $res=mysql_query($sql);
                 return $res;
             }

             function add_shows($member_id,$month,$day,$year,$hour,$min,$marker,$venue,$cost,$address,$city,$zip_code,$regional,$state,$country,$description)
             {
                 $sql="insert into music_shows";
                 $sql.="(member_id";
                 $sql.=", show_month";
                 $sql.=", show_day";
                 $sql.=", show_year";
                 $sql.=", show_hour";
                 $sql.=", show_min";
                 $sql.=", show_marker";
                 $sql.=", venue";
                 $sql.=", cost";
                 $sql.=", address";
                 $sql.=", city";
                 $sql.=", zip_code";
                 $sql.=", state";
                 $sql.=", region";
                 $sql.=", country";
                 $sql.=", description)";

                 $sql.=" values($member_id";
                 $sql.=", '$month'";
                 $sql.=", '$day'";
                 $sql.=", '$year'";
                 $sql.=", '$hour'";
                 $sql.=", '$min'";
                 $sql.=", '$marker'";
                 $sql.=", '$venue'";
                 $sql.=", '$cost'";
                 $sql.=", '$address'";
                 $sql.=", '$city'";
                 $sql.=", '$zip_code'";
                 $sql.=", '$state'";
                 $sql.=", '$regional'";
                 $sql.=", '$country'";
                 $sql.=", '$description')";

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

             function edit_shows($id, $member_id,$month,$day,$year,$hour,$min,$marker,$venue,$cost,$address,$city,$zip_code,$regional,$state,$country,$description)
             {
                 $sql="update music_shows";
                 $sql.=" set member_id=$member_id";
                 $sql.=", show_month='$month'";
                 $sql.=", show_day='$day'";
                 $sql.=", show_year='$year'";
                 $sql.=", show_hour='$hour'";
                 $sql.=", show_min='$min'";
                 $sql.=", show_marker='$marker'";
                 $sql.=", venue='$venue'";
                 $sql.=", cost='$cost'";
                 $sql.=", address='$address'";
                 $sql.=", city='$city'";
                 $sql.=", zip_code='$zip_code'";
                 $sql.=", state='$state'";
                 $sql.=", region='$regional'";
                 $sql.=", country='$country'";
                 $sql.=", description='$description'";
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

             function delete_shows($id)
             {
                 $sql="delete from music_shows";
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

             function get_num_shows($member_id)
             {
                 $sql="select count(*) as a from music_shows";
                 $sql.=" where member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }

             function get_user_shows($member_id)
             {
                 $sql="select * from music_shows";
                 $sql.=" where member_id = $member_id";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_show($id)
             {
                 $sql="select * from music_shows";
                 $sql.=" where id = $id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function get_band_details($member_id)
             {
                 $sql="select * from music_profile";
                 $sql.=" where member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function update_profile($member_id,$headline,$bio,$members,$influences,$sounds_like,$website,$record_label,$label_type)
             {
                 $sql="select * from music_profile where member_id = $member_id";
                 $res=mysql_query($sql);
                 $num_rows=mysql_num_rows($res);
                 if($num_rows==0)
                 {
                     $sql="insert into music_profile";
                     $sql.="(member_id";
                     $sql.=", headline";
                     $sql.=", bio";
                     $sql.=", members";
                     $sql.=", influences";
                     $sql.=", sounds_like";
                     $sql.=", website";
                     $sql.=", record_label";
                     $sql.=", label_type)";

                     $sql.=" values($member_id";
                     $sql.=", '$headline'";
                     $sql.=", '$bio'";
                     $sql.=", '$members'";
                     $sql.=", '$influences'";
                     $sql.=", '$sounds_like'";
                     $sql.=", '$website'";
                     $sql.=", '$record_label'";
                     $sql.=", '$label_type')";
                 }
                 else
                 {
                     $sql="update music_profile";
                     $sql.=" set headline='$headline'";
                     $sql.=", bio='$bio'";
                     $sql.=", members='$members'";
                     $sql.=", influences='$influences'";
                     $sql.=", sounds_like='$sounds_like'";
                     $sql.=", website='$website'";
                     $sql.=", record_label='$record_label'";
                     $sql.=", label_type='$label_type'";
                     $sql.=" where member_id=$member_id";
                 }
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

             function get_basic($member_id)
             {
                 $sql="select * from members where member_id=$member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function edit_basic($member_id,$firstname,$website,$city,$state,$country,$zip_code)
             {
                 $sql="update members";
                 $sql.=" set member_name='$firstname'";
                 $sql.=", city='$city'";
                 $sql.=", website='$website'";
                 $sql.=", current_state='$state'";
                 $sql.=", country='$country'";
                 $sql.=", zip_code='$zip_code'";
                 $sql.=" where member_id = $member_id";
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

             function add_song($member_id,$song_url,$song_name,$lyrics)
             {
								 $sql = "SELECT count(*) as num FROM music_songs WHERE member_id = ".$member_id;
								 $res = mysql_fetch_array(mysql_query($sql));
	               if (!$res['num']) $def = 1;
								 
								 $sql="insert into music_songs";
                 $sql.="(member_id";
                 $sql.=", owner_id";
                 $sql.=", song_name";
                 $sql.=", lyrics";
                 $sql.=", date";
                 $sql.=", def";
                 $sql.=", song_file)";
                 $sql.=" values($member_id";
                 $sql.=", '$member_id'";
                 $sql.=", '$song_name'";
                 $sql.=", '$lyrics'";
                 $sql.=", '".time()."'";
                 $sql.=", '".$def."'";
                 $sql.=", '$song_url')";
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

             function get_num_songs($member_id)
             {
                 $sql="select count(*) as a from music_songs";
                 $sql.=" where member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }

             function get_user_songs($member_id)
             {
                 $sql="select * from music_songs";
                 $sql.=" where member_id = $member_id ORDER BY song_name";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_song_details($song_id)
             {
                 $sql="select a1.*,a2.member_name as band_name from music_songs as a1,members as a2 where a1.id = $song_id and a1.member_id=a2.member_id";
                 $res=mysql_query($sql);
                 return $res;
             }

             function delete_song($id)
             {
						 		global $_SESSION;
								
								$sql = "SELECT * FROM music_songs WHERE id = ".$id;
								$song = mysql_fetch_array(mysql_query($sql));
								if ($_SESSION['member_id'] == $song['owner_id'])
									unlink($song['song_file']);
						 		$sql ="delete from music_songs";
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

             function get_latest_music_user()
             {
                 $sql="select a.member_id as member_id, a.*, b.* from members a, music_profile b, music_genre c ";
                 $sql.=" where a.member_id = b.member_id and a.genre = c.id";
                 $sql.=" and a.music='1' order by a.member_id desc limit 0,1";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }
     }
     // class for music
?>
