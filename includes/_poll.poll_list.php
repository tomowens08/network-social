<?php
$sel_poll_id = 0;
if(!empty($_GET['poll_id']) && intval($_GET['poll_id']) > 0){
	$sel_poll_id = intval($_GET['poll_id']);
	$sel_poll = $votes->get_poll(0, $sel_poll_id, 0);
}

if(!empty($sel_poll)){
?>
<table align="center">
<tr>
	<td align="center" width="100">
<?php
     $num_images=$people->get_num_images($sel_poll->owner_id);
     if($num_images==0)
     {
         $gender=$people->check_gender($sel_poll->owner_id);
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
        $image_url=$people->get_image($sel_poll->owner_id);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
?>
<?=$image?><br>
<a href="view_profile.php?member_id=<?php echo $sel_poll->owner_id; ?>" style="font-weight: bold;"><?php echo $people->get_name($sel_poll->owner_id);?></a>
</td>
<td align="center">
<?php
	/* show single polls */
	if($sel_poll->poll_state && $votes->can_member_vote($voter_id, $sel_poll->poll_id)){
		/* show form for vote */
		?>
		<form method="POST">
<table>
	<tr>
		<td colspan="2">
			<b><?php echo $sel_poll->question; ?></b>
		</td>
	</tr>
		<?php
		for($i = 0; $i < count($sel_poll->answers); $i++){
			?>
	<tr>
		<td width="20">
			<input type="radio" value="<?php echo $sel_poll->answers[$i]['idpolls_answers'];?>" name="polls[answer]" <?php if(!$i) echo 'checked';?>>
		</td>
		<td>
			<?php echo $sel_poll->answers[$i]['poll_answ_txt'];?>
		</td>
	</tr>		
			<?php
		}
		?>
	<tr>
		<td colspan="2">
			<input type="submit" value="Vote!">
		</td>
	</tr>
</table>
<input type="hidden" name="polls[poll_id]" value="<?php echo $sel_poll->poll_id; ?>">
<input type="hidden" name="polls[member_id]" value="<?php echo $voter_id; ?>">
<input type="hidden" name="action" value="pollVote">
</form>		
		<?php
	} else {
		/* show poll results */
		?>
<table>
	<tr>
		<td colspan="2">
			<b><?php echo $sel_poll->question; ?></b>
		</td>
	</tr>
		<?php
		for($i = 0; $i < count($sel_poll->answers); $i++){
			?>
	<tr>
		<td><?php echo $sel_poll->answers[$i]['poll_answ_txt'];?>: &nbsp;</td>
		<td align="center" width="100">
			<?php
				$fill_width = 0;
				if(!empty($sel_poll->answers[$i]['poll_answ_votes'])){
					$fill_width = round($sel_poll->answers[$i]['poll_answ_votes']/$sel_poll->total_votes_cnt, 2);
					$fill_width = $fill_width * 100;
				}
			?>
			<b><?php echo $fill_width; ?>%</b> (<?php echo $sel_poll->answers[$i]['poll_answ_votes']; ?>)
			<div id="chart"><div id="fill" style="width: <?php echo $fill_width; ?>%;"></div></div>
		</td>
	</tr>		
			<?php
		}
		?>
</table>
		<?php
	}
?>
</td>
</tr>
</table><br>
<a href="<?php echo basename($_SERVER['PHP_SELF']) . '?' . $full_query; ?>">Back to the list</a>
<?php
} else {
/* show polls list */

?>
<table width="100%" id="polls_tbl" cellpadding="1" cellspacing="1">
	<tr>
		<th>User</th>
		<th>Poll Question</th>
		<th>Category</th>
		<th>Date Posted</th>
	</tr>
	<?php
	for($i = 0; $i < count($all_polls_list); $i++){
		$poll_tuple = $votes->get_poll($all_polls_list[$i]['owner_id'], $all_polls_list[$i]['idpolls']);
				?>
	<tr bgcolor="<?php if(!($i%2)){ echo "#ffffff"; } else { echo "#f0f0f0";}?>">
		<td align="center">
<?php
     $num_images=$people->get_num_images($poll_tuple->owner_id);
     if($num_images==0)
     {
         $gender=$people->check_gender($poll_tuple->owner_id);
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
        $image_url=$people->get_image($poll_tuple->owner_id);
        $pic_name=str_replace('user_images/', '', $image_url);
        $image = "<img src='image_gd/image_logincomplete.php?$pic_name' border='0'>";
     }
?>
<?=$image?><br>
<a href="view_profile.php?member_id=<?php echo $poll_tuple->owner_id; ?>" style="font-weight: bold;"><?php echo $people->get_name($poll_tuple->owner_id);?></a>
		</td>
		<td><a href="<?php echo basename($_SERVER['PHP_SELF']) . '?' . $full_query; ?><?php if(!empty($cat_id)) echo 'cat='.$cat_id.'&';?>poll_id=<?php echo $poll_tuple->poll_id;?>"><?php echo $poll_tuple->question; ?></a></td>
		<td align="center"><?php echo $poll_tuple->category_name; ?></td>
		<td align="center"><?php echo $poll_tuple->date_created; ?></td>
	</tr>
				<?php
			}
			?>
</table>
<?php
}
?>