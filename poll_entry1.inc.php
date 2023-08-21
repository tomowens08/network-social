<form action='poll_2.php' method='post' name='poll'>
<table id='to1' width='150' border='0' cellpadding='3' cellspacing='0'>
<tr><td><font size='12px'><strong>Test 1</strong></font></h2></td></tr>
<tr><td>Test question?</td></tr>
<tr><td><input type='radio' name='choice' value='0' onchange="document.poll.btnSub.disabled=''" />yes<br/>
<input type='radio' name='choice' value='1' onchange="document.poll.btnSub.disabled=''" />no<br/>
<input type='radio' name='choice' value='2' onchange="document.poll.btnSub.disabled=''" />maybe<br/>
</td></tr>
<tr><td align='center'><input type='submit' value='Submit' disabled='disabled' name='btnSub' style='background:#; border:  solid ' /></td></tr>
</table>
</form>