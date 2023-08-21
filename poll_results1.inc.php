<?php
		mysql_connect("mysql167.secureserver.net","nx5poll","123456");
@mysql_select_db("nx5poll") or die( "Unable to select database");

		
		// query
		$sQ_poll = "SELECT * FROM `nx5poll_poll` WHERE `pid` ='1'";
		$sR_poll = mysql_query($sQ_poll);
		
		// get vars
		$sM_total = mysql_result($sR_poll,0,'total');
$sM_0 = mysql_result($sR_poll,0,"0");
$sM_1 = mysql_result($sR_poll,0,"1");
$sM_2 = mysql_result($sR_poll,0,"2");


// work out percentage
		if ( $sM_total != 0 ) {
$sC_0 = (($sM_0 / $sM_total)*100)%100;
$sC_1 = (($sM_1 / $sM_total)*100)%100;
$sC_2 = (($sM_2 / $sM_total)*100)%100;
}
else
{
$sC_0 = 0;
$sC_1 = 0;
$sC_2 = 0;
}

// 100% bug
		if ( $sM_total != 0 && $sC_0 == 0 && $sC_1 == 0 && $sC_2 == 0) {
$sC_0 = ($sM_0 / $sM_total)*100;
$sC_1 = ($sM_1 / $sM_total)*100;
$sC_2 = ($sM_2 / $sM_total)*100;
}
		else {
			echo ''; }
		
		// close mysql
		mysql_close();
	  ?>
	  <table id='to2' width='150' height='150' border='0' cellpadding='5' cellspacing='0'>
	  <tr><td><font size='3'><strong>Test 1</strong></font></td></tr>
	  <tr><td>Test question?</td></tr>
	  <tr><td>
<p><strong>yes</strong> - <em><?php echo $sC_0; ?>%</em><br /> 
	  <img src='perc.jpg' height='4' width='<?php echo $sC_0; ?>%' alt='<?php echo $sC_0; ?>%' style='border:1px solid #CCCCCC;'>
	  </p><p><strong>no</strong> - <em><?php echo $sC_1; ?>%</em><br /> 
	  <img src='perc.jpg' height='4' width='<?php echo $sC_1; ?>%' alt='<?php echo $sC_1; ?>%' style='border:1px solid #CCCCCC;'>
	  </p><p><strong>maybe</strong> - <em><?php echo $sC_2; ?>%</em><br /> 
	  <img src='perc.jpg' height='4' width='<?php echo $sC_2; ?>%' alt='<?php echo $sC_2; ?>%' style='border:1px solid #CCCCCC;'>
	  </p>
	  <em>A total of <strong><?php echo $sM_total; ?></strong> people voted.</em></td></tr>
	  </table>