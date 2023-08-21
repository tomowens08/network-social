<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='830'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
   include("includes/music_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' border='1' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Top Artists</h3></td></tr>";

  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";


?>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td height="28" bgcolor="#001659" class='txt_label'>
<strong><font color="#FFFFFF">&nbsp;&nbsp;Top Artists by Views Today</font></strong>
</td>
</tr>
</table>

<table cellspacing="1" cellpadding="5" width="100%" align="center" bgcolor="639ace" border="0">
<tr bgcolor="eff3ff">
<td width="5%" height=24 align="center" class='txt_label'><b>Rank</b></td>
<td width="40%" align="center" class='txt_label'><b>Artist</b></td>
<td width="13%" align="center" class='txt_label'><b>Last On</b></td>
<td width="19%" align="center" class='txt_label'><b>Location</b></td>
<td width="24%" align="center" class='txt_label'><b>Genre</b></td>
</tr>
<?php
        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+10;

        $sql_paging="select count(*) as a from members where music='1'";
        $result=mysql_query($sql_paging);
        print mysql_error();
        $data_set=mysql_fetch_array($result);
        if($data_set["a"]<=$n_next)
        {
                $next=0;
        }
        else
        {
                $next=1;
        }
     $tot_records=$data_set["a"];
     $sr_no=1;
     $sql="select * from members where music='1' order by views desc";
     $res=mysql_query($sql);
     while($data_set=mysql_fetch_array($res))
     {
         $sql="select * from music_member_profile where user_id = $data_set[member_id]";
         $ares=mysql_query($sql);
         $adata_set=mysql_fetch_array($ares);
         
                $sql="select count(*) as a from photos where member_id = $data_set[member_id]";
                $pic_res=mysql_query($sql);
                print mysql_error();
                $pic_set=mysql_fetch_array($pic_res);
                if($pic_set["a"]==0)
                {
                        $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
                }
                else
                {
                 $sql="select * from photos where member_id = $data_set[member_id]";
                 $pic_res=mysql_query($sql);
                 $pic_set=mysql_fetch_array($pic_res);
                 $image="<img alt='' src='$pic_set[photo_url]' width=90 border=0>";
                }
if($adata_set["genre1"]!=Null)
{
 $sql="select cat_name from music_genre where id = $adata_set[genre1]";
 $genre_res=mysql_query($sql);
 $genre_set=mysql_fetch_array($genre_res);
}
?>
<tr class=text11 bgcolor=ffffff>
<td align="center" class='txt_label'><?=$sr_no?></td>
<td width="35%" class='txt_label'>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td width="50" valign="middle" class='txt_label'>
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$image?>
</a>
</td>
<td valign="top" class='txt_label'>&nbsp;<?=$data_set["member_name"]?>
<br>
&nbsp;<b>Views: <?=$data_set["views"]?></b>
</td>
</tr>
</table>
</td>
<td width="13%" align="center" class='txt_label'><?=$data_set["last_login"]?></td>
<td width="14%" class='txt_label'><?=$data_set["city"]?>, <?=$data_set["state"]?></td>
<td width="14%" class='txt_label'><?=$genre_set["cat_name"]?></td>
</tr>
<?php
     $sr_no=$sr_no+1;
     }
?>

</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="33%">
<table border="0" cellspacing="2" cellpadding="0" bordercolor="#000000" width="100%">
<tr>
<td colspan="4">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<?php
        if($n!=0)
        {
        $n_previous=$n-10;
?>
&#187; <a href='top_artists.php?n=<?=$n_previous?>'>Previous</a>
<?
        }
        if($next==1)
        {
?>
&nbsp;&#187; <a href='top_artists.php?n=<?=$n_next?>'>Next</a>
<?php
        }
?>
</table>
</td>
</tr>
</table>


<?php
  // run loop to display all categories
  print "</td></tr>";
  print "</td></tr>";
     print "</table>";
    print "</td></tr></table>";
?>

</table>
<!-- middle_content -->
<?php
     include("includes/bottom.php");
}
?>
