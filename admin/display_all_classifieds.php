<?php
  session_start();
?>
<HTML>
<HEAD>
<link rel=stylesheet href=style.css type=text/css>
</HEAD>
<BODY>
<?php
if ($_SESSION["user_admin"]!="Yes")
{
  print "You need to login before you can view this page";
}
  else
{

  print "<table align='center' width='100%'><tr><td width='100%' class='lsep' height='218' valign='top'>";
  print "<table border='0' cellpadding='0' cellspacing='0' width='100%'><tr>";
  print "<td class='headcell' height='20' width='100%'>Display All Classifieds</td></tr>";
  include("includes/conn.php");

  print "<tr><td class='textcell'><table width='100%'>";

$n=$HTTP_GET_VARS["n"];
if($n==Null)
{
    $n=0;
}

$n_next=$n+30;

$sql="select * from members a, classified_listing b where a.member_id = b.member_id";
$result=mysql_query($sql);
$num_rows=mysql_num_rows($result);
if($num_rows<=$n_next)
{
 $next=0;
}
else
{
 $next=1;
}

print "<tr bgColor='#ffffff'>";
print "<td class='textcell' valign='top' colspan='4' width='100%'>";
$display_start=$n+1;
$display_end=$display_start+29;
if($display_end>$num_rows)
{
    $display_end=$num_rows;
}
      print "<b>Displaying</b> $display_start to $display_end of $num_rows";
print "</td>";
print "</tr>";

print "<tr bgColor='#ffffff'>";
print "<td class='textcell' valign='top' colspan='4' width='100%'><b>Goto :</b> ";
if($n!=0)
{
 $n_previous=$n-30;
 print "&#187; <a href='display_all_classifieds.php?n=$n_previous'>Previous Page</a>";
}
if($next==1)
{
 print "&nbsp;&#187; <a href='display_all_classifieds.php?n=$n_next'>Next Page</a>";
}
print "</td>";
print "</tr>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='70%'>Classified Name</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "</tr>";

        $sql="select * from members a, classified_listing b where a.member_id = b.member_id order by id limit $n,30";
        $result=mysql_query($sql);
        $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {

    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
    print "<td class='textcell' valign='top' width='70%'>";
    print "<a href='../view_ad.php?id=$RSUser[id]' target='_blank'>$RSUser[subject]</a>";
    print "<br><b>Creator</b>: <a href='../view_profile.php?member_id=$RSUser[member_id]' target='_blank'>$RSUser[member_name]</a> (E-Mail :) $RSUser[member_email]";
    print "</td>";
    print "<td class='textcell' valign='top' width='10%'><a href='delete_classified.php?id=$RSUser[id]'>Delete</a></td>";
    print "</tr>";
    $sr_no=$sr_no+1;
  }


  print "</table></table>";
}

?>
</BODY>
</HTML>

