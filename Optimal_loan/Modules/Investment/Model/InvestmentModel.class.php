<?php  

/**
* 投资模型
*/
class InvestmentModel extends Model {
    protected $tableName = 'investor_history';
    public function addInvestment($invest_amount, $period, $card_num) {
//        echo "in add";
    	$data = array(
				'begin_time' => time(),
                'invest_period' => $period,
                'end_time' => time() + $period * 24 * 3600,
                'invest_amount' => $invest_amount,
                'Card_Num' => $card_num,
			);
    	return $this->add($data);
    }
 
}


?>