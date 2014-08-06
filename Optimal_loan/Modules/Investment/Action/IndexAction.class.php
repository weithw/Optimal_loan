<?php 

/**
* 投资主页控制器
*/
class IndexAction extends Action
{

	public function index(){
        //$this->display();
        echo I("POST.money") . " yuan";
    }
    public function  chatroom(){
        $this->display();
    }

    public function earning() {

    }

    public function invest() {
    	$username = session('username');
    	$money = I('POST.money');
    	$period = I('POST.period');

        switch ($period) {
            case "3个月":
                $period = 90;
                break;
            case "6个月":
                $period = 180;
                break;
            case "1年":
                $period = 365;
                break;
            case "2年":
                $period = 730;
                break;
            case "3年":
                $period = 1095;
                break;    
            case "5年":
                $period = 1825;
                break;
            default:
                if (I('POST.mobile') == 1) {
                    echo "period error";
                    return;
                } else 
                    $this->error("period error");
                break;
        }
        $card_num = D('Investor')->getCardNum($username);
        if ($card_num==NULL) {
            if (I('POST.mobile') == 1) {
                echo "card number is null";
                return;
            } else 
                $this->error("card number is null");
        }
        else {            
        	$id = D('Investment')->addInvestment($money, $period, $card_num);
            D('Investor')->addHistory($username, $money, $id);
            if (I('POST.mobile') == 1) {
                echo 1;
                return;
            } 
            // else {
            //     $this->display();
            // }
        }
        
    }
}



?>