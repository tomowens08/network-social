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
    include("includes/right_profile_edit.php");
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

<?php
include("includes/profile.class.php");
$profile=new profile;

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
                print "<a href='edit_profile.php?type=code'>Back to Profile Editor</a><br><a href='view_profile.php?member_id=".$_SESSION['member_id']."'>View Profile</a>";
                print "</td></tr>";
 		  }
        if($HTTP_GET_VARS["type"]==Null)
        {
            // interests and personality

            $headline=addslashes($HTTP_POST_VARS["headline"]);
            $about_me=addslashes($HTTP_POST_VARS["about_me"]);
            $like_to_meet=addslashes($HTTP_POST_VARS["like_to_meet"]);
            $interests=addslashes($HTTP_POST_VARS["interests"]);
            $music=addslashes($HTTP_POST_VARS["music"]);
            $movies=addslashes($HTTP_POST_VARS["movies"]);
            $television=addslashes($HTTP_POST_VARS["television"]);
            $heroes=addslashes($HTTP_POST_VARS["heroes"]);
            $books=addslashes($HTTP_POST_VARS["books"]);

            $res=$profile->update_interests($_SESSION["member_id"],$headline,$about_me,$like_to_meet,$interests,$music,$movies,$television,$heroes,$books);

            if($res==1)
            {	
								if ($about_me)
									mysql_query("update members set added_about = '1' where member_id = ".$_SESSION['member_id']);
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your interests and personality has been edited.";
                print "<br><br>";
                print "<a href='edit_profile.php'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the interests were not edited at this time.";
                print "</td></tr>";
            }

        }

        if($HTTP_GET_VARS["type"]=="back")
        {
            // background

            $marital_status=addslashes($HTTP_POST_VARS["MaritalStatus"]);
            $sexual=addslashes($HTTP_POST_VARS["SexualPreference"]);
            $hometown=addslashes($HTTP_POST_VARS["hometown"]);
            $religion=addslashes($HTTP_POST_VARS["ReligionID"]);
            $smoker=addslashes($HTTP_POST_VARS["smoker"]);
            $drinker=addslashes($HTTP_POST_VARS["drinker"]);
            $children=addslashes($HTTP_POST_VARS["ChildrenID"]);
            $education=addslashes($HTTP_POST_VARS["EducationID"]);
            $income=addslashes($HTTP_POST_VARS["IncomeID"]);

            $res=$profile->update_back($_SESSION["member_id"],$marital_status,$sexual,$hometown,$religion,$smoker,$drinker,$children,$education,$income);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your background and lifestyle has been edited.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=back'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the background and lifestyle were not edited at this time.";
                print "</td></tr>";
            }

        }

        if($HTTP_GET_VARS["type"]=="schools")
        {
            // background

            $school_name=addslashes($HTTP_POST_VARS["school_name"]);
            $city=addslashes($HTTP_POST_VARS["city"]);
            $state=addslashes($HTTP_POST_VARS["state"]);
            $status=addslashes($HTTP_POST_VARS["status"]);
            $fyear=addslashes($HTTP_POST_VARS["fyear"]);
            $eyear=addslashes($HTTP_POST_VARS["eyear"]);
            $graduation_year=addslashes($HTTP_POST_VARS["graduation_year"]);
            $degree=addslashes($HTTP_POST_VARS["degree"]);
            $major=addslashes($HTTP_POST_VARS["major"]);
            $courses=addslashes($HTTP_POST_VARS["courses"]);
            $clubs=addslashes($HTTP_POST_VARS["clubs"]);

            $res=$profile->add_school($_SESSION["member_id"],$school_name,$city,$state,$status,$fyear,$eyear,$graduation_year,$degree,$major,$courses,$clubs);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your school has been added has been edited.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=schools'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the school was not added at this time.";
                print "</td></tr>";
            }

        }

        if($HTTP_GET_VARS["type"]=="companies")
        {
            // background

            $company_name=addslashes($HTTP_POST_VARS["company_name"]);
            $city=addslashes($HTTP_POST_VARS["city"]);
            $state=addslashes($HTTP_POST_VARS["state"]);
            $country=addslashes($HTTP_POST_VARS["country"]);
            $dates=addslashes($HTTP_POST_VARS["dates"]);
            $title=addslashes($HTTP_POST_VARS["title"]);
            $division=addslashes($HTTP_POST_VARS["division"]);

            $res=$profile->add_company($_SESSION["member_id"],$company_name,$city,$state,$country,$dates,$title,$division);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your company has been added.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=companies'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the company was not added at this time.";
                print "</td></tr>";
            }

        }

        if($HTTP_GET_VARS["type"]=="networking")
        {
            // background

            $field=addslashes($HTTP_POST_VARS["field"]);
            $sub_field=addslashes($HTTP_POST_VARS["sub_field"]);
            $role=addslashes($HTTP_POST_VARS["role"]);
            $desc=addslashes($HTTP_POST_VARS["desc"]);

            $res=$profile->add_network($_SESSION["member_id"],$field,$sub_field,$role,$desc);

            if($res==1)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your networking has been added.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=networking'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the networking was not added at this time.";
                print "</td></tr>";
            }

        }


        if($HTTP_GET_VARS["type"]=="name")
        {
            // background

            $display_name=addslashes($HTTP_POST_VARS["display_name"]);
            $first_name=addslashes($HTTP_POST_VARS["first_name"]);
            $last_name=addslashes($HTTP_POST_VARS["last_name"]);

            $sql="select * from members where display_name like '$display_name'";
            $check_res=mysql_query($sql);
            $num_rows=mysql_num_rows($check_res);
            
            if($num_rows==0)
            {
             $sql="update members ";
             $sql.="set display_name = '$display_name'";
             $sql.=", member_name='$first_name'";
             $sql.=", member_lname='$last_name'";
             $sql.=" where member_id = $_SESSION[member_id]";
             $res=mysql_query($sql);
             
             if($res)
             {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your name has been edited.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=name'><<< Back >>> </a>";
                print "</td></tr>";
             }
             else
             {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the name was not edited at this time.";
                print "</td></tr>";
             }
            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "The display name is already taken, please choose another one.";
                print "</td></tr>";
            }

        }



        if($HTTP_GET_VARS["type"]=="basic")
        {
            // background

            $gender=addslashes($HTTP_POST_VARS["gender"]);
            $month=addslashes($HTTP_POST_VARS["month"]);
            $day=addslashes($HTTP_POST_VARS["day"]);
            $year=addslashes($HTTP_POST_VARS["year"]);
            $dob=$year."-".$month."-".$day;
            $occupation=addslashes($HTTP_POST_VARS["occupation"]);
            $city=addslashes($HTTP_POST_VARS["city"]);
            $state=addslashes($HTTP_POST_VARS["us_state"]);
            $other_state=addslashes($HTTP_POST_VARS["other_state"]);

            if($state=="0")
            {
             $state=$other_state;
            }

            $country_id=addslashes($HTTP_POST_VARS["country"]);
            $postal_code=addslashes($HTTP_POST_VARS["postal_code"]);
            $body_type=addslashes($HTTP_POST_VARS["body_type"]);
            $height_feet=addslashes($HTTP_POST_VARS["height_feet"]);
            $height_inch=addslashes($HTTP_POST_VARS["height_inch"]);
            $here_for1=$HTTP_POST_VARS["here_for"];
            $ethnicity=addslashes($HTTP_POST_VARS["ethnicity"]);

            $here_for='';
            $sr_no=0;
            if($here_for1!=Null)
            {
             foreach($here_for1 as $aa)
             {
              if($sr_no==0)
              {
               $here_for=$aa;
              }
              else
              {
               $here_for=$here_for.",".$aa;
              }
               $sr_no=$sr_no+1;
             }
            }
            else
            {
                $here_for=Null;
            }



            $sql="update members ";
            $sql.="set gender = '$gender'";
            $sql.=", birth_month='$month'";
            $sql.=", birth_day='$day'";
            $sql.=", birth_year='$year'";
            $sql.=", dob='$dob'";
            $sql.=", occupation='$occupation'";
            $sql.=", city='$city'";
            $sql.=", current_state='$state'";
            $sql.=", country='$country_id'";
            $sql.=", zip_code='$postal_code'";
            $sql.=", body_type='$body_type'";
            $sql.=", height_feet='$height_feet'";
            $sql.=", height_inch='$height_inch'";
            $sql.=", here_for='$here_for'";
            $sql.=", ethnicity='$ethnicity'";
            $sql.=" where member_id = $_SESSION[member_id]";
            $res=mysql_query($sql);
            print mysql_error();


            if($res)
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "Your basic information has been edited.";
                print "<br><br>";
                print "<a href='edit_profile.php?type=basic'><<< Back >>> </a>";
                print "</td></tr>";

            }
            else
            {
                print "<tr><td colspan='2' class='txt_label'>";
                print "There was an error and the basic information was not edited at this time.";
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
<?php
include("includes/bottom.php");
}
?>
