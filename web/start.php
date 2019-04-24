<?php
	include_once('./include/db_conn.php');
	if(isset($_GET['zhuo_id'])&&isset($_GET['num'])){
		$db_conn=conn();
		$zhou_hao=$_GET['zhuo_id'];
		$num=$_GET['num'];
		$sql="select * from wu_zhuo where zhuo_hao=$zhou_hao";
		$query=$db_conn->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		if(!$result){
			$str=['result'=>1,'responce'=>"没有该桌号，请确认桌号正确"];
		}else{
			$sql="select * from wu_diancai where zhuo_hao='$zhou_hao' and caidan_wc='0'";
			$query=$db_conn->prepare($sql);
			$query->execute();
			$result1=$query->fetchAll(PDO::FETCH_ASSOC);
			if(!$result1){
				$sql="INSERT INTO wu_diancai  VALUES (NULL, '$zhou_hao', NULL, '$num', NULL, '0')";
				$num=$db_conn->exec($sql);
				$id=$db_conn->lastInsertId();			
				if($num>=1){
					$str=['result'=>3,'responce'=>$id];
				}else{
					$str=['result'=>2,'responce'=>"增加该桌号点餐失败"];
				}			
			}else{
				$str=['result'=>4,'responce'=>$result1[0]['diancai_id']];
			}
		}
		$db_conn=null;
	}else{
		$str=['result'=>0,'responce'=>"没有桌号，请添加桌号"];
	}
	
	echo json_encode($str);
?>