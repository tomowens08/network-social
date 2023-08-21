<SCRIPT language=JavaScript>
<!-- SCRIPT.PHP
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
--> SCRIPT.PHP
</SCRIPT>


<SCRIPT language=JavaScript>
//<!--  SCRIPT.PHP
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
        var sImgSrc=prompt("Insert Image File (You can use your local image file) : ", "");
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

//-->  SCRIPT.PHP
</SCRIPT>
