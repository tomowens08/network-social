<?php
  session_start();
if ($_SESSION["logged_in"]!="yes")
{
        print ("<script language='JavaScript'> window.location='login.php'; </script>");
}
  else
{
include("includes/top.php");
include("includes/conn.php");
include("includes/nav.php");
?>
<?php

if (!isset($_POST['submit'])) {
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?poll=new" method="post">
    How many possible answers do you want? <select name="answers">
<?php
$num = 2;
    for ($z = 2; $z <= 10; $z++){
        echo'<option value="'.$num.'">'.$num.'</option>';
$num++;
}
?>


</select>
    <input type="submit" name="submit" value="Start!">
    </form>
 
<?php
    }
else{
    $answers = $_REQUEST["answers"];
    $row_count = 1;
    $q = 1;
    $b = 2;
echo'<table style="padding:15px;"><form action="poll.php?poll=submit" method="post">
       
<tr><td colspan="2" style="padding:15px;">Question: <input type="text" size="30" name="quest"></td></tr>';
    for ($r = 1; $r <= $answers; $r++){
       echo '<tr><td>';
			if($answers >= 3){
				echo'<input type="checkbox" name="del[]"> - ';
            }
             echo 'Answer '.$q.':</td><td> <input type="text" name="a[]"></td></tr>';
       $row_count++;
       $q++;
       $b++;
    }
    echo'<input type="hidden" name="total" value="'.$answers.'">';

echo'<tr><td colspan="2"><input type="submit" name="delete" value="Delete Selected Rows"> <input type="submit" name="submit" value="Create!"></td></tr></form></table>';

include('poll1.php');
break;
}
?>










<?php
include("includes/bottom.php");
}
?>