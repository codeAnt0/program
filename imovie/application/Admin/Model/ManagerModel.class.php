<?php 
namespace Admin\Model;
use Think\Model;
class ManagerModel extends Model{
	protected $fields = array(
		'manager_id','manager_name','manager_passwd',
		'manager_status','manager_ctime',
		'manager_login','manager_salt'
	);

	protected $_validate = array(
		array('manager_name','require','管理员名不能为空',1,'regex',3),
		array('manager_passwd','password','密码格式不正确',1,'regex',3),
		array('re-passwd','manager_passwd','两次密码不一致',1,'confirm',3),
		// array('manager_status','checkStatus','用户状态不正确',1,'callback',3)
	);
	protected $_auto = array(
		//自动补全盐
		array('manager_salt','makeSalt',1,'function'),
		//自动补全创建时间
		array('manager_ctime','time',1,'function'),
		//自动补全最后登录时间
		array('manager_login','time',1,'function'),
	);

	function checkStatus($status){
		$arr = array('启用','禁用');
		if(in_array($status,$arr)){
			return true;
		}else{
			return false;
		}
	}

	protected $_map = array(
		'name' => 'manager_name',
		'passwd' => 'manager_passwd',
		'status' => 'manager_status'
	);

	function checkLogin($username,$password){
		$info = $this->where("manager_name='$username'")->find();
		if(empty($info)){
			return false;
		}
		$password = salt($password,$info['manager_salt']);
		if($info['manager_passwd']==$password){
			$arr = array(
				'manager_id' => $info['manager_id'],
				'manager_login'=> time()
			);
			$this->save($arr);
			session('id',$info['manager_id']);
			session('name',$info['manager_name']);
			session('roleid',$info['manager_roleid']);
			return true;
		}else{
			return false;
		}
	}
}



 ?>