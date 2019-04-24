<?php
	include_once('./include/db_conn.php');
	if(isset($_POST['search'])){
		$db_conn=conn();
		$search=$_POST['search'];
		$sql="select * from wu_caidan where caidan_name like'%$search%' and caidan_flas='1'";
		$query=$db_conn->prepare($sql);
		$query->execute();
		$result1=$query->fetchAll(PDO::FETCH_ASSOC);
		$db_conn=null;
		if($result1){
			echo json_encode($result1);	
		}
		
	}
	
	
?>