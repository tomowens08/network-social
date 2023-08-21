<?php
     // class for people
        class people
        {
            function check_main_image($photo_id)
            {
                $sql="select main_image from photos where photo_id = $photo_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set["main_image"];
            }
            
            function make_main($photo_id,$member_id)
            {
                $sql="update photos set main_image='1' where photo_id=$photo_id";
                $res=mysql_query($sql);
                $sql="update photos set main_image='0' where photo_id!=$photo_id and member_id = $member_id";
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
            function get_image($member_id)
            {
                $sql="select * from photos where member_id = $member_id and main_image='1'";
                $res=mysql_query($sql);

                $num_rows=mysql_num_rows($res);
                if($num_rows==0)
                {
                 $sql="select * from photos where member_id = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                }
                else
                {
                 $sql="select * from photos where member_id = $member_id and main_image='1'";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                }
                return $data_set["photo_url"];
            }
            
            function get_num_images($member_id)
            {
                $sql="select count(*) as a from photos where member_id = $member_id";
                $res=mysql_query($sql);
                print mysql_error();
                $data_set=mysql_fetch_array($res);
                return $data_set["a"];
            }

            function get_name($member_id)
            {
                $sql = "select display_name, member_name from members where member_id = $member_id";
                $res = mysql_query($sql) or die(mysql_error());
                $data_set=mysql_fetch_array($res);
                 if($data_set["display_name"])
                 {
                     return $data_set["display_name"];
                 }
                 else
                 {
	                  return $data_set["member_name"];
                 }
            }
						
						function notification ($type,$member_id,$arg='',$site_name,$site_url,$email_name,$site_email) {
							
							global $_SESSION;
							
							$sql = "SELECT * FROM members WHERE member_id = '".$member_id."'";
							$mem = mysql_fetch_array(mysql_query($sql));
							
							if ($mem['notif_'.$type]) {
								switch ($type) {
									case 'message':
										$subj = "A new message posted for you on $site_name";
										$body = "<div align='left'>Hi ".$this->get_name($member_id).",<br><br>
														You have a new message from ".$this->get_name($_SESSION['member_id']).".<br><br>
														Log into your account to check it: <a href='$site_url/'>$site_url/</a>";
									break;
									case 'comment':
									$subj = "A new comment has been posted for you on $site_name";
										if ($arg['photo_id']) {
											$body = "<div align='left'>Hi ".$this->get_name($member_id).",<br><br>
															You have a new comment to your photo from ".$this->get_name($_SESSION['member_id']).".<br><br>
															Log into your account to check it: <a href='$site_url/'>$site_url/</a>";
										} elseif ($arg['journal_id']) {
											$body = "<div align='left'>Hi ".$this->get_name($member_id).",<br><br>
															You have a new comment to your journal from ".$this->get_name($_SESSION['member_id']).".<br><br>
															Log into your account to check it: <a href='$site_url/'>$site_url/</a>";
										} else {
											$body = "<div align='left'>Hi ".$this->get_name($member_id).",<br><br>
															You have a new comment in your profile from ".$this->get_name($_SESSION['member_id']).".<br><br>
															Log into your account to check it: <a href='$site_url/'>$site_url/</a>";
										}
									break;
									case 'journal':
										$subj = "A new journal has been added on $site_name";
										$body = "<div align='left'>Hi ".$this->get_name($member_id).",<br><br>
														A new journal has been added by your friend ".$this->get_name($_SESSION['member_id']).".<br><br>
														Log into your account to check it: <a href='$site_url/'>$site_url/</a>";
									break;
									case 'friend_request':
										$subj = "A new friendship request on $site_name";
										$body = "<div align='left'>Hi ".$this->get_name($member_id).",<br><br>
														".$this->get_name($_SESSION['member_id'])." invited you to be a friend.<br><br>
														Log into your account to accept or deny: <a href='$site_url/'>$site_url/</a>";
									break;
									case 'group_invitation':
										$sql = "SELECT group_name FROM groups WHERE id = '".$arg['group_id']."'";
										$gr = mysql_fetch_array(mysql_query($sql));
										
										$subj = "A new membership request on $site_name";
										$body = "<div align='left'>Hi ".$this->get_name($member_id).",<br><br>
														".$this->get_name($_SESSION['member_id'])." invited you to be a member of a group ".$gr['group_name'].".<br><br>
														Log into your account to accept or deny: <a href='$site_url/'>$site_url/</a>";
									break;
								}

								 $h = '';
								 $h .= "From:$site_name <support@$site_name>\r\n";
								 $h .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
								 $h .= "Return-Path: <support@$site_name>\n";
								 return mail($this->get_email($member_id),$subj,$body,$h);
							}
						}
						
            function get_email($member_id)
            {
                $sql="select member_email from members where member_id = $member_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set["member_email"];
            }

            function get_info($member_id)
            {
                $sql="select * from members where member_id = $member_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set;
            }

            function get_profile($member_id)
            {
                $sql="select * from member_profile where member_id = $member_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set;
            }
            
            function check_gender($member_id)
            {
                $sql="select gender from members where member_id = $member_id";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set["gender"];
            }
            
						function check_online ($member_id) {
							
							global $minutes_online;
							if ($member_id) {
								$sql = "SELECT count(*) as num FROM members WHERE member_id = ".$member_id." AND online > ".(time()-60*$minutes_online)." AND view_online";
								
								$res = mysql_fetch_array(mysql_query($sql));
								return $res['num'];
							} else {
								return false;
							}
						}
						
            function get_featured_profile()
            {
             global $ad_id;
             $sql="select * from members where featured='1'";
             $result=mysql_query($sql);
             $num_rows=mysql_num_rows($result);

             $total=$num_rows;
             $a=1;
             if($num_rows!=0)
             {
              while($data_set=mysql_fetch_array($result))
              {
                $ad_id[$a]=$data_set["member_id"];
                $a=$a+1;
              }

              $q_id=array_rand($ad_id);
              $member_id=$ad_id[$q_id];
              return $member_id;
             }
             else
             {
                 return 0;
             }
            }

        }
     // class for people
?>
