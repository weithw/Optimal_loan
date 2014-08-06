<?php  


Class CommonAction extends Action{

    public function _initialize(){
            
        if(!session('username')){
            if (I('POST.mobile')==1) {
                echo "请登录";
                return ;
            } else {
                $this->error('请登录',U('Index/Index/Index'));
            }
        }
    }
}


?>