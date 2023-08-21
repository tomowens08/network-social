<?php
/* default poll */
if(!empty($default_poll)){
		if($default_poll->poll_state && $votes->can_member_vote($member_id, $default_poll->poll_id)){
		/* show form for vote */
		?>
		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>">
<table>
	<tr>
		<td colspan="2">
			<b><?php echo $default_poll->question; ?></b>
		</td>
	</tr>
		<?php
		for($i = 0; $i < count($default_poll->answers); $i++){
			?>
	<tr>
		<td width="20">
			<input type="radio" value="<?php echo $default_poll->answers[$i]['idpolls_answers'];?>" name="polls[answer]" <?php if(!$i) echo 'checked';?>>
		</td>
		<td>
			<?php echo $default_poll->answers[$i]['poll_answ_txt'];?>
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
	<?php if(!empty($all_polls_list) && count($all_polls_list) > 1){ ?>
	<tr>
		<td colspan="2" align="right">
			<a href="polls.php?member_id=<?php echo $vote_owner;?>">View All <?php echo $name; ?>'s Polls</a>
		</td>
	</tr>
	<?php } ?>
</table>
<input type="hidden" name="polls[poll_id]" value="<?php echo $default_poll->poll_id; ?>">
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
			<b><?php echo $default_poll->question; ?></b>
		</td>
	</tr>
		<?php
		for($i = 0; $i < count($default_poll->answers); $i++){
			?>
	<tr>
		<td><?php echo $default_poll->answers[$i]['poll_answ_txt'];?>: &nbsp;</td>
		<td align="center" width="100">
			<?php
				$fill_width = 0;
				if(!empty($default_poll->answers[$i]['poll_answ_votes'])){
					$fill_width = round($default_poll->answers[$i]['poll_answ_votes']/$default_poll->total_votes_cnt, 2);
					$fill_width = $fill_width * 100;
				}
			?>
			<b><?php echo $fill_width; ?>%</b> (<?php echo $default_poll->answers[$i]['poll_answ_votes']; ?>)
			<div id="chart"><div id="fill" style="width: <?php echo $fill_width; ?>%;"></div></div>
		</td>
	</tr>		
			<?php
		}
		?>
	<?php if(!empty($all_polls_list) && count($all_polls_list) > 1){ ?>
	<tr>
		<td colspan="2" align="right">
			<a href="polls.php?member_id=<?php echo $vote_owner;?>">View All <?php echo $name; ?>'s Polls</a>
		</td>
	</tr>
	<?php } ?>
</table>
		<?php
	}
} 
else{
	?><i>This user does not have any polls</i><?php
}
?>
