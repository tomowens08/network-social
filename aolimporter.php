<?
function highlight($source,$startb,$end){
$rt=0; $start=0; $tmp=null; $skip=0; $exit=0;

if($startb==null){$start=1;}

while($exit==0&&strlen($source)>=$rt){
if($skip==0){
$dat=substr($source,$rt,1);
$data=substr($source,$rt,strlen($startb));
$datb=substr($source,$rt,strlen($end));

if($end!=null&&$datb==$end&&($start==1)){break;} //break;
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

function getfromdt($ary,$col){
$newary=Array();
$rt=0;

while($rt<count($ary)){
$rt++;
$return=null;
//get name here
if($col==3){$return=highlight(@$ary[$rt],"<span class=\"fullName\">","</span>");}


//get email here
if($col==4){
$return=highlight(@$ary[$rt],"<span>Email 1:</span> <span>","</span>");
if($return==null){
$return=highlight(@$ary[$rt],"<span>Email 2:</span> <span>","</span>");
if($return==null){
$return=highlight(@$ary[$rt],"<span>Screen Name:</span> <span>","</span>");
}
}
}

$newary[count($newary)+1]=$return;
}
return $newary;
}

function striplr($data){
$data=substr($data,1,strlen($data)-2);
$data=str_replace("\"\"","\"",$data);
return $data;
}

function getdata($email="",$password=""){
   global $cookiepath,$scriptlocalpath;

   $cookie="AolLoginCookie".md5(md5($email)."||".md5($password)); //do not delete the current filename. You may modify the front part
   $cookieb=$cookie;
   @unlink($scriptlocalpath.$cookieb);
   
   $cookie=($cookiepath.$cookie);


   $ch = curl_init();

   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
   curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_POST, 0);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,0);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog Aol Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL,"https://my.screenname.aol.com/_cqr/login/login.psp?mcState=initialized&uitype=mini&sitedomain=registration.aol.com&authLev=1&seamless=novl&lang=en&locale=us");
   curl_setopt($ch, CURLOPT_HEADER, FALSE);

   $returned = curl_exec($ch);
   curl_close ($ch);


   $usrd=highlight($returned,"<input type=\"hidden\" name=\"usrd\" value=\"","\"");


   $ch = curl_init();
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
   curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, "sitedomain=registration.aol.com&use_aam=0&usrd=".urlencode($usrd)."&isSiteStateEncoded=true&mcState=initialized&uitype=mini&lang=en&locale=us&authLev=1&loginId=".urlencode($email)."&password=".urlencode($password));
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog AOL Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL,"https://my.screenname.aol.com/_cqr/login/login.psp");
   curl_setopt($ch, CURLOPT_HEADER, TRUE);
   $returned = curl_exec($ch);
   curl_close ($ch);

   $mca=highlight($returned,"'http://registration.aol.com/_cqr/login?sitedomain=registration.aol.com&authLev=1&siteState=&lang=en&locale=us&uitype=mini&mcAuth=","'");


   $ch = curl_init();
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
         	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog AOL Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_HEADER, TRUE);
   curl_setopt($ch, CURLOPT_URL, "http://registration.aol.com/_cqr/login?sitedomain=registration.aol.com&authLev=1&siteState=OrigUrl%3Dhttp%253a%252f%252fregistration%252eaol%252ecom%252fmail%253fs%255furl%253dhttp%25253a%25252f%25252fwebmail%25252eaol%25252ecom%25252f%25255fcqr%25252fLoginSuccess%25252easpx%25253fsitedomain%25253dsns%25252ewebmail%25252eaol%25252ecom%252526siteState%25253dver%2525253a1%252525252c0%25252526ld%2525253awebmail%25252eaol%25252ecom%25252526pv%2525253aAOL%25252526lc%2525253aen%25252dus%25252526ud%2525253aaol%25252ecom&lang=en&locale=us&uitype=mini&mcAuth=".$mca);
   $returned = curl_exec($ch);
   curl_close ($ch);

   $versionid=highlight($returned, "var gSuccessPath = \"/","/");
   $getuser=highlight($returned,"&uid:","&");
   if($getuser==null){@unlink($scriptlocalpath.$cookieb); return false;}

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);	
   curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,0);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.5; AOL 6.0)");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL, "http://d02.webmail.aol.com/".$versionid."/aim/en-us/Suite.aspx");
   $returned = curl_exec($ch);
   curl_close ($ch);

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
         	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.5; AOL 6.0)");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_HEADER, FALSE);
   curl_setopt($ch, CURLOPT_URL,"http://d03.webmail.aol.com/".$versionid."/aim/en-us/AB/addresslist-print.aspx?command=all&undefined&sort=LastFirstNick&sortDir=Descending&nameFormat=FirstLastNick&version=".$versionid."&user=".urlencode($getuser));
   $returned = curl_exec($ch);
   $status = curl_getinfo($ch);
   curl_close ($ch);

$parsed = strip_tags($returned,"<span>");
   
//now we have to parse the page to get the names and email addresses
//Start from the table where the info is held
//Note: Parsing Method differs from other email services. This parse code is specially designed for AOL Only!

   @unlink($scriptlocalpath.$cookieb);

$contacts=Array();
$rt=0; $ok=0;
$len="<span class=\"fullName\">";

while($rt!=strlen($parsed)){
if(substr($parsed,$rt,strlen($len))==$len){$ccount=count($contacts); $ok=1;}
if($ok==1){@$contacts[$ccount+1].=substr($parsed,$rt,1);}

$rt++;
}

return $contacts;

}



//here's how you use this function, use mode=1 when you want to it to return an array of emails and use mode=0 to return an array of names
//note: the way they are sorted depend on AOL default setting.
function getinfo($parsed,$mode){

//Phase email address
if($mode==0){return (getfromdt($parsed,3));}elseif($mode==1){return (getfromdt($parsed,4));}

}
?>