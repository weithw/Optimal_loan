<?php  

/**
* 投资表模型
*/
class Model extends Model
{
    //对表中的用户名和开始日期完成
    protected $_auto = array ( 
        array('start_time','time',1,'function'), 
    );

}


?>