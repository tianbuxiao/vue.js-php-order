<?php
	include_once('./include/db_conn.php');
	$db_conn=conn();
	$sql="select * from wu_caidan where caidan_flas='1'";
	$query=$db_conn->prepare($sql);
	$query->execute();
	$result1=$query->fetchAll(PDO::FETCH_ASSOC);
	$db_conn=null;
	echo json_encode($result1);	
	
?>