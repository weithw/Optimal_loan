<?php 

/**
* 众贷登录控制器
*/
class CompleteAction extends CommonAction
{
    
    /**
     * 首页
     */
    public function Complete(){
        if(!empty($_GET['id'])){session('borrow_type',I('id'));}
        if(M('borrower')->where('username='.session('username'))->find()){
            $this->redirect("Loanroom/loanroom");
        }
       
        if (I('POST.mobile')==1) {
            if (success) 
                echo 1;
            else
                echo "reason";
            } else {
            $this->display();
        }
    } 
    /**
     * 第一此审核
     */
    public function check(){
        if(!IS_POST) $this->error("非法进入",U('Index/Index'));
         $user=D('Borrower');
         if($user->create()){
            $user->add();
        }
        switch (session('borrow_type')) {
            case '1':
            $this->redirect('CarComplete');
                break;
            case '2':
            $this->redirect('HouseComplete');
                break;
            case '3':
            $this->redirect('LifeComplete');
                break;
            case '4':
            $this->redirect('CompanyComplete');
                break;
        }
    }
    /**
     * 车贷审核
     */
    public function CarCheck()
    {
        if(!IS_POST) $this->error("非法进入",U('Index/Index'));
        $type=M('borrower')->where("username='".session('username')."'")->find();
        if(!$type){
            $this->error('请先填写个人资料',U('CrowdCredit/Complete/Complete'));
        }
        $user=M('car_loan');
        $data=I();
        $data['username']=session('username');
        $data['audit_status']= 2; 
        $data['loan_status']=1;  
        $data['borrower_level']='C';
        $data['loan_period']=((int)I('year'))*4+(int)I('season');
        if($user->create()){
            $user->add($data);
        }
        $news['create_time']=$type['start_time'];
        $news['audit_status']=$data['audit_status'];
        $news['loan_status']=$data['loan_status'];
        $news['max_loan']=maxloan();
        if (I('POST.mobile')==1) {
        if (success) 
            echo json_encode($news);
        else
            echo "reason";
            }else {
            $this ->assign($news)->display('vertify');
       }
    }
    /**
     * 房贷审核
     */
    public function HouseCheck()
    {
        if(!IS_POST) $this->error("非法进入",U('Index/Index'));
        $type=M('borrower')->where("username='".session('username')."'")->find();
        if(!$type){
            $this->error('请先填写个人资料',U('CrowdCredit/Complete/Complete'));
        }
        $user=M('house_loan');
        $data=I();
        $data['username']=session('username');
        $data['audit_status']= 2; 
        $data['loan_status']=1; 
        $data['borrower_level']='C'; 
        $data['loan_period']=((int)I('year'))*4+(int)I('season');
        if($user->create()){
            $user->add($data);
        }
        $news['create_time']=$type['start_time'];
        $news['audit_status']=$data['audit_status'];
        $news['loan_status']=$data['loan_status'];
        $news['max_loan']=maxloan();
         if (I('POST.mobile')==1) {
        if (success) 
            echo json_encode($news);
        else
            echo "reason";
            }else {
            $this ->assign($news)->display('vertify');
       }
    }
    /**
     * 企业贷审核
     */
    public function CompanyCheck()
    {
        if(!IS_POST) $this->error("非法进入",U('Index/Index'));
        $type=M('borrower')->where("username='".session('username')."'")->find();
        if(!$type){
            $this->error('请先填写个人资料',U('CrowdCredit/Complete/Complete'));
        }
        $user=M('enterprise_loan');
        $data=I();
        $data['username']=session('username');
        $data['audit_status']= 2; 
        $data['loan_status']=1;  
        $data['borrower_level']='C';
        $data['loan_period']=((int)I('year'))*4+(int)I('season');
        if($user->create()){
            $user->add($data);
        }
        $news['create_time']=$type['start_time'];
        $news['audit_status']=$data['audit_status'];
        $news['loan_status']=$data['loan_status'];
        $news['max_loan']=maxloan();
         if (I('POST.mobile')==1) {
        if (success) 
            echo json_encode($news);
        else
            echo "reason";
            }else {
            $this ->assign($news)->display('vertify');
       }
    }
      /**
     * 企业贷审核
     */
    public function LifeCheck()
    {
        if(!IS_POST) $this->error("非法进入",U('Index/Index'));
        $type=M('borrower')->where("username='".session('username')."'")->find();
        if(!$type){
            $this->error('请先填写个人资料',U('CrowdCredit/Complete/Complete'));
        }
        $user=M('life_loan');
        $data=I();
        $data['username']=session('username');
        $data['audit_status']= 2; 
        $data['loan_status']=1;  
        $data['borrower_level']='C';
        $data['loan_period']=((int)I('year'))*4+(int)I('season');
        if($user->create()){
            $user->add($data);
        }
        $news['create_time']=$type['start_time'];
        $news['audit_status']=$data['audit_status'];
        $news['loan_status']=$data['loan_status'];
        $news['max_loan']=maxloan();
         if (I('POST.mobile')==1) {
        if (success) 
            echo json_encode($news);
        else
            echo "reason";
            }else {
            $this ->assign($news)->display('vertify');
       }
    }
    /**
     * 显示审核状态
     */
    public function vertify()
    {
         $type=M('borrower')->where("username='".session('username')."'")->find();
        if(!$type){
            $this->error('请先填写个人资料',U('CrowdCredit/Complete/Complete'));
        }
        $type=M('borrower')->where("username='".session('username')."'")->find();
        switch (session('borrow_type')) {
            case '1':
            $loan=M('car_loan')->where("username='".session('username')."'")->getField('loan_amount,loan_period');
              break;
            case '2':
            $loan=M('house_loan')->where("username='".session('username')."'")->getField('loan_amount,loan_period');
              break;
            case '3':
            $loan=M('life_loan')->where("username='".session('username')."'")->getField('loan_amount,loan_period');
              break;
            case '4':
            $loan=M('enterprise_loan')->where("username='".session('username')."'")->getField('loan_amount,loan_period');
              break;
      }
    $type=M('borrower')->where("username='".session('username')."'")->find();
    $news['create_time']=$type['start_time'];
    $news['audit_status']=$data['audit_status'];
    $news['loan_status']=$data['loan_status'];
    $news['max_loan']=maxloan();
     if (I('POST.mobile')==1) {
        if (success) 
            echo json_encode($news);
        else
            echo "reason";
            }else {
            $this ->assign($news)->display('vertify');
       }
    }
}


?>