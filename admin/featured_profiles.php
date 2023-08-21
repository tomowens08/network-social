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
  print "<td class='headcell' height='20' width='100%'>Manage Members</td></tr>";

  include("includes/conn.php");

  print "<tr><td class='textcell'><table width='100%'>";

$n=$HTTP_GET_VARS["n"];
if($n==Null)
{
    $n=0;
}

$n_next=$n+30;

$sql="select * from members";
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
 print "&#187; <a href='featured_profiles.php?n=$n_previous'>Previous Page</a>";
}
if($next==1)
{
 print "&nbsp;&#187; <a href='featured_profiles.php?n=$n_next'>Next Page</a>";
}
print "</td>";
print "</tr>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='70%'>Member Name</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "</tr>";
  include("includes/conn.php");

        $sql="select * from members order by member_id limit $n,30";
        $result=mysql_query($sql);
        $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {
    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
    print "<td class='textcell' valign='top' width='70%'><a href='../view_profile.php?member_id=$RSUser[member_id]' target='_blank'>$RSUser[member_name]</a> (E-Mail :) $RSUser[member_email]</td>";
    if($RSUser["featured"]=="0")
    {
     print "<td class='textcell' valign='top' width='10%'><a href='feature_profile.php?member_id=$RSUser[member_id]'>Feature</a></td>";
    }
    else
    {
     print "<td class='textcell' valign='top' width='10%'><a href='unfeature_profile.php?member_id=$RSUser[member_id]'>Un-Feature</a></td>";
    }
    print "</tr>";
    $sr_no=$sr_no+1;
  }


  print "</table></table>";
}

?>
</BODY>
</HTML>

