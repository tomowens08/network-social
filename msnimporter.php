<?
function highlight($source,$startb,$end){
$rt=0; $start=0; $tmp=null; $skip=0; $exit=0;

if($startb==null){$start=1;}

while($exit==0&&strlen($source)>=$rt){
if($skip==0){
$dat=substr($source,$rt,1);
$data=substr($source,$rt,strlen($startb));
$datb=substr($source,$rt,strlen($end));

if($datb==$end&&($start==1)){break;} //break;
if($start==1){$tmp.=$dat;}
if($data==$startb&&$start==0){$skip=strlen($startb)-1; $start=1;}
}else{$skip-=1;}
$rt++;
}

return $tmp;
}


function highlightb($source,$startb,$end){
$rt=0; $start=0; $tmp=null; $skip=0; $exit=0;
$sok=0; $eok=0;
if($startb==null){$start=1;}

while($exit==0&&strlen($source)>=$rt){
if($skip==0){
$dat=substr($source,$rt,1);
$data=substr($source,$rt,strlen($startb));
$datb=substr($source,$rt,strlen($end));

if($datb==$end&&($start==1)){$eok=1; break;} //break;
if($start==1){$tmp.=$dat;}
if($data==$startb&&$start==0){$sok=1; $skip=strlen($startb)-1; $start=1;}
}else{$skip-=1;}
$rt++;
}

if($sok==1){$tmp=$startb.$tmp;}
if($eok==1){$tmp=$tmp.$end;}

return $tmp;
}

function getdata($email="",$password=""){
if(!strpos($email,"@")){$email.="@msn.com";}

   global $cookiepath,$scriptlocalpath;

   $cookie="MSNLoginCookie".md5(md5($email)."||".md5($password)); //do not delete the current filename. You may modify the front part
   $cookieb=$cookie;
   @unlink($scriptlocalpath.$cookieb);
   
   $cookie=($cookiepath.$cookie);

   $ch = curl_init();

   curl_setopt($ch, CURLOPT_VERBOSE, 1);
      curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, "PPStateXfer=1");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,0);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog MSN Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL,"https://login.live.com/login.srf?id=2&vv=400&lc=1033");
   curl_setopt($ch, CURLOPT_HEADER, TRUE);

   $returned = curl_exec($ch);

   curl_close ($ch);



   $getbk=highlight(str_replace("\n","",$returned),"action=\"https://login.live.com/ppsecure/post.srf?id=2&vv=400&lc=1033&bk=","\"");
   $getppsx=highlight(str_replace("\n","",$returned),"name=\"PPSX\" value=\"","\"");
   $tmpcode=highlight(str_replace("\n","",$returned),"<input type=\"hidden\" name=\"PPFT\" id=\"i0327\" value=\"","\"");


   $ch = curl_init();

   curl_setopt($ch, CURLOPT_VERBOSE, 1);
      	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_POST, 1);
   $post_data="login=".urlencode($email)."&passwd=".urlencode($password)."&PPSX=".urlencode($getppsx)."&LoginOptions=2&PPFT=".urlencode($tmpcode);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog MSN Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
   curl_setopt($ch, CURLOPT_URL,"https://msnia.login.live.com/ppsecure/post.srf?id=2&svc=mail&cbid=24325&msppjph=1&fs=1&fsa=1&fsat=1296000&_lang=EN&lc=1033&bk=".urlencode($getbk));
   curl_setopt($ch, CURLOPT_HEADER, TRUE);

   $returned = curl_exec($ch);
   $status=curl_getinfo($ch);
   curl_close ($ch);

   
   $link=highlight(str_replace("\n","",$returned),"<meta http-equiv=\"REFRESH\" content=\"0; URL=","\"");

   $ok=1;
   if(empty($link)){$ok=0;}
   if($ok==0){@unlink($scriptlocalpath.$cookieb); return false;}

   $ch = curl_init();

   curl_setopt($ch, CURLOPT_VERBOSE, 1);
      	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.5)");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL, $link);
   curl_setopt($ch, CURLOPT_HEADER, TRUE);

   $returned = curl_exec($ch);
   $status=curl_getinfo($ch);
   curl_close ($ch);

   $urldata=highlight(str_replace("\n","",$returned),"_UM=\"","\"");
   
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
      	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog MSN Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL,"http://by21fd.bay21.hotmail.msn.com/cgi-bin/AddressPicker?Context=InsertAddress&_HMaction=Edit&qF=to&".($urldata));

   $returned = curl_exec($ch);
   $status=curl_getinfo($ch);
   curl_close ($ch);

//now we have to parse the page to get the names and email addresses
//Start from the table where the info is held
//Note: Parsing Method differs from other email services. This parse code is specially designed for MSN Only!

   @unlink($scriptlocalpath.$cookieb);

$returnedb=$returned;

$parsed=highlightb($returned,"<select ","</select>");

$parsed=str_replace("this.selectedIndex>=0","",$parsed);
$parsed=str_replace("<option value=","<email ",$parsed);
$parsed=str_replace("</option>","</email>",$parsed);

$parsed=strip_tags($parsed,"<email>,<close>");

if(@$status['url']!="http://by21fd.bay21.hotmail.msn.com/cgi-bin/AddressPicker?Context=InsertAddress&_HMaction=Edit&qF=to&".($urldata)){

//login failed
return false;

}else{

if($parsed){return $parsed;}else{return true;}

}

}


//here's how you use this function, use mode=1 when you want to it to return an array of emails and use mode=0 to return an array of names
//note: the way they are sorted depend on Hotmail default setting.
function getinfo($parsed,$mode){




$parsedb=$parsed;
$rt=0; $tmprt=0;

$ary=Array(); $arynames=Array();

$tmp=null; $getmode=0;
while($rt!=strlen($parsedb)){
if(substr($parsedb,$rt,7)=="<email "&&$getmode==0){$tmp=null; $getmode=1;}
//get an email line to parse it
if($getmode==1){$tmp.=substr($parsedb,$rt,1);}


if(substr($parsedb,$rt-7,8)=="</email>"&&$getmode==1){
$getmode=0;
//parse it!

$email=html_entity_decode(highlight($tmp,"<email \"","\""));
$name=html_entity_decode(highlight($tmp,">"," &lt;"));



if($email!=null){
$gook=1;
$ll=0;
while($ll!=count($ary)){
if($ary[$ll+1]==$email){$gook=0;}
$ll++;
}

if($gook==1){
$ary[count($ary)+1]=$email;
$arynames[count($arynames)+1]=$name;
}
}





}


$rt++;
}










if($mode==1){return $ary;}elseif($mode==0){return $arynames;}

}



?>