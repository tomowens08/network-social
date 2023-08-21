<?php
//include("includes/right.php");
?>
<body>
<?php
        $sql="select * from members where member_id = ".$_SESSION["member_id"];
        $result2=mysql_query($sql);
        $RSUser2=mysql_fetch_array($result2);
    $member_name=$RSUser2["member_name"];
	
	    $sql="select member_name, member_lname, member_email from members where member_id = ".$_SESSION["member_id"];
        $result=mysql_query($sql);
        $RSUser=mysql_fetch_array($result);

  print $RSUser["member_name"]."&nbsp;".$RSUser["member_lname"]." has invited you to join ".$RSUser["member_name"]."'s personal and private community at $site_name, where you and ".$RSUser["member_name"]." can network with each other's friends.";



  print "<br>Click below to join $site_name:<br><a href='$site_url/join_inv.php?member_id=".$_SESSION["member_id"]."' class='style11'>$site_url/join_inv.php?member_id=".$_SESSION["member_id"];

?>
</body>
</html>
