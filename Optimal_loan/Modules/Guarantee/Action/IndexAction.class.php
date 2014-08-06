<?php
class IndexAction extends Action
{
	public function index(){

    }
    public function  chatroom(){
        $this->display();
    }

    public function guarantee() {
        $info = array();
        $info['username'] = "ghw";//session('username');

        $info['company_name'] = I('POST.name');
        $info['company_telephone'] = I('POST.telephone');
        $info['company_addr'] = I('POST.address');
        if (existNull($info)) {
            if (I('POST.mobile') == 1) {
                echo "param error";
                return;
            } else 
                $this->error("param error");
        }

        if (M('Guarantee')->where('username="'.$info['username'].'"')->find()) {
            if (I('POST.mobile') == 1) {
                echo "you have guaranteed";
                return;
            } else 
                $this->error("you have guaranteed");
        }

        M('Guarantee')->add($info);
        echo 1;
    }
    public function passAudit() {
        $username = "ghw";//session('username');
        if (!M('Guarantee')->where('username="'.$username.'"')->find()) {
            if (I('POST.mobile') == 1) {
                echo "username doesn't exist";
                return;
            } else 
                $this->error("username doesn't exist");
        }
        $data["audit_status"] = "1";
        M('Guarantee')->where('username="'.$username.'"')->save($data);
        echo 1;
    }
    
    public function find() {
        
        //region(地区)必填,query是公司的名字,选填
    	$region = I('POST.region');     
        $query = I('POST.query')?I('POST.query'):"担保公司"; 
        //百度地图api
        $url="http://api.map.baidu.com/place/v2/search?&q=". $query ."&region=". $region ."&output=json&ak=EF11c774a013df603b786a325d482779";
        $curl=curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_HEADER,0);
        $output=curl_exec($curl);

        $temp = json_decode($output);
        $company = $temp->results;
        $result = array();
        foreach ($company as $key => $value) {
            $company_name = $value->name;
            $company_phone = $value->telephone;
            if ($company_phone == NULL)
                $company_phone = "0";
            $company_addr = $value->address;
            //去百度百科上爬公司的简介
            $url="http://baike.baidu.com/search/none?word=" . $company_name;

            curl_setopt($curl,CURLOPT_URL,$url);
            $found=curl_exec($curl);

            $arr = array();
            $re='/<a href="http:\/\/baike.baidu.com\/view(.+).htm"/';
            preg_match($re,$found,$arr);
            $baike_url = "http://baike.baidu.com/view" . $arr[1] . ".htm";

            curl_setopt($curl,CURLOPT_URL,$baike_url);
            $found_baike=curl_exec($curl);  

            $re='/<div class=\"para\">(.+?)<\/div>/';
            preg_match_all($re,$found_baike,$arr);
            
            $info = $arr[1][0] . $arr[1][1]; 
            $info = preg_replace("/<a.+?>/is", "", $info); 
            $info = preg_replace("/<\/a>/is", "", $info); 
            $result[]["name"] = $company_name;
            $result[]["telephone"] = $company_phone;
            $result[]["address"] = $company_addr;
            $result[]["info"] = $info;
        }
        curl_close($curl);
        if(I('POST.mobile') != NULL) {
            echo json_encode($result);
        } else {
            $this->assign('result', $result);
            $this->display();
        }
    }
}



?>