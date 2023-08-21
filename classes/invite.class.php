<?php
     // class for invite status
        class invite
        {
            function get_status()
            {
                $sql="select invite_only from misc";
                $res=mysql_query($sql);
                $data_set=mysql_fetch_array($res);
                return $data_set["invite_only"];
            }
            
            function set_invite_status($invite)
            {
                $sql="update misc set invite_only = '$invite'";
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
     // class for invite status
?>
