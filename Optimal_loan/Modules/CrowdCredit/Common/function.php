<?php

/**
 * 众贷中确定房间类型
 */
function roomtype(){
        $type=M('Borrower')->where("username='".session('username')."'")->getField('borrow_type');
        session('room_type',$type);
}
/**
 * 确定贷款个人最大额度
 */
function maxloan(){
  return 500000;
}
?>