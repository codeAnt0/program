<?php 
namespace Admin\Controller;
use Think\Controller;

class DownloadController extends Controller{
	function downloadAdd(){
		$download_model = D('Download');
		$form_data = $download_model ->create();
		//dump($form_data);die;
		// if(empty($form_data)){
		// 	echo $download_model->getError();
		// }else{
		// 	if($download_model -> add($form_data)){
		// 		$this->success('添加链接成功',U('downloadList'),3);
		// 	}else{
		// 		$this->error('添加链接失败',U('downloadAdd'),3);
		// 	}
		// }
		$this-> display();
	}

	function downloadList(){
		$this-> display();
	}
}



 ?>