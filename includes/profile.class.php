<?php
    // class for profile
    class profile
    {
      function get_last_login($user_id)
      {
        $sql="select last_login from members where member_id = $user_id";
        $res=mysql_query($sql);
        $data_set=mysql_fetch_array($res);
        return $data_set["last_login"];
      }

      function get_total_members($user_id)
      {
        $sql="select count(*) as a from members";
        $res=mysql_query($sql);
        $data_set=mysql_fetch_array($res);
        return $data_set["a"];
      }

      function get_total_views($user_id)
      {
        $sql="select views from members where member_id = $user_id";
        $res=mysql_query($sql);
        $data_set=mysql_fetch_array($res);
        return $data_set["views"];
      }

      function get_new_people($num=3)
      {
				global $people;
				$order = array('member_id','member_name','member_email','member_password','city');
				$sql = "select member_id from members ORDER BY ".$order[intval(rand(0,4))].' '.(intval(rand(0,2))?'DESC':'ASC');
				$q = mysql_query($sql);
				$ids = array();
				while ($m = mysql_fetch_array($q)) {
					if ($people->get_num_images($m['member_id']))
						$ids[] = $m['member_id'];
					if (count($ids) >= $num) break;
				}
        $sql="select * from members where member_id in (".implode(',',$ids).")";
        $res=mysql_query($sql);
        return $res;
      }

      function get_friends($user_id)
      {
				global $_SESSION;
				
        $sql = "SELECT mf.friend_id, mf.member_id, m1.member_id as friend_exists, m2.member_id as member_exists, m1.music as fr_music, m2.music as mem_music FROM invitations mf LEFT JOIN members m1 ON mf.friend_id = m1.member_id LEFT JOIN members m2 ON mf.member_id = m2.member_id
								WHERE (mf.friend_id = ".$user_id." OR mf.member_id = ".$user_id.") AND mf.approve AND NOT mf.deleted";
				$res = mysql_query($sql);
        $friend_ids = array();
				
				while ($f = mysql_fetch_array($res)) {
					//echo $f['member_id'].' '.$f['friend_id'].' '.$user_id.'<br>';
					
					if ($f['member_id'] == $user_id && $f['friend_exists'] && !$f['fr_music'])
						$friend_ids[] = $f['friend_id'];

					elseif ($f['member_exists'] && $f['friend_id'] == $user_id && !$f['mem_music'])
						$friend_ids[] = $f['member_id'];
				}
				//print_r($friend_ids);
				return array_unique($friend_ids);
      }

      function get_all_friends ($user_id)
      {
        $sql="select * from invitations where member_id = $user_id";
        $res=mysql_query($sql);
        return $res;
      }

      function get_interests($user_id)
      {
        $sql="select * from profile_interests where member_id = $user_id";
        $res=mysql_query($sql);
        $data_set=mysql_fetch_array($res);
        return $data_set;
      }

      function get_back($user_id)
      {
        $sql="select * from profile_back where member_id = $user_id";
        $res=mysql_query($sql);
        $data_set=mysql_fetch_array($res);
        return $data_set;
      }

      function update_interests($user_id,$headline,$about_me,$meet,$interests,$music,$movies,$television,$heroes,$books)
      {
        $sql="select * from profile_interests where member_id = $user_id";
        $res=mysql_query($sql);
        $num_rows=mysql_num_rows($res);

        if($num_rows==0)
        {
            $sql="insert into profile_interests";
            $sql.="(member_id";
            $sql.=", headline";
            $sql.=", about_me";
            $sql.=", meet";
            $sql.=", interests";
            $sql.=", music";
            $sql.=", movies";
            $sql.=", television";
            $sql.=", heroes";
            $sql.=", books)";

            $sql.=" values($user_id";
            $sql.=", '$headline'";
            $sql.=", '$about_me'";
            $sql.=", '$meet'";
            $sql.=", '$interests'";
            $sql.=", '$music'";
            $sql.=", '$movies'";
            $sql.=", '$television'";
            $sql.=", '$heroes'";
            $sql.=", '$books')";
         }
         else
         {
            $sql="update profile_interests";
            $sql.=" set member_id=$user_id";
            $sql.=", headline='$headline'";
            $sql.=", about_me='$about_me'";
            $sql.=", meet='$meet'";
            $sql.=", interests='$interests'";
            $sql.=", music='$music'";
            $sql.=", movies='$movies'";
            $sql.=", television='$television'";
            $sql.=", heroes='$heroes'";
            $sql.=", books='$books'";

            $sql.=" where member_id = $user_id";
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

      function update_back($user_id,$marital_status,$sexual,$hometown,$religion,$smoker,$drinker,$children,$education,$income)
      {
        $sql="select * from profile_back where member_id = $user_id";
        $res=mysql_query($sql);
        $num_rows=mysql_num_rows($res);

        if($num_rows==0)
        {
            $sql="insert into profile_back";
            $sql.="(member_id";
            $sql.=", marital_status";
            $sql.=", sexual";
            $sql.=", home_town";
            $sql.=", religion";
            $sql.=", smoker";
            $sql.=", children";
            $sql.=", education";
            $sql.=", income";
            $sql.=", drinker)";

            $sql.=" values($user_id";
            $sql.=", '$marital_status'";
            $sql.=", '$sexual'";
            $sql.=", '$hometown'";
            $sql.=", '$religion'";
            $sql.=", '$smoker'";
            $sql.=", '$children'";
            $sql.=", '$education'";
            $sql.=", '$income'";
            $sql.=", '$drinker')";
         }
         else
         {
            $sql="update profile_back";
            $sql.=" set member_id=$user_id";
            $sql.=", marital_status='$marital_status'";
            $sql.=", sexual='$sexual'";
            $sql.=", home_town='$hometown'";
            $sql.=", religion='$religion'";
            $sql.=", smoker='$smoker'";
            $sql.=", children='$children'";
            $sql.=", education='$education'";
            $sql.=", income='$income'";
            $sql.=", drinker='$drinker'";

            $sql.=" where member_id = $user_id";
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

       function get_num_schools($user_id)
       {
          $sql="select count(*) as a from profile_school where member_id = $user_id";
          $res=mysql_query($sql);
          $data_set=mysql_fetch_array($res);
          return $data_set["a"];
       }

       function get_schools($user_id)
       {
          $sql="select * from profile_school where member_id = $user_id";
          $res=mysql_query($sql);
          return $res;
       }

       function get_school($id)
       {
          $sql="select * from profile_school where id = $id";
          $res=mysql_query($sql);
          $data_set=mysql_fetch_array($res);
          return $data_set;
       }

       function add_school($user_id,$school_name,$city,$state,$status,$fyear,$eyear,$graduation_year,$degree,$major,$courses,$clubs)
       {
            $sql="insert into profile_school";
            $sql.="(member_id";
            $sql.=", school_name";
            $sql.=", school_city";
            $sql.=", school_state";
            $sql.=", status";
            $sql.=", date_from";
            $sql.=", date_to";
            $sql.=", degree";
            $sql.=", current_courses";
            $sql.=", clubs_organizations";
            $sql.=", graduation_year";
            $sql.=", major)";

            $sql.=" values($user_id";
            $sql.=", '$school_name'";
            $sql.=", '$city'";
            $sql.=", '$state'";
            $sql.=", '$status'";
            $sql.=", '$fyear'";
            $sql.=", '$eyear'";
            $sql.=", '$degree'";
            $sql.=", '$courses'";
            $sql.=", '$clubs'";
            $sql.=", '$graduation_year'";
            $sql.=", '$major')";

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

       function edit_school($id, $user_id,$school_name,$city,$state,$status,$fyear,$eyear,$graduation_year,$degree,$major,$courses,$clubs)
       {
            $sql="update profile_school";
            $sql.=" set member_id=$user_id";
            $sql.=", school_name='$school_name'";
            $sql.=", school_city='$city'";
            $sql.=", school_state='$state'";
            $sql.=", status='$status'";
            $sql.=", date_from='$fyear'";
            $sql.=", date_to='$eyear'";
            $sql.=", degree='$degree'";
            $sql.=", current_courses='$courses'";
            $sql.=", clubs_organizations='$clubs'";
            $sql.=", graduation_year='$graduation_year'";
            $sql.=", major='$major'";

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

       function delete_school($id)
       {
            $sql="delete from profile_school";
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

       function get_num_companies($user_id)
       {
          $sql="select count(*) as a from profile_company where member_id = $user_id";
          $res=mysql_query($sql);
          $data_set=mysql_fetch_array($res);
          return $data_set["a"];
       }

       function get_companies($user_id)
       {
          $sql="select * from profile_company where member_id = $user_id";
          $res=mysql_query($sql);
          return $res;
       }

       function add_company($user_id,$company_name,$city,$state,$country,$dates,$title,$division)
       {
            $sql="insert into profile_company";
            $sql.="(member_id";
            $sql.=", company_name";
            $sql.=", company_city";
            $sql.=", company_state";
            $sql.=", company_country";
            $sql.=", date_employed";
            $sql.=", title";
            $sql.=", division)";

            $sql.=" values($user_id";
            $sql.=", '$company_name'";
            $sql.=", '$city'";
            $sql.=", '$state'";
            $sql.=", '$country'";
            $sql.=", '$dates'";
            $sql.=", '$title'";
            $sql.=", '$division')";

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

       function get_company($id)
       {
          $sql="select * from profile_company where id = $id";
          $res=mysql_query($sql);
          $data_set=mysql_fetch_array($res);
          return $data_set;
       }


       function edit_company($id, $user_id,$company_name,$city,$state,$country,$dates,$title,$division)
       {
            $sql="update profile_company";
            $sql.=" set member_id=$user_id";
            $sql.=", company_name='$company_name'";
            $sql.=", company_city='$city'";
            $sql.=", company_state='$state'";
            $sql.=", company_country='$country'";
            $sql.=", date_employed='$dates'";
            $sql.=", title='$title'";
            $sql.=", division='$division'";
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

       function delete_company($id)
       {
            $sql="delete from profile_company";
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

       function get_basic($id)
       {
           $sql="select * from members where member_id = $id";
           $res=mysql_query($sql);
           $data_set=mysql_fetch_array($res);
           return $data_set;
       }

       function get_groups($member_id)
       {
			 	global $_SESSION;
					if ($_SESSION['member_id'] == $member_id) {
           $sql = "SELECT g.id FROM groups g LEFT JOIN invitations i ON g.id = i.group_id WHERE
					 				((g.member_id = '$member_id')
									OR
									(i.member_id = '$member_id' AND i.status = 1))";
					} else {
           $sql = "SELECT g.id FROM groups g LEFT JOIN invitations i ON g.id = i.group_id WHERE
					 				((g.member_id = '$member_id')
									OR
									(i.member_id = '$member_id' AND i.status = 1))
									AND
									NOT hide_from_all";
					}
           $ids = array();
					 $res = mysql_query($sql);
					 while ($f = mysql_fetch_array($res)) {
					 	$ids[] = $f['id'];
					 }
           return $ids;
       }

       function get_profile($member_id)
       {
           $sql="select * from member_profile where member_id = $member_id";
           $res=mysql_query($sql);
           $data_set=mysql_fetch_array($res);

           return $data_set;
       }

       function get_num_blogs($member_id)
       {
         $sql="select count(*) as a from blogs where member_id = $member_id";
         $res=mysql_query($sql);
         $data_set=mysql_fetch_array($res);
         return $data_set["a"];
       }

       function get_latest_blog($member_id)
       {
         $sql="select * from blogs where member_id = $member_id order by id desc limit 0,1";
         $res=mysql_query($sql);
         $data_set=mysql_fetch_array($res);
         return $data_set;
       }

       function get_num_friends($member_id)
       {
         $sql="select count(*) as a from invitations a, members b ";
         $sql.="where a.friend_id = b.member_id ";
         $sql.=" and b.music!='1' and a.member_id = $member_id";
         $sql.=" and a.approve='1'";
         //print $sql;
         $res=mysql_query($sql);
         print mysql_error();
         $data_set=mysql_fetch_array($res);
         return $data_set["a"];
       }

       function get_num_bands($member_id)
       {
         $sql="select count(*) as a from invitations a, members b ";
         $sql.="where a.friend_id = b.member_id ";
         $sql.=" and b.music='1' and a.member_id = $member_id";
         $sql.=" and a.approve='1'";
         $res=mysql_query($sql);
         print mysql_error();
         $data_set=mysql_fetch_array($res);
         return $data_set["a"];
       }

       function get_profile_friends($member_id)
       {
         $sql="select * from invitations a, members b ";
         $sql.="where a.friend_id = b.member_id ";
         $sql.=" and b.music!='1' and a.member_id = $member_id";
         $sql.=" and a.approve='1'";
         $sql.=" limit 0,8";

         $res=mysql_query($sql);
         return $res;
       }

       function get_bands($user_id)
       {
				
        $sql = "SELECT mf.friend_id, mf.member_id, m1.member_id as friend_exists, m2.member_id as member_exists, m1.music as fr_music, m2.music as mem_music FROM invitations mf LEFT JOIN members m1 ON mf.friend_id = m1.member_id LEFT JOIN members m2 ON mf.member_id = m2.member_id
								WHERE (mf.friend_id = ".$user_id." OR mf.member_id = ".$user_id.") AND mf.approve AND NOT mf.deleted";

				$res = mysql_query($sql);
        $friend_ids = array();
				
				while ($f = mysql_fetch_array($res)) {
					//echo $f['member_id'].' '.$f['friend_id'].' '.$user_id.'<br>';
					
					if ($f['member_id'] == $user_id && $f['friend_exists'] && $f['fr_music'])
						$friend_ids[] = $f['friend_id'];

					elseif ($f['member_exists'] && $f['friend_id'] == $user_id && $f['mem_music'])
						$friend_ids[] = $f['member_id'];
				}
				//print_r($friend_ids);
				return array_unique($friend_ids);
       }

       function get_total_comments($member_id)
       {
         $sql="select count(*) as a from testimonials where member_id = $member_id and approved = '1'";
         $res=mysql_query($sql);
         $data_set=mysql_fetch_array($res);
         return $data_set["a"];
       }

       function get_total_reviews($member_id)
       {
         $sql="select count(*) as a from band_review where member_id = $member_id and approved = '1'";
         $res=mysql_query($sql);
         $data_set=mysql_fetch_array($res);
         return $data_set["a"];
       }

       function get_profile_comments($member_id)
       {
         $sql="select * from testimonials where member_id = $member_id and approved = '1' order by test_id desc limit 0,50";
         $res=mysql_query($sql);
         return $res;
       }

       function get_profile_reviews($member_id)
       {
         $sql="select * from band_review where member_id = $member_id and approved = '1' limit 0,50";
         $res=mysql_query($sql);
         return $res;
       }

       function get_my_country($member_id)
       {
         $sql="select * from members where member_id = $member_id";
         $res=mysql_query($sql);
         $data_set=mysql_fetch_array($res);
         return $data_set["country"];
       }

       function get_networking($user_id)
       {
          $sql="select * from member_networking where member_id = $user_id";
          $res=mysql_query($sql);
          return $res;
       }


       function add_network($user_id,$field,$sub_field,$role,$desc)
       {
            $sql="insert into member_networking";
            $sql.="(member_id";
            $sql.=", field";
            $sql.=", sub_field";
            $sql.=", role";
            $sql.=", description)";

            $sql.=" values($user_id";
            $sql.=", '$field'";
            $sql.=", '$sub_field'";
            $sql.=", '$role'";
            $sql.=", '$desc')";

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

       function get_network($id)
       {
          $sql="select * from member_networking where id = $id";
          $res=mysql_query($sql);
          $data_set=mysql_fetch_array($res);
          return $data_set;
       }

       function edit_network($id, $user_id,$field,$sub_field,$role,$desc)
       {
            $sql="update member_networking";
            $sql.=" set member_id=$user_id";
            $sql.=", field='$field'";
            $sql.=", sub_field='$sub_field'";
            $sql.=", role='$role'";
            $sql.=", description='$desc'";
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

       function delete_network($id)
       {
            $sql="delete from member_networking";
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

       function get_default_friend()
       {
           $sql="select * from misc";
           $res=mysql_query($sql);
           $data_set=mysql_fetch_array($res);

           return $data_set["default_friend_profile"];
       }

       function update_default_friend($friend_id)
       {
           $sql="update misc";
           $sql.=" set default_friend_profile = $friend_id";
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

       function add_default_friend($friend_id,$member_id)
       {
           $sql="insert into invitations";
           $sql.="(member_id";
           $sql.=", friend_id";
           $sql.=", approve";
           $sql.=", deleted)";

           $sql.=" values($friend_id";
           $sql.=", $member_id";
           $sql.=", 1";
           $sql.=", 0)";

           $res=mysql_query($sql);

           $sql="insert into invitations";
           $sql.="(member_id";
           $sql.=", friend_id";
           $sql.=", approve";
           $sql.=", deleted)";

           $sql.=" values($member_id";
           $sql.=", $friend_id";
           $sql.=", 1";
           $sql.=", 0)";

           $res1=mysql_query($sql);

           if($res&&$res1)
           {
               return 1;
           }
           else
           {
               return 0;
           }
       }

       function check_comment_status($member_id)
       {
           $sql="select comment_setting from members where member_id = $member_id";
           $res=mysql_query($sql);
           $data_set=mysql_fetch_array($res);
           return $data_set["comment_setting"];
       }

       function update_comment_status($member_id,$status)
       {
           $sql="update members ";
           $sql.=" set comment_setting = $status";
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

       function check_comment_friend($member_id,$friend_id)
       {
           $sql="select * from invitations where member_id = $member_id";
           $sql.=" and friend_id = $friend_id and approve = 1 and deleted = 0";
           $res=mysql_query($sql);
           $num_rows=mysql_num_rows($res);

           return $num_rows;
       }

       function getSongUrl($member_id) {
       		$sql = "SELECT ms.*,m.member_name as band_name FROM music_songs ms LEFT JOIN members m ON ms.owner_id = m.member_id WHERE ms.def = 1 AND ms.member_id = '".$member_id."'";
					$res = mysql_query($sql);
          return $res;
       }
       function addSong($member_id,$song_id) {
           $sql="update members ";
           $sql.=" set songId = $song_id";
           $sql.=" where member_id = $member_id";
           $res=mysql_query($sql);
			/*
           if($res)
           {
               return 1;
           }
           else
           {
               return 0;
           }
           */
           return 1; // need to add check data
       }
    }
    // class for profile
?>
