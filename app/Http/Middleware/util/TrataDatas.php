<?php
namespace sis3a_oficial\Http\Middleware\util;

class TrataDatas{

   public static function trata_data($data){
  
 	 $day = substr($data,0,2);
  	 $month = substr($data,-7,2);
  	 $year = substr($data,-4);

  	 $data_english = $year."-".$month."-".$day;

  	 $data_ingles = date('Y-m-d',strtotime($data_english));
  
  	 return $data_ingles;
  
  }

}

?>