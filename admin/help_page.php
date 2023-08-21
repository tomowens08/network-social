<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
<SCRIPT language=JavaScript>
<!--
function SelectOption(OptionListName, ListVal)
{
for (i=0; i < OptionListName.length; i++)
{
if (OptionListName.options[i].value == ListVal)
{
OptionListName.selectedIndex = i;
break;
}
}
}
-->
</SCRIPT>


<SCRIPT language=JavaScript>
//<!--
function button_over(eButton)
        {
        eButton.style.backgroundColor = "#B5BDD6";
        eButton.style.borderColor = "darkblue darkblue darkblue darkblue";
        }
function button_out(eButton)
        {
        eButton.style.backgroundColor = "threedface";
        eButton.style.borderColor = "threedface";
        }
function button_down(eButton)
        {
        eButton.style.backgroundColor = "#8494B5";
        eButton.style.borderColor = "darkblue darkblue darkblue darkblue";
        }
function button_up(eButton)
        {
        eButton.style.backgroundColor = "#B5BDD6";
        eButton.style.borderColor = "darkblue darkblue darkblue darkblue";
        eButton = null; 
        }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

var isHTMLMode=false;

function document.onreadystatechange()
        {
        idContent.document.designMode="On";
        }
function cmdExec(cmd,opt) 
        {
        if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return;}
        idContent.document.execCommand(cmd,"",opt);idContent.focus();
        }
function setMode(bMode)
        {
        var sTmp;
        isHTMLMode = bMode;
        if (isHTMLMode){sTmp=idContent.document.body.innerHTML;idContent.document.body.innerText=sTmp;} 
        else {sTmp=idContent.document.body.innerText;idContent.document.body.innerHTML=sTmp;}
        idContent.focus();
        }
function createLink()
        {
        if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return;}
        cmdExec("CreateLink");
        }
function insertImage()
        {
        if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return;}
        var sImgSrc=prompt("Insert Image File (You can use your local image file) : ", "http://www.loveludhiana.com/sample.jpg");
        if(sImgSrc!=null) cmdExec("InsertImage",sImgSrc);
        }
function Save() 
        {
        if (isHTMLMode){alert("Please uncheck 'Edit HTML'");return;}

        document.myForm.data.value=idContent.document.body.innerHTML;
        }
function foreColor()
        {
        var arr = showModalDialog("selcolor.htm","","font-family:Verdana; font-size:12; dialogWidth:30em; dialogHeight:34em" );
        if (arr != null) cmdExec("ForeColor",arr);      
        }
function changeMode()
        {
                if (document.theForm.html.checked)
                        setMode(true);
                else
                        setMode(false); 
        }

//-->   
</SCRIPT>
</HEAD>
<BODY>
<?php
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Change Help page</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";

  print "<form name='theForm' action='help_page1.php' method='post'>";
  include("includes/conn.php");
        $sql="select * from help";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);


  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top'><p align='left'>Help Text :</p></td>";
  print "<td class='text'>&nbsp;</td>";
  print "</tr>";

  print "<tr bgColor='#ffffff'>";
  print "<td class='smalltext' vAlign='top' colspan='2'>";

// HTML Editor Code
  print "<TABLE id=tblCoolbar cellSpacing=0 cellPadding=0 width=542>";
  print "<TBODY>";
  print "<TR vAlign=center><TD colSpan=16><SELECT onchange=\"cmdExec('formatBlock',this[this.selectedIndex].value);\" id=select1 name=select1>";
  print "<OPTION selected>Style</OPTION>";
  print "<OPTION value=Normal>Normal</OPTION>";
  print "<OPTION value='Heading 1'>Heading 1</OPTION>";
  print "<OPTION value='Heading 2'>Heading 2</OPTION>";
  print "<OPTION value='Heading 3'>Heading 3</OPTION>";
  print "<OPTION value='Heading 4'>Heading 4</OPTION>";
  print "<OPTION value='Heading 5'>Heading 5</OPTION>";
  print "<OPTION value='Address'>Address</OPTION>";
  print "<OPTION value='Formatted'>Formatted</OPTION>";
  print "<OPTION value='Definition Term'>Definition Term</OPTION>";
  print "</SELECT>";

  print "<SELECT onchange=\"cmdExec('fontname',this[this.selectedIndex].value);\" name=select>\")";
  print "<OPTION selected>Font</OPTION>";
  print "<OPTION value=Verdana>Verdana</OPTION>";
  print "<OPTION value=Arial>Arial</OPTION>";
  print "</SELECT>";

  print "<SELECT onchange=\"cmdExec('fontsize',this[this.selectedIndex].value);\" id=select1 name=select1>";
  print "<OPTION selected>Size</OPTION> <OPTION value=1>1</OPTION>";
  print "<OPTION value=2>2</OPTION> <OPTION value=3>3</OPTION>";
  print "<OPTION value=4>4</OPTION> <OPTION value=5>5</OPTION>";
  print "<OPTION value=6>6</OPTION> <OPTION value=7>7</OPTION>";
  print "</SELECT>";

  print "</TD></TR>";
  print "<TR><TD>";

  print "<DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('cut')\" onmouseout=button_out(this);>";
  print "<IMG alt=Cut hspace=1 src='images/Cut.gif' align=absMiddle vspace=1> </DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('copy')\" onmouseout=button_out(this);>";
  print "<IMG alt=Copy hspace=1 src='images/Copy.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('paste')\" onmouseout=button_out(this);>";
  print "<IMG alt=Paste hspace=1 src='images/Paste.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('bold')\" onmouseout=button_out(this);>";
  print "<IMG alt=Bold hspace=1 src='images/Bold.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('italic')\" onmouseout=button_out(this);>";
  print "<IMG alt=Italic hspace=1 src='images/Italic.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('underline')\" onmouseout=button_out(this);>";
  print "<IMG alt=Underline hspace=1 src='images/Under.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('justifyleft')\" onmouseout=button_out(this);>";
  print "<IMG alt='Justify Left' hspace=1 src='images/Left.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('justifycenter')\" onmouseout=button_out(this);>";
  print "<IMG alt=Center hspace=1 src='images/Center.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('justifyright')\" onmouseout=button_out(this);>";
  print "<IMG alt='Justify Right' hspace=1 src='images/Right.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('insertorderedlist')\" onmouseout=button_out(this);>";
  print "<IMG height=22 alt='Ordered List' hspace=2 src='images/numlist.gif' width=23 align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('insertunorderedlist')\" onmouseout=button_out(this);>";
  print "<IMG height=22 alt='Unordered List' hspace=2 src='images/bullist.gif' width=23 align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('outdent')\" onmouseout=button_out(this);>";
  print "<IMG alt='Decrease Indent' hspace=2 src='images/deindent.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('indent')\" onmouseout=button_out(this);>";
  print "<IMG alt='Increase Indent' hspace=2 src='images/inindent.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=foreColor() onmouseout=button_out(this);>";
  print "<IMG alt=Forecolor hspace=2 src='images/fgcolor.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"cmdExec('createLink')\" onmouseout=button_out(this);>";
  print "<IMG alt=Link hspace=2 src='images/Link.gif' align=absMiddle vspace=1></DIV></TD>";

  print "<TD><DIV onmouseup=button_up(this); class=cbtn onmousedown=button_down(this); onmouseover=button_over(this); onclick=\"insertImage()\" onmouseout=button_out(this);>";
  print "<IMG alt='Insert Image' hspace=2 src='images/image.gif' align=absMiddle vspace=1></DIV></TD>";



  print "<TD></TD></TR></TBODY></TABLE>";

  print "<IFRAME class=tblCoolbar id=idContent src='includes/help.php' width=650 height=800></IFRAME>";
  print "<INPUT id=details type=hidden name=details></TD></TR>";
  print "<TR><TD align=right height=22><FONT color=#005b90>Edit Html:</FONT></TD>";
  print "<TD height=22><INPUT onclick=javascript:changeMode() type=checkbox name=html> </TD></TR>";
  print "<TR><TD align=right height=22>&nbsp;</TD><TD height=22>";
  print "<INPUT id=Submit type=hidden value='Add Event' name=Submit>";
  print "<INPUT id=action type=hidden value=edit name=action>";
  print "<INPUT class=flat id=Submit onclick=document.theForm.details.value=idContent.document.body.innerHTML; type=submit value='Change help page' name=Submit></TD></TR></TBODY></TABLE></TD></FORM></TR>";
  print "<TR><TD borderColor=#ffffff bgColor=#99c6e2>&nbsp;</TD></TR></TBODY></TABLE>";

// HTML Editor Code Ends



  print "</td>";
  print "</tr>";
  print "</table></table>";
  print "</form>";
} 

?>


</BODY>
</HTML>

