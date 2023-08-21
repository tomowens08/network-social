<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
include("includes/conn.php");
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%' height='28'><tr>";
  print "<td class='headcell' height='20'>Send message to all users</td></tr>";

  print "<tr><td height='13' class='textcell'><table>";
  if ($HTTP_POST_VARS["subject"]=="" || $HTTP_POST_VARS["message"]=="")
  {
    print "<tr>";
    print "<td width='100%'><p align='left'>You did not enter a subject and message.</p></td>";
    print "</tr>";
  }
    else
  {

    if ($HTTP_GET_VARS["member_id"]=="")
    {
        $sql="select member_id from members";
        $result1=mysql_query($sql);
        $posted_on=date("m-d-Y g:i:s");
      while($RSUser1=mysql_fetch_array($result1))
      {
        $sql="insert into admin_message(member_id, subject, message, date_posted) values($RSUser1[member_id], '$HTTP_POST_VARS[subject]', '$HTTP_POST_VARS[message]', '$posted_on')";
        $result=mysql_query($sql);

      }

    print "<tr>";
    print "<td width='100%'><p align='left'>Your message has been sent.</p></td>";
    print "</tr>";
  }
    else
  {
        $posted_on=strftime("%m/%d/%Y");
        $sql="insert into admin_message(member_id, subject, message, date_posted) values($HTTP_GET_VARS[member_id], '$HTTP_POST_VARS[subject]', '$HTTP_POST_VARS[message]', '$posted_on')";
        $result=mysql_query($sql);
          print "<tr>";
          print "<td width='100%'><p align='left'>Your message has been sent.</p></td>";
          print "</tr>";
  }
}

        print "</table></table>";

}
?>


</BODY>
</HTML>
