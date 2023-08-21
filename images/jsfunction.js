//---- V A L I D A T I O N    F U N T I O N 
function mf_validation(obj,type,msg)
{

			if (type=="B")
			{
		
				if(obj.value=="")
				{
					alert(msg);
					obj.focus();
					return false;
				}
			} // end if type B
			if (type=="N")
			{
				if(obj.value=="" || obj.value<=0 || isNaN(obj.value)==true)
				{
					alert(msg);
					obj.focus();
					return false;
				}

			} // end if type N

			if (type=="E")
			{
				if(emailCheck(obj.value)==false)
					{
						alert(msg);
						obj.focus();
						return false;
					}

			} // end if type E

} // END FUNCTION 
//END  V A L I D A T I O N    F U N T I O N 

// --- E M A I L  F U N C T I O N 
function emailCheck (emailStr) {
var emailPat=/^(.+)@(.+)$/
var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
var validChars="\[^\\s" + specialChars + "\]"
var quotedUser="(\"[^\"]*\")"
var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
var atom=validChars + '+'
var word="(" + atom + "|" + quotedUser + ")"
var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
var matchArray=emailStr.match(emailPat)
if(emailStr=="")
{ return true}
if (matchArray==null) {
 	alert("Email address seems incorrect (check @ and .'s)")
	return false
}
var user=matchArray[1]
var domain=matchArray[2]
if (user.match(userPat)==null) {
     alert("The username doesn't seem to be valid.")
    return false
}
var IPArray=domain.match(ipDomainPat)
if (IPArray!=null) {
 	  for (var i=1;i<=4;i++){
	    	if (IPArray[i]>255) 	{
	        	alert("Destination IP address is invalid!")
			return false
	    				}
				}
    		return true	
		}

var domainArray=domain.match(domainPat)
if (domainArray==null) {
	alert("The domain name doesn't seem to be valid.")
    return false
}
var atomPat=new RegExp(atom,"g")
var domArr=domain.match(atomPat)
var len=domArr.length
if (domArr[domArr.length-1].length<2 ||
    domArr[domArr.length-1].length>7) {
   alert("The address must end in a valid domain, or two letter country.")
   return false
}
if (len<2) {
   var errStr="This address is missing a hostname!"
   alert(errStr)
   return false
}
return true;
}
//  --- end  E M A I L  F U N C T I O N 

