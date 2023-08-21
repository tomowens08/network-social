<?php
session_start();
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
<script language="JavaScript" src="./calendar2.js"></script>

<?php
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
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


<form action='post_blog_action.php' method='post'>
<table border="0" cellpadding="3" cellspacing="0" bgcolor="F5F5F5">
<tr>
	<td class="txt_label"><strong>Date:</strong></td>
	<td colspan="2"><input type="text" value="<?=myDate(time(),'m/d/y H:i:s');?>" name="date" size="16">&nbsp;<a href="javascript:cal1.popup();"><img align="absmiddle" border="0" src="./img/cal.gif"></a></td>
</tr>
<tr>
<td class='txt_label' width="90"><strong>Subject:</strong></td>
<td class='txt_label' colspan="2">
<input type="text" name="subject" value="" size="40" maxlength="95"> (max 95 characters)
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
<textarea cols="52" rows="10" name="body" style="width:550; height:300"></textarea>
<script language="javascript1.2">
editor_generate('body');
</script>
<script language="JavaScript">
var cal1 = new calendar2(document.forms[0].elements['date']);
cal1.year_scroll = true;
cal1.time_comp = true;
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
<td class='txt_label'><strong>Comments:</strong></td>
<td class='txt_label'>
<input id="allow_comments" type="checkbox" name="ProhibitComments" value="on"> Disable Kudos &amp; Comments</label>
</td>
</tr>
<tr valign="top">
<td class='txt_label'><strong>Privacy:</strong></td>
<td class='txt_label'>
<input type="Radio" name="privacy" value="0" checked>Public
<input type="Radio" name="privacy" value="1">Private
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
<input type='submit' value='Post Blog'>
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
</table></td></tr></table></td></tr></table>
<!-- blog_middle -->


</td>
</tr>


<!-- middle_content -->
</blockquote>


<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
