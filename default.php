<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td height=1215 valign="top" bgcolor="#FFFFFF"> <blockquote>
<!-- middle_content -->

<TABLE cellSpacing=0 cellPadding=0 width=520 border=0>
<TBODY>

<TR>
<TD vAlign=top height='100%'>
<DIV align=center>
<TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>
<TBODY>
<?
$sql="select * from states";
$result=mysql_query($sql);
$a=0;
while($data_set=mysql_fetch_array($result))
{
if ($a%4==0)
{
print "</tr><tr>";
}
  print "<td width='33%'><DIV align=left>•&nbsp;<A href='join_us.php?country_id=".$data_set["state_id"]."' class=style8>".$data_set["state_name"]."</A></DIV></td>";
$a=$a+1;
}
?>

</TBODY></TABLE></DIV>

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
?>
