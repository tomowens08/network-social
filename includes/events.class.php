<?php
     // class for classifieds
      class events
      {
        function add_category($cat_name, $cat_desc, $cat_type)
        {
            $sql="insert into events_cat";
            $sql.="(cat_name";
            $sql.=", type";
            $sql.=", cat_desc)";
            $sql.=" values('$cat_name'";
            $sql.=", '$cat_type'";
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

        function edit_category($cat_id, $cat_name, $cat_desc, $cat_type)
        {
            $sql="update events_cat";
            $sql.=" set cat_name = '$cat_name'";
            $sql.=", cat_desc='$cat_desc'";
            $sql.=", type='$cat_type'";
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
            $sql="delete from events_cat";
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

                    $sql="select * from events_cat order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["cat_name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_event_cat.php?id=".$RSUser["id"]."'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_event_cat.php?id=".$RSUser["id"]."'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }

             function get_cat($cat_id)
             {
                 $sql="select * from events_cat where id = $cat_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function get_all_cats()
             {
                 $sql="select * from events_cat where type='1'";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_all_cats_private()
             {
                 $sql="select * from events_cat where type='2'";
                 $res=mysql_query($sql);
                 return $res;
             }

             function add_event($member_id, $event_name,$event_organizer,$email,$type,$category,$description,$long_description,$month,$day,$year,$hour,$minute,$marker,$location,$address,$city,$state,$zip_code,$country)
             {
                 $posted_on=date("d/m/Y");

                 $sql="insert into events";
                 $sql.="(event_by";
                 $sql.=", event_name";
                 $sql.=", organizer";
                 $sql.=", email";
                 $sql.=", event_type";
                 $sql.=", cat_id";
                 $sql.=", short_desc";
                 $sql.=", long_desc";
                 $sql.=", start_month";
                 $sql.=", start_day";
                 $sql.=", start_year";
                 $sql.=", start_hour";
                 $sql.=", start_minute";
                 $sql.=", start_marker";
                 $sql.=", place";
                 $sql.=", address";
                 $sql.=", city";
                 $sql.=", state";
                 $sql.=", zip";
                 $sql.=", country";
                 $sql.=", featured";
                 $sql.=", posted_on)";
                 $sql.=" values($member_id";
                 $sql.=", '$event_name'";
                 $sql.=", '$event_organizer'";
                 $sql.=", '$email'";
                 $sql.=", '$type'";
                 $sql.=", $category";
                 $sql.=", '$description'";
                 $sql.=", '$long_description'";
                 $sql.=", '$month'";
                 $sql.=", '$day'";
                 $sql.=", '$year'";
                 $sql.=", '$hour'";
                 $sql.=", '$minute'";
                 $sql.=", '$marker'";
                 $sql.=", '$location'";
                 $sql.=", '$address'";
                 $sql.=", '$city'";
                 $sql.=", '$state'";
                 $sql.=", '$zip_code'";
                 $sql.=", '$country'";
                 $sql.=", '0'";
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

             function edit_event($event_id, $member_id, $event_name,$event_organizer,$email,$type,$category,$description,$long_description,$month,$day,$year,$hour,$minute,$marker,$location,$address,$city,$state,$zip_code,$country)
             {
                 $posted_on=date("d/m/Y");

                 $sql="update events";
                 $sql.=" set event_by=$member_id";
                 $sql.=", event_name='$event_name'";
                 $sql.=", organizer='$event_organizer'";
                 $sql.=", email='$email'";
                 $sql.=", event_type='$type'";
                 $sql.=", cat_id='$category'";
                 $sql.=", short_desc='$description'";
                 $sql.=", long_desc='$long_description'";
                 $sql.=", start_month=$month";
                 $sql.=", start_day=$day";
                 $sql.=", start_year=$year";
                 $sql.=", start_hour='$hour'";
                 $sql.=", start_minute='$minute'";
                 $sql.=", start_marker='$marker'";
                 $sql.=", place='$location'";
                 $sql.=", address='$address'";
                 $sql.=", city='$city'";
                 $sql.=", state='$state'";
                 $sql.=", zip='$zip_code'";
                 $sql.=", country='$country'";
                 $sql.=" where id = $event_id";

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


             function get_events()
             {
                 $sql="select * from events";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_cat_events($cat_id)
             {
                 $sql="select * from events where cat_id=$cat_id";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_num_events_future($member_id)
             {
                 $day=date("d");
                 $month=date("m");
                 $year=date("Y");
                 
                 $sql="select count(*) as a from events where event_by = $member_id";
                 $sql.=" and start_day >= $day and start_month >= $month";
                 $sql.=" and start_year >= $year";
                 
                 $res=mysql_query($sql);
                 print mysql_error();
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }

             function get_num_events_past($member_id)
             {
                 $day=date("d");
                 $month=date("m");
                 $year=date("Y");

                 $sql="select count(*) as a from events where event_by = $member_id";
                 $sql.=" and start_day <= $day and start_month <= $month";
                 $sql.=" and start_year <= $year";

                 $res=mysql_query($sql);
                 print mysql_error();
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }
             
             function get_num_my_events($member_id)
             {
                 $sql="select count(*) as a from events where event_by = $member_id";

                 $res=mysql_query($sql);
                 print mysql_error();
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }

             function get_my_events($member_id)
             {
                 $sql="select * from events";
                 $sql.=" where event_by = $member_id";
                 $res=mysql_query($sql);
                 return $res;
             }
			 
			 function get_my_events_future($member_id)
             {
                 $day=date("d");
                 $month=date("m");
                 $year=date("Y");

                 $sql="select * from events where event_by = $member_id";
                 $sql.=" and start_day >= $day and start_month >= $month";
                 $sql.=" and start_year >= $year";

                 $res=mysql_query($sql);
                 return $res;
             }
             
             function get_my_events_past($member_id)
             {
                 $day=date("d");
                 $month=date("m");
                 $year=date("Y");

                 $sql="select * from events where event_by = $member_id";
                 $sql.=" and start_day <= $day and start_month <= $month";
                 $sql.=" and start_year <= $year";

                 $res=mysql_query($sql);
                 return $res;
             }
             
             function check_past_future($event_id)
             {
                 $day=date("d");
                 $month=date("m");
                 $year=date("Y");
                 $sql="select start_day,start_month,start_year from events";
                 $sql.=" where id = $event_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 if($data_set["start_day"]>=$day&&$data_set["start_month"]>=$month&&$data_set["start_year"]>=$year)
                 {
                     return 1;
                 }
                 else
                 {
                     return 0;
                 }
             }
             

             function get_event($event_id)
             {
                 $sql="select * from events";
                 $sql.=" where id = $event_id";
                 $res=mysql_query($sql);
                 print mysql_error();
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }

             function get_event_creator($event_id)
             {
                 $sql="select event_by from events";
                 $sql.=" where id = $event_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["event_by"];
             }

             function delete_event($id)
             {
                 $sql="delete from events";
                 $sql.=" where id = $id";
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
             
             function get_num_rsvp($event_id)
             {
                 $sql="select count(*) as a from events_rsvp";
                 $sql.=" where event_id = $event_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["a"];
             }

             function get_num_rsvp_guests($event_id)
             {
                 $sql="select sum(guests) as a from events_rsvp";
                 $sql.=" where event_id = $event_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }

             function get_rsvp_members_events($event_id)
             {
                 $sql="select * from events_rsvp";
                 $sql.=" where event_id = $event_id limit 0,10";
                 $res=mysql_query($sql);

                 return $res;
             }
             
             function get_num_comments($event_id)
             {
                 $sql="select count(*) as a from events_comments";
                 $sql.=" where event_id=$event_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["a"];
             }

             function get_comments($event_id)
             {
                 $sql="select * from events_comments";
                 $sql.=" where event_id=$event_id";
                 $res=mysql_query($sql);

                 return $res;
             }
             
             function get_guests_member($event_id,$member_id)
             {
                 $sql="select sum(guests) as a from events_rsvp";
                 $sql.=" where event_id = $event_id";
                 $sql.=" and rsvp_by = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);

                 return $data_set["a"];
             }
             
             function add_comment($member_id,$event_id,$comment)
             {
                 $posted_on=date("m/d/Y h:m:s");
                 
                 $sql="insert into events_comments";
                 $sql.="(event_id";
                 $sql.=", comment_by";
                 $sql.=", comment";
                 $sql.=", posted_on)";
                 $sql.=" values($event_id";
                 $sql.=", $member_id";
                 $sql.=", '$comment'";
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

             function add_rsvp($member_id,$event_id,$response,$comment,$calender,$guests)
             {
                 $posted_on=date("m/d/Y h:m:s");

                 $sql="insert into events_rsvp";
                 $sql.="(event_id";
                 $sql.=", response";
                 $sql.=", comment";
                 $sql.=", add_calen";
                 $sql.=", guests";
                 $sql.=", rsvp_by)";
                 $sql.=" values($event_id";
                 $sql.=", '$response'";
                 $sql.=", '$comment'";
                 $sql.=", '$calender'";
                 $sql.=", $guests";
                 $sql.=", $member_id)";

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
             
             function get_num_events_attending($member_id)
             {
                 $sql="select count(*) as a from events_rsvp";
                 $sql.=" where rsvp_by = $member_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["a"];
             }
             
             function get_my_events_attending($member_id)
             {

                 $sql="select * from events a, events_rsvp b where a.id=b.event_id";
                 $sql.=" and b.rsvp_by = $member_id";
                 $res=mysql_query($sql);
                 return $res;
             }
             
             function check_event_status($event_id)
             {
                 $sql="select event_type from events where id = $event_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["event_type"];
             }
             
             function check_friend($event_by,$member_id)
             {
                 $sql="select count(*) as a from member_friends where member_id = $event_by and friend_id = $member_id and approve=1";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set["a"];
             }

      }
     // class for classifieds
?>
