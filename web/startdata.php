<?php
	include_once('./include/db_conn.php');
	if(isset($_GET['zhuo_id'])){
		$db_conn=conn();
		$zhou_hao=$_GET['zhuo_id'];
		$sql="select * from wu_diancai where zhuo_hao='$zhou_hao' and caidan_wc='0'";
		$query=$db_conn->prepare($sql);
		$query->execute();
		$result1=$query->fetchAll();
		if($result1){
			$str=['result'=>1,'responce'=>"该桌号正在使用"];
		}else{
			$str=['result'=>2,'responce'=>"该桌号无人使用"];
		}
		$db_conn=null;
		echo json_encode($str);	
	}
	
?>