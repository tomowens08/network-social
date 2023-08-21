<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "htmlareafiles/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<?php
     include("includes/blog.class.php");
?>
<table width='100%'>

<?php

  print "<table width='100%'>";
  print "<tr>";
  print "<td width='30%'  valign='top'>";


// Left Column

  print "<table width='100%'>";


// Links Message

  //print "<tr>";
  //print "<td>";
  //include("includes/comm1.php");


  //print "<tr><td width='100%' bgcolor='#E3E4E9'><b><div align='center'><span class='style18'>Manage Account</span></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_profile.php' class='style11'>Edit Profile</a></b></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='upload_photos.php' class='style11'>Upload Photos</a></b></td></tr>";
  //print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='edit_testimonials.php' class='style11'>Edit Testimonials</a></b>&nbsp;";

//        $sql="select count(*) as a from testimonials where member_id = ".$_SESSION["member_id"]." and approved = 0";
//        $result1=mysql_query($sql);
//        $RSUser1=mysql_fetch_array($result1);

//  print "(".$RSUser1["a"].")";
//  print "</td></tr>";
//  print "<tr><td width='100%' bgcolor='#CCCCFE'><b><a href='myfriends.php?page=1' class='style11'>Edit Friends</a></b></td></tr>";
//  print "</table>";
//  print "</td>";
//  print "</tr>";

// Links Message



//  print "</table>";

//  print "</td>";

  print "<td width='100%' valign='top'>";

?>
<TABLE cellSpacing=0 cellPadding=5 width='720' bgColor=#ffffff border=0>
<TBODY>
<TR>
<TD>
<TABLE cellSpacing=0 cellPadding=5 width="100%" border=0>
<TBODY>
<TR>
<TD class=blacktext10nb colSpan=2>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD width="50%" class='txt_label'><STRONG>Post a New Blog Entry</STRONG></TD>

<TD class=text align=right width="50%" class='txt_label'>
<a href="my_blog.php">View My Blog</a>
</TD></TR></TBODY></TABLE></td></tr>

<!-- top -->

<?php
     include("includes/blog_top_links.php");
     include("includes/blog_my_profile.php");
     include("includes/blog_views.php");
     include("includes/blog_my_controls.php");
     include("includes/blog_groups.php");

?>



<TR>
<TD></TD></TR></TBODY></TABLE></TD>

<TD class='txt_label' vAlign=top width=620>
<!-- blog_middle -->
<?php
     $blog=new blog;
     $blog_info=$blog->get_blog($HTTP_GET_VARS["id"]);
?>

<form action='edit_blog_action.php?id=<?=$HTTP_GET_VARS["id"]?>' method='post'>

<table border="0" cellpadding="3" cellspacing="0" bgcolor="F5F5F5">
<tr>
<td class='txt_label'><strong>Subject:</strong></td>
<td class='txt_label' colspan="2">
<input type="text" name="subject" value="<?=$blog_info["subject"]?>" size="40" maxlength="95"> (max 95 characters)
</td>
</tr>
</table>

<br>
<table border="0" cellpadding="1" cellspacing="0" bgcolor="D5D5D5">
<tr>
<td>
<table border="0" cellpadding="3" cellspacing="0" bgcolor="F5F5F5">
<tr valign="top">
<td width="90" class='txt_label' valign="top"><strong>Body:</strong></td>
<td colspan="2" valign="top">
<textarea cols="52" rows="10" name="body" style="width:550; height:300"><?=$blog_info["body"]?></textarea>
<script language="javascript1.2">
editor_generate('body');
</script>
</td>
</tr>
</table>
</td>
</tr>
</table>
<br>
<table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="D5D5D5">
<tr>
<td>
<table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="F5F5F5">
<tr>
<td>
<div id="amazonSearchArea">
<table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="F5F5F5">
<tr>
<td class='txt_label' width="95"><strong>Currently:</strong></td>
<td>
<select name="mode" style="width:200px;">
<?php
     if($blog_info["currently"]=="music")
     {
?>
<option value="music" selected>Playing (Music)</option>
<option value="books">Reading (Books)</option>
<option value="dvd">Watching (DVD/Video)</option>
<option value="videogames">Playing (Video Games)</option>
<?php
     }
?>

<?php
     if($blog_info["currently"]=="books")
     {
?>
<option value="music">Playing (Music)</option>
<option value="books" selected>Reading (Books)</option>
<option value="dvd">Watching (DVD/Video)</option>
<option value="videogames">Playing (Video Games)</option>
<?php
     }
?>

<?php
     if($blog_info["currently"]=="dvd")
     {
?>
<option value="music">Playing (Music)</option>
<option value="books">Reading (Books)</option>
<option value="dvd" selected>Watching (DVD/Video)</option>
<option value="videogames">Playing (Video Games)</option>
<?php
     }
?>

<?php
     if($blog_info["currently"]=="videogames")
     {
?>
<option value="music">Playing (Music)</option>
<option value="books">Reading (Books)</option>
<option value="dvd">Watching (DVD/Video)</option>
<option value="videogames" selected>Playing (Video Games)</option>
<?php
     }
?>

</select>
</td>
</tr>
</table>
</div>
<table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="F5F5F5">
<tr>
<td class='txt_label' width="95" valign="middle"><strong>Current Mood:</strong></td>
<td valign="middle">
<select name="mood" style="width:200px;" id="MoodID">
<option value="0">None, or other:</option>
<?php
     $blog=new blog;
     $blog_res=$blog->get_all_moods();
     while($blog_set=mysql_fetch_array($blog_res))
     {
         if($blog_info["mood"]==$blog_set["id"])
         {
?>
<option value="<?=$blog_set["id"]?>" selected><?=$blog_set["name"]?></option>
<?php
         }
         else
         {
?>
<option value="<?=$blog_set["id"]?>"><?=$blog_set["name"]?></option>
<?php
         }
     }
?>
</select>
</td>
</tr>

<tr>
<td class='txt_label'><strong>Comments:</strong></td>
<td class='txt_label'>
<?php
if($blog_info["comments_allowed"]=="1")
{
?>
<input id="allow_comments" type="checkbox" name="allow_comments" value="on" checked> Disable Kudos &amp; Comments</label>
<?php
}
else
{
?>
<input id="allow_comments" type="checkbox" name="allow_comments" value="on"> Disable Kudos &amp; Comments</label>
<?php
}
?>
</td>
</tr>
<tr valign="top">
<td class='txt_label'><strong>Privacy:</strong></td>
<td class='txt_label'>
<?php
     if($blog_info["privacy"]=="0")
     {
?>
<input type="Radio" name="privacy" value="0" checked>Public
<input type="Radio" name="privacy" value="1">Private
<?php
     }
     else
     {
?>
<input type="Radio" name="privacy" value="0">Public
<input type="Radio" name="privacy" value="1" checked>Private
<?php
     }
?>
<br><strong>Note: the <u>Subject</u> of all of your blogs will always show on your profile page regardless of their privacy setting.</strong>
</td>
</tr>
</table>
</td>
</tr>
</table>
<tr>
<td class='txt_label'>
<div align='center'>
<input type='submit' value='Edit Blog'>
</div>
</td>
</tr>
</form>

</table>
</td>
</tr>
</table>
</td>
</tr>
<!-- blog_middle -->
<?php



  print "<table width='100%' align='center'>";
  print "<tr>";
  print "<td width='100%'>&nbsp;</td>";
  print "</tr>";
  print "</table>";
?>

</td>
</tr>
</table></table>
<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
     include("includes/bottom.php");
}
?>
