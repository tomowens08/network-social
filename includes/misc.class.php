<?php
     class misc
     {
         function get_countryname($id)
         {
             $sql="select state_name from states where state_id=$id";
             $res=mysql_query($sql);
             $data_set=mysql_fetch_array($res);
             return $data_set["state_name"];
         }
     }
?>
