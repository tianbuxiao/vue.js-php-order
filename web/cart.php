<?php
	include_once('./include/db_conn.php');
	if(isset($_POST['list'])){
		$list=$_POST['list'];
		if($list){
			$db_conn=conn();
			for ($i=0;$i<count($list);$i++){ 
					if($list[$i]['num']>0){
						$num=$list[$i]['num'];
						$id=$list[$i]['id'];
						$sql="update wu_geowu set num='$num' where id='$id'";
					}
					else{
						$id=$list[$i]['id'];
						$sql="delete from wu_geowu where id='$id'";
					}
					$query=$db_conn->prepare($sql);
					$query->execute();
			}
			$db_conn=null;
		}
	}
	if(isset($_GET['zhuo_id'])&&isset($_GET['diancai_id'])){
		$db_conn=conn();
		$zhuo_id=$_GET['zhuo_id'];
		$diancai_id=$_GET['diancai_id'];
		$sql="select * from wu_geowu where zhuo_id='$zhuo_id' and diancai_id='$diancai_id'";
		$query=$db_conn->prepare($sql);
		$query->execute();
		$result=$query->fetchAll(PDO::FETCH_ASSOC);	
		$db_conn=null;
	    echo json_encode($result);
	}

?>