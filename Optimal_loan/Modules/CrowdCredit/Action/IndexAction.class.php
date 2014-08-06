<?php 

/**
* 众贷主页控制器
*/
class IndexAction extends CommonAction
{
        public function  chatroom(){
            if (I('POST.mobile')==1) {
                if (success) 
                    echo 1;
                else
                    echo "reason";
                } else {
                $this->display();
            }
        }
}
?>