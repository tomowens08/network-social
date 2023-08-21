<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td width='100%' valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<table width='100%' cellpadding='4' cellspacing='0'>
<tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dark_b_border2">

<?php
     // sql to get all images based on the criteria
        $sql="delete from most_popular";
        $res=mysql_query($sql);

     $sql="select * from members";
     $res=mysql_query($sql);
     while($data_set=mysql_fetch_array($res))
     {
         $sql="select avg(rank) as a from band_review where member_id = $data_set[member_id]";
         $rank_res=mysql_query($sql);
         $rank_set=mysql_fetch_array($res);
         $avg_rank=$rank_set["a"];
         if($avg_rank==Null)
         {
             $avg_rank=0;
         }

         $sql="select count(*) as a from member_friends where member_id = $data_set[member_id]";
         $friend_res=mysql_query($sql);
         $friend_set=mysql_fetch_array($friend_res);

         $sql="insert into most_popular";
         $sql.="(member_id";
         $sql.=", avg_rank";
         $sql.=", num_friends)";

         $sql.=" values($data_set[member_id]";
         $sql.=", $avg_rank";
         $sql.=", $friend_set[a])";

         $ins=mysql_query($sql);
         print mysql_error();
     }
?>



<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="dark_b_border2">
<tr>
<td class="dark_blue_white2">Most Popular</td>
</tr>

<tr>
<td>
<table width=100% cellpadding=0 cellspacing=0 border=0 valign=top>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td valign=top>
<table  width=100% cellpadding=0 cellspacing=0 valign=top>
<tr>
<td valign=top align=center>
<table width=800 cellpadding=0 cellspacing=0 valign=top>

<tr>
<td class='text'>

<table cellspacing=1 cellpadding=5 width="100%" align=center bgcolor=639ace border=0>
<tr bgcolor=eff3ff>
<td height=24 class='txt_label' align="center"><b>Rank</b></td>
<td class='txt_label' align="center"><b>Image</b></td>
<td class='txt_label' align="center"><b>View Profile</b></td>
</tr>

<?php
     include("includes/people.class.php");
     $people=new people;

        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }

        $n_next=$n+10;
        $sql="select count(*) as a from members a, most_popular b where a.member_id = b.member_id order by avg_rank, num_friends desc";
        $result=mysql_query($sql);
        $data_set=mysql_fetch_array($result);

        if($data_set["a"]<=$n_next)
        {
                $next=0;
        }
        else
        {
                $next=1;
        }


     $sql="select * from members a, most_popular b where a.member_id = b.member_id order by avg_rank, num_friends desc limit $n,10";
     $top_women=mysql_query($sql);
     $sr_no=$n+1;
     while($top_set=mysql_fetch_array($top_women))
     {
?>

<tr class=text11 bgcolor=ffffff>
<td class='txt_label' align="center">
<?=$sr_no?>
</td>
<td class='txt_label' align="center">
<?php
     $num_images=$people->get_num_images($top_set["member_id"]);
     if($num_images==0)
     {
         $gender=$people->check_gender($top_set["member_id"]);
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
        $image_url=$people->get_image($top_set["member_id"]);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
?>
<?=$image?>
</td>
<td class='txt_label' align="center">
<a href='view_profile.php?member_id=<?=$top_set["member_id"]?>'>View Profile</a>
</td>
</tr>

<?php
       $sr_no=$sr_no+1;
     }
?>

<tr><td colspan='3' width='100%'>
<?php
        if($n!=0)
        {
        $n_previous=$n-10;
?>
&#187; <a href='most_popular.php?n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='most_popular.php?n=<?=$n_next?>'>Next</a>
<?php
        }
?>
</td></tr>


</table>


</td>
</tr>

</table>
</table></table>


</td></tr>
</table>
<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
