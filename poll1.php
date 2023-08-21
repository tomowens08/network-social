<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<?php
$sql = "SELECT poll_id FROM polls WHERE member_id='$_SESSION[member_id]'";
$result = mysql_query($sql)or die(mysql_error());
$number = mysql_num_rows($result);


if(empty($_POST['quest'])){
	echo "You didn't add a question to your poll.<br>Please press the back button in your browser and give the poll a name";
}
else{
	$member_id = $_SESSION['member_id'];
	$quest = $_POST['quest'];
	$total = $_POST['total'];
	$a = $_POST["a"];
	}
	

	if(isset($_POST['delete'])){
		$del = $_POST['del'];
		$del = count($del);
		$del = $total - $del;
		echo'<table style="padding:15px;"><form action="'.$_SERVER['PHP_SELF'].'?poll=submit" method="post">
		<tr><td colspan="2" style="padding:15px;">Question: <input type="text" size="30" name="quest" value="'.$quest.'"></td></tr>';
		$b = 0;
		for($q = 1; $q <= $del; $q++){
			echo '<tr><td>';
			if($del >= 3){
				echo'<input type="checkbox" name="del[]"> - ';
			}
			echo'Answer '.$q.':</td><td> <input type="text" name="a[]" value="'.$a[$b].'"></td></tr>';
			$b++;
		}
		if($del < 2){
			echo'<tr><td>Answer 2:</td><td> <input type="text" name="a[]" value="'.$a[$b].'"></td></tr>';
		}
		echo'<input type="hidden" name="total" value="'.$del.'">';
		echo'<tr><td colspan="2"><input type="submit" name="delete" value="Delete Selected Rows"> <input type="submit" name="submit" value="Create!"></td></tr></form></table> <a href="logged.php">Back to main</a>';
	}else{


		echo'<h2>Success</h2>
		Your poll was created successfully!<p><a href="poll.php">Back to main</a></p>';


		mysql_query(
		"INSERT INTO polls (
		'poll_id'
		`member_id`,
		'category_id',
		`question_text`,
		'active',
		'default',
		`timestamp`) 
		VALUES (
		'',
		'$member_id',
		'1',
		'$quest',
		'1',
		'1',		
		'0')") or die(mysql_error());

		mysql_query("COMMIT");

		$query = mysql_query("SELECT MAX(id) FROM polls");

		//$result = mysql_num_rows($sql);
		$row = mysql_fetch_array($query);
		//$row = $row['id'] + 1;


		foreach($a as $option) {
			mysql_query(
			"INSERT INTO poll_data (
			`poll_id`, 
			`answer_id',
			`answer_text', 
			`votes`) 
			VALUES (
			'0',
			'$row[0]', 
			'$option', 
			0)") or die(mysql_error());
		}
	}
?>

<?php
include("includes/bottom.php");
}
?>