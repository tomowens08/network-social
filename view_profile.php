<?php
include_once("class/class.votes.php");
include("includes/conn.php");
if(!empty($_POST['action'])){
	$suffix = '';
	switch($_POST['action']){
		case 'pollVote':		if(!empty($_POST['polls']) && is_array($_POST['polls'])){
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

include("includes/top_profile.php");
if (!ereg('view_profile.php',$_SERVER['SCRIPT_NAME'])) {
	include("includes/nav_vp.php");
} else {
	include("includes/nav_vp.php");
}

if ($settings['visitor_redirect'] && !$_SESSION['member_id']) {
	echo '<script>document.location.replace(\'./join_us.php\')</script>';
}
?>

<?php
$member_id1=$HTTP_GET_VARS["member_id"];
if(!is_numeric($member_id1))
{
    $sql="select member_id from members where display_name = '$member_id1'";
    $res=mysql_query($sql);
    $data_set=mysql_fetch_array($res);
    $HTTP_GET_VARS["member_id"]=$data_set["member_id"];
}
if($_SESSION["member_id"] != $HTTP_GET_VARS["member_id"])
{

$sql = "INSERT INTO profile_views SET
				date = '".time()."',
				ip = '".$_SERVER['REMOTE_ADDR']."',
				member_id = '".$_SESSION['member_id']."',
				profile_id = '".$HTTP_GET_VARS[member_id]."'";
mysql_query($sql);


$sql="update members ";
$sql.=" set views=views+1";
$sql.=" where member_id = $HTTP_GET_VARS[member_id]";
$res=mysql_query($sql);
print mysql_error();
}

include("includes/people.class.php");
include("includes/profile.class.php");
include("includes/music.class.php");

$people=new people;
$profile=new profile;
$music=new music;

$basic_info=$profile->get_basic($HTTP_GET_VARS["member_id"]);
$profile_back=$profile->get_back($HTTP_GET_VARS["member_id"]);

/**
 * vars for vote
 */
$vote_owner = intval($member_id1);
$voter_id = (!empty($_SESSION["member_id"])?intval($_SESSION["member_id"]):0);
?>
<link href="poll_style.css" type="text/css" rel="stylesheet">
<p align='center'>

<?
  print "<table width='800' cellpadding='6'>";
  print "<tr><td valign='top'>";  
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">



<?php
     if($basic_info["music"]!=1)
     {
      include("includes/user_profile.php");
     }
     else
     {
      include("includes/band_profile.php");
     }
?>

<?php
  print "</td></tr>";
  print "</table>";
?>

<!-- middle_content -->
<!-- Middle Text -->
<?php
include("includes/bottom_profile.php");
?>
