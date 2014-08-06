<?php  

Class ContractAction extends Action{
  public function index(){
    session('roomID',I('ID'));
    $room=M('room')->where('ID='.I('ID'))->find();
    $user=session('username');
    $members=explode(',', $room['members']);
    $isexist=false;
    foreach ($members as $key => $value) {
        if($user==$value){
            $isexist=true;
        }
    }
    if($user!=$room['master']&&$isexist==false){
            if (I('POST.mobile')==1) {
                echo "非成员不可进入";
                return ;
            } else {
                $this->error("非成员不可进入");
            }
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
 public function contract(){
    $AgreeMembers=M('room')->where('ID='.session('roomID'))->getField('AgreeMembers');
    $members=explode(",", $AgreeMembers);
    
    $url=U('/CrowdCredit/Chatroom/chatroom/ID').'/'.session('roomID');
    foreach ($members as $value) {

      if(session('username')==$value){
         if (I('POST.mobile')==1) {
            echo "已签署过合同";
            return ;
            } else {
           $this->error('已签署过合同',$url);
        }
       }
    }
    if ($AgreeMembers==null) {
        $AgreeMembers.=session('username');
    } else {
        $AgreeMembers.=",";
        $AgreeMembers.=session('username');
    }
    M('room')->where('ID='.session('roomID'))->setField('AgreeMembers',$AgreeMembers);
    
    if (I('POST.mobile')==1) {
        echo "签署成功";
        return ;
        } else {
       $this->success('签署成功',$url);
    } 
 }
}

?>