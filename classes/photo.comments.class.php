<?php
     // class for photo comments
        class photo_comments
        {
            function get_num_comments($photo_id,$member_id)
            {
                $sql="select count(*) as a from photo_rating where photo_id = $photo_id and member_id = $member_id AND approved = 1";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                
                return $data_set["a"];
            }
            
            function add_rating($photo_id,$member_id,$rating,$comments,$posted_by)
            {
                $posted_on=date("m/d/Y");
                $sql="insert into photo_rating";
                $sql.="(photo_id";
                $sql.=", member_id";
                $sql.=", rating";
                $sql.=", comment";
                $sql.=", posted_by";
                $sql.=", posted_on)";
                
                $sql.=" values('$photo_id'";
                $sql.=", '$member_id'";
                $sql.=", '$rating'";
                $sql.=", '$comments'";
                $sql.=", '$posted_by'";
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
            
            function get_all_ratings($photo_id)
            {
                $sql="select * from photo_rating where photo_id = $photo_id AND approved = 1";
                $res=mysql_query($sql);
                return $res;
            }
        }
     // class for photo comments
?>
