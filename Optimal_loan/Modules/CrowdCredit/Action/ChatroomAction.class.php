<?php  


Class ChatroomAction extends CommonAction{
      public function chatroom(){

         $room=M('room')->where("ID= '".I('ID')."'")->find();
         if(!$room){
           if (I('POST.mobile')==1) {
                echo "房间不存在";
                return ;
            } else {
                 $this->error("房间不存在",U('Loanroom/loanroom'));
            }
         }
         $myuser=M('borrower')->where('username='.session('username'))->find();
         $members=explode(',',$room['members']);
          if(session('username')==$room['master']){
            $data['ismaster']=0;
          }else{
             $data['ismaster']=1;
             $data['members'][]=M('borrower')->where('username='.$room['master'])->find();
          }
         if(!empty($members[0])){
          foreach ($members as $key=>$value) {
               if(session('username')==$value)break;
               $data['members'][]=M('borrower')->where('username='.$value)->find();
          }
         }
         $data['iscollect']=0;
         $collectroom=explode(',',$myuser['collectroom']);
         foreach ($collectroom as $key => $value) {
           if($value==I('ID')){
             $data['iscollect']=1;
           }
         }
         $data['room']=$room;
         $data['myuser']=$myuser;
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
   * 后台处理发言
   */
  public function sayprocess(){
    if(!IS_AJAX){
      if (I('POST.mobile')==1) {
                echo "非法进入";
                return ;
            } else {
                 $this->error('非法进入');
            }
    } 
         $data=M(I('rid'))->order('time desc')->limit('0,10')->select();
        $this->ajaxReturn($data);
  }
  /**
   * 后台处理
   */
  public function upprocess(){
      if(!IS_AJAX){
      if (I('POST.mobile')==1) {
                echo "非法进入";
                return ;
            } else {
                 $this->error('非法进入');
            }
    } 
    M(I('rid'))->add(I('post.','',''));
  }
  /**
   * 收藏房间
   */
  public function collect()
  {
       if(!IS_AJAX){
      if (I('POST.mobile')==1) {
                echo "非法进入";
                return ;
            } else {
                 $this->error('非法进入');
            }
    } 
     $croom=M('borrower')->where('username='.session('username'))->getField('collectroom');
     $rooms=explode(",", $croom);
     
     foreach ($rooms as $value) {
      if(I('rid')==$value){
          return;
       }
     }
     if($croom){
    
        $croom.=",";
        $croom.=I('rid');
     }else{
          $croom.=I('rid');
     }

     M('borrower')-> where('username='.session('username'))->setField('collectroom',$croom);
  }
  /**
   * 取消收藏
   */
  public function quitCollect()
  {
      if(!IS_AJAX){
      if (I('POST.mobile')==1) {
                echo "非法进入";
                return ;
            } else {
                 $this->error('非法进入');
            }
    } 
     $croom=M('borrower')->where('username='.session('username'))->getField('collectroom');
     $rooms=explode(",", $croom);
     foreach ($rooms as $key => $value) {
       $rooms[$key]="";
     }
     $rooms=implode(",",$rooms);

     M('borrower')-> where('username='.session('username'))->setField('collectroom',$rooms);
  }
  /**
   * 加入房间
   */
  public function join()
  {
       if(!IS_AJAX){
      if (I('POST.mobile')==1) {
                echo "非法进入";
                return ;
            } else {
                 $this->error('非法进入');
            }
    } 
    $room=M('room')->where("ID= '".I('rid')."'")->find();
    if($room['members']){
        $room['members'].=",";
        $room['members'].=session('username');
    }else{
        $room['members'].=session('username');
    }
    p($room);
    $member_num=$room['member_num']+1;
    
    $data=array('members'=>$room['members'],'member_num'=>$member_num);
    $data1=array('isjoin' =>1, 'ownroom' => I('rid'));
    M('borrower')->where('username='.session('username'))->setField($data1);
    M('room')->where("ID= '".I('rid')."'")->setField($data);
  }
  /**
   * 取消加入
   */
  public function quitjoin()
  {
      if(!IS_AJAX){
      if (I('POST.mobile')==1) {
                echo "非法进入";
                return ;
            } else {
                 $this->error('非法进入');
            }
    } 
    $room=M('room')->where("ID= '".I('rid')."'")->find();
    $member_num=$room['member_num']-1;
    $rooms=explode(",", $room['members']);
    foreach ($rooms as $key => $value) {
     if($value==session('username')){
      $rooms[$key]="";
     }
    }
    $rooms=implode(",",$rooms);
    $data=array('members'=>$rooms,'member_num'=> $member_num);
    M('room')->where("ID= '".I('rid')."'")->setField($data);
    $data1=array('isjoin' =>0, 'ownroom' => null);
    M('borrower')->where('username='.session('username'))->setField($data1);
  }
  /**
   * 踢人
   */
  public function Hostkick()
  {
     if(!IS_AJAX){
      if (I('POST.mobile')==1) {
                echo "非法进入";
                return ;
            } else {
                 $this->error('非法进入');
            }
    } 
    $room=M('room')->where("ID= '".I('rid')."'")->find();
    $member_num=$room['member_num']-1;
    $rooms=explode(",", $room['members']);
    foreach ($rooms as $key => $value) {
     if($value==I('id')){
      $rooms[$key]="";
     }
    }
    $rooms=implode(",",$rooms);
    $data=array('members'=>$rooms,'member_num'=> $member_num);
    M('room')->where("ID= '".I('rid')."'")->setField($data);
    $data1=array('isjoin' =>0, 'ownroom' => null);
    M('borrower')->where('username='.I('id'))->setField($data1);
  }
  /**
   * 解散
   */
  public function HostDestroy()
  {
    $room=M('room')->where("ID= '".I('rid')."'")->find();
    $members=explode(",", $room['members']);
    $members[]=$room['master'];
    $data=array('ownroom' => 0,'isjoin' => 0);
    foreach ($members as $key => $value) {
       M('borrower')->where("username='".$value."'")->setField($data);
    }
    M('room')->where("ID= '".I('rid')."'")->delete();
    M()->query("DROP TABLE IF EXISTS `".I('rid')."`;");
  }
}

?>