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
include('includes/people.class.php');
$people = new people();

function navigation ($num_rec,$rec_per_page=20,$params='',$ses_page_name='') {

	global $_SERVER, $_GET, $_SESSION;
	
	$ses_page_name = $ses_page_name?$ses_page_name:$_SERVER['SCRIPT_NAME'];
	$_SESSION[$ses_page_name.'page'] = $_GET['page']?$_GET['page']:($_SESSION[$ses_page_name.'page']?$_SESSION[$ses_page_name.'page']:1);
	$cur_page = $_SESSION[$ses_page_name.'page'];
	$url = $_SERVER['PHP_SELF'].'?';
	if (is_array($params)) {
		foreach ($params as $k => $v) {
			$url .= $k.'='.$v.'&';
		}
	}
	$_SESSION['limit_from'] = ($cur_page-1)*$rec_per_page;
	$_SESSION['limit_num'] = $rec_per_page;
	if ($num_rec>$rec_per_page) {
		$num_links = ceil($num_rec/$rec_per_page);
		$res = array();
		if ($cur_page != 1) {
			$res[] = '<a href="'.$url.'&page=1">&lt;&lt;</a>';
			$res[] = '<a href="'.$url.'&page='.($cur_page - 1).'">&lt;</a>';
		} else {
			$res[] = '&lt;&lt;';
			$res[] = '&lt;';
		}
		for ($i=1;$i<=$num_links;$i++) {
			if ($cur_page == $i)
				$res[] = $i;
			else
				$res[] = '<a href="'.$url.'&page='.$i.'">'.$i.'</a>';
		}
		if ($cur_page != $num_links) {
			$res[] = '<a href="'.$url.'&page='.($cur_page + 1).'">&gt;</a>';
			$res[] = '<a href="'.$url.'&page='.$num_links.'">&gt;&gt;</a>';
		} else {
			$res[] = '&gt;';
			$res[] = '&gt;&gt;';
		}
		return implode(' ',$res);
	}
	
}

$rec_per_page = 20;
?>

<tr>
<td valign="top" bgcolor="#FFFFFF">
<!-- middle_content -->

<p align='center'>
<?

  print "<table width='800'>";
  print "<tr valign=\"top\">";
  print "<td width='20%'>";
?>
<table width='100%' border='1' cellpadding='4' bordercolor='#000000' style='border-collapse: collapse'>
<?
	$sql = "select count(*) as num from testimonials where member_id = $_SESSION[member_id] AND approved = 0";
	$res = mysql_fetch_array(mysql_query($sql));
	$rec_num = $res['num'];
?>
<tr class='txt_label'>
	<td><a href="edit_testimonials.php?action=profile">Profile comments (<?=$rec_num?>)</a></td>
</tr>
<?
	$sql = "select count(*) as num from photo_rating where member_id = $_SESSION[member_id] AND approved = 0";
	$res = mysql_fetch_array(mysql_query($sql));
	$rec_num = $res['num'];
?>
<tr class='txt_label'>
	<td><a href="edit_testimonials.php?action=picture">Picture comments (<?=$rec_num?>)</a></td>
</tr>
<?
	$sql = "select count(*) as num from blog_comments where member_id = $_SESSION[member_id] AND approved = 0";
	$res = mysql_fetch_array(mysql_query($sql));
	$rec_num = $res['num'];
?>
<tr class='txt_label'>
	<td><a href="edit_testimonials.php?action=blog">Blog comments (<?=$rec_num?>)</a></td>
</tr>
</table>
<?
    include("includes/right_menu.php");
  print "</td>";

  print "<td width='80%' valign='top'>";

$action = $_GET['action']?$_GET['action']:'profile';
	
switch ($action) {
	
	case 'blog':
	
	if ($_GET['delete']) {
		$sql = "DELETE FROM blog_comments WHERE id = '".$_GET['id']."'";
		$_SESSION[$_SERVER['SCRIPT_NAME'].'page'] = 1;
		$msg = 'Blog comment has been deleted.';
	}
	
	if ($_GET['approve']) {
		$sql = "UPDATE blog_comments SET approved = '1' WHERE id = '".$_GET['id']."'";
		$msg = 'Blog comment has been approved.';
	}
	
	if ($_GET['reject']) {
		$sql = "UPDATE blog_comments SET approved = '0' WHERE id = '".$_GET['id']."'";
		$msg = 'Blog comment has been rejected.';
	}
	
	if ($sql)
		mysql_query($sql);
	
	$sql = "select count(*) as num from blog_comments where member_id = $_SESSION[member_id]";
	$res = mysql_fetch_array(mysql_query($sql));
	$rec_num = $res['num'];
	
	$nav = navigation($rec_num,$rec_per_page,array('action'=>$action),$action);
	
	if ($msg)
		echo '<div align="center" class="txt_label"><font color="#ff0000">'.$msg.'</font></div>';
	if ($nav) echo '<div align="center" class="txt_label">'.$nav.'</div>';
	print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Blog Comments</h3></td></tr>";



        $sql="select bc.* from blogs b LEFT JOIN blog_comments bc ON b.id = bc.blog_id where b.member_id = $_SESSION[member_id] order by bc.posted_on DESC LIMIT ".$_SESSION['limit_from'].",".$_SESSION['limit_num']."";
				$result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows==0)
  {

    print "<tr>";
    print "<td width='100%' colspan='2'  class='txt_label'><p align='center'>There are no comments yet.</p></td></tr>";
  }
    else
  {

    $sr_no=1;
    while($RSUser1=mysql_fetch_array($result1))
    {

      print "<tr><td width='100%' colspan='2'  class='txt_label'>";

      print "<table width='100%'>";
      print "<tr><td width='20%' valign='top'>";

        $sql="select * from photos where member_id = ".$RSUser1["member_id"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);
      if ($num_rows==0)
      {
        print "<img src='images/nophoto.jpg' width='50' height='50'>";
      }
      else
      {
					$image_url = $people->get_image($RSUser1["member_id"]);
					$pic_name = str_replace('user_images/', '', $image_url);
					echo "<a href='view_profile.php?member_id=$RSUser1[member_id]'><img src='image_gd/image_browse.php?$pic_name' width=50 height=50 border='0'></a>";
      }

      print "</td>";


        $sql="select * from members where member_id = ".$RSUser1["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

      print "<td width='60%' valign='top'>";
      print "<table width='100%'>";
      print "<tr><td width='100%'  class='txt_label'><a href='view_profile.php?member_id=".$RSUser["member_id"]."'>".$RSUser["member_name"].", ".$RSUser1["posted_on"]."</a>:</td></tr>";
      print "<tr><td width='100%'  class='txt_label'>".$RSUser1["body"]."</td></tr>";
      print "</table>";
      print "</td>";

      print "<td width='20%' valign='top'>";

      print "<table width='100%'>";
      print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&delete=1&id=".$RSUser1["id"]."'>Delete</a></td></tr>";
      if ($RSUser1["approved"]=="0")
      {

        print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&approve=1&id=".$RSUser1["id"]."'>Approve</a></td></tr>";
      } 

      if ($RSUser1["approved"]=="1")
      {

        print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&reject=1&id=".$RSUser1["id"]."'>Reject</a></td></tr>";
      } 

      print "</table>";

      print "</td>";


      print "</table>";
      print "</td></tr>";
    }

  } 

    print "</table>";
	if ($nav) echo '<div align="center" class="txt_label">'.$nav.'</div>';
	
	break;
	
	
	case 'picture':
	
	if ($_GET['delete']) {
		$sql = "DELETE FROM photo_rating WHERE id = '".$_GET['id']."'";
		$_SESSION[$_SERVER['SCRIPT_NAME'].'page'] = 1;
		$msg = 'Picture comment has been deleted.';
	}
	
	if ($_GET['approve']) {
		$sql = "UPDATE photo_rating SET approved = '1' WHERE id = '".$_GET['id']."'";
		$msg = 'Picture comment has been approved.';
	}
	
	if ($_GET['reject']) {
		$sql = "UPDATE photo_rating SET approved = '0' WHERE id = '".$_GET['id']."'";
		$msg = 'Picture comment has been rejected.';
	}
	
	if ($sql)
		mysql_query($sql);
	
	$sql = "select count(*) as num from photo_rating where member_id = $_SESSION[member_id]";
	$res = mysql_fetch_array(mysql_query($sql));
	$rec_num = $res['num'];
	
	$nav = navigation($rec_num,$rec_per_page,array('action'=>$action),$action);
	
	if ($msg)
		echo '<div align="center" class="txt_label"><font color="#ff0000">'.$msg.'</font></div>';
	if ($nav) echo '<div align="center" class="txt_label">'.$nav.'</div>';
	print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Picture Comments</h3></td></tr>";



        $sql="select * from photo_rating where member_id = $_SESSION[member_id] order by posted_on DESC LIMIT ".$_SESSION['limit_from'].",".$_SESSION['limit_num']."";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows==0)
  {

    print "<tr>";
    print "<td width='100%' colspan='2'  class='txt_label'><p align='center'>There are no comments yet.</p></td></tr>";
  }
    else
  {

    $sr_no=1;
    while($RSUser1=mysql_fetch_array($result1))
    {

      print "<tr><td width='100%' colspan='2'  class='txt_label'>";

      print "<table width='100%'>";
      print "<tr><td width='20%' valign='top'>";

        $sql="select * from photos where member_id = ".$RSUser1["posted_by"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);
      if ($num_rows==0)
      {
        print "<img src='images/nophoto.jpg' width='50' height='50'>";
      }
      else
      {
					$image_url = $people->get_image($RSUser1["posted_by"]);
					$pic_name = str_replace('user_images/', '', $image_url);
					echo "<a href='view_profile.php?member_id=$RSUser1[posted_by]'><img src='image_gd/image_browse.php?$pic_name' width=50 height=50 border='0'></a>";

      }

      print "</td>";


        $sql="select * from members where member_id = ".$RSUser1["posted_by"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

      print "<td width='60%' valign='top'>";
      print "<table width='100%'>";
      print "<tr><td width='100%'  class='txt_label'><a href='view_profile.php?member_id=".$RSUser["member_id"]."'>".$RSUser["member_name"].", ".$RSUser1["posted_on"]."</a>:</td></tr>";
      print "<tr><td width='100%'  class='txt_label'>".$RSUser1["comment"]."</td></tr>";
      print "</table>";
      print "</td>";

      print "<td width='20%' valign='top'>";

      print "<table width='100%'>";
      print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&delete=1&id=".$RSUser1["id"]."'>Delete</a></td></tr>";
      if ($RSUser1["approved"]=="0")
      {

        print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&approve=1&id=".$RSUser1["id"]."'>Approve</a></td></tr>";
      } 

      if ($RSUser1["approved"]=="1")
      {

        print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&reject=1&id=".$RSUser1["id"]."'>Reject</a></td></tr>";
      } 

      print "</table>";

      print "</td>";


      print "</table>";
      print "</td></tr>";
    }

  } 

    print "</table>";
	if ($nav) echo '<div align="center" class="txt_label">'.$nav.'</div>';
	
	break;
	
	case 'profile':
	
	if ($_GET['delete']) {
		$sql = "DELETE FROM testimonials WHERE test_id = '".$_GET['test_id']."'";
		$_SESSION[$_SERVER['SCRIPT_NAME'].'page'] = 1;
		$msg = 'Testimonial has been deleted.';
	}
	
	if ($_GET['approve']) {
		$sql = "UPDATE testimonials SET approved = '1' WHERE test_id = '".$_GET['test_id']."'";
		$msg = 'Testimonial has been approved.';
	}
	
	if ($_GET['reject']) {
		$sql = "UPDATE testimonials SET approved = '0' WHERE test_id = '".$_GET['test_id']."'";
		$msg = 'Testimonial has been rejected.';
	}
	
	if ($sql)
		mysql_query($sql);
	
	$sql = "select count(*) as num from testimonials where member_id = $_SESSION[member_id]";
	$res = mysql_fetch_array(mysql_query($sql));
	$rec_num = $res['num'];
	
	$nav = navigation($rec_num,$rec_per_page,array('action'=>$action),$action);
	
	if ($msg)
		echo '<div align="center" class="txt_label"><font color="#ff0000">'.$msg.'</font></div>';
	if ($nav) echo '<div align="center" class="txt_label">'.$nav.'</div>';
	print "<table width='100%' align='center' class='dark_b_border2'>";
  print "<tr><td colspan='2' class='dark_blue_white2'>";
  print "<h3>Profile Comments</h3></td></tr>";



        $sql="select * from testimonials where member_id = $_SESSION[member_id] order by date_posted DESC LIMIT ".$_SESSION['limit_from'].",".$_SESSION['limit_num']."";
        $result1=mysql_query($sql);
        $num_rows=mysql_num_rows($result1);

  if ($num_rows==0)
  {

    print "<tr>";
    print "<td width='100%' colspan='2'  class='txt_label'><p align='center'>There are no testimonials for you yet.</p></td></tr>";
  }
    else
  {

    $sr_no=1;
    while($RSUser1=mysql_fetch_array($result1))
    {

      print "<tr><td width='100%' colspan='2'  class='txt_label'>";

      print "<table width='100%'>";
      print "<tr><td width='20%' valign='top'>";

        $sql="select * from photos where member_id = ".$RSUser1["test_user"];
        $result=mysql_query($sql);
        $num_rows=mysql_num_rows($result);
        $RSUser=mysql_fetch_array($result);
      if ($num_rows==0)
      {
        print "<img src='images/nophoto.jpg' width='50' height='50'>";
      }
      else
      {
					$image_url = $people->get_image($RSUser1["test_user"]);
					$pic_name = str_replace('user_images/', '', $image_url);
					echo "<a href='view_profile.php?member_id=$RSUser1[test_user]'><img src='image_gd/image_browse.php?$pic_name' width=50 height=50 border='0'></a>";
      }

      print "</td>";


        $sql="select * from members where member_id = ".$RSUser1["test_user"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

      print "<td width='60%' valign='top'>";
      print "<table width='100%'>";
      print "<tr><td width='100%'  class='txt_label'><a href='view_profile.php?member_id=".$RSUser["member_id"]."'>".$RSUser["member_name"].", ".$RSUser1["date_posted"]."</a>:</td></tr>";
      print "<tr><td width='100%'  class='txt_label'>".$RSUser1["test_text"]."</td></tr>";
      print "</table>";
      print "</td>";

      print "<td width='20%' valign='top'>";

      print "<table width='100%'>";
      print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&delete=1&test_id=".$RSUser1["test_id"]."'>Delete</a></td></tr>";
      if ($RSUser1["approved"]=="0")
      {

        print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&approve=1&test_id=".$RSUser1["test_id"]."'>Approve</a></td></tr>";
      } 

      if ($RSUser1["approved"]=="1")
      {

        print "<tr><td width='100%'  class='txt_label'><a href='edit_testimonials.php?action=$action&reject=1&test_id=".$RSUser1["test_id"]."'>Reject</a></td></tr>";
      } 

      print "</table>";

      print "</td>";


      print "</table>";
      print "</td></tr>";
    }

  } 

    print "</table>";
	if ($nav) echo '<div align="center" class="txt_label">'.$nav.'</div>';
	break;
}
    print "</td></tr></table>";
?>

<!-- middle_content -->
</blockquote>
<!-- Middle Text -->
<?php
include("includes/bottom.php");
}
?>
