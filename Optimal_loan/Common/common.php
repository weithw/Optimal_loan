<?php 
/**
  * 格式化输出数组
  */ 
function p($data){
     if(is_array($data)){
          echo '<pre>';
          print_r($data);
     }else{
          var_dump($data);
     }
}
?>