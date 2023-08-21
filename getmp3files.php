<?php
session_start();
include("includes/conn.php");
include("includes/music.class.php");
include("includes/people.class.php");
$people=new people;
$music=new music;
$name=$people->get_name($HTTP_GET_VARS["bandID"]);
?>
<profile>
	<sid><![CDATA[<?=session_id()?>]]></sid>
	<name><![CDATA[<?=$name?>]]></name>
	<playstoday><![CDATA[5784]]></playstoday>
	<downloadedtoday><![CDATA[157]]></downloadedtoday>
	<totalplays><![CDATA[733365]]></totalplays>
	<autoplay><![CDATA[1]]></autoplay>
	<allowadd><![CDATA[1]]></allowadd>
	<playlist>
<?php
$school_res=$music->get_user_songs($HTTP_GET_VARS["bandID"]);
while($school_set=mysql_fetch_array($school_res)) {
?>
		<song bsid="<?=$school_set['id']?>" title="<?=$school_set['song_name']?>" songid="<?=$school_set['id']?>" filename="<?=$school_set['song_file']?>" plays="111" comments="" rate="" lyrics=""/>
<?php
}
?>
	</playlist>
</profile>
