<?
include './includes/conn.php';

include("includes/events.class.php");
$events = new events;
$cont = "<option value=''></option>";

	if ($_GET['type'] == 1) {
     $cats_res=$events->get_all_cats();
     while($cats_set=mysql_fetch_array($cats_res))
     {
         if($HTTP_GET_VARS["cat_id"]==$cats_set["id"] || $cats_set['def'])
         {
						$cont .= "<option value='".$cats_set["id"]."' selected>".$cats_set["cat_name"]."</option>";

         }
         else
         {
  					$cont .= "<option value='".$cats_set["id"]."'>".$cats_set["cat_name"]."</option>";
         }
     }
	} elseif ($_GET['type'] == 2) {
     $cats_res=$events->get_all_cats_private();
     while($cats_set=mysql_fetch_array($cats_res))
     {
         if($HTTP_GET_VARS["cat_id"]==$cats_set["id"] || $cats_set['def'])
         {
				  	$cont .= "<option value='".$cats_set["id"]."' selected>".$cats_set["cat_name"]."</option>";
         }
         else
         {
						$cont .= "<option value='".$cats_set["id"]."'>".$cats_set["cat_name"]."</option>";
         }
     }
	}
?>

<script language="javascript">
<!--

	parent.document.all['asd'].innerHTML="<select name='category'><?=$cont?></select>";

-->
</script>