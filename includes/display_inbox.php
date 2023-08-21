<?php
    if ($num_rows==0)
    {
      print "<tr>";
      print "<td width='100%' colspan='2' class='login'><p align='center'>";
      print "There are no messages yet.";
      print "</p></td></tr>";
    }
      else
    {

        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+10;
        if($num_rows<=$n_next)
        {
                $next=0;
        }
        else
        {
                $next=1;
        }


        $sql="select * from messages where mess_to = $_SESSION[member_id] and deleted <> 1 order by date_posted desc limit $n,20";
        $res=mysql_query($sql);

      while($RSUser1=mysql_fetch_array($res))
      {
?>
<tr bgcolor="#E8F1FA">
<td width='10%'><input type='checkbox' name='mess[]' value='<?=$RSUser1["mess_id"]?>'></td>
<td width='20%' class='txt_label'><?=myDate($RSUser1["date_posted"]);?></td>
<td width='30%' class='txt_label'>
<?php
     $num_images=$people->get_num_images($RSUser1["mess_by"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($RSUser1["mess_by"]);
         if($gender=="Male")
         {
          $image="<img alt='' src='images/male.gif' width='90' border=0>";
         }
         else
         {
          $image="<img alt='' src='images/female.gif' width='90' border=0>";
         }
     }
     else
     {
        $image_url=$people->get_image($RSUser1["mess_by"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
     $name=$people->get_name($RSUser1["mess_by"]);


?>
<a href='view_profile.php?member_id=<?=$RSUser1["mess_by"]?>'><?=$image?></a>
<br>
<a href='view_profile.php?member_id=<?=$RSUser1["mess_by"]?>'><?=$name?></a>
</td>
<td width='20%' class='txt_label'>
<?php
     if($RSUser1["mess_read"]==0||$RSUser1["mess_read"]==Null)
     {
?>
  Unread
<?php
     }
     else
     {
?>
  Read
<?php
     }
?>
</td>
<td width='30%' class='txt_label'>
<a href='view_message.php?folder=<?=$HTTP_GET_VARS["folder"]?>&mess_id=<?=$RSUser1["mess_id"]?>'>
<?=$RSUser1["subject"]?>
</a>
</td>
</tr>

<?php
      }
    }
?>
