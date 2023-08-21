<? $yourname = "revellin.com";?>
<script language="JavaScript">
<!--

function SymError()
{
  return true;
}

window.onerror = SymError;

//-->
</script>

<Script language="javascript" type="text/javascript">
vars = new Object()
vars.which="nothing"

function chooseone(val,opt1,opt2)
{
var tempval=document.getElementById(val)
if(tempval.status)
return opt1;
else
return opt2;
}

function formswitch(which)
{
var tempval=document.getElementById('form_advanced')
tempval.style.display="none"
tempval="form_"+which
tempval=document.getElementById(tempval)
tempval.style.display="inline"
}



function getAbsoluteX (elm) {
var x = 0;
if (elm && typeof elm.offsetParent != "undefined") {
while (elm && typeof elm.offsetLeft == "number") {
x += elm.offsetLeft;
elm = elm.offsetParent;
}
}
return x;
}

function display(what,which)
{
var tempval=document.getElementById(what)
if(which==0)
tempval.style.display="none"
if(which==1)
tempval.style.display="inline"
if(which==2)
{
if(tempval.style.display=="none")
tempval.style.display="inline"
else
tempval.style.display="none"
}
}


function getAbsoluteY(elm) {
var y = 0;
if (elm && typeof elm.offsetParent != "undefined") {
while (elm && typeof elm.offsetTop == "number") {
y += elm.offsetTop;
elm = elm.offsetParent;
}
}
return y;
}

function showcolors(where,id)
{
var tableElm = document.getElementById(where);
var x = getAbsoluteX(tableElm);
var y = getAbsoluteY(tableElm);

var menuElm = document.getElementById("colorchart");
menuElm.style.left = x + "px";
menuElm.style.top = y + "px";
vars.which=id

var tempval=document.getElementById("colorchart")
tempval.style.display="inline"
}

function showcolors2(x,y,id)
{
var tempval=document.getElementById("colorchart")
tempval.style.top=y+document.body.scrollTop
tempval.style.left=x+document.body.scrollLeft
tempval.style.display="inline"
vars.which=id
}

function colorchoose(color)
{
var tempval=document.getElementById(vars.which)
tempval.value=color
}

function getvalue(what)
{
var tempval=document.getElementById(what)
return tempval.value;
}

function generatecode()
{
var font="font-family:"
var tempval_font=document.getElementById('font')
if(tempval_font.value=="other")
{
var tempval_otherfont=document.getElementById('otherfont')
font=font+tempval_otherfont.value
}
else
{
font=font+tempval_font.value
}
font=font+", arial, times new roman;"
if(tempval_font.value=="normal")
font=""

var tempval_mode=document.getElementById('mode')
if(tempval_mode.value=="advanced")
{
var str_01="a, a.man, a:link, a:visited{"+font+"color:"+getvalue('linktextcolor')+"; font-size:"+getvalue('linktextsize')+"; font-weight:"+chooseone('linktextbold',"bold","normal")+"; text-decoration:"+chooseone('linktextunderline',"underline","none")+"; font-style:"+chooseone('linktextitalic',"italic","normal")+"} a:active, a:hover{"+font+"color:"+getvalue('linktexthovercolor')+"; font-size:"+getvalue('linktexthoversize')+"; font-weight:"+chooseone('linktexthoverbold',"bold","normal")+"; text-decoration:"+chooseone('linktexthoverunderline',"underline","none")+"; font-style:"+chooseone('linktexthoveritalic',"italic","normal")+";}"
var str_02="td, table, tr, span, li, p, div, textarea, DIV {"+font+"color:"+getvalue('maintextcolor')+"; font-weight:"+chooseone('maintextbold',"bold","normal")+"; font-decoration:"+chooseone('maintextunderline',"underline","none")+"; font-style:"+chooseone('maintextitalic',"italic","normal")+";background-color:transparent} td, li, p, div, textarea {"+font+"border-color:"+getvalue('maintablebordercolor')+"} table{border-color:"+getvalue('secondarytablebordercolor')+"}"
var str_03="a.navbar{"+font+"font-size:"+getvalue('navigationlinktextsize')+"; font-weight:"+chooseone('navigationlinktextbold',"bold","normal")+"} a.navbar:link{color:"+getvalue('navigationlinktextcolor')+";} a.navbar:active{color:"+getvalue('navigationlinktexthovercolor')+";} a.navbar:visited{color:"+getvalue('navigationlinktextcolor')+";} a.navbar:hover{color:"+getvalue('navigationlinktexthovercolor')+";}"
var str_04="a.searchlinkSmall{"+font+"font-size:"+getvalue('interestslinktextsize')+"; text-decoration:"+chooseone('interestslinktextunderline',"underline","none")+"; font-weight:"+chooseone('interestslinktextbold',"bold","normal")+";} a.searchlinkSmall:link{color:"+getvalue('interestslinktextcolor')+"} a.searchlinkSmall:active{color:"+getvalue('interestslinktexthovercolor')+"} a.searchlinkSmall:visited{color:"+getvalue('interestslinktextcolor')+"} a.searchlinkSmall:hover{color:"+getvalue('interestslinktexthovercolor')+"}"
var str_05="body{"+font+"background-color:"+getvalue('bgcolor')+";background-image:url({bg_img_url}); background-position:"+chooseone('bgcenter',"center center","0%")+"; background-repeat:"+chooseone('bgcenter',"no-repeat","repeat")+"; background-attachment:"+getvalue('bgattachment')+";}"
var str_06=".nametext{"+font+"font-size:"+getvalue('nametextsize')+";color:"+getvalue('nametextcolor')+"; font-weight:"+chooseone('nametextbold',"bold","none")+";}"
var str_07=".blacktext10{"+font+"font-size:"+getvalue('commentdatetextsize')+"; color:"+getvalue('commentdatetextcolor')+"; font-weight:"+chooseone('commentdatetextbold',"bold","normal")+";}"
var str_08=".blacktext12{"+font+"font-size:"+getvalue('extendednetworktextsize')+"; color:"+getvalue('extendednetworktextcolor')+"; font-weight:"+chooseone('extendednetworktextbold',"bold","normal")+";}"
var str_09=".btext, .itext, .text{"+font+"font-size:"+getvalue('headlinetextsize')+"; color:"+getvalue('headlinetextcolor')+"; font-weight:"+chooseone('headlinetextbold',"bold","none")+";}"
var str_10=".orangetext15{"+font+"font-size:"+getvalue('headingstextsize')+"; color:"+getvalue('headingstextcolor')+"; font-weight:"+chooseone('headingstextbold',"bold","none")+";}"
var str_11=".lightbluetext8{"+font+"font-size:"+getvalue('interestsheadingstextsize')+"; color:"+getvalue('interestsheadingstextcolor')+"; font-weight:"+chooseone('interestsheadingstextbold',"bold","none")+";}"
var str_12=".tmz_imp{font-family:arial;color:FF0000;font-weight:bold}"
if (getvalue('bgcolor_heading')) {
	str_12 = str_12+".heading{background-color:"+getvalue('bgcolor_heading')+";}"
}
var str_13="<embed style='display:none' src='"+getvalue('bgmusicurl')+"' AUTOSTART='True' LOOP='"+getvalue('musicloop')+"'>"
var str_14=""
var str_15="a img{"
var str_16="a:hover img{"
var str_17="body{scrollbar-arrow-color:"+getvalue('maintextcolor')+";scrollbar-Track-Color:"+getvalue('bgcolor')+";scrollbar-Highlight-Color:"+getvalue('maintextcolor')+";scrollbar-base-color:"+getvalue('maintextcolor')+";scrollbar-Face-Color:"+getvalue('bgcolor')+";scrollbar-Shadow-Color:"+getvalue('maintextcolor')+";scrollbar-DarkShadow-Color:"+getvalue('maintextcolor')
if(getvalue('imageborders')=="1")
{
var str_15=str_15+"border-color:"+getvalue('imagebordercolor')+"; border-width:2px;border-style:solid;"
var str_16=str_16+"border-color:"+getvalue('imageborderhovercolor')+"; border-width:2px;border-style:solid;"
}
if(getvalue('imageeffects')=="1")
{
if(chooseone('imagelightup','1','0')=='1')
{
var str_15=str_15+"filter:Alpha(Opacity=60)"
var str_16=str_16+"filter:none"
}
}
var str_15=str_15+"}"
var str_16=str_16+"}"
}

if(tempval_mode.value=="simple")
{
var str_01="a, a.man, a:link, a:visited{"+font+"color:"+getvalue('linktextcolor')+"; font-size:"+getvalue('linktextsize')+"; font-weight:"+chooseone('linktextbold',"bold","normal")+"; text-decoration:"+chooseone('linktextunderline',"underline","none")+"; font-style:"+chooseone('linktextitalic',"italic","normal")+"} a:active, a:hover{"+font+"color:"+getvalue('linktexthovercolor')+"; font-size:"+getvalue('linktexthoversize')+"; font-weight:"+chooseone('linktexthoverbold',"bold","normal")+"; text-decoration:"+chooseone('linktexthoverunderline',"underline","none")+"; font-style:"+chooseone('linktexthoveritalic',"italic","normal")+";}"
var str_02="td, table, tr, span, li, p, div, textarea, DIV {"+font+"color:"+getvalue('maintextcolor')+"; font-weight:"+chooseone('maintextbold',"bold","normal")+"; font-decoration:"+chooseone('maintextunderline',"underline","none")+"; font-style:"+chooseone('maintextitalic',"italic","normal")+";background-color:transparent} td, li, p, div, textarea {"+font+"border-color:"+getvalue('linktextcolor')+"} table{border-color:"+getvalue('maintextcolor')+"}"
var str_03="a.navbar{"+font+"font-size:"+getvalue('linktextsize')+"; font-weight:"+chooseone('linktextbold',"bold","normal")+"} a.navbar:link{color:"+getvalue('linktextcolor')+";} a.navbar:active{color:"+getvalue('linktexthovercolor')+";} a.navbar:visited{color:"+getvalue('linktextcolor')+";} a.navbar:hover{color:"+getvalue('linktexthovercolor')+";}"
var str_04="a.searchlinkSmall{"+font+"font-size:"+getvalue('maintextsize')+"; text-decoration:"+chooseone('maintextunderline',"underline","none")+"; font-weight:"+chooseone('maintextbold',"bold","normal")+";} a.searchlinkSmall:link{color:"+getvalue('maintextcolor')+"} a.searchlinkSmall:active{color:"+getvalue('linktexthovercolor')+"} a.searchlinkSmall:visited{color:"+getvalue('maintextcolor')+"} a.searchlinkSmall:hover{color:"+getvalue('linktexthovercolor')+"}"
var str_05="body{"+font+"background-color:"+getvalue('bgcolor')+";background-image:url({bg_img_url}); background-position:"+chooseone('bgcenter',"center center","0%")+"; background-repeat:"+chooseone('bgcenter',"no-repeat","repeat")+"; background-attachment:"+getvalue('bgattachment')+";}"
var str_06=".nametext{"+font+"font-size:"+getvalue('maintextsize')+";color:"+getvalue('maintextcolor')+"; font-weight:"+chooseone('maintextbold',"bold","normal")+";}"
var str_07=".blacktext10{"+font+"font-size:"+getvalue('maintextsize')+"; color:"+getvalue('maintextcolor')+"; font-weight:"+chooseone('maintextbold',"bold","normal")+";}"
var str_08=".blacktext12{"+font+"font-size:"+getvalue('maintextsize')+"; color:"+getvalue('maintextcolor')+"; font-weight:"+chooseone('maintextbold',"bold","normal")+";}"
var str_09=".btext, .itext, .text{"+font+"font-size:"+getvalue('maintextsize')+"; color:"+getvalue('maintextcolor')+"; font-weight:"+chooseone('maintextbold',"bold","normal")+";}"
var str_10=".orangetext15{"+font+"color:"+getvalue('maintextcolor')+"; font-weight:"+chooseone('maintextbold',"bold","normal")+";}"
var str_11=".lightbluetext8{"+font+"font-size:"+getvalue('maintextsize')+"; color:"+getvalue('maintextcolor')+"; font-weight:"+chooseone('maintextbold',"bold","normal")+";}"
var str_12=".tmz_imp{font-family:arial;color:FF0000;font-weight:bold}"
if (getvalue('bgcolor_heading')) {
	str_12 = str_12+".heading{background-color:"+getvalue('bgcolor_heading')+";}"
}
var str_13="<embed style='display:none' src='"+getvalue('bgmusicurl')+"' AUTOSTART='True' LOOP='"+getvalue('musicloop')+"'>"
var str_14=""
var str_15="a img{"
var str_16="a:hover img{"
var str_17="body{scrollbar-arrow-color:"+getvalue('maintextcolor')+";scrollbar-Track-Color:"+getvalue('bgcolor')+";scrollbar-Highlight-Color:"+getvalue('maintextcolor')+";scrollbar-base-color:"+getvalue('maintextcolor')+";scrollbar-Face-Color:"+getvalue('bgcolor')+";scrollbar-Shadow-Color:"+getvalue('maintextcolor')+";scrollbar-DarkShadow-Color:"+getvalue('maintextcolor')
if(getvalue('imageborders')=="1")
{
var str_15=str_15+"border-color:"+getvalue('imagebordercolor')+"; border-width:2px;border-style:solid;"
var str_16=str_16+"border-color:"+getvalue('imageborderhovercolor')+"; border-width:2px;border-style:solid;"
}
if(getvalue('imageeffects')=="1")
{
if(chooseone('imagelightup','1','0')=='1')
{
var str_15=str_15+"filter:Alpha(Opacity=60)"
var str_16=str_16+"filter:none"
}
}
var str_15=str_15+"}"
var str_16=str_16+"}"
}

var tempval_codetext=document.getElementById('codetext')
tempval_codetext.value="<STYLE>"+str_01+str_02+str_03+str_04+str_05+str_06+str_07+str_08+str_09+str_10+str_11+str_12+str_15+str_16+str_17+"</STYLE>"+str_13+str_14
}

function autocopycode()
{
var tempval=document.getElementById('codetext')
if(!document.all)
alert('works only in IE!  Please copy manually...')
else
{
tempval=tempval.createTextRange()
tempval.execCommand("Copy")
}
}

function hide(what)
{
var tempval=document.getElementById(what)
tempval.style.display="none"
}
</Script>
<STYLE>
BODY{background-color:#FFFFFF;vertical-align:top;margin:0px;padding:0px}
.headline{background-color:transparent;color:#000000;font-family:arial,verdana,sans-serif;font-size:16pt;padding:0px 0px 0px 10px;border-style:none}
.title{background-color:#FF0000;color:#000000;font-family:arial,verdana,sans-serif;font-size:16pt;padding:0px 0px 0px 10px;border-style:none}
DIV.group{width:100%;background-color:#FFFFFF;border-style:solid;border-width:1px;border-color:#000000;padding:0px 0px 0px 0px}
TABLE.group{background-color:transparent;border-style:none;border-width:1px;border-color:#000000;margin:10px 0px 10px 0px}
.item{width:100%;background-color:#CCFFFF;color:#000000;font-family:arial,verdana,sans-serif;font-size:12pt;padding:4px 20px 4px 20px;margin:0px}
INPUT.input{background-color:#FFFFFF;border-style:solid;border-color:#000000;border-width:1px;paddding:4px 20px 4px 20px}
INPUT.button{background-color:#CCCCCC;border-style:none;border-color:#000000;border-width:1px;paddding:4px 20px 4px 20px}
TD.input{background-color:#FFFFFF;border-style:solid;border-color:#000000;border-width:1px;padding:4px 4px 4px 4px}
.onecolor{width:15px;height:8pt}
.colorchart{z-index:-30;display:none;width:100px;border-collapse:separate;cursor:default;background-color:#FFFFFF;z-index:30;position:absolute;cell-spacing:1px;cell-padding:1px;border-style:solid;border-width:2px;border-color:#000000}
.majortable{width:100%;vertical-align:top;padding:0px;margin:0px;cell-padding:0px;border-collapse:collapse;cell-padding:0px;cell-spacing:0px;border-style:none;border-width:1px;border-color:#000000}
.menutable{background-color:#FFFFFF;vertical-align:top;padding:0px;margin:0px;height:100%;border-style:solid;border-width:2px;border-color:#000000;border-collapse:collapse;cursor:default}
.menutitle{text-align:center;font-size:18pt;font-color:#000000;font-family:arial,sans-serif}
.actualmenu{background-color:#FFFFFF;padding:0px 20px 0px 0px;margin:0px;border-style:none;border-width:1px;border-color:#000000;border-collapse:collapse}
.menuitem{background-color:#FFFFFF;font-size:12pt;font-color:#000000;font-family:arial,sans-serif;padding:4px 20px 4px 4px;margin:0px;border-style:solid;border-width:1px 0px 1px 0px;border-color:#000000;border-collapse:collapse}
.actualbody{width:100%;padding:4px;margin:0px;border-style:none;border-width:1px;border-color:#000000}
.style2 {color: #E2E2E2}
</STYLE>
<table width="100%" class="txt_label" border="0" align="left" cellpadding="5" cellspacing="0">

<B>
Mode:&nbsp
<Select ID="mode" onChange="formswitch(getvalue('mode'))">
<option value="simple">Simple</option>

<option value="advanced">Advanced</option>
</Select>
<BR><BR>
<Span ID="form_simple" style="display:inline">
Background Color:&nbsp;
<INPUT ID="bgcolor" type="text">
<Input ID="colorpick1" class="choosebutton" type="button" Style="cursor:default" value="Choose Color" onClick="showcolors(id,'bgcolor')">
<BR><BR>
Background Image:&nbsp
<Select ID="bgimage" onChange="display('urldiv',getvalue('bgimage'))">
<Option value="0">Off</Option>
<Option value="1">On</Option>
</Select>
&nbsp&nbsp
<Span ID="urldiv" style="display:none">
<BR>
Image:&nbsp<input ID="bgimageurl" name="bgimageurl" type="file" size="30">
&nbsp;&nbsp;
Center:&nbsp;&nbsp;<INPUT ID="bgcenter" type="checkbox">
Attachment:
<Select ID="bgattachment">
<Option value="fixed">Fixed</Option>
<Option value="scroll">Scroll</Option>
</Select>
</Span>

<BR><BR>
Background Music:&nbsp
<Select ID="bgmusic" onChange="display('bgmusicdiv',getvalue('bgmusic'))">
<Option value="0">Off</Option>
<Option value="1">On</Option>
</Select>
&nbsp&nbsp
<Span ID="bgmusicdiv" style="display:none">
<BR>
Music URL:&nbsp<input ID="bgmusicurl" type="text" size="60">
&nbsp;&nbsp;
Loop:&nbsp;&nbsp;

<Select id="musicloop">
<Option value="1">On</Option>
<Option value="0">Off</Option>
</Select>
</Span>
<br><br>
Headings background color:&nbsp;
<INPUT ID="bgcolor_heading" type="text">
<Input ID="colorpick1" class="choosebutton" type="button" Style="cursor:default" value="Choose Color" onClick="showcolors(id,'bgcolor_heading')">
<BR><BR>
Font:&nbsp;
<Select ID="font" onChange="if(getvalue('font')=='other'){display('otherfont',1)}else{display('otherfont',0)}">
<Option value="normal">Normal</Option>
<Option value="arial">arial</Option>
<Option value="arial black">arial black</Option>

<Option value="comic sans ms">comic sans ms</Option>
<Option value="courier new">courier new</Option>
<Option value="georgia">georgia</Option>
<Option value="helvetica">helvetica</Option>
<Option value="impact">impact</Option>
<Option value="tahoma">tahoma</Option>
<Option value="times new roman">times new roman</Option>
<Option value="verdana">verdana</Option>
<Option value="webdings">webdings</Option>

<Option value="other">OTHER</Option>
</Select>
<input id="otherfont" type="text" Style="display:none">
<BR><BR>
Main text color:&nbsp&nbsp
<input ID="maintextcolor" type="text">
<Input ID="colorpick2" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'maintextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="maintextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>

<Option value="12pt">12pt</Option>
<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="maintextbold" type="checkbox">

<span class="reg_u">Underline</span>:<INPUT ID="maintextunderline" type="checkbox">
<I class="reg_u">Italic&nbsp</I>:<INPUT ID="maintextitalic" type="checkbox">
<BR><BR>
Link text color:&nbsp&nbsp
<INPUT ID="linktextcolor" type="text">
<Input ID="colorpick3" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'linktextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="linktextsize">
<Option value="8pt">8pt</Option>

<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>
<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>

<B>Bold</B>:<INPUT ID="linktextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="linktextunderline" type="checkbox">
<I class="reg_u">Italic&nbsp</I>:<INPUT ID="linktextitalic" type="checkbox">
<BR><BR>
Link text hover color:&nbsp&nbsp
<INPUT ID="linktexthovercolor" type="text">
<Input ID="colorpick4" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'linktexthovercolor')">
<BR>
Size:&nbsp&nbsp

<Select ID="linktexthoversize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>
<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>

<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="linktexthoverbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="linktexthoverunderline" type="checkbox">
<I class="reg_u">Italic&nbsp</I>:<INPUT ID="linktexthoveritalic" type="checkbox">
<BR><BR>
Image Borders (color change):&nbsp
<Select ID="imageborders" onChange="display('imagebordersdiv',getvalue('imageborders'))">
<Option value="0">Off</Option>

<Option value="1">On</Option>
</Select>
&nbsp&nbsp
<Span ID="imagebordersdiv" style="display:none">
<BR><BR>
Image border color:
<INPUT ID="imagebordercolor" type="text">
<Input ID="colorpick5" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'imagebordercolor')">
<BR><BR>
Image border hover color:
<INPUT ID="imageborderhovercolor" type="text">
<Input ID="colorpick6" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'imageborderhovercolor')">
</Span>
<BR><BR>
Image Effects:&nbsp

<Select ID="imageeffects" onChange="display('imageeffectssdiv',getvalue('imageeffects'))">
<Option value="0">Off</Option>
<Option value="1">On</Option>
</Select>
&nbsp&nbsp
<Span ID="imageeffectssdiv" style="display:none">
<BR><BR>
Translucent / light-up images:&nbsp;
<input ID="imagelightup" type="checkbox">
&nbsp;</Span></Span>
<Span ID="form_advanced" style="display:none">
<BR><BR>

Interests link text color:&nbsp&nbsp
<INPUT ID="interestslinktextcolor" type="text">
<Input ID="colorpick7" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'interestslinktextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="interestslinktextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>
<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>

<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="interestslinktextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="interestslinktextunderline" type="checkbox">
<I class="reg_u">Italic&nbsp</I>:<INPUT ID="interestslinktextitalic" type="checkbox">

<BR><BR>
Interests link text hover color:&nbsp&nbsp
<INPUT ID="interestslinktexthovercolor" type="text">
<Input ID="colorpick8" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'interestslinktexthovercolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="interestslinktexthoversize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>
<Option value="14pt">14pt</Option>

<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="interestslinktexthoverbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="interestslinktexthoverunderline" type="checkbox">

<I class="reg_u">Italic&nbsp</I>:<INPUT ID="interestslinktexthoveritalic" type="checkbox">
<BR><BR>
Navigation link text color:&nbsp&nbsp
<INPUT ID="navigationlinktextcolor" type="text">
<Input ID="colorpick9" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'navigationlinktextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="navigationlinktextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>

<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="navigationlinktextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="navigationlinktextunderline" type="checkbox">

<I class="reg_u">Italic&nbsp</I>:<INPUT ID="navigationlinktextitalic" type="checkbox">
<BR><BR>
Navigation link text hover color:&nbsp&nbsp
<INPUT ID="navigationlinktexthovercolor" type="text">
<Input ID="colorpick10" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'navigationlinktexthovercolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="navigationlinktexthoversize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>

<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="navigationlinktexthoverbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="navigationlinktexthoverunderline" type="checkbox">

<I class="reg_u">Italic&nbsp</I>:<INPUT ID="navigationlinktexthoveritalic" type="checkbox">
<BR><BR>
Main table border color:&nbsp
<INPUT ID="maintablebordercolor" type="text">
<Input ID="colorpick11" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'maintablebordercolor')">
<BR><BR>
Secondary table border color:&nbsp
<INPUT ID="secondarytablebordercolor" type="text">
<Input ID="colorpick12" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'secondarytablebordercolor')">
<BR><BR>
Name text color:&nbsp&nbsp
<INPUT ID="nametextcolor" type="text">

<Input ID="colorpick13" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'nametextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="nametextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>
<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>

<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="nametextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="nametextunderline" type="checkbox">
<I class="reg_u">Italic&nbsp</I>:<INPUT ID="nametextitalic" type="checkbox">
<BR><BR>

Comment date text color:&nbsp&nbsp
<INPUT ID="commentdatetextcolor" type="text">
<Input ID="colorpick14" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'commentdatetextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="commentdatetextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>
<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>

<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="commentdatetextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="commentdatetextunderline" type="checkbox">
<I class="reg_u">Italic&nbsp</I>:<INPUT ID="commentdatetextitalic" type="checkbox">

<BR><BR>
Headline text color:&nbsp&nbsp
<INPUT ID="headlinetextcolor" type="text">
<Input ID="colorpick15" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'headlinetextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="headlinetextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>
<Option value="14pt">14pt</Option>

<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="headlinetextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="headlinetextunderline" type="checkbox">

<I class="reg_u">Italic&nbsp</I>:<INPUT ID="headlinetextitalic" type="checkbox">
<BR><BR>
Headings text color:&nbsp&nbsp
<INPUT ID="headingstextcolor" type="text">
<Input ID="colorpick16" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'headingstextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="headingstextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>

<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="headingstextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="headingstextunderline" type="checkbox">

<I class="reg_u">Italic&nbsp</I>:<INPUT ID="headingstextitalic" type="checkbox">
<BR><BR>
Interests headings text color:&nbsp&nbsp
<INPUT ID="interestsheadingstextcolor" type="text">
<Input ID="colorpick17" type="button" Style="cursor:default" value="Choose Color"onClick="showcolors(id,'interestsheadingstextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="interestsheadingstextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>

<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="interestsheadingstextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="interestsheadingstextunderline" type="checkbox">

<I class="reg_u">Italic&nbsp</I>:<INPUT ID="interestsheadingstextitalic" type="checkbox">
<BR><BR>
Extended network text color:&nbsp&nbsp
<INPUT ID="extendednetworktextcolor" type="text">
<Input ID="colorpick18" type="button" Style="cursor:default" value="Choose Color" onClick="showcolors(id,'extendednetworktextcolor')">
<BR>
Size:&nbsp&nbsp
<Select ID="extendednetworktextsize">
<Option value="8pt">8pt</Option>
<Option value="10pt">10pt</Option>
<Option value="12pt">12pt</Option>

<Option value="14pt">14pt</Option>
<Option value="16pt">16pt</Option>
<Option value="18pt">18pt</Option>
<Option value="20pt">20pt</Option>
<Option value="36pt">36pt</Option>
<Option value="72pt">72pt</Option>
</Select>
<B>Bold</B>:<INPUT ID="extendednetworktextbold" type="checkbox">
<span class="reg_u">Underline</span>:<INPUT ID="extendednetworktextunderline" type="checkbox">

<I class="reg_u">Italic&nbsp</I>:<INPUT ID="extendednetworktextitalic" type="checkbox">
</Span>
<BR>
<Span ID="htmltext">
<BR>
</Span>
<BR>
<INPUT ID="generate" Type="button" class=txt_topic onClick="generatecode();this.form.submit();" value="Generate code"></B>
</FORM>

</TD>

</TR>
</TABLE>

<Table ID="colorchart" class="colorchart" onClick="display(id,0)">
<tr>
<TD colspan="6" onMouseOver="colorchoose('')" Style="background-color:#CCCCCC;height:15px;font-size:10pt;font-family:arial,sans-serif">
None</TD>
</TR>
<tr>
<td class="onecolor" style="background-color:#000000" onMouseOver="colorchoose('000000')"> </td>
<td class="onecolor" style="background-color:#333333" onMouseOver="colorchoose('333333')"> </td>
<td class="onecolor" style="background-color:#666666" onMouseOver="colorchoose('666666')"> </td>
<td class="onecolor" style="background-color:#999999" onMouseOver="colorchoose('999999')"> </td>

<td class="onecolor" style="background-color:#CCCCCC" onMouseOver="colorchoose('CCCCCC')"> </td>
<td class="onecolor" style="background-color:#FFFFFF" onMouseOver="colorchoose('FFFFFF')"> </td>
</tr><tr>
<td class="onecolor" style="background-color:#000000" onMouseOver="colorchoose('000000')"></td>
<td class="onecolor" style="background-color:#003300" onMouseOver="colorchoose('003300')"></td>
<td class="onecolor" style="background-color:#006600" onMouseOver="colorchoose('006600')"></td>
<td class="onecolor" style="background-color:#009900" onMouseOver="colorchoose('009900')"></td>
<td class="onecolor" style="background-color:#00CC00" onMouseOver="colorchoose('00CC00')"></td>
<td class="onecolor" style="background-color:#00FF00" onMouseOver="colorchoose('00FF00')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#000033" onMouseOver="colorchoose('000033')"></td>
<td class="onecolor" style="background-color:#003333" onMouseOver="colorchoose('003333')"></td>
<td class="onecolor" style="background-color:#006633" onMouseOver="colorchoose('006633')"></td>
<td class="onecolor" style="background-color:#009933" onMouseOver="colorchoose('009933')"></td>

<td class="onecolor" style="background-color:#00CC33" onMouseOver="colorchoose('00CC33')"></td>
<td class="onecolor" style="background-color:#00FF33" onMouseOver="colorchoose('00FF33')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#000066" onMouseOver="colorchoose('000066')"></td>
<td class="onecolor" style="background-color:#003366" onMouseOver="colorchoose('003366')"></td>
<td class="onecolor" style="background-color:#006666" onMouseOver="colorchoose('006666')"></td>
<td class="onecolor" style="background-color:#009966" onMouseOver="colorchoose('009966')"></td>
<td class="onecolor" style="background-color:#00CC66" onMouseOver="colorchoose('00CC66')"></td>
<td class="onecolor" style="background-color:#00FF66" onMouseOver="colorchoose('00FF66')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#000099" onMouseOver="colorchoose('000099')"></td>
<td class="onecolor" style="background-color:#003399" onMouseOver="colorchoose('003399')"></td>
<td class="onecolor" style="background-color:#006699" onMouseOver="colorchoose('006699')"></td>
<td class="onecolor" style="background-color:#009999" onMouseOver="colorchoose('009999')"></td>
<td class="onecolor" style="background-color:#00CC99" onMouseOver="colorchoose('00CC99')"></td>
<td class="onecolor" style="background-color:#00FF99" onMouseOver="colorchoose('00FF99')"></td>
</tr><tr>

<td class="onecolor" style="background-color:#0000CC" onMouseOver="colorchoose('0000CC')"></td>
<td class="onecolor" style="background-color:#0033CC" onMouseOver="colorchoose('0033CC')"></td>
<td class="onecolor" style="background-color:#0066CC" onMouseOver="colorchoose('0066CC')"></td>
<td class="onecolor" style="background-color:#0099CC" onMouseOver="colorchoose('0099CC')"></td>
<td class="onecolor" style="background-color:#00CCCC" onMouseOver="colorchoose('00CCCC')"></td>
<td class="onecolor" style="background-color:#00FFCC" onMouseOver="colorchoose('00FFCC')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#0000FF" onMouseOver="colorchoose('0000FF')"></td>
<td class="onecolor" style="background-color:#0033FF" onMouseOver="colorchoose('0033FF')"></td>
<td class="onecolor" style="background-color:#0066FF" onMouseOver="colorchoose('0066FF')"></td>
<td class="onecolor" style="background-color:#0099FF" onMouseOver="colorchoose('0099FF')"></td>
<td class="onecolor" style="background-color:#00CCFF" onMouseOver="colorchoose('00CCFF')"></td>
<td class="onecolor" style="background-color:#00FFFF" onMouseOver="colorchoose('00FFFF')"></td>

</tr><tr>
<td class="onecolor" style="background-color:#000000" onMouseOver="colorchoose('000000')"></td>
<td class="onecolor" style="background-color:#330000" onMouseOver="colorchoose('330000')"></td>

<td class="onecolor" style="background-color:#660000" onMouseOver="colorchoose('660000')"></td>
<td class="onecolor" style="background-color:#990000" onMouseOver="colorchoose('990000')"></td>
<td class="onecolor" style="background-color:#CC0000" onMouseOver="colorchoose('CC0000')"></td>
<td class="onecolor" style="background-color:#FF0000" onMouseOver="colorchoose('FF0000')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#000033" onMouseOver="colorchoose('000033')"></td>
<td class="onecolor" style="background-color:#330033" onMouseOver="colorchoose('330033')"></td>
<td class="onecolor" style="background-color:#660033" onMouseOver="colorchoose('660033')"></td>
<td class="onecolor" style="background-color:#990033" onMouseOver="colorchoose('CC0033')"></td>
<td class="onecolor" style="background-color:#CC0033" onMouseOver="colorchoose('CC0033')"></td>
<td class="onecolor" style="background-color:#FF0033" onMouseOver="colorchoose('FF0033')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#000066" onMouseOver="colorchoose('000066')"></td>
<td class="onecolor" style="background-color:#330066" onMouseOver="colorchoose('330066')"></td>
<td class="onecolor" style="background-color:#660066" onMouseOver="colorchoose('660066')"></td>
<td class="onecolor" style="background-color:#990066" onMouseOver="colorchoose('990066')"></td>
<td class="onecolor" style="background-color:#CC0066" onMouseOver="colorchoose('CC0066')"></td>

<td class="onecolor" style="background-color:#FF0066" onMouseOver="colorchoose('FF0066')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#000099" onMouseOver="colorchoose('000099')"></td>
<td class="onecolor" style="background-color:#330099" onMouseOver="colorchoose('330099')"></td>
<td class="onecolor" style="background-color:#660099" onMouseOver="colorchoose('660099')"></td>
<td class="onecolor" style="background-color:#990099" onMouseOver="colorchoose('990099')"></td>
<td class="onecolor" style="background-color:#CC0099" onMouseOver="colorchoose('CC0099')"></td>
<td class="onecolor" style="background-color:#FF0099" onMouseOver="colorchoose('FF0099')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#0000CC" onMouseOver="colorchoose('0000CC')"></td>
<td class="onecolor" style="background-color:#3300CC" onMouseOver="colorchoose('3300CC')"></td>
<td class="onecolor" style="background-color:#6600CC" onMouseOver="colorchoose('6600CC')"></td>
<td class="onecolor" style="background-color:#9900CC" onMouseOver="colorchoose('9900CC')"></td>
<td class="onecolor" style="background-color:#CC00CC" onMouseOver="colorchoose('CC00CC')"></td>
<td class="onecolor" style="background-color:#FF00CC" onMouseOver="colorchoose('FF00CC')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#0000FF" onMouseOver="colorchoose('0000FF')"></td>

<td class="onecolor" style="background-color:#3300FF" onMouseOver="colorchoose('3300FF')"></td>
<td class="onecolor" style="background-color:#6600FF" onMouseOver="colorchoose('6600FF')"></td>
<td class="onecolor" style="background-color:#9900FF" onMouseOver="colorchoose('9900FF')"></td>
<td class="onecolor" style="background-color:#CC00FF" onMouseOver="colorchoose('CC00FF')"></td>
<td class="onecolor" style="background-color:#FF00FF" onMouseOver="colorchoose('FF00FF')"></td>

<tr>
<td class="onecolor" style="background-color:#000000" onMouseOver="colorchoose('000000')"></td>
<td class="onecolor" style="background-color:#330000" onMouseOver="colorchoose('330000')"></td>
<td class="onecolor" style="background-color:#660000" onMouseOver="colorchoose('660000')"></td>
<td class="onecolor" style="background-color:#990000" onMouseOver="colorchoose('990000')"></td>
<td class="onecolor" style="background-color:#CC0000" onMouseOver="colorchoose('CC0000')"></td>
<td class="onecolor" style="background-color:#FF0000" onMouseOver="colorchoose('FF0000')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#003300" onMouseOver="colorchoose('003300')"></td>
<td class="onecolor" style="background-color:#333300" onMouseOver="colorchoose('333300')"></td>
<td class="onecolor" style="background-color:#663300" onMouseOver="colorchoose('663300')"></td>

<td class="onecolor" style="background-color:#993300" onMouseOver="colorchoose('993300')"></td>
<td class="onecolor" style="background-color:#CC3300" onMouseOver="colorchoose('CC3300')"></td>
<td class="onecolor" style="background-color:#FF3300" onMouseOver="colorchoose('FF3300')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#006600" onMouseOver="colorchoose('006600')"></td>
<td class="onecolor" style="background-color:#336600" onMouseOver="colorchoose('336600')"></td>
<td class="onecolor" style="background-color:#666600" onMouseOver="colorchoose('666600')"></td>
<td class="onecolor" style="background-color:#996600" onMouseOver="colorchoose('996600')"></td>
<td class="onecolor" style="background-color:#CC6600" onMouseOver="colorchoose('CC6600')"></td>
<td class="onecolor" style="background-color:#FF6600" onMouseOver="colorchoose('FF6600')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#009900" onMouseOver="colorchoose('009900')"></td>
<td class="onecolor" style="background-color:#339900" onMouseOver="colorchoose('339900')"></td>
<td class="onecolor" style="background-color:#669900" onMouseOver="colorchoose('669900')"></td>
<td class="onecolor" style="background-color:#999900" onMouseOver="colorchoose('999900')"></td>
<td class="onecolor" style="background-color:#CC9900" onMouseOver="colorchoose('CC9900')"></td>
<td class="onecolor" style="background-color:#FF9900" onMouseOver="colorchoose('FF9900')"></td>

</tr><tr>
<td class="onecolor" style="background-color:#00CC00" onMouseOver="colorchoose('00CC00')"></td>
<td class="onecolor" style="background-color:#33CC00" onMouseOver="colorchoose('33CC00')"></td>
<td class="onecolor" style="background-color:#66CC00" onMouseOver="colorchoose('66CC00')"></td>
<td class="onecolor" style="background-color:#99CC00" onMouseOver="colorchoose('99CC00')"></td>
<td class="onecolor" style="background-color:#CCCC00" onMouseOver="colorchoose('CCCC00')"></td>
<td class="onecolor" style="background-color:#FFCC00" onMouseOver="colorchoose('FFCC00')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#00FF00" onMouseOver="colorchoose('00FF00')"></td>
<td class="onecolor" style="background-color:#33FF00" onMouseOver="colorchoose('33FF00')"></td>
<td class="onecolor" style="background-color:#66FF00" onMouseOver="colorchoose('66FF00')"></td>
<td class="onecolor" style="background-color:#99FF00" onMouseOver="colorchoose('99FF00')"></td>
<td class="onecolor" style="background-color:#CCFF00" onMouseOver="colorchoose('CCFF00')"></td>
<td class="onecolor" style="background-color:#FFFF00" onMouseOver="colorchoose('FFFF00')"></td>
</tr><tr>
<td class="onecolor" style="background-color:#E9F3F3" onMouseOver="colorchoose('E9F3F3')"></td>
<td class="onecolor" style="background-color:#E2E2E2" onMouseOver="colorchoose('E2E2E2')"></td>
<td class="onecolor" style="background-color:#99CC99" onMouseOver="colorchoose('99CC99')"></td>
<td class="onecolor" style="background-color:#F9EAFB" onMouseOver="colorchoose('F9EAFB')"></td>
<td class="onecolor" style="background-color:#F9EFC8" onMouseOver="colorchoose('F9EFC8')"></td>
<td class="onecolor" style="background-color:#EAEBC7" onMouseOver="colorchoose('EAEBC7')"></td>
</tr>
</TABLE>