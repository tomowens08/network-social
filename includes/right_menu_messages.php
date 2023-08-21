<?php
// Left Column

  print "<table width='100%' border='1' cellpadding='4' bordercolor='#000000' style='border-collapse: collapse'>";


// Links Message

  print "<tr>";
  print "<td class='txt_label'>";
  print "<b>My Messages Menu</b>";
  print "</td>";
  print "</tr>";

  print "<tr>";
  print "<td class='style18'>";
  print "<p align='left' class='login'><a href='view_folder.php?folder=inbox&page=1' class='style11'>Inbox";

        $sql="select count(*) as a from messages where mess_to = ".$_SESSION["member_id"]." and mess_read = 0 and deleted <> 1";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

        $sql="select count(*) as a from admin_message where member_id = ".$_SESSION["member_id"];
        $result1=mysql_query($sql);
        $RSUser1=mysql_fetch_array($result1);

  print "&nbsp;(";
  print $RSUser["a"]+$RSUser1["a"].")";
  print "</a></p>";
  print "</td>";
  print "</tr>";
  
  print "<tr>";
  print "<td class='style18'>";
  print "<p align='left' class='login'><a href='view_folder.php?folder=sent&page=1' class='style11'>Sent";

        $sql="select count(*) as a from messages_sent where mess_by = ".$_SESSION["member_id"]." and mess_read = 0 and deleted <> 1";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print "&nbsp;(".$RSUser["a"].")";
  print "</a></p>";
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td class='style18'>";
  print "<p align='left' class='login'><a href='view_folder.php?folder=deleted&page=1' class='style11'>Deleted";

        $sql="select count(*) as a from messages where mess_to = ".$_SESSION["member_id"]." and deleted = 1";
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  $total=$total+$RSUser["a"];

  print "&nbsp;(".$total.")";
  print "</a></p>";
  print "</td>";
  print "</tr>";


  print "<tr>";
  print "<td class='style18'>";
?>
<!-- ad code here -->

<!-- AdSpeed.com Serving Code 7.6 -->
<script type="text/javascript">var a=new Date();var q='&tz='+a.getTimezoneOffset()/60 +'&ck='+(navigator.cookieEnabled?'Y':'N') +'&jv='+(navigator.javaEnabled()?'Y':'N') +'&scr='+screen.width+'x'+screen.height+'x'+screen.colorDepth +'&r='+Math.random() +'&ref='+escape(document.referrer.substr(0,80)) +'&uri='+escape(document.URL.substr(0,80));document.write('<ifr'+'ame width="120" height="600" src="http://g.adspeed.net/ad.php?do=html&zid=9054&wd=120&ht=600&target=_top'+q+'" frameborder="0" scrolling="no" allowtransparency="true" hspace="0" vspace="0"></ifr'+'ame>');</script>
<noscript><iframe width="120" height="600" src="http://g.adspeed.net/ad.php?do=html&zid=9054&wd=120&ht=600&target=_top" frameborder="0" scrolling="no" allowtransparency="true" hspace="0" vspace="0"><a href="http://g.adspeed.net/ad.php?do=clk&zid=9054&wd=120&ht=600&pair=as" target="_top"><img style="border:0px;" src="http://g.adspeed.net/ad.php?do=img&zid=9054&wd=120&ht=600&pair=as" height="600" width="120"/></a></iframe>
</noscript><!-- AdSpeed.com End -->

<!-- ad code here -->
<?php
  print "</td>";
  print "</tr>";


// Links Message


  print "</table>";

  print "</td>";
?>
