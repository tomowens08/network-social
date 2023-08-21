<?php
session_start();
if ($_SESSION["logged_in"]!="yes")
{
  header("Location: login.php");
}
  else
{
 set_time_limit(0);
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
.style2 {font-size: 12px}
.style3 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>


<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->
<?php
    include("classes/videos.class.php");
    include("includes/people.class.php");

    $videos=new videos;
    $people=new people;
    $creator_name=$people->get_name($_SESSION["member_id"]);
?>

<!-- Classified Entry -->

<table width="830" height="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="White">
<tr>
<td valign="top" width="120">

<table width="100%" height="50" border="0" cellspacing="0" cellpadding="5">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<?php
     include("includes/video_side.php");
?>
<td valign="top">

<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<tr>
<td class='login'>
  <span class="style3"><b>Videos<br>
  Upload Video</b></span></td>
<td class='txt_label' align="right" valign="bottom">
<a href="videos.php" class="style3">Back to Videos &gt;&gt;</a></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="10" height=50>
<?php
     $video_file_name=$_FILES["video_file"]["name"];
     $video_file_name_uploaded=$HTTP_POST_FILES["video_file"]["name"];
     $ext = strtolower(end(explode('.', $video_file_name)));

     $video_thumb_name=$_FILES["video_thumbnail"]["name"];
     $video_thumb_name_uploaded["video_thumbnail"]["name"];
     $ext_thumb=strtolower(end(explode('.', $video_thumb_name)));

     if($ext==Null&&$ext!="mpg"&&$ext!="asx"&&$ext!="mpeg"&&$ext!="asf"&&$ext!="avi"&&$ext!="wmv"&&$ext1!="jpg"&&$ext1!="jpeg"&&$ext1!="png"&&$ext1!="bmp")
     {
?>
<tr>
<td class='txt_label style1 style2'>
    Invalid video file or thumbnail file uploaded.</td>
</tr>
<?php
     }
     else
     {
      $next_video_id = $videos->get_next_video_id();

      $video_file_name=$_FILES["video_file"]["name"];
      $video_file_name_uploaded=$HTTP_POST_FILES["video_file"]["name"];
      $ext = strtolower(end(explode('.', $video_file_name)));
      $upload_video_file_name=$_SESSION["member_id"]."-".$next_video_id.".".$ext;

      $video_thumb_name=$_FILES["video_thumbnail"]["name"];
      $video_thumb_name_uploaded["video_thumbnail"]["name"];
      $ext_thumb=strtolower(end(explode('.', $video_thumb_name)));
       $upload_thumb_file_name=$_SESSION["member_id"]."-".$next_video_id.".".$ext_thumb;

      // check for folders


         // check year dir
            $year=date("Y");
			//below was: $year_path=$videodir.$year;
            $year_path="videos/".$year;
            if(!file_exists($year_path))
            {
                //$year_path_without=$videodir;
                //FtpMkdir($year_path_without,$year);
                $dir_res=mkdir($year_path,7777);
            }
          //

/*
         // check month dir
            $month=date("m");
            $month_path=$year_path."/".$month;
            if(!file_exists($month_path))
            {
             $dir_res=mkdir($month_path,0777);
            }
          //

         // check day dir
            $day=date("d");
            $day_path=$month_path."/".$month."/".$day;
            if(!file_exists($day_path))
            {
             $dir_res=mkdir($day_path,0777);
            }
          //

          // create the dir for video id
             $video_id=$_SESSION["member_id"]."-".$next_video_id;
             $full_dir_path=$day_path."/".$video_id;
             if(!file_exists($full_dir_path))
             {
              $dir_res=mkdir($full_dir_path,0777);
             }
          // create the dir for video id
*/
           $full_dir_path=$year_path;

          // upload video there
             $result = move_uploaded_file($_FILES["video_file"]["tmp_name"], $full_dir_path."/".$upload_video_file_name);
             $result = move_uploaded_file($_FILES["video_thumbnail"]["tmp_name"], $full_dir_path."/".$upload_thumb_file_name);
          // upload video there

             // create the asx file there
             //$video_virtual="videos/".$year."/".$month."/".$day."/".$video_id."/";
             $video_virtual="videos/".$year."/";
             $video_upload_name=$upload_video_file_name;
             $asx_file_name=$_SESSION["member_id"]."-".$next_video_id.".asx";

             $created_file_name=$videos->create_asx($video_virtual,$video_upload_name,$full_dir_path,$asx_file_name,$next_video_id,$site_name,$site_url,$HTTP_POST_VARS["video_title"],$HTTP_POST_VARS["video_caption"],$creator_name);
             // create the asx file there

          $album_id=$HTTP_POST_VARS["album_id"];
          $video_url="videos/".$year."/".$upload_video_file_name;

          if($video_thumb_name!=Null)
          {
           $thumb_url="videos/".$year."/".$upload_thumb_file_name;
          }
          else
          {
           $thumb_url="images/photo.gif";
          }
          
          $asx_url="videos/".$year."/".$asx_file_name;
          $category=addslashes($HTTP_POST_VARS["category"]);
          $video_title=addslashes($HTTP_POST_VARS["video_title"]);
          $video_caption=addslashes($HTTP_POST_VARS["video_caption"]);
          $video_tags=addslashes($HTTP_POST_VARS["video_tags"]);
          $video_type=addslashes($HTTP_POST_VARS["video_type"]);
          $video_codes=addslashes($HTTP_POST_VARS["video_codes"]);
          $ip_address=$_SERVER['REMOTE_ADDR'];


     if($video_title==Null||$video_tags==Null)
     {
?>
<tr>
<td class='txt_label style1 style2'>
    You did not enter video title or video tags.</td>
</tr>

<?php
     }
     else
     {

         $res=$videos->add_video($album_id,$video_url,$thumb_url,$asx_url,$category,$video_title,$video_caption,$video_tags,$video_type,$video_codes,$ip_address,$_SESSION["member_id"]);

         if($res==1)
         {
?>

<tr>
<td class='txt_label style1 style2'>
    Your video has been added.
<br><br>
                <a href="my_video.php"><strong>Click
                here to share your video codes. </strong></a></td>
</tr>
<tr>
<td class='txt_label style1 style2'>
    <a href='videos.php'>Return to Videos</a>&nbsp;|&nbsp;<a href='upload_video.php'>Upload More Videos</a></td>
</tr>
<?php
         }
         else
         {
?>
<tr>
<td class='txt_label style1 style2'>
    There was an error and the album was not added at this time. Please try again later.</td>
</tr>
<tr>
<td class='txt_label'>
    <a href='videos.php' class="style3">Return to Videos</a></td>
</tr>
<?php
         }
       }
   }
?>
</table>

<!-- End -->
<!-- middle_content -->
</blockquote>
</TD>

</TR>
</TBODY>
</TABLE></TD>
</TR>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
