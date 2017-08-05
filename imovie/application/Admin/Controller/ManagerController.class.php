<?php  
//1.声明命名空间
namespace Admin\Controller;
//2.引入控制器基础类
use Think\Controller;
//3.编写控制器类，继承控制器基础类
class ManagerController extends Controller{
	function managerList(){
		$pageno = I('get.p',1);
		$pagesize = 5;
		$manager_model = D('Manager');
		$manager_list =$manager_model -> page($pageno,$pagesize)->select();
		//dump($manager_list);die;
		$this->assign('manager_list',$manager_list);
		$count = $manager_model->count();
		$page = new \Think\Page($count,$pagesize); 
		$show = $page->show();
		$this -> assign('show',$show);
		$this->display();
	}

	function addOk(){
		$manager_model = D('Manager');
		$form_data = $manager_model->create();
		//dump($form_data);die;
		if(empty($form_data)){
			echo $manager_model->getError();
		}else{
			$form_data['manager_passwd']=
				salt($form_data['manager_passwd'],$form_data['manager_salt']);
			//如果是数组,调用add的方法写入数据库
			if($manager_model->add($form_data)){
				$this->success('添加管理员成功',U('managerList'),3);
			}else{
				$this->error('添加失败',U('managerAdd'),3);
			}
		}
	}

	function managerDel(){
		$manager_id = I('get.manager_id');
		//dump($manager_id);die;
		$manager_model = D('Manager');
		$del_result = $manager_model->where("manager_id = $manager_id")->delete();
		if($del_result){
			$this->success('删除成功',U('managerList'),3);
		}else{
			$this->error('删除失败',U('managerList'),3);
		}
	}
}