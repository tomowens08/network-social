<!-- HTML Editor Starts -->

<TABLE id=tblCoolbar cellSpacing=0 cellPadding=0 width=475>
<TBODY>
<TR vAlign=center><TD colSpan=9><SELECT onchange="cmdExec('formatBlock',this[this.selectedIndex].value);" id=select1 name=select1>
<OPTION selected>Style</OPTION>
<OPTION value=Normal>Normal</OPTION>
<OPTION value='Heading 1'>Heading 1</OPTION>
<OPTION value='Heading 2'>Heading 2</OPTION>
<OPTION value='Heading 3'>Heading 3</OPTION>
<OPTION value='Heading 4'>Heading 4</OPTION>
<OPTION value='Heading 5'>Heading 5</OPTION>
<OPTION value='Address'>Address</OPTION>
<OPTION value='Formatted'>Formatted</OPTION>
<OPTION value='Definition Term'>Definition Term</OPTION>
</SELECT>

<SELECT onchange="cmdExec('fontname',this[this.selectedIndex].value);" name=select>
<OPTION selected>Font</OPTION>
<OPTION value=Verdana>Verdana</OPTION>
<OPTION value=Arial>Arial</OPTION>
</SELECT>

<SELECT onchange="cmdExec('fontsize',this[this.selectedIndex].value);" id=select1 name=select1>
<OPTION selected>Size</OPTION> <OPTION value=1>1</OPTION>
<OPTION value=2>2</OPTION> <OPTION value=3>3</OPTION>
<OPTION value=4>4</OPTION> <OPTION value=5>5</OPTION>
<OPTION value=6>6</OPTION> <OPTION value=7>7</OPTION>
</SELECT>

</TD></TR>
<TR BGCOLOR='#FFFFFF'>
<TD>

<DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('cut')" onmouseout=button_out(this);>
<IMG alt=Cut src='images/Cut.gif'> </DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('copy')" onmouseout=button_out(this);>
<IMG alt=Copy src='images/Copy.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('paste')" onmouseout=button_out(this);>
<IMG alt=Paste src='images/Paste.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('bold')" onmouseout=button_out(this);>
<IMG alt=Bold src='images/Bold.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('italic')" onmouseout=button_out(this);>
<IMG alt=Italic src='images/Italic.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('underline')" onmouseout=button_out(this);>
<IMG alt=Underline src='images/Under.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('justifyleft')" onmouseout=button_out(this);>
<IMG alt='Justify Left' src='images/Left.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('justifycenter')" onmouseout=button_out(this);>
<IMG alt=Center src='images/Center.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('justifyright')" onmouseout=button_out(this);>
<IMG alt='Justify Right' src='images/Right.gif'></DIV></TD>



<TD></TD></TR>
<tr bgcolor='#ffffff'>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('insertorderedlist')" onmouseout=button_out(this);>
<IMG alt='Ordered List' src='images/numlist.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('insertunorderedlist')" onmouseout=button_out(this);>
<IMG alt='Unordered List' src='images/bullist.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('outdent')" onmouseout=button_out(this);>
<IMG alt='Decrease Indent' src='images/deindent.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('indent')" onmouseout=button_out(this);>
<IMG alt='Increase Indent' src='images/inindent.gif'></DIV></TD>
<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=foreColor() onmouseout=button_out(this);>
<IMG alt=Forecolor src='images/fgcolor.gif' align=absMiddle></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="cmdExec('createLink')" onmouseout=button_out(this);>
<IMG alt=Link src='images/Link.gif'></DIV></TD>

<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick="insertImage()" onmouseout=button_out(this);>
<IMG alt='Insert Image' src='images/image.gif'></DIV></TD>

<TD>&nbsp;</TD>
<TD>&nbsp;</TD>

</tr>
</TBODY></TABLE>

</font></td>
</tr>


<tr><td width='100%' colspan='2'>
<IFRAME class=tblCoolbar id=idContent src='images/temp.htm' width="600"  height="200"></IFRAME>
</td></tr>
<INPUT id=details type=hidden name=details>

<tr><td width='100%' colspan='2'><FONT color=#005b90>Edit Html:</FONT><INPUT onclick=javascript:changeMode() type=checkbox name=html>
</TD></TR>
<tr><td width='100%' colspan='2'>&nbsp;</td></tr>
<tr><td width='100%' colspan='2'>
<INPUT id=Submit type=hidden value='Add Your Advertisement' name=Submit>
<INPUT id=action type=hidden value=edit name=action>
