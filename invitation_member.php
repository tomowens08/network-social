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
function setPointer(theRow, theAction, theDefaultColor, thePointerColor, theMarkColor)
{
var theCells = null;

// 1. Pointer and mark feature are disabled or the browser can't get the
// row -> exits
if ((thePointerColor == '' && theMarkColor == '')
|| typeof(theRow.style) == 'undefined') {
return false;
}

// 2. Gets the current row and exits if the browser can't get it
if (typeof(document.getElementsByTagName) != 'undefined') {
theCells = theRow.getElementsByTagName('td');
}
else if (typeof(theRow.cells) != 'undefined') {
theCells = theRow.cells;
}
else {
return false;
}

// 3. Gets the current color...
var rowCellsCnt = theCells.length;
var domDetect = null;
var currentColor = null;
var newColor = null;
// 3.1 ... with DOM compatible browsers except Opera that does not return
// valid values with "getAttribute"
if (typeof(window.opera) == 'undefined'
&& typeof(theCells[0].getAttribute) != 'undefined') {
currentColor = theCells[0].getAttribute('bgcolor');
domDetect = true;
}
// 3.2 ... with other browsers
else {
currentColor = theCells[0].style.backgroundColor;
domDetect = false;
} // end 3

// 4. Defines the new color
// 4.1 Current color is the default one
if (currentColor == ''
|| currentColor.toLowerCase() == theDefaultColor.toLowerCase()) {
if (theAction == 'over' && thePointerColor != '') {
newColor = thePointerColor;
}
else if (theAction == 'click' && theMarkColor != '') {
newColor = theMarkColor;
}
}
// 4.1.2 Current color is the pointer one
else if (currentColor.toLowerCase() == thePointerColor.toLowerCase()) {
if (theAction == 'out') {
newColor = theDefaultColor;
}
else if (theAction == 'click' && theMarkColor != '') {
newColor = theMarkColor;
}
}
// 4.1.3 Current color is the marker one
else if (currentColor.toLowerCase() == theMarkColor.toLowerCase()) {
if (theAction == 'click') {
newColor = (thePointerColor != '')
? thePointerColor
: theDefaultColor;
}
} // end 4

// 5. Sets the new color...
if (newColor) {
var c = null;
// 5.1 ... with DOM compatible browsers except Opera
if (domDetect) {
for (c = 0; c < rowCellsCnt; c++) {
theCells[c].setAttribute('bgcolor', newColor, 0);
} // end for
}
// 5.2 ... with other browsers
else {
for (c = 0; c < rowCellsCnt; c++) {
theCells[c].style.backgroundColor = newColor;
}
}
} // end 5

return true;
} // end of the 'setPointer()' function

function checkAll(form, field, value)
{
	for (i = 0; i < form.elements.length; i++){
		if(form.elements[i].name == field)
			form.elements[i].checked = value;
	}
}

var popUpWin=0;
function IsPopupBlocker() {
	var strNewURL = "Dummy.htm;"
	var Strfeature = "" ;
	var WindowOpen = window.open
	(strNewURL,"MainWindow",Strfeature);
	try{
		var obj = WindowOpen.name;
		WindowOpen.close();
		//alert("Popup blocker NOT detected");
	} 
	catch(e){ 
		alert("System has been blocked by POP-UP BLOCKER.\nPlease disable the POP-UP BLOCKER and try again. ");
	}
}
function popUpWindow(URLStr, left, top, width, height)
{
  if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }
  popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,scrollbars=0,resizable=yes,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");

//status codes
//0 - pending
//1 - approved
//2 - deleted

	if ($_GET['approve']) {
		if ($_GET['friend_id']) {
			$sql = "UPDATE invitations SET approve = '1' WHERE member_id = '".$_SESSION['member_id']."' AND friend_id = '".$_GET['friend_id']."'";
			mysql_query($sql) or die(mysql_error());
			echo '<script>document.location.replace(\''.$_SERVER['PHP_SELF'].'\')</script>';
		} elseif ($_GET['group_id']) {
			$sql = "UPDATE invitations SET status = '1' WHERE member_id = '".$_SESSION['member_id']."' AND group_id = '".$_GET['group_id']."'";
			mysql_query($sql) or die(mysql_error());
			echo '<script>document.location.replace(\''.$_SERVER['PHP_SELF'].'\')</script>';
		}
	}
	if ($_GET['decline']) {
		if ($_GET['friend_id']) {
			$sql = "UPDATE invitations SET deleted = 1 WHERE member_id = '".$_SESSION['member_id']."' AND friend_id = '".$_GET['friend_id']."'";
			mysql_query($sql) or die(mysql_error());
			echo '<script>document.location.replace(\''.$_SERVER['PHP_SELF'].'\')</script>';
		} elseif ($_GET['group_id']) {
			$sql = "UPDATE invitations SET status = 2 WHERE member_id = '".$_SESSION['member_id']."' AND group_id = '".$_GET['group_id']."'";
			mysql_query($sql) or die(mysql_error());
			echo '<script>document.location.replace(\''.$_SERVER['PHP_SELF'].'\')</script>';
		}
	}
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='800'>";
  print "<tr>";
  print "<td width='200' valign='top'>";
  include("includes/right_menu.php");
  print "</td>";


  print "<td width='600' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Invitations</h3>";
  print "</td></tr>";

  print "<tr><td colspan='2' class='login'>";
  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";
  
	include("includes/people.class.php");

  $people = new people;
	
	$expired = time() - (3600*24*15);

?>

<?
	//approve
	$i = 1;
	$sql = "SELECT * FROM invitations WHERE
					((NOT approve AND friend_id AND NOT group_id AND NOT deleted) OR (NOT status AND is_invited)) AND member_id = ".$_SESSION['member_id']." AND date > ".$expired." ORDER BY date DESC";
	$res_g = mysql_query($sql);
?>
	Approve
	<table border="0" align="center" width="100%" cellpadding="0" cellspacing="2" bgcolor="#ffffff">
	<tr bgcolor="#6699CC">
		<td align="center"><b><font color='#FFFFFF'>Invitation by</font></b></td>
		<td align="center"><b><font color='#FFFFFF'>Type</font></b></td>
		<td align="center" width="120"><b><font color='#FFFFFF'>Date</font></b></td>
		<td width="60">&nbsp;</td>
		<td width="60">&nbsp;</td>
	</tr>
<?
	while ($f = mysql_fetch_array($res_g)) {
		$bg_color = ($i>0)?'#fdfdfd':'#f1f1f1';
		$i *= -1;
	
		if ($f['group_id']) {
			$sql = "SELECT * FROM groups g WHERE g.id = $f[group_id]";
			$mem = mysql_fetch_array(mysql_query($sql));
?>
	<tr bgcolor="<?=$bg_color?>" onmouseover="setPointer(this, 'over', '<?=$bg_color?>', '#DEEFFF', '');" onmouseout="setPointer(this, 'out', '<?=$bg_color?>', '#DEEFFF', '');" onmousedown="setPointer(this, 'click', '<?=$bg_color?>', '#DEEFFF', '');" class="txt_label">
		<td height="17">&nbsp;<label onclick="popUpWindow('./member_popup.php?member_id=<?=$mem['member_id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$people->get_name($f["friend_id"])?></label></td>
		<td>&nbsp;Group <b><label onclick="popUpWindow('./group_popup.php?group_id=<?=$mem['id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$mem['group_name']?></label></b> membership</td>
		<td align="center"><?=date('m/d/Y H:i:s',$f['date']);?></td>
		<td align="center"><a href="<?=$_SERVER['PHP_SELF']?>?approve=1&group_id=<?=$mem['id']?>">Approve</a></td>
		<td align="center"><a href="<?=$_SERVER['PHP_SELF']?>?decline=1&group_id=<?=$mem['id']?>">Decline</a></td>
	</tr>
<?
		} else {
			$sql = "SELECT * FROM members WHERE member_id = '".$f['friend_id']."'";
			$mem = mysql_fetch_array(mysql_query($sql));
?>
	<tr bgcolor="<?=$bg_color?>" onmouseover="setPointer(this, 'over', '<?=$bg_color?>', '#DEEFFF', '');" onmouseout="setPointer(this, 'out', '<?=$bg_color?>', '#DEEFFF', '');" onmousedown="setPointer(this, 'click', '<?=$bg_color?>', '#DEEFFF', '');" class="txt_label">
		<td height="17">&nbsp;<label onclick="popUpWindow('./member_popup.php?member_id=<?=$mem['member_id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$people->get_name($mem["member_id"])?></label></td>
		<td>&nbsp;Friendship</td>
		<td align="center"><?=date('m/d/Y H:i:s',$f['date']);?></td>
		<td align="center"><a href="<?=$_SERVER['PHP_SELF']?>?approve=1&friend_id=<?=$mem['member_id']?>">Approve</a></td>
		<td align="center"><a href="<?=$_SERVER['PHP_SELF']?>?decline=1&friend_id=<?=$mem['member_id']?>">Decline</a></td>
	</tr>
<?
		}
	}

?>
	</table>

<?
	//approved
	$i = 1;
	$sql = "SELECT * FROM invitations WHERE
					((approve AND friend_id AND NOT group_id) OR (status = 1 AND is_invited)) AND member_id = ".$_SESSION['member_id']." ORDER BY date DESC";
	$res_g = mysql_query($sql);
?>
	<br>
	Approved
	<table border="0" align="center" width="100%" cellpadding="0" cellspacing="2" bgcolor="#ffffff">
	<tr bgcolor="#6699CC">
		<td align="center"><b><font color='#FFFFFF'>Invitation by</font></b></td>
		<td align="center"><b><font color='#FFFFFF'>Type</font></b></td>
		<td align="center" width="120"><b><font color='#FFFFFF'>Date</font></b></td>
	</tr>
<?
	while ($f = mysql_fetch_array($res_g)) {
		$bg_color = ($i>0)?'#fdfdfd':'#f1f1f1';
		$i *= -1;
	
		if ($f['group_id']) {
			$sql = "SELECT * FROM groups g LEFT JOIN members m ON g.member_id = m.member_id WHERE g.id = $f[group_id]";
			$mem = mysql_fetch_array(mysql_query($sql));
?>
	<tr bgcolor="<?=$bg_color?>" onmouseover="setPointer(this, 'over', '<?=$bg_color?>', '#DEEFFF', '');" onmouseout="setPointer(this, 'out', '<?=$bg_color?>', '#DEEFFF', '');" onmousedown="setPointer(this, 'click', '<?=$bg_color?>', '#DEEFFF', '');" class="txt_label">
		<td height="17">&nbsp;<label onclick="popUpWindow('./member_popup.php?member_id=<?=$mem['member_id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$people->get_name($f["friend_id"])?></label></td>
		<td>&nbsp;Group <b><label onclick="popUpWindow('./group_popup.php?group_id=<?=$mem['id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$mem['group_name']?></label></b> membership</td>
		<td align="center"><?=date('m/d/Y H:i:s',$f['date']);?></td>
	</tr>
<?
		} else {
			$sql = "SELECT * FROM members WHERE member_id = '".$f['friend_id']."'";
			$mem = mysql_fetch_array(mysql_query($sql));
?>
	<tr bgcolor="<?=$bg_color?>" onmouseover="setPointer(this, 'over', '<?=$bg_color?>', '#DEEFFF', '');" onmouseout="setPointer(this, 'out', '<?=$bg_color?>', '#DEEFFF', '');" onmousedown="setPointer(this, 'click', '<?=$bg_color?>', '#DEEFFF', '');" class="txt_label">
		<td height="17">&nbsp;<label onclick="popUpWindow('./member_popup.php?member_id=<?=$mem['member_id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$people->get_name($mem["member_id"])?></label></td>
		<td>&nbsp;Friendship</td>
		<td align="center"><?=date('m/d/Y H:i:s',$f['date']);?></td>
	</tr>
<?
		}
	}

?>
	</table>


<?
	//declined
	$i = 1;
	$sql = "SELECT * FROM invitations WHERE
					((deleted AND friend_id) OR (status = 2 AND is_invited)) AND member_id = ".$_SESSION['member_id']." ORDER BY date DESC";
	$res_g = mysql_query($sql);
?>
	<br>
	Declined
	<table border="0" align="center" width="100%" cellpadding="0" cellspacing="2" bgcolor="#ffffff">
	<tr bgcolor="#6699CC">
		<td align="center"><b><font color='#FFFFFF'>Invitation by</font></b></td>
		<td align="center"><b><font color='#FFFFFF'>Type</font></b></td>
		<td align="center" width="120"><b><font color='#FFFFFF'>Date</font></b></td>
	</tr>
<?
	while ($f = mysql_fetch_array($res_g)) {
		$bg_color = ($i>0)?'#fdfdfd':'#f1f1f1';
		$i *= -1;
	
		if ($f['group_id']) {
			$sql = "SELECT * FROM groups g LEFT JOIN members m ON g.member_id = m.member_id WHERE g.id = $f[group_id]";
			$mem = mysql_fetch_array(mysql_query($sql));
?>
	<tr bgcolor="<?=$bg_color?>" onmouseover="setPointer(this, 'over', '<?=$bg_color?>', '#DEEFFF', '');" onmouseout="setPointer(this, 'out', '<?=$bg_color?>', '#DEEFFF', '');" onmousedown="setPointer(this, 'click', '<?=$bg_color?>', '#DEEFFF', '');" class="txt_label">
		<td height="17">&nbsp;<label onclick="popUpWindow('./member_popup.php?member_id=<?=$mem['member_id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$people->get_name($f["friend_id"])?></label></td>
		<td>&nbsp;Group <b><label onclick="popUpWindow('./group_popup.php?group_id=<?=$mem['id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$mem['group_name']?></label></b> membership</td>
		<td align="center"><?=date('m/d/Y H:i:s',$f['date']);?></td>
	</tr>
<?
		} else {
			$sql = "SELECT * FROM members WHERE member_id = '".$f['friend_id']."'";
			$mem = mysql_fetch_array(mysql_query($sql));
?>
	<tr bgcolor="<?=$bg_color?>" onmouseover="setPointer(this, 'over', '<?=$bg_color?>', '#DEEFFF', '');" onmouseout="setPointer(this, 'out', '<?=$bg_color?>', '#DEEFFF', '');" onmousedown="setPointer(this, 'click', '<?=$bg_color?>', '#DEEFFF', '');" class="txt_label">
		<td height="17">&nbsp;<label onclick="popUpWindow('./member_popup.php?member_id=<?=$mem['member_id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$people->get_name($mem["member_id"])?></label></td>
		<td>&nbsp;Friendship</td>
		<td align="center"><?=date('m/d/Y H:i:s',$f['date']);?></td>
	</tr>
<?
		}
	}

?>
	</table>


<?
	//expired
	$i = 1;
	$sql = "SELECT * FROM invitations WHERE
					((NOT approve AND friend_id) OR (NOT status AND is_invited)) AND member_id = ".$_SESSION['member_id']." AND date < ".$expired." ORDER BY date DESC";
	$res_g = mysql_query($sql);
?>
	<br>
	Expired
	<table border="0" align="center" width="100%" cellpadding="0" cellspacing="2" bgcolor="#ffffff">
	<tr bgcolor="#6699CC">
		<td align="center"><b><font color='#FFFFFF'>Invitation by</font></b></td>
		<td align="center"><b><font color='#FFFFFF'>Type</font></b></td>
		<td align="center" width="120"><b><font color='#FFFFFF'>Date</font></b></td>
	</tr>
<?
	while ($f = mysql_fetch_array($res_g)) {
		$bg_color = ($i>0)?'#fdfdfd':'#f1f1f1';
		$i *= -1;
	
		if ($f['group_id']) {
			$sql = "SELECT * FROM groups g LEFT JOIN members m ON g.member_id = m.member_id WHERE g.id = $f[group_id]";
			$mem = mysql_fetch_array(mysql_query($sql));
?>
	<tr bgcolor="<?=$bg_color?>" onmouseover="setPointer(this, 'over', '<?=$bg_color?>', '#DEEFFF', '');" onmouseout="setPointer(this, 'out', '<?=$bg_color?>', '#DEEFFF', '');" onmousedown="setPointer(this, 'click', '<?=$bg_color?>', '#DEEFFF', '');" class="txt_label">
		<td height="17">&nbsp;<label onclick="popUpWindow('./member_popup.php?member_id=<?=$mem['member_id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$people->get_name($f["friend_id"])?></label></td>
		<td>&nbsp;Group <b><label onclick="popUpWindow('./group_popup.php?group_id=<?=$mem['id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$mem['group_name']?></label></b> membership</td>
		<td align="center"><?=date('m/d/Y H:i:s',$f['date']);?></td>
	</tr>
<?
		} else {
			$sql = "SELECT * FROM members WHERE member_id = '".$f['friend_id']."'";
			$mem = mysql_fetch_array(mysql_query($sql));
?>
	<tr bgcolor="<?=$bg_color?>" onmouseover="setPointer(this, 'over', '<?=$bg_color?>', '#DEEFFF', '');" onmouseout="setPointer(this, 'out', '<?=$bg_color?>', '#DEEFFF', '');" onmousedown="setPointer(this, 'click', '<?=$bg_color?>', '#DEEFFF', '');" class="txt_label">
		<td height="17">&nbsp;<label onclick="popUpWindow('./member_popup.php?member_id=<?=$mem['member_id']?>', 200, 200, 300, 200);" style="cursor:pointer;" title="Click for details"><?=$people->get_name($mem["member_id"])?></label></td>
		<td>&nbsp;Friendship</td>
		<td align="center"><?=date('m/d/Y H:i:s',$f['date']);?></td>
	</tr>
<?
		}
	}

?>
	</table>
	

<?

  print "</td></tr>";
  print "</table>";

  print "</td></tr>";
  print "</table>";


?>
</table>
<!-- middle_content -->
<?php
include("includes/bottom.php");
}
?>
