<?
function striplr($data){
$data=substr($data,1,strlen($data)-2);
$data=str_replace("\"\"","\"",$data);
return $data;
}

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



//here's how you use this function, use mode=1 when you want to it to return an array of emails and use mode=0 to return an array of names
//note: the way they are sorted depend on Yahoo default setting.
function getdata($email="",$password=""){
   global $cookiepath,$scriptlocalpath;

   $cookie="YahooLoginCookie".md5(md5($email)."||".md5($password)); //do not delete the current filename. You may modify the front part
   $cookieb=$cookie;
   @unlink($scriptlocalpath.$cookieb);
   
   $cookie=($cookiepath.$cookie);








   $ch = curl_init();
   

   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, "login=".urlencode($email)."&passwd=".urlencode($password)."&.done=http%3a//mail.yahoo.com");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog Yahoo Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL,"https://login.yahoo.com/config/login?");
   curl_setopt($ch, CURLOPT_HEADER, TRUE);

   $returned = curl_exec($ch);

   curl_close ($ch);



   
   
   
   $ch = curl_init();

   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog Yahoo Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL, "https://login.yahoo.com/config/verify?.done=http%3a//mail.yahoo.com");
   curl_setopt($ch, CURLOPT_HEADER, TRUE);

   $returned = curl_exec($ch);
   $status=curl_getinfo($ch);
   curl_close ($ch);



   $ch = curl_init();
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog Yahoo Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL,"http://address.yahoo.com/yab/us?A=B");

   $returned = curl_exec($ch);
   $status=curl_getinfo($ch);
   curl_close ($ch);
   
   $getcrumb=highlight($returned,"<input type=\"hidden\" name=\".crumb\" id=\"crumb2\" value=\"","\"");

   $ok=1;
   if(substr(@$status['url'],0,strlen("https://login.yahoo.com/config/login_verify2?"))=="https://login.yahoo.com/config/login_verify2?"){$ok=0;}
   if($ok==0){return false;}




   $ch = curl_init();

   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
	curl_setopt($ch, CURLOPT_PROXY, "http://64.202.165.130:3128");
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, ".crumb=".urlencode($getcrumb)."&VPC=import_export&A=B&submit[action_export_yahoo]=Export+Now");
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
   curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
   curl_setopt($ch, CURLOPT_USERAGENT, "Xceog Yahoo Importer");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   curl_setopt($ch, CURLOPT_URL,"http://address.yahoo.com/index.php");
   curl_setopt($ch, CURLOPT_HEADER, FALSE);

   $returned = curl_exec($ch);
   curl_close ($ch);



//now we have to parse the page to get the names and email addresses
//Start from the table where the info is held
//Note: Parsing Method differs from other email services. This parse code is specially designed for Yahoo! Only!

   @unlink($scriptlocalpath.$cookieb);


return $returned;

}


function xplode($char, $data){
$tp=Array();
$skip=0;
$rt=0;
$ct=0;
$ok=1;

while($rt!=strlen($data)){

if(substr($data,$rt,1)=="\""){if($ok==0){$ok=1;}else{$ok=0;}}
if($ok==1&&substr($data,$rt,strlen($char))==$char){if(!isset($tp[$ct])){$tp[$ct]=null;} $ct++; $skip=strlen($char);}


if($skip==0){
$tp[$ct]=@$tp[$ct].substr($data,$rt,1);
}else{$skip--;}
$rt++;
}


return $tp;
}


function getinfo($returned, $fname){
$records=Array();
$records=xplode("\n",$returned);

//for first line, all the field names are listed, separated by commas.
$rt=0;
$fieldnames=Array(); $fields=Array();
while($rt!=count($records)){
if($rt==0){
$fieldnames=xplode(",",$records[$rt]);
}else{

if($records[$rt]!=null){
$fields[count($fields)]=xplode(",",$records[$rt]);
}

}
$rt++;
}


$rt=0; $tmp=Array(); $capturefield=-1;
$capturefield=$fname;


$lt=0;
while($lt!=count($fields)){
if(striplr(@($fields[$lt][$capturefield]))!=null){}
$tmp[count($tmp)+1]=striplr(@($fields[$lt][$capturefield]));
$lt++;
}


return $tmp;
}
?>