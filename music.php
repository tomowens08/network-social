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

  print "<table width='800'>";
  print "<tr>";
  print "<td width='20%' valign='top'>";
   include("includes/music_menu.php");
  print "</td>";
  print "<td width='80%' valign='top'>";
  print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Music Directory</h3></td></tr>";

  print "<table width='100%' cellpadding='4' cellspacing='0'>";
  print "<tr><td>";



?>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td height="28" bgcolor="#001659" class='txt_label'>
<strong><font color="#FFFFFF">&nbsp;&nbsp;Music Directory (Browsing through '<?=$name?>' Profiles)</font></strong>
</td>
</tr>
</table>

<table cellspacing="1" cellpadding="5" width="80%" align="center" bgcolor="639ace" border="0">
<tr>
<td width="100%" colspan='5' class='txt_label' height=24 align="center">
<a href='music.php'>ALL</a>&nbsp;&nbsp;&nbsp;
<a href='music.php?name=A'>A</a>&nbsp;
<a href='music.php?name=B'>B</a>&nbsp;
<a href='music.php?name=C'>C</a>&nbsp;
<a href='music.php?name=D'>D</a>&nbsp;
<a href='music.php?name=E'>E</a>&nbsp;
<a href='music.php?name=F'>F</a>&nbsp;
<a href='music.php?name=G'>G</a>&nbsp;
<a href='music.php?name=H'>H</a>&nbsp;
<a href='music.php?name=I'>I</a>&nbsp;
<a href='music.php?name=J'>J</a>&nbsp;
<a href='music.php?name=K'>K</a>&nbsp;
<a href='music.php?name=L'>L</a>&nbsp;
<a href='music.php?name=M'>M</a>&nbsp;
<a href='music.php?name=N'>N</a>&nbsp;
<a href='music.php?name=O'>O</a>&nbsp;
<a href='music.php?name=P'>P</a>&nbsp;
<a href='music.php?name=Q'>Q</a>&nbsp;
<a href='music.php?name=R'>R</a>&nbsp;
<a href='music.php?name=S'>S</a>&nbsp;
<a href='music.php?name=T'>T</a>&nbsp;
<a href='music.php?name=U'>U</a>&nbsp;
<a href='music.php?name=V'>V</a>&nbsp;
<a href='music.php?name=W'>W</a>&nbsp;
<a href='music.php?name=X'>X</a>&nbsp;
<a href='music.php?name=Y'>Y</a>&nbsp;
<a href='music.php?name=Z'>Z</a>&nbsp;

</td>
</tr>

<tr bgcolor="eff3ff">
<td width="5%" height=24 align="center" class='txt_label' ><b>Rank</b></td>
<td align="center" class='txt_label'><b>Artist</b></td>
<td width="13%" align="center" class='txt_label' ><b>Last On</b></td>
<td width="19%" align="center" class='txt_label' ><b>Location</b></td>
<td width="24%" align="center" class='txt_label' ><b>Genre</b></td>
</tr>
<?php
        $n=$HTTP_GET_VARS["n"];
        if($n==Null)
        {
            $n=0;
        }
        $n_next=$n+10;
        
        $name = $HTTP_GET_VARS["name"];


        $sql_paging="select count(*) as a from members where music='1' and member_name like '$name%'  order by views DESC";
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
     $sql="select * from members where music='1' and member_name like '$name%' order by views DESC";
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
<tr class=text11 bgcolor=ffffff class='txt_label' >
<td align="center" class='txt_label' ><?=$sr_no?></td>
<td width="35%" class='txt_label' >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="50" valign="middle" class='txt_label' >
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$image?>
</a>
</td>
<td valign="middle" class='txt_label' >&nbsp;<?=$data_set["member_name"]?></td>
</tr>
</table>
</td>
<td width="13%" align="center" class='txt_label' ><?=($data_set["last_login"]?strftime("%B %d %Y",strtotime($data_set["last_login"])):strftime("%B %d %Y",strtotime($data_set["date_created"])))?></td>
<?
include_once './includes/misc.class.php';
$misc = new misc;
?>
<td width="14%" class='txt_label'><?=$data_set["city"]?><br><?=$misc->get_countryname($data_set["country"])?></td>
<td width="14%" class='txt_label'><?=$genre_set["cat_name"]?></td>
</tr>
<?php
     $sr_no=$sr_no+1;
     }
?>


<?php
  // run loop to display all categories
  print "</td></tr>";
  print "</td></tr>";
    print "</td></tr></table>";
?>

</table>
</table>
<!-- middle_content -->
<?php
     include("includes/bottom.php");

?>
