<?php  


Class MyroomAction extends Action{
  public function index(){
    $user=M('borrower')->where("username='".session('username')."'")->field('ownroom,collectroom')->find();
    $collectrooms=explode(',',$user['collectroom']);

    foreach ($collectrooms as $key=>$value) {
        if($room=M('room')->where("ID='".$value."'")->field('ID,master,room_name')->find()){
               $collectroom[]=$room;  
        }
   
    }
    $ownroom=M('room')->where("ID='".$user['ownroom']."'")->field('ID,master,room_name')->find();
    if($ownroom['ID']){
    $data['ownroom']=$ownroom;
    }
    if($collectroom[0]['ID']){
    $data['collectroom']=$collectroom;
    }
    if (I('POST.mobile')==1) {
        if (success) 
            echo json_encode($data);
        else
            echo "reason";
        } else {
    $this->assign($data)->display();
    }
 }
}

?>