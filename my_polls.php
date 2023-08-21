<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{
	include("includes/conn.php");
	include_once("class/class.votes.php");
	
	if(!empty($_POST['action'])){
	switch($_POST['action']){
		case 'pollAddPoll':		if(!empty($_POST['polls']) && is_array($_POST['polls'])){
									$poll_question = (!empty($_POST['polls']['question'])?strip_tags($_POST['polls']['question']):"");
									$poll_question = trim($poll_question);
									
									$poll_answers = array();
									if(!empty($_POST['polls']['answer']) && is_array($_POST['polls']['answer'])){
										for($i = 0; $i < count($_POST['polls']['answer']); $i++){
											if(!empty($_POST['polls']['answer'][$i])){
												$tmp = strip_tags($_POST['polls']['answer'][$i]);
												$tmp = trim($tmp);
												if(!empty($tmp)){
													$poll_answers[] = $tmp;
												}
											}
										}
									}
									
									$poll_owner = (!empty($_POST['polls']['owner_id'])?intval($_POST['polls']['owner_id']):0);
									$poll_category = (!empty($_POST['polls']['category'])?intval($_POST['polls']['category']):'');
									
									if(!empty($poll_question) && !empty($poll_answers) && count($poll_answers) > 1 && !empty($poll_owner)){
										/**
										 * add new poll
										 */
										$polls = new TMultyPolls();
										$polls->set_poll($poll_owner, $poll_question, $poll_answers, $poll_category, 0, 1, 1);
									}
								}
								break;
		case 'pollSetDefault':	if(!empty($_POST['polls']) && is_array($_POST['polls'])){
									$owner_id = (!empty($_POST['polls']['owner_id'])?intval($_POST['polls']['owner_id']):0);
									$poll_id = (!empty($_POST['polls']['poll_id'])?intval($_POST['polls']['poll_id']):0);
									
									if(!empty($owner_id) && !empty($poll_id)){
										$poll = new TMultyPolls($poll_id);
										$poll->toggle_poll_default_mode($owner_id);
									}
								}
								break;
		case 'pollSetActive':	if(!empty($_POST['polls']) && is_array($_POST['polls'])){
									$owner_id = (!empty($_POST['polls']['owner_id'])?intval($_POST['polls']['owner_id']):0);
									$poll_id = (!empty($_POST['polls']['poll_id'])?intval($_POST['polls']['poll_id']):0);
									
									if(!empty($owner_id) && !empty($poll_id)){
										$poll = new TMultyPolls($poll_id);
										$poll->toggle_poll_activity($owner_id);
									}
								}
								break;
		case 'pollRemove':		if(!empty($_POST['polls']) && is_array($_POST['polls'])){
									$owner_id = (!empty($_POST['polls']['owner_id'])?intval($_POST['polls']['owner_id']):0);
									$poll_id = (!empty($_POST['polls']['poll_id'])?intval($_POST['polls']['poll_id']):0);
									
									if(!empty($owner_id) && !empty($poll_id)){
										$poll = new TMultyPolls($poll_id);
										$poll->remove_poll($owner_id);
									}
								}
								break;
	}
	header('Location: '. $_SERVER['REQUEST_URI']);
	exit();
}
	
include("includes/top.php");
include("includes/nav.php");

include("includes/profile.class.php");

$profile=new profile;

//include("includes/right.php");

$member_id = (!empty($_SESSION["member_id"])?intval($_SESSION["member_id"]):0);
$votes = new TMultyPolls();

$category_list = TMultyPolls::get_category_list();
$member_polls_list = $votes->get_member_polls($member_id);
?>
<script type="text/javascript">
function addAnswerRow(){
	var tblObj = document.getElementById('answer_table');
	if(tblObj.rows.length >= 15){
		alert('To many answers!');
	} else {
		var nTr = tblObj.insertRow(-1);
		var nTc = nTr.insertCell(-1);
		nTc.innerHTML = '<input type="text" name="polls[answer][]">';
	}
	
}

function setDefault(poll_id){
	document.getElementById('sd_poll_id').value = poll_id;
	document.getElementById('sd_poll_frm_id').submit();
}

function setActive(poll_id){
	document.getElementById('sa_poll_id').value = poll_id;
	document.getElementById('sa_poll_frm_id').submit();
}

function setDeleted(poll_id){
	if(confirm('Are you sure you wish to delete this poll?')){
		document.getElementById('rm_poll_id').value = poll_id;
		document.getElementById('rm_poll_frm_id').submit();
	}
}

function showAnswers(imgObj, poll_id, poll_answers){
	poll_answers = parseInt(poll_answers);
	var ua = window.navigator.userAgent.toLowerCase();
	
	for(var i = 0; i < poll_answers; i++){
		if (ua.indexOf('msie') != -1){
			document.getElementById('answ'+poll_id+'_'+i).style.display  = (document.getElementById('answ'+poll_id+'_'+i).style.display=='none')?'inline':'none';
		} else {
			document.getElementById('answ'+poll_id+'_'+i).style.display = (document.getElementById('answ'+poll_id+'_'+i).style.display=='none')?'table-row':'none';
		}
	}
	
	imgObj.src = (imgObj.src.indexOf("img/box_pl.png") != -1)?"img/box_min.png":"img/box_pl.png";
}

function showAddPoll(){
	document.getElementById('add_poll').style.display = (document.getElementById('add_poll').style.display == 'none' || !document.getElementById('add_poll').style.display)?'inline':'none';
}

function checkPoll(){
	if(document.getElementById('ta_poll_q').value == ""){
		alert("Poll question has to be un empty");
		return false;
	}
	return true;
}
</script>
<link href="poll_style.css" type="text/css" rel="stylesheet">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'>Edit Polls
</td></tr>

<tr><td>
<a href="javascript:void(0);" onclick="showAddPoll();" class="a_nor">Add new poll...</a>
</td></tr>
<tr><td>
<table width="100%" id="polls_tbl" cellpadding="1" cellspacing="1">
	<tr>
		<th>#</th>
		<th>Poll Question</th>
		<th>Category</th>
		<th>Date Posted</th>
		<th>Total Votes</th>
		<th>Poll Status</th>
		<th>Default</th>
		<th>Action</th>
	</tr>
	<?php
	if(!empty($member_polls_list)){
		for($i = 0; $i < count($member_polls_list); $i++){
			$poll_tuple = $votes->get_poll($member_polls_list[$i]['owner_id'], $member_polls_list[$i]['idpolls']);
			?>
	<tr bgcolor="<?php if(!$i%2){ echo "#e0e0e0";}else{echo "#f0f0f0";}?>">
		<td align="center">
			<img src="img/box_pl.png" border="0" onclick="showAnswers(this, '<?php echo $poll_tuple->poll_id; ?>', '<?php echo count($poll_tuple->answers); ?>');">
		</td>
		<td><?php echo $poll_tuple->question; if($poll_tuple->poll_type){ echo ' [default]'; } ?></td>
		<td align="center"><?php echo $poll_tuple->category_name; ?></td>
		<td align="center"><?php echo $poll_tuple->date_created; ?></td>
		<td align="center"><?php echo $poll_tuple->total_votes_cnt; ?></td>
		<td align="center"><?php if($poll_tuple->poll_state){ echo 'active'; } else { echo '<b>inactive</b>'; } ?></td>
		<td align="center">
			<input type="radio" name="poll[default]" <?php if($poll_tuple->poll_type){ echo 'checked'; } ?> onclick="setDefault('<?php echo $poll_tuple->poll_id; ?>');">
		</td>
		<td align="center">
			<a href="javascript:setDeleted('<?php echo $poll_tuple->poll_id; ?>');" class="a_del">Delete</a> / 
			<a href="javascript:setActive('<?php echo $poll_tuple->poll_id; ?>');" class="a_nor">Change Status</a>
		</td>
	</tr>
	<?php 
		for($j = 0; $j < count($poll_tuple->answers); $j++){ ?>
	<tr bgcolor="#ffffff" style="display: none;" id="answ<?php echo $poll_tuple->poll_id .'_'. $j; ?>">
		<td></td>
		<td>&nbsp;<i><?php echo $poll_tuple->answers[$j]['poll_answ_txt']; ?></i></td>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
		<td align="center">
			
			<?php
				$fill_width = 0;
				if(!empty($poll_tuple->answers[$j]['poll_answ_votes'])){
					$fill_width = round($poll_tuple->answers[$j]['poll_answ_votes']/$poll_tuple->total_votes_cnt, 2);
					$fill_width = $fill_width * 100;
				}
			?>
			<b><?php echo $fill_width; ?>%</b> (<?php echo $poll_tuple->answers[$j]['poll_answ_votes']; ?>)
			<div id="chart"><div id="fill" style="width: <?php echo $fill_width; ?>%;"></div></div>
		</td>
		<td align="center">&nbsp;</td>
		<td align="center">
			&nbsp;
		</td>
		<td align="center">
			&nbsp;
		</td>
	</tr>
		<?php }
	?>
			<?php
		}
	} else {
	?>
	<tr>
		<td colspan="8" align="center" bgcolor="#ffffff"><i>Empty</i></td>
	</tr>
	<?php
	}
	?>
</table>

<div id="add_poll">
<h3>Add new poll</h3>
<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>">
<table width="100%">
	<tr>
		<td>Poll question: </td>
		<td>
			<textarea name="polls[question]" rows="2" cols="20" id="ta_poll_q"></textarea>
		</td>
	</tr>
	<tr>
		<td>Poll Category: </td>
		<td>
			<select name="polls[category]">
				<option>  Select Category</option>
				<?php
				if(!empty($category_list)){
					for($i = 0; $i < count($category_list); $i++){
						?>
						<option value="<?php echo $category_list[$i]['idpolls_categories']; ?>"><?php echo $category_list[$i]['cat_name']; ?></option>
						<?php
					}
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top">Poll answers: </td>
		<td>
			<table width="100%" id="answer_table">
				<tr>
					<td>
						<input type="text" name="polls[answer][]">&nbsp;<input type="button" value="+" style="width: 25px;" onclick="addAnswerRow();">
					</td>
				</tr>
				<tr>
					<td><input type="text" name="polls[answer][]"></td>
				</tr>
				<tr>
					<td><input type="text" name="polls[answer][]"></td>
				</tr>
				<tr>
					<td><input type="text" name="polls[answer][]"></td>
				</tr>
				<tr>
					<td><input type="text" name="polls[answer][]"></td>
				</tr>
				<tr>
					<td><input type="text" name="polls[answer][]"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<input type="button" value="Cancel" onclick="showAddPoll();"> &nbsp;
			<input type="submit" value="Save" onclick="return checkPoll();">
		</td>
	</tr>
</table>
<input type="hidden" name="polls[owner_id]" value="<?php echo $member_id; ?>">
<input type="hidden" name="action" value="pollAddPoll">
</form>
</div>

<form method="POST" id="sd_poll_frm_id" action="<?php echo $_SERVER['REQUEST_URI'];?>">
<input type="hidden" name="polls[poll_id]" value="" id="sd_poll_id">
<input type="hidden" name="polls[owner_id]" value="<?php echo $member_id; ?>">
<input type="hidden" name="action" value="pollSetDefault">
</form>
<form method="POST" id="sa_poll_frm_id" action="<?php echo $_SERVER['REQUEST_URI'];?>">
<input type="hidden" name="polls[poll_id]" value="" id="sa_poll_id">
<input type="hidden" name="polls[owner_id]" value="<?php echo $member_id; ?>">
<input type="hidden" name="action" value="pollSetActive">
</form>
<form method="POST" id="rm_poll_frm_id" action="<?php echo $_SERVER['REQUEST_URI'];?>">
<input type="hidden" name="polls[poll_id]" value="" id="rm_poll_id">
<input type="hidden" name="polls[owner_id]" value="<?php echo $member_id; ?>">
<input type="hidden" name="action" value="pollRemove">
</form>
</td></tr>

</table>
<!-- Middle Text -->
</table>
</td>
</tr>
</table>
</table>
<?php
     include("includes/bottom.php");
}
?>
