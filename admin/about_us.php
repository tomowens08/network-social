<?
session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
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
</HEAD>
<BODY>
<?
if($_SESSION["user_admin"] != "Yes")
{
print("You need to login before you can view this page");
}
else
{
    include("includes/conn.php");

    $sql="select about_us from pages";
    $res=mysql_query($sql);
    $data_set=mysql_fetch_array($res);

print("<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>");
print("<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>");
print("<td class='headcell' height='20'>Change About Us Page Text</td></tr>");

print("<tr><td height='13' class='textcell'><table>");

print("<form name='theForm' action='about_us1.php' method='post'>");

print("<tr bgColor='#ffffff'>");
print("<td class='smalltext' vAlign='top'><p align='left'>About Us Page Text :</p></td>");
print("<td class='text'>&nbsp;</td>");
print("</tr>");

print("<tr bgColor='#ffffff'>");
print("<td class='smalltext' vAlign='top' colspan='2'>");



// HTML Editor Code
?>
<textarea name="details" style="width:550; height:500"><?=stripslashes($data_set["about_us"])?></textarea>
<script language="javascript1.2">
editor_generate('details');
</script>
<br>
<div align='center'>
<INPUT type=submit value='Change About Us Page Text' name=Submit>
</div>
<?
// HTML Editor Code Ends



print("</td>");
print("</tr>");
print("</table></table>");
print("</form>");
}
?>
</BODY>
</HTML>