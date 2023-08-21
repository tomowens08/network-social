<?php
if (empty($_GET['sid'])) {
	header("Location: login.php");
    die();
}

//$res=$music->add_shows($_SESSION["member_id"],$month,$day,$year,$hour,$min,$marker,$venue,$cost,$address,$city,$zip_code,$regional,$state,$country,$description);
//$group_res=$profile->get_groups($HTTP_GET_VARS["member_id"]);

session_id($_GET['sid']);
session_start();

if ($_SESSION["logged_in"]!="yes") {
	header("Location: login.php");
    die();
}

if (empty($_GET['status'])) {
?>
<form name="addSong" action="edit_song.php" method="get">
	<input type="hidden" name="songID" value="<?=$_GET['songID']?>">
	<input type="hidden" name="status" value="1">
	<input type="hidden" name="sid" value="<?=$_GET['sid']?>">
	<table cellspacing="0" cellpadding="2" border="0" class="blue_border" style="border-collapse: collapse;">
	<tr><td>
	    Do you really want to add this song to your profile?<br><br>
	    Click "Add" only if you really wish to add this song.<br><br>
	    <input type="submit" value="Add Song To Profile">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="button" value="Cancel" onclick="window.history.back()">
	</td></tr>
	</table>
</form>
<?php
} else {
	include("includes/conn.php");

	$sql = "SELECT ms.*, m.member_name from music_songs ms LEFT JOIN members m ON ms.owner_id = m.member_id WHERE ms.id = '".$_GET['songID']."'";
	$song = mysql_fetch_array(mysql_query($sql));
	$sql = "SELECT count(*) as num FROM music_songs WHERE member_id = '".$_SESSION['member_id']."' AND song_file = '".$song['song_file']."'";
	$res = mysql_fetch_array(mysql_query($sql));
	if (!$res['num']) {
		$sql = "INSERT INTO music_songs SET
						owner_id = '".$song['owner_id']."',
						member_id = '".$_SESSION['member_id']."',
						song_name = '".$song['song_name']."',
						song_file = '".$song['song_file']."',
						lyrics = '".$song['lyrics']."',
						date = '".$song['date']."'";
		mysql_query($sql);
	}
?>
	<table cellspacing="0" cellpadding="2" border="0" class="blue_border" style="border-collapse: collapse;">
	<tr><td>
	    Sound <b><?=$song['song_name']?></b> of <b><?=$song['member_name']?></b> was added to your profile.<br><br>
			<a href="#" onclick="opener.document.location.replace('edit_profile.php?type=song');window.close();">Click here to manage your songs.
	</td></tr>
	</table>
<?php
}
?>
