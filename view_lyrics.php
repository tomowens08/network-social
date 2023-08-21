<div align="center">
<html>
<head>
<title>Music.fm</title>
<meta http-equiv="expires" content="0">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="STYLESHEET" type="text/css" href="css/myspace.css">
<!-- removing line break, then line feed --->
</head>
<body bgcolor="#6699cc" leftmargin="0" rightmargin="0" topmargin="0">
<?php
     include("includes/conn.php");
     $sql="select song_name,lyrics from music_songs where id = $HTTP_GET_VARS[song_id]";
     $res=mysql_query($sql);
     $data_set=mysql_fetch_array($res);
?>
<table width="100%" height="100%" cellspacing="0" cellpadding="2" border="0" bgcolor="#6699cc" align="left">
<tr valign="top">
<td>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
<tr valign="top">
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="4" bgcolor="#6699cc">
<tr valign="top">
<td width="65%" height="2" valign="middle">
<div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><font color="#FFFFFF">
Lyrics for "<i><?=$data_set["song_name"]?></i>"</font></b></font></div>
</td>
<td width="35%" height="2" valign="middle">
<div align="right"><a href="javascript: self.close()"><img src="images/close.gif" width="92" height="17" border="0"></a></div>
</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr valign="top">
<td align="center">
<table cellspacing=2 cellpadding=4 width=470 align=center bgcolor="639ace" border=0 >
<tr class=text11 bgcolor=ffffff>
<td bgcolor="ffffff">
<div id="lyrics" name="lyrics" style="width:auto; height:auto;">
<?=$data_set["lyrics"]?>
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td></tr></table>
</td></tr></table>
</body>
</html>
</div>
