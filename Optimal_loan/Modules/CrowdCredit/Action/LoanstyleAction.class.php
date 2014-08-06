<?php  

/**
* 贷款类型选择
*/
class LoanstyleAction extends CommonAction
{
    
    public function loanstyle(){
        $user=M('borrower');
        // if($user->where("username ='" .session('username')."'")->find()) {
        //     $this->error("正在贷款中,不能再次贷款",U('Index/Index/Index'));
        // }
        if(M('borrower')->where('username='.session('username'))->find()){
            $this->redirect("Loanroom/loanroom");
        }
        if (I('POST.mobile')==1) {
            if (success) 
                echo 1;
            else
                echo "erorr reason";
            } else {
            $this->display();
        }


    }
}
?>