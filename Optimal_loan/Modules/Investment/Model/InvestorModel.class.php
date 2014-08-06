<?php  

/**
* 投资表模型
*/
class InvestorModel extends Model
{
    //对表中的用户名和开始日期完成
    protected $_auto = array ( 
        array('start_time','time',1,'function'), 
    );

    public function addHistory($username, $invest_amount, $history_id) {
    	$user = $this->where('username="'. $username .'"')->find();
        $history = $user['invest_history'];
        $amount = $user['invest_amount'];
        $json = json_decode($history);
        $json[] = $history_id;
        $history = json_encode($json);

        $data = array(
                'invest_history' => $history,
                'invest_amount' => $invest_amount + $amount,
            );
        $this->where('username="'. $username .'"')->save($data);
    }

    public function getCardNum($username) {
        $user = $this->where('username="'. $username .'"')->find();
        return $user['Card_Num'];
    }
    public function updateInfo($info) {
        $this->where('username="'.$info['username'].'"')->save($info);
    }
}   


?>