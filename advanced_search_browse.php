<?php
  session_start();
$pi = 3.14159265358979323846;
$EARTH_RADIUS = 3963.205; # diameter/2 in miles

$dist = sprintf("%.1f", $distance);

function Distance($latitude1, $longitude1, $latitude2, $longitude2)
{
  global $pi, $EARTH_RADIUS;

  $dist = 0;
  $latitude1 = $latitude1 * $pi / 180; #turn each from radians to degrees
  $longitude1 = $longitude1 * $pi / 180;
  $latitude2 = $latitude2 * $pi / 180;
  $longitude2 = $longitude2 * $pi / 180;

  if(($latitude1 != $latitude2) || ($longitude1 != $longitude2)){
    $dist = (sin($latitude1) * sin($latitude2)) + (cos($latitude1) * cos($latitude2)) * cos($longitude2 - $longitude1);
    $dist = $EARTH_RADIUS * (-1 * atan2($dist / sqrt(1 - $dist * $dist), 1) + $pi / 2);
  }

  return sprintf("%.1f", $dist);
}
?>
<SCRIPT language="JavaScript">
<?php
include("includes/script.inc");
?>
</script>
<?php
     include("includes/people.class.php");
     $people=new people;

include("includes/top.php");
include("includes/nav.php");
include("includes/conn.php");
//include("includes/right.php");
?>

<tr>
<td valign="top" width='900' bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>


<table width="800" bordercolor="#000000" cellspacing=0 cellpadding=0 bgcolor="#ffffff" border="0">

<?php
     include("includes/advanced_search_form.php");
?>
<table width="800" border="0" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000" bgcolor="ffffff">

<tr>
<td valign="top" align="center">
<table width="750" border="1" cellspacing="0" cellpadding="0" bordercolor="#6699cc">
<tr>
<td class='dark_blue_white2' valign="top">
<font color="#FFFFFF"><b><font size="3">Search Results</font></b></font></td>
</tr>
<tr>
<td align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
<tr align="center">

<?php
     $n=$HTTP_GET_VARS["n"];
     if($n==0)
     {
         $n=0;
     }


        $sql="select * ";
        if($_SESSION["browse_gender"]=="Artists" && $_SESSION["artist_here"]!=Null)
        {
            $sql.=", d.here_for as music_for ";
        }
        $sql.="from members a";
        if($_SESSION["browse_gender"]=="Artists" && $_SESSION["artist_here"]!=Null)
        {
            $sql.=" , music_member_profile d ";
        }


        if($_SESSION["type"]!=Null&&$_SESSION["browse_gender"]!="Artists")
        {
            $sql.=", profile_back b where a.member_id = b.member_id and (";
            $ab=0;
            foreach($_SESSION["type"] as $aa)
            {
                if($ab==0)
                {
                 $sql.=" b.marital_status like '$aa'";
                }
                else
                {
                 $sql.=" or b.marital_status like '$aa'";
                }
                $ab=$ab+1;
            }

            $sql.=")";

        }
        else
        {
         $sql.=" where 1=1";
        }

        if($_SESSION["browse_gender"]!=Null)
        {
            if($_SESSION["browse_gender"]=="Artists")
            {
             $sql.=" and a.music = '1'";
            }
            if($_SESSION["browse_gender"]=="Female")
            {
             $sql.=" and a.gender = 'Female'";
            }
            if($_SESSION["browse_gender"]=="Male")
            {
             $sql.=" and a.gender = 'Male'";
            }

            if($_SESSION["browse_gender"]=="Both")
            {
             //$sql.=" and a.music = '0'";
            }

        }

        if($_SESSION["country"]!="--Null--")
        {
            $sql.=" and a.country like '$_SESSION[country]'";
        }

        if($_SESSION["browse_gender"]=="Artists" && $_SESSION["artist_here"]!=Null)
        {
            $sql.=" and a.member_id = d.user_id ";
        }

        if($_SESSION["ethnicity"]!=Null)
        {
            $ab=0;
            $sql.=" and (";
            foreach($_SESSION["ethnicity"] as $aa)
            {
                if($ab==0)
                {
                 $sql.=" a.ethnicity like '$aa'";
                }
                else
                {
                 $sql.=" or a.ethnicity like '$aa'";
                }
                $ab=$ab+1;
            }

            $sql.=")";
        }
        
        if($_SESSION["city"]!=Null)
        {
            $sql.=" and a.city like '%$_SESSION[city]%'";
        }


        if($_SESSION["orderby"]!=Null)
        {
            if($_SESSION["orderby"]=="2")
            {
                $sql.=" order by a.last_login";
            }
            if($_SESSION["orderby"]=="3")
            {
                $sql.=" order by a.member_id";
            }

        }
        $sql.=" limit $n,30";
        
        //print $sql;


        $result=mysql_query($sql);
        print mysql_error();




$sr_no=0;

while($data_set=mysql_fetch_array($result))
{
            if($sr_no%5==0)
            {
                print "</tr><tr>";
            }


         if($_SESSION["distance"]!=Null&&$_SESSION["postal"]!=Null)
         {

          $sql="select zip from members where member_id = $data_set[member_id]";
          $zip_res=mysql_query($sql);
          $zip_set=mysql_fetch_array($zip_res);

          set_time_limit(0);

          $first = $_SESSION["postal"];
          $second = $zip_set["zip"];

          if($first && $second)
          {
          $in = file("data.db");
          foreach($in as $line)
          {
            if((ereg($first, $line)) || (ereg($second, $line)))
            {
              list($zip, $city, $state, $area, $lat, $long) = split("\|", $line);
              if($first == $zip)
              {
                $flat = $lat;
                $flong = $long;
              }
              if($second == $zip)
              {
                $slat = $lat;
                $slong = $long;
              }
            }
          }
         }
          $miles = Distance($flat, $flong, $slat, $slong);
//          print $miles;
        }

         if($_SESSION["distance"]!=Null&&$_SESSION["postal"]!=Null)
         {
          if($miles>=$_SESSION["distance"])
          {
              $display=1;
          }
          else
          {
              $display=0;
          }
         }
         else
         {
             $display=1;
         }


            if($_SESSION["agefrom"]!=Null&&$_SESSION["ageto"]!=Null&&$data_set["music"]!="1")
            {
             $days=datediff($data_set["dob"], GetTodayDate(0));
             $years=Round($days/365, 0);
             if($years<=$_SESSION["ageto"]&&$years>=$_SESSION["agefrom"])
             {
                 $display=1;
             }
             else
             {
                 $display=0;
             }
            }
            else
            {
                $display=1;
            }

        if($_SESSION["browse_status"]!=Null)
        {
            $stat_user=explode(",", $data_set["here_for"]);
            foreach($_SESSION["browse_status"] as $aa)
            {
                if(in_array($aa, $stat_user))
                {
                    $display=1;
                    break;
                }
                else
                {
                    $display=0;
                }
            }
        }
        else
        {
            $display=1;
        }

        if($_SESSION["browse_gender"]=="Artists" && $_SESSION["artist_here"]!=Null)
        {
            $stat_user=explode(",", $data_set["music_for"]);
            foreach($_SESSION["artist_here"] as $aa)
            {
                if(in_array($aa, $stat_user))
                {
                    $display=1;
                    break;
                }
                else
                {
                    $display=0;
                }
            }
        }
        else
        {
            $display=1;
        }



     if($display==1)
     {
      $name=$people->get_name($data_set["member_id"]);
      $num_images=$people->get_num_images($data_set["member_id"]);
      if($num_images==0)
      {
          $image="<img alt='' src='images/no_pic.gif' width=90 border=0>";
      }
      else
      {
          $image_url=$people->get_image($data_set["member_id"]);
          $image="<img alt='' src='$image_url' width=90 border=0>";
      }
?>
<td height=110 valign=top>
<a class=smallfriend href="view_profile.php?member_id=<?=$data_set["member_id"]?>"><?=$name?>
</a>
<br><br>
<a href="view_profile.php?member_id=<?=$data_set["member_id"]?>">
<?=$image?>
</a>
<br><br>
</td>
<?php
     $sr_no=$sr_no+1;
     }
}
?>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td valign="top" align="center">

<table border="0" cellspacing="5" cellpadding="0" width="675" bordercolor="#000000">
<tr>
<td colspan="4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align=center>
<?php
        if($n!=0)
        {
        $n_previous=$n-30;
?>
<font size="2" face="Tahoma">&#187; <a href='browse.php?n=<?=$n_previous?>'>Previous</a></font>
<?
        }
        $n_next=$n+30;
?>
<font size="2" face="Tahoma">&nbsp;&#187; <a href='browse.php?n=<?=$n_next?>'>Next</a></font>
<?php
?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

		</td>
	</tr>

</table>
</div>


<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
?>
