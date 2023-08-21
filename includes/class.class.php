<?php
     // class for classifieds
      class classified
      {
        function add_category($cat_name, $cat_desc)
        {
            $sql="insert into classified_cat";
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
            $sql="update classified_cat";
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
            $sql="delete from classified_cat";
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
                    $sql="select * from classified_cat order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["cat_name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_classified_cat.php?id=".$RSUser["id"]."'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_classified_cat.php?id=".$RSUser["id"]."'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }

             function get_cat($cat_id)
             {
                 $sql="select * from classified_cat where id = $cat_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }
             
             function get_all_cats()
             {
                 $sql="select * from classified_cat";
                 $res=mysql_query($sql);
                 return $res;
             }
             
             function get_num_ads_cat($cat_id)
             {
                 $sql="select count(*) as a from classified_listing where cat_id = $cat_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["a"];
             }

             function get_ads_first($cat_id)
             {
                 $sql="select * from classified_listing where cat_id = $cat_id limit 0,5";
                 $res=mysql_query($sql);
                 return $res;
             }
             
             function add_ad($member_id,$cat_id,$sub_cat_id,$subject,$message)
             {
                 $posted_on=date("d/m/Y");
                 $sql="insert into classified_listing";
                 $sql.="(member_id";
                 $sql.=", cat_id";
                 $sql.=", sub_cat_id";
                 $sql.=", subject";
                 $sql.=", message";
                 $sql.=", posted_on)";
                 $sql.=" values($member_id";
                 $sql.=", $cat_id";
                 $sql.=", $sub_cat_id";
                 $sql.=", '$subject'";
                 $sql.=", '$message'";
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
             
             function get_my_listings($member_id)
             {
                 $sql="select * from classified_listing";
                 $sql.=" where member_id = $member_id";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_cat_listings($cat_id)
             {
                 $sql="select * from classified_listing";
                 $sql.=" where cat_id = $cat_id";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_sub_cat_listings($cat_id,$sub_id)
             {
                 $sql="select * from classified_listing";
                 $sql.=" where cat_id = $cat_id and sub_cat_id = $sub_id";
                 $res=mysql_query($sql);
                 return $res;
             }

             function get_listings()
             {
                 $sql="select * from classified_listing";
                 $res=mysql_query($sql);
                 return $res;
             }

             function update_counter($ad_id)
             {
                 $sql="update classified_listing";
                 $sql.=" set views=views+1";
                 $sql.=" where id = $ad_id";
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
             
             function get_ad($ad_id)
             {
                 $sql="select * from classified_listing";
                 $sql.=" where id = $ad_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set;
             }
             
             function get_ad_creator($ad_id)
             {
                 $sql="select member_id from classified_listing";
                 $sql.=" where id = $ad_id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 return $data_set["member_id"];
             }
             
             function delete_ad($ad_id)
             {
                 $sql="delete from classified_listing";
                 $sql.=" where id = $ad_id";
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
             
             function add_sub_cat($main_id,$cat_name,$cat_desc)
             {
                 $sql="insert into classified_sub_cat";
                 $sql.="(main_id";
                 $sql.=", cat_name";
                 $sql.=", cat_desc)";
                 
                 $sql.=" values($main_id";
                 $sql.=", '$cat_name'";
                 $sql.=", '$cat_desc')";
                 
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

            function display_admin_sub_cat()
            {
                    $sql="select * from classified_cat order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["cat_name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='modify_classified_sub_cat1.php?id=".$RSUser["id"]."'>Select</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }

            function display_admin_sub_cat1($main_id)
            {
                    $sql="select * from classified_sub_cat where main_id = $main_id order by cat_name";
                    $result=mysql_query($sql);
                    $sr_no=1;

                    while($RSUser=mysql_fetch_array($result))
                    {
                      print "<tr bgColor='#ffffff'>";
                      print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
                      print "<td class='textcell' valign='top' width='60%'>".$RSUser["cat_name"]."</td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='edit_classified_sub_cat.php?id=".$RSUser["id"]."'>Edit</a></td>";
                      print "<td class='textcell' valign='top' width='15%'><a href='delete_classified_sub_cat.php?id=".$RSUser["id"]."'>Delete</a></td>";
                      print "</tr>";
                      $sr_no=$sr_no+1;
                    }
             }
             
             function get_sub_cat($id)
             {
                 $sql="select * from classified_sub_cat where id = $id";
                 $res=mysql_query($sql);
                 $data_set=mysql_fetch_array($res);
                 
                 return $data_set;
             }
             
             function edit_sub_cat($id,$main_id, $cat_name,$cat_desc)
             {
                 $sql="update classified_sub_cat";
                 $sql.=" set main_id=$main_id";
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
                 $sql="delete from classified_sub_cat";
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
             
             function get_all_sub_cats($main_id)
             {
                 $sql="select * from classified_sub_cat where main_id = $main_id";
                 $res=mysql_query($sql);
                 return $res;
             }

      }
     // class for classifieds
?>
