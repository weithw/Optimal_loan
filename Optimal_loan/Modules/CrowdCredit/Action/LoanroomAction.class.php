<?php  

/**
* 房间处理
*/
class loanroomAction extends CommonAction
{
  
    /**
     * 初始房间显示
     */
    public function Loanroom(){
        roomtype();
        ?><?php header("Content-type: text/html; charset=utf-8");?><?php
        // $roomid=M('borrower')->where('username='.session('username'))->find();
        // if ($roomid!=0) {
        //   $this->redirect('Chatroom/chatroom?ID='.$roomid['ownroom']);
        // }
        $data['rooms']=M('room')->where('room_type='.session('room_type'))->select();
         if (I('POST.mobile')==1) {
        if (success) 
            echo json_encode($data);
        else
            echo "reason";
        } else {
        $this->assign($data)->display();
       }
    }
    /**
     * 车贷搜索后显示
     */
    public function Search1Room(){
        ?><?php header("Content-type: text/html; charset=utf-8");?><?php
          if(I('name')!=null){
            $query='room_type='.session('room_type')." AND room_name='".I('name')."'";
          }else{
             $query='room_type='.session('room_type');
          }
          switch (I('number')) {
            case '3':$query.='AND member_num<=3';break;
            case '4':$query.='AND member_num=4 ';break;
            case '5':$query.='AND member_num=5 ';break;
            case '6':$query.='AND member_num=6 ';break;
          }
        $data['rooms']=M('room')->where($query)->select();
        if (I('POST.mobile')==1) {
            if (success) 
                echo json_encode($data);
            else
                echo "reason";
            } else {
        $this->assign($data)->display('Loanroom');
       }
    }
    /**
     * 房贷搜索后显示
     */
    public function Search2Room(){
          ?><?php header("Content-type: text/html; charset=utf-8");?><?php
          if(I('name')!=null){
            $query='room_type='.session('room_type')." AND room_name='".I('name')."'";
          }else{
             $query='room_type='.session('room_type').' AND ';
          }
         
          switch (I('number')) {
          case '3':$query.='AND member_num<=3';break;
            case '4':$query.='AND member_num=4 ';break;
            case '5':$query.='AND member_num=5 ';break;
            case '6':$query.='AND member_num=6 ';break;
          }
        $data['rooms']=M('room')->where($query)->select();

         if (I('POST.mobile')==1) {
            if (success) 
                echo json_encode($data);
            else
                echo "reason";
            } else {
        $this->assign($data)->display('Loanroom');
       }
    }
    /**
     * 生活贷搜索后显示
     */
    public function Search3Room(){
         ?><?php header("Content-type: text/html; charset=utf-8");?><?php
          if(I('name')!=null){
            $query='room_type='.session('room_type')." AND room_name='".I('name')."'";
          }else{
             $query='room_type='.session('room_type').' AND ';
          }
          switch (I('number')) {
            case '3':$query.='AND member_num<=3';break;
            case '4':$query.='AND member_num=4 ';break;
            case '5':$query.='AND member_num=5 ';break;
            case '6':$query.='AND member_num=6 ';break;
          }
        $data['rooms']=M('room')->where($query)->select();

        if (I('POST.mobile')==1) {
            if (success) 
                echo json_encode($data);
            else
                echo "reason";
            } else {
        $this->assign($data)->display('Loanroom');
       }
    }
    /**
     * 个人企业搜索后显示
     */
    public function Search4Room(){
       ?><?php header("Content-type: text/html; charset=utf-8");?><?php
          if(I('name')!=null){
            $query='room_type='.session('room_type')." AND room_name='".I('name')."'";
          }else{
             $query='room_type='.session('room_type').' AND ';
          }
          switch (I('number')) {
           case '3':$query.='AND member_num<=3';break;
            case '4':$query.='AND member_num=4 ';break;
            case '5':$query.='AND member_num=5 ';break;
            case '6':$query.='AND member_num=6 ';break;
          }
        $data['rooms']=M('room')->where($query)->select();
        if (I('POST.mobile')==1) {
            if (success) 
                echo json_encode($data);
            else
                echo "reason";
            } else {
        $this->assign($data)->display('Loanroom');
       }
    }
    /**
     * 新建房间
     */
    public function Createroom()
    {
      switch (session('room_type')) {
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
      $data['room_name']=I('room_name');
      $data['room_type']=session('room_type');
      $data['master']=session('username');
      $data['create_time']=time();
      $data['abstract']=I('abstract');
      $data['isjoin']=1;
      foreach ($loan as $key => $value) {
       $data['borrow_amount']=$key;
       $data['borrow_period']=$value;
      }
      $user=M('room');
      $user->create();
      $ID=$user->add($data);
      $room=M();
      $query="CREATE TABLE IF NOT EXISTS `".$ID."` (
      `time` bigint(20) NOT NULL,
      `content` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
        `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
      )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
      $room->query($query);
      M('borrower')->where("username='".session('username')."'")->save(array('ownroom' => $ID,'isjoin' =>1));
      
      $this->redirect('Chatroom/chatroom?ID='.$ID);
    }
}
?>