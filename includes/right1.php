<!-- right.php -->
<TR>
<TD vAlign=center height=0>&nbsp;</TD>
<TD vAlign=top width=197 bgColor=#ccccfe rowSpan=3>
<DIV align=center>
<?php
if($_SESSION["logged_in"]<>"yes")
{
?>
<P><A class=style5 href="login.php"><BR>Member Sign In<BR><BR><BR></A></P>
<TABLE cellSpacing=0 cellPadding=0 width=160 border=0>
<TBODY>
<TR>
<TD width=160>
<DIV align=left><SPAN class=style1>Join For Free</SPAN> <SPAN class=style1><BR>• Find old friends<BR>• Millions of people listed + &nbsp;&nbsp;growing <BR>• Up to 200,000 schools and &nbsp;&nbsp;colleges <BR>• Find old friends <BR>• Meet your friends friends <BR>• Suggest matches between &nbsp;&nbsp;your friends <BR>• Message boards and &nbsp;&nbsp;journals</SPAN></DIV></TD></TR></TBODY></TABLE>
<P><BR><BR></A></P></DIV></TD></TR>
<TR>
<TD vAlign=top height="100%">
<DIV align=center>
<?
}
else
{
?>
<TABLE cellSpacing=0 cellPadding=0 width=160 border=0>
<TBODY>
<TR>
<TD width=160>
<DIV align=left><SPAN class=style1></SPAN></DIV></TD></TR></TBODY></TABLE>
<P><BR><BR></A></P></DIV></TD></TR>
<TR>
<TD vAlign=top height="100%">
<DIV align=center>
<?
}
?>

<!-- right.php -->
