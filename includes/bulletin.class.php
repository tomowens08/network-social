<?php
    // class for bulletins
    class bulletin
    {
        function check_num_bulletins($user_id)
        {
          $sql="select * from bulletin_message";
          $sql.=" where posted_by = $user_id";
          $res=mysql_query($sql);
          $num_rows=mysql_num_rows($res);
          return $num_rows;
        }
        
        function get_home_bulletins($user_id)
        {
          $sql="select * from bullentin_message";
          $sql.=" where posted_by = $user_id";
          $res=mysql_query($sql);
          return $res;
        }
    }
    // class for bulletins
?>
