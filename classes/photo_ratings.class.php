<?php
     // class for photo ratings
     class photo_ratings
     {
         function datediff($date1,$date2)
         {
          $s=strtotime($date2) - strtotime($date1);
          $m=intval($s/60);
          $s=$s%60;
          $h=intval($m/60);
          $m=$m%60;
          $d=intval($h/24);
          $h=$h%24;
          return  trim($d);
         }

         function GetTodayDate($dateVar)
         {
          $tomorrow  = mktime (0,0,0,date("m")  ,date("d")-$dateVar,date("Y"));
          $new=date ("Y-m-d", $tomorrow);
          return  $new;
         }

         function get_all_photos($gender,$age,$state)
         {
             $sql="select * from members a, photos b";
             $sql.=" where a.member_id = b.member_id";
             if($gender!=Null)
             {
                 $sql.=" and a.gender like '$gender'";
             }
             if($state!=Null&&$state!="U")
             {
                 $sql.=" and a.current_state like '$state'";
             }

             $res=mysql_query($sql);

             $sr_no=0;

             while($data_set=mysql_fetch_array($res))
             {

              if($age!=Null)
              {
                        $days=datediff($basic_info["dob"], GetTodayDate(0));
                        $years=Round($days/365, 0);

                        if($age==1)
                        {
                            if($years>=18&&$years<=25)
                            {
                                $photo_id[$sr_no]=$data_set["photo_id"];
                            }
                        }

                        if($age==2)
                        {
                            if($years>=26&&$years<=32)
                            {
                                $photo_id[$sr_no]=$data_set["photo_id"];
                            }
                        }

                        if($age==3)
                        {
                            if($years>=33&&$years<=40)
                            {
                                $photo_id[$sr_no]=$data_set["photo_id"];
                            }
                        }

                        if($age==4)
                        {
                            if($years>=40)
                            {
                                $photo_id[$sr_no]=$data_set["photo_id"];
                            }
                        }

              }
              else
              {
                  $photo_id[$sr_no]=$data_set["photo_id"];
              }
              $sr_no=$sr_no+1;
             }


             return $photo_id;

         }

         function generate_random($sess_id, $photos1)
         {
            $photo=new photo_ratings;
            $checked=0;
            while($checked!=1)
            {
               $id=array_rand($photos1);

               $selected_id=$photos1[$id];

               $check=$photo->check_displayed($sess_id,$selected_id);

               $sql="select count(*) as a from photos where photo_id = $selected_id";
               $check_res=mysql_query($sql);
               $check_set=mysql_fetch_array($check_res);

               if($check==0&&$check_set["a"]!=0)
               //if($check==0)
               {
                   $checked=1;
               }
            }

            $sql="insert into shown_images";
            $sql.="(session_id";
            $sql.=", photo_id)";
            $sql.=" values('$sess_id'";
            $sql.=", $selected_id)";
            $res=mysql_query($sql);
            return $selected_id;
         }

         function get_num_shown_images($sess_id)
         {
             $sql="select count(*) as a from shown_images where session_id = '$sess_id'";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);
             return $data_set["a"];
         }

         function delete_shown_images($sess_id)
         {
             $sql="delete from shown_images where session_id = '$sess_id'";
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

         function check_displayed($sess_id,$photo_id)
         {
             $sql="select * from shown_images where session_id = '$sess_id' and photo_id = $photo_id";
             $res=mysql_query($sql);
             $num_rows=mysql_num_rows($res);

             return $num_rows;
         }

         function get_avg_rating($photo_id)
         {
             $sql="select avg(rating) as a from hotornot_rating where photo_id = $photo_id";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);

             $rating=round($data_set["a"],2);

             return $rating;
         }

         function get_total_rating($photo_id)
         {
             $sql="select count(*) as a from hotornot_rating where photo_id = $photo_id";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);

             return $data_set["a"];
         }

         function get_member_id($photo_id)
         {
             $sql="select member_id from photos where photo_id = $photo_id";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);
             return $data_set["member_id"];
         }

         function get_photo($photo_id)
         {
             $sql="select * from photos where photo_id = $photo_id";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);
             return $data_set;
         }

         function add_rating($photo_id,$rating,$sess_id,$member_id)
         {
            $posted_on=date("m-d-Y g:i:s");
            $sql="insert into hotornot_rating";
            $sql.="(photo_id";
            $sql.=", rating";
            $sql.=", sess_id";
            $sql.=", rated_on";
			$sql.=", rated_by)";

            $sql.=" values($photo_id";
            $sql.=", $rating";
            $sql.=", '$sess_id'";
            $sql.=", '$posted_on'";
			$sql.=", '$member_id')";

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

         function get_num_rated_women()
         {
             $sql="select count(*) as a from members a, photos b, hotornot_rating c";
             $sql.=" where a.member_id = b.member_id and b.photo_id = c.photo_id";
             $sql.=" and a.gender='Female'";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);

             return $data_set["a"];
         }

         function get_top25_women()
         {
             $sql="select avg(rating) as a, count(rating) as b, a.*,b.*,c.*";
             $sql.=" from members a, photos b, hotornot_rating c";
             $sql.=" where a.member_id = b.member_id and b.photo_id = c.photo_id";
             $sql.=" and a.gender='Female'";
             $sql.=" group by a.member_id";
             $sql.=" order by a desc";
             $res=mysql_query($sql);
             print mysql_error();
             return $res;
         }

         function get_most_rated_women()
         {
             $sql="select avg(rating) as a, count(rating) as b, a.*,b.*,c.*";
             $sql.=" from members a, photos b, hotornot_rating c";
             $sql.=" where a.member_id = b.member_id and b.photo_id = c.photo_id";
             $sql.=" and a.gender='Female'";
             $sql.=" group by a.member_id";
             $sql.=" order by b desc";
             $res=mysql_query($sql);
             print mysql_error();
             return $res;
         }

         function get_num_rated_men()
         {
             $sql="select count(*) as a from members a, photos b, hotornot_rating c";
             $sql.=" where a.member_id = b.member_id and b.photo_id = c.photo_id";
             $sql.=" and a.gender='Male'";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);

             return $data_set["a"];
         }

         function get_top25_men()
         {
             $sql="select avg(rating) as a, count(rating) as b, a.*,b.*,c.*";
             $sql.=" from members a, photos b, hotornot_rating c";
             $sql.=" where a.member_id = b.member_id and b.photo_id = c.photo_id";
             $sql.=" and a.gender='Male'";
             $sql.=" group by a.member_id";
             $sql.=" order by a desc";
             $res=mysql_query($sql);
             print mysql_error();
             return $res;
         }

         function get_most_rated_men()
         {
             $sql="select avg(rating) as a, count(rating) as b, a.*,b.*,c.*";
             $sql.=" from members a, photos b, hotornot_rating c";
             $sql.=" where a.member_id = b.member_id and b.photo_id = c.photo_id";
             $sql.=" and a.gender='Male'";
             $sql.=" group by a.member_id";
             $sql.=" order by b desc";
             $res=mysql_query($sql);
             print mysql_error();
             return $res;
         }

         function get_num_my_images($member_id)
         {
             $sql="select count(*) as a from photos where member_id = $member_id";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);
             return $data_set["a"];
         }

         function get_my_rating($member_id)
         {
             $sql="select avg(rating) as a, count(rating) as b, a.*,b.*,c.*";
             $sql.=" from members a, photos b, hotornot_rating c";
             $sql.=" where a.member_id = b.member_id and b.photo_id = c.photo_id";
             $sql.=" and a.member_id=$member_id";
             $sql.=" group by a.member_id";
             $sql.=" order by a desc";
             $res=mysql_query($sql);
             print mysql_error();
             return $res;
         }

     }
     // class for photo ratings
?>
