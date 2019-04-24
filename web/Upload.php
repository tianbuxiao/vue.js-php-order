<?php
	namespace app\home\controller;
	use think\Controller;
	class Upload extends First
	{
		//上传图片API
		public function upImg() {
			$arr = array('state'=>0,'msg'=>'上传失败','filepath'=>'');
			$file = request()->file('file');
			if($file){
				$info = $file->move('upload/weixin/');
				if ($info) {
					$arr['state'] = 1;
					$arr['msg'] = '上传成功';
					$arr['filepath'] = $info->getSaveName();
				}
			}
			return json($arr);
		}
	}	
?>