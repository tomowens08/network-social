<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->
<?php
    include("includes/right_mprofile_menu.php");
?>

<td width='1%'>&nbsp;</td>
<td valign='top' width='80%'>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign='top'>
<!-- middle_content -->

<table width='100%' cellpadding='4' cellspacing='0' class="dark_b_border2">
<tr>
<td class='dark_blue_white2'>Edit Profile
</td></tr>

<?

include("includes/music.class.php");
$music=new music;

	    if($HTTP_GET_VARS["type"]=="code")
 	   {
				$sql = "SELECT count(*) as num from member_profile WHERE member_id = ".$_SESSION['member_id'];
				$f = mysql_fetch_array(mysql_query($sql));
				if (count($_FILES['bgimageurl']) && !$_FILES['bgimageurl']['error']) {
					$file = './user_images/bg/'.$_FILES['bgimageurl']['name'];
					move_uploaded_file($_FILES['bgimageurl']['tmp_name'],$file);
				}
				$_POST['codetext'] = str_replace('{bg_img_url}',$file,$_POST['codetext']);				
				if (!$f['num']) 
					$sql = "INSERT INTO member_profile SET
									member_id = '".$_SESSION['member_id']."',
									code = '".addslashes($_POST['codetext'])."'";
				else
					$sql = "UPDATE member_profile SET code = '".addslashes($_POST['codetext'])."' where member_id = ".$_SESSION['member_id'];

				 mysql_query($sql);
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your profile code has been updated.";
                print "<br><br>";
                print "<a href='edit_mprofile.php?type=code'>Back to Profile Editor</a><br><a href='view_profile.php?member_id=".$_SESSION['member_id']."'>View Profile</a>";
                print "</td></tr>";
 		  }
        if($HTTP_GET_VARS["type"]==Null)
        {
            // shows

            $month=$HTTP_POST_VARS["month"];
            $day=$HTTP_POST_VARS["day"];
            $year=$HTTP_POST_VARS["year"];
            $hour=$HTTP_POST_VARS["hour"];
            $min=$HTTP_POST_VARS["min"];
            $marker=$HTTP_POST_VARS["marker"];
            $venue=$HTTP_POST_VARS["venue"];
            $cost=$HTTP_POST_VARS["cost"];
            $address=$HTTP_POST_VARS["address"];
            $city=$HTTP_POST_VARS["city"];
            $zip_code=$HTTP_POST_VARS["zip_code"];
            $regional=$HTTP_POST_VARS["regional"];
            $state=$HTTP_POST_VARS["state"];
            $country=$HTTP_POST_VARS["country"];
            $description=$HTTP_POST_VARS["description"];

            $res=$music->add_shows($_SESSION["member_id"],$month,$day,$year,$hour,$min,$marker,$venue,$cost,$address,$city,$zip_code,$regional,$state,$country,$description);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your show has been added.";
                print "<br><br>";
                print "<a href='edit_mprofile.php'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the show was not added at this time.";
                print "</td></tr>";
            }

        }

        if($HTTP_GET_VARS["type"]=="details")
        {
            // background

            $headline=$HTTP_POST_VARS["headline"];
            $bio=$HTTP_POST_VARS["bio"];
            $members=$HTTP_POST_VARS["members"];
            $influences=$HTTP_POST_VARS["influences"];
            $sounds_like=$HTTP_POST_VARS["sounds_like"];
            $website=$HTTP_POST_VARS["website"];
            $record_label=$HTTP_POST_VARS["record_label"];
            $label_type=$HTTP_POST_VARS["label_type"];

            $res=$music->update_profile($_SESSION["member_id"],$headline,$bio,$members,$influences,$sounds_like,$website,$record_label,$label_type);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your band details has been edited.";
                print "<br><br>";
                print "<a href='edit_mprofile.php?type=details'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the band details were not edited at this time.";
                print "</td></tr>";
            }

        }

        if($HTTP_GET_VARS["type"]=="basic")
        {
            // background

            $firstname=$HTTP_POST_VARS["firstname"];
            $website=$HTTP_POST_VARS["website"];
            $city=$HTTP_POST_VARS["city"];
            $state=$HTTP_POST_VARS["state"];
            $country=$HTTP_POST_VARS["country"];
            $zip_code=$HTTP_POST_VARS["zip_code"];

            $res=$music->edit_basic($_SESSION["member_id"],$firstname,$website,$city,$state,$country,$zip_code);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your basic details have been edited.";
                print "<br><br>";
                print "<a href='edit_mprofile.php?type=basic'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the school was not added at this time.";
                print "</td></tr>";
            }

        }

        if($HTTP_GET_VARS["type"]=="songs")
        {
            // upload


            $file_name=$_FILES["mp3file"]["name"];
            $picture_name=$_SESSION["member_id"].$file_name;
            $song="songs/".$picture_name;
            $result = move_uploaded_file($_FILES["mp3file"]["tmp_name"], $song); //$songdir.$picture_name);

            if ($result) {
	            //$song_url=$HTTP_POST_VARS["mp3file"];
	            $song_name=$HTTP_POST_VARS["song_name"];
	            $lyrics=$HTTP_POST_VARS["details"];

	            $res=$music->add_song($_SESSION["member_id"],$song,$song_name,$lyrics);

	            if($res==1)
	            {
								$sql = "SELECT music FROM members WHERE member_id = ".$_SESSION['member_id'];
								$res = mysql_fetch_array(mysql_query($sql));					
	              print "<tr><td colspan='2' class='txt_label'>";
	              print "Your song has been added.";
	              print "<br><br>";
								
								if ($res['music'])
	                print "<a href='edit_mprofile.php?type=songs'><<< Back >>></a>";
 								else
									print "<a href='edit_profile.php?type=song'><<< Back >>></a>";
                
								print "</td></tr>";
	              print "</td></tr>";

	            }
	            else
	            {
	                print "<tr><td colspan='2' class='txt_label'>";
	                print "There was an error and the song was not added at this time.";
	                print "</td></tr>";
	            }
			}
            else {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the song was not added at this time.";
                print "</td></tr>";
            }
        }

        if($HTTP_GET_VARS["type"]=="listing")
        {
            // background

            $user_name=$HTTP_POST_VARS["username"];
            $genre1=$HTTP_POST_VARS["genre1"];
            $genre2=$HTTP_POST_VARS["genre2"];
            $genre3=$HTTP_POST_VARS["genre3"];

            $sql="update music_member_profile ";
            $sql.=" set genre1=$genre1";
            $sql.=", genre2=$genre2";
            $sql.=", genre3=$genre3";
            $sql.=" where user_id = $_SESSION[member_id]";

            $res=mysql_query($sql);


            if($res)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your listing info has been edited.";
                print "<br><br>";
                print "<a href='edit_mprofile.php?type=listing'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the listing info was not edited at this time.";
                print "</td></tr>";
            }

        }
?>

</td></tr>
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
}
?>
