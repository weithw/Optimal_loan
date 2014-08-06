<?php 

/**
* 借贷表模型
*/
class BorrowerModel extends Model
{
    //对表中的用户名和开始日期完成
    protected $_auto = array ( 
        array('username','getusername',1,'callback'),
        array('start_time','time',1,'function'), 
        array('borrow_type','getborrowtype',1,'callback'),
    );

    function getusername(){
      return session('username');
    }
    function getborrowtype(){
      return session('borrow_type');
    }

}
?>