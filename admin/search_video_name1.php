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
  print "<td class='headcell' height='20' width='100%'>Search Video By Name</td></tr>";
  include("includes/conn.php");

  print "<tr><td class='textcell'><table width='100%'>";

$n=$HTTP_GET_VARS["n"];
if($n==Null)
{
    $n=0;
}

$n_next=$n+30;

$sql="select * from members a, video_members b where a.member_id = b.member_id and b.video_title like '%$HTTP_GET_VARS[video_name]%'";
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
 print "&#187; <a href='search_video_name1.php?video_name=$HTTP_GET_VARS[video_name]&n=$n_previous'>Previous Page</a>";
}
if($next==1)
{
 print "&nbsp;&#187; <a href='search_video_name1.php?video_id=$HTTP_GET_VARS[video_name]&n=$n_next'>Next Page</a>";
}
print "</td>";
print "</tr>";



  print "<tr bgColor='#ffffff'>";
  print "<td class='textcell' valign='top' width='10%'>Sr. No.</p></td>";
  print "<td class='textcell' valign='top' width='70%'>Video Name</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "<td class='textcell' valign='top' width='10%'>&nbsp;</td>";
  print "</tr>";

        $sql="select * from members a, video_members b where a.member_id = b.member_id and b.video_title like '%$HTTP_GET_VARS[video_name]%' order by id limit $n,30";
        $result=mysql_query($sql);
        $sr_no=1;

  while($RSUser=mysql_fetch_array($result))
  {

    print "<tr bgColor='#ffffff'>";
    print "<td class='textcell' valign='top' width='10%'>".$sr_no.".</p></td>";
    print "<td class='textcell' valign='top' width='70%'>";
    print "<a href='../view_video.php?id=$RSUser[id]' target='_blank'>$RSUser[video_title]</a>";
    print "<br><b>Creator</b>: <a href='../view_profile.php?member_id=$RSUser[member_id]' target='_blank'>$RSUser[member_name]</a> (E-Mail :) $RSUser[member_email]";
    print "</td>";
    if($RSUser["featured"]==1)
    {
     print "<td class='textcell' valign='top' width='10%'><a href='unfeature_video.php?id=$RSUser[id]'>Unfeature</a></td>";
    }
    else
    {
     print "<td class='textcell' valign='top' width='10%'><a href='feature_video.php?id=$RSUser[id]'>Feature</a></td>";
    }
    print "<td class='textcell' valign='top' width='10%'><a href='delete_video.php?id=$RSUser[id]'>Delete</a></td>";
    print "</tr>";
    $sr_no=$sr_no+1;
  }


  print "</table></table>";
}

?>
</BODY>
</HTML>

