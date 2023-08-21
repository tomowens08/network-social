function random()
{
	randomseed = (randomseed * randoma + randomc) % randomm;
	return randomseed / randomm;
}

var randomm = 714025;
var randoma = 4096;
var randomc = 150889;


flag = false;
randomseed = Date.parse(new Date()); 
randomNumber = random() + "";
var oasurl = "http://ads.euniverseads.com/RealMedia/ads/";
if (typeof OASHost == "undefined") OASHost = "www";

function oas_ad(page,pos,oaskwd1)
{
	
	// set to true to enable Ad Tags for DoubleClick production load test
	enableDoubleClick = false;

	// Disable x77 until further notice...

	
	document.write("<IFRAME width=0 height=0 style=\"position:relative;z-index:10000\" MARGINWIDTH=0 MARGINHEIGHT=0 HSPACE=0 VSPACE=0 FRAMEBORDER=0 SCROLLING=no src='http://derdb.mspaceads.com/mspace.htm'></iframe>");

	page = page.replace(/^www/, OASHost);

		re_ex = /,/;
	
	temp_flag = 0;
	if(re_ex.test(page)){
		site_arr = page.split(",");
		page = site_arr[0];
		temp_flag = 1;
	}
	


	switch (pos)
	{
		case 'Frame1':
		{
			var pxsize = 'width=728 height=90';
			if(temp_flag==1){
				page = site_arr[1];
				pos = 'leaderboard';
				flag = true;
				temp_flag=0;
				//alert(page);
			}
 			break
		}
		case 'Top':
		{
			var pxsize = 'width=468 height=60';
			break;
		}
		case 'x08':
		{
			var pxsize = 'width=430 height=600';
			break;
		}
		case 'x14':
		{
			var pxsize = 'width=300 height=300';
			break;
		}
		case 'x15':
		{
			var pxsize = 'width=120 height=600';
						
			//reg_ex =/[\d]+/

			break;
		}
		case 'x54':
		{
  			var pxsize = 'width=225 height=170';
			if(temp_flag==1){
				page = site_arr[1];
				pos = 'profile';
				flag = true;
				temp_flag=0;
				//alert(page);
			}
 			break
		}
		case 'x55':
		{
			var pxsize = 'width=640 height=280';
						
			if(temp_flag==1){
				page = site_arr[1];
				pos = 'group';
				flag = true;
				temp_flag=0;
				//alert(page);
			}
			break;
		}
		case 'x56':
		{
			var pxsize = 'width=460 height=140';
			break
		}
		case 'x69': // This was added for the anchor man inbox add.
		{
			var pxsize = 'width=628 height=288';
			break;
		}
		case 'x77':
		{
			var pxsize = 'width=1 height=1';
			break;
		}
		case 'x78':
		{
			var pxsize = 'width=750 height=600';
			break;
		}
		case 'x85':
		{
  			var pxsize = 'width=300 height=300';
 			break
		}
		case 'x86':
		{
  			var pxsize = 'width=465 height=360';
 			break
		}
		case 'x87':
		{
  			var pxsize = 'width=463 height=400';

 			break
		}
		case 'x88':
		{
  			var pxsize = 'width=460 height=140';
			
			if(temp_flag==1){
				page = site_arr[1];
				pos = 'featuredband';
				flag = true;
				temp_flag=0;
				//alert(page);
			}
 			break
		}
		default:
		{
			var pxsize = 'width=468 height=60';
			break;
		}
	}
	
	
	var rand = randomNumber.substring(2,11);
	if(flag){
		document.write("<IFRAME " + pxsize + " style=\"position:relative;z-index:10000\" MARGINWIDTH=0 MARGINHEIGHT=0 HSPACE=0 VSPACE=0 FRAMEBORDER=0 SCROLLING=no src='http://de.mspaceads.com/html.ng/site=myspace&position="+pos+"&page="+page+"&rand="+rand+"'></iframe>");
		flag = false;
	}else{
	
		var oaskwd1;
		var imageurl = oasurl + "adstream_sx.cgi/" + page + "/1" + rand;
		document.write("<IFRAME " + pxsize + " style=\"position:relative;z-index:10000\" MARGINWIDTH=0 MARGINHEIGHT=0 HSPACE=0 VSPACE=0 FRAMEBORDER=0 SCROLLING=no src='" + imageurl + '@' + pos + '?' + oaskwd1 + "'></iframe>");
	}


}
