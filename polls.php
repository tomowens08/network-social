<?php
session_start();
include("includes/conn.php");
include_once("class/class.votes.php");

if(!empty($_POST['action'])){
	$suffix = '';
	switch($_POST['action']){
		case 'pollVote':		if(!empty($_POST['polls']) && is_array($_POST['polls'])){
									if(empty($_SESSION['member_id'])){
										header('Location: /login.php');
										exit();
									}
									$voter_id = (!empty($_POST['polls']['member_id'])?intval($_POST['polls']['member_id']):0);
									$poll_id = (!empty($_POST['polls']['poll_id'])?intval($_POST['polls']['poll_id']):0);
									$answer_id = (!empty($_POST['polls']['answer'])?intval($_POST['polls']['answer']):0);
									
									if(!empty($voter_id) && !empty($poll_id) && !empty($answer_id)){
										$poll = new TMultyPolls($poll_id);
										$poll->vote($voter_id, $answer_id);
										$poll_data = $poll->get_poll(0, $poll_id, 0);
										if(!empty($poll_data->category_id)){
											$suffix .= 'cat='.$poll_data->category_id.'&';
										}
										$suffix .= 'poll_id='.$poll_id;
									}
								}
								break;
	}
	header('Location: ' . $_SERVER['REQUEST_URI']);
	exit();
}

include("includes/top.php");
include("includes/nav.php");

include("includes/profile.class.php");
$profile=new profile;

include("includes/people.class.php");
$people=new people;


$votes = new TMultyPolls();

$vote_owner = 0;
if(!empty($_GET['member_id']) && intval($_GET['member_id']) > 0){
	$vote_owner = intval($_GET['member_id']);
}

$voter_id = (!empty($_SESSION["member_id"])?intval($_SESSION["member_id"]):0);

$category_list = TMultyPolls::get_category_list();
$poll_cat_id = 0;
if(!empty($_GET['cat']) && intval($_GET['cat']) > 0){
	$poll_cat_id = intval($_GET['cat']);
}

/**
 * show only active
 */
if(!empty($vote_owner)){
	$all_polls_list = $votes->get_member_polls($vote_owner, $poll_cat_id, 1);
} else {
	$all_polls_list = $votes->get_polls($poll_cat_id, 1);
}

$full_query = "";
$full_query_wc = "";
if(!empty($vote_owner)){
	$full_query = "member_id={$vote_owner}&";
	$full_query_wc = "member_id={$vote_owner}&";
}
if(!empty($poll_cat_id)){
	$full_query .= "cat={$poll_cat_id}&";
}
?>
<link href="poll_style.css" type="text/css" rel="stylesheet">
<table width='800' align="center" cellpadding='4' cellspacing='0' class='dark_b_border2'>
<tr>
<td class='dark_blue_white2'><h1>Polls</h1>
</td></tr>

<tr>
  <td>

    <p><a href="/my_polls.php">Create a poll</a> </p>
    <p>      
      <?php if(!empty($vote_owner)){ ?>
        <a href="view_profile.php?member_id=<?php echo $vote_owner; ?>" style="font-weight: bold;">Back to the <?php echo $people->get_name($vote_owner);?>'s profile</a>
        <br>
        <?php
}
?>
      </p>
    <p>Select category: &nbsp;<select onchange="if(this.value){window.location = '<?php echo basename(__FILE__); ?>?<?php echo $full_query_wc; ?>cat='+this.value;}else{window.location = '<?php echo basename(__FILE__) . '?' . $full_query_wc; ?>';}">
				<option value="">  All</option>
				<?php
				if(!empty($category_list)){
					for($i = 0; $i < count($category_list); $i++){
						?>
						<option value="<?php echo $category_list[$i]['idpolls_categories']; ?>" <?php if($poll_cat_id == $category_list[$i]['idpolls_categories']) echo 'selected';?>><?php echo $category_list[$i]['cat_name']; ?></option>
						<?php
					}
				}
				?>
			</select></p>
<?php
include_once('includes/_poll.poll_list.php');
?>

</td>
</tr>

</table>
<div align="center">
  <!-- End -->
  
  <!-- middle_content -->
  </blockquote>
  </TD>
  
  </td>
  </tr>
  </table>
  <!-- Middle Text -->
  </table>
  </td>
  </tr>
  </table>
  </table>
  <!-- Middle Text -->
  <?php
include("includes/bottom.php");
?>
</div>
