<?php
namespace sis3a_oficial\Http\Middleware\util;

class TrataDatas{

   public static function convertDateToUs($data){
  
 	 $day = substr($data,0,2);
  	 $month = substr($data,-7,2);
  	 $year = substr($data,-4);

  	 $data_english = $year."-".$month."-".$day;

  	 $data_ingles = date('Y-m-d',strtotime($data_english));
  

  	 return $data_ingles;
  
  }

  	public static function convertDateToBr($campo){
  		return Date('d/m/Y',strtotime($campo));
  	}

  	public static function hasDate($campo){
  		if( ($campo != "") && ($campo != "1970-01-01"))
  			return TrataDatas::convertDateToBr($campo);

  		return "";		
  	}

}

?>