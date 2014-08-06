<?php 

/**
* 投资登录控制器
*/
class LoginAction extends Action
{
    /**
     * 首页
     */
    public function Index(){

    } 
    /**
     * 登录
     */
    public function Login(){
        if(!IS_POST) $this->error("非法进入");
        if($_POST['verify']!=session('verify')) $this->error("验证码错误");
        $username=I('username');
        $psd=I('password','','md5');
        $user=D('Investor')->where(array('username'))->find();
        if(!$user||$user['password']!=$pwd){
            $this->error('账户或密码错误');
        }
        session('username',$user['username']);
        $this->redirect(首页);
    }
    
     /**
     * 注册
     */
    public function register(){
        if(!IS_POST) $this->error("非法进入");
        if($_POST['verify']!=session('verify')) $this->error("验证码错误");
        $username=I('username');
        $psd=I('password','','md5');
        $user=D('Investor')->where(array('username'))->find();
        if($user){
            $this->error('账户已存在');
        }
        D('Investor')->create();
        D('Investor')->add();
        session('username',$username);
        $this->redirect(首页);
    }
    /**
     * 验证码
     */
    public function Verify(){
       import('Class.Image',APP_PATH);
       Image::verify(); 
        //验证码存在session[‘verify’]中
    }
}


?>