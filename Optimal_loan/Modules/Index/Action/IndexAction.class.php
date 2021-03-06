<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        $this->display();
    }
     /**
     * 登录
     */
    public function Login(){
        if(!IS_POST) $this->error("非法进入");
      
        $username=I('username');
        $psd=I('password','','md5');
        $user=M('investor')->where("username= '".I('username')."'")->find();
        if(!$user||strcmp($user['password'],$psd)){
            $this->error('账户或密码错误');
        }
        session('username',$user['username']);
        
        $this->redirect('Index');
    }
     /**
     * 注册
     */
    public function register(){
        if(!IS_POST) $this->error("非法进入");
        if(I('verify')!=session('verify')) $this->error("验证码错误");
        $data['username']=I('username');
        if(M('Investor')->where("username= '".I('username')."'")->find()){
            $this->error('账户已存在');
        }
        $data['password']=I('password','','md5');
        $data['email']=I('email');
        $data['start_time']=time();
        M('investor')->create();
        M('investor')->add($data);
        session('username',$username);
        $this->success('info');
        $this->redirect('Index');
    }
    /**
     * 退出
     */
    public function Quit()
    {
        session("username",null);
         $this->redirect('Index');
    }
    /**
     * 验证码
     */
    public function Verify(){
       import('Class.Image',APP_PATH);
       Image::verify(4,200,50); 
        //验证码存在session[‘verify’]中
    }
    public function getUserInfo() {
        if(!IS_POST) $this->error("非法进入");
        $username = I('POST.username');
        $result = array();
        $result['investor'] = M('Investor')->where('username="'.$username.'"');
        $result['borrower'] = M('Borrower')->where('username="'.$username.'"');
        $result['guarantee'] = M('Guarantee')->where('username="'.$username.'"');
        if(I('POST.mobile') != NULL) {
            echo json_encode($result);
        } else {
            $this->assign('result', $result);
            $this->display();
        }
    }

    public function changeUserInfo() {
        if(!IS_POST) $this->error("非法进入");
        $data = $_POST;
        $investor = $data['investor'];
        $borrower = $data['borrower'];
        $guarantee = $data['guarantee'];
        if ($investor != NULL) 
            M('Investor')->update($investor);
        if ($borrower != NULL) 
            M('Borrower')->update($borrower);
        if ($guarantee != NULL) 
            M('Guarantee')->update($guarantee);

    }
}