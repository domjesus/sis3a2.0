<?php
 namespace sis3a_oficial\Http\Middleware\util;

 class povoaObj{
  private $model;
  private $request;
  private $exclued_fields;

  public function __construct($model,$request,$exclued_fields){
   $this->model = $model;
   $this->request = $request;
   $this->exclued_fields = $exclued_fields;

  }

  public function povoa(){
   foreach ($this->request->input() as $key => $value) {
         //echo "Nome: $key -> Value: $value <br />";
         
         //UTILIZADO PARA TRANSFORMAR A DATA PT-BR(dd/mm/yyyy) PARA US(yyyy-mm-dd)
         if(substr($key, 0,2) == 'dt')
          $value = TrataDatas::convertDateToUs($value);

         if($value == 'on')
          $value = true;
         
         if(($key != '_token') && (!in_array($key, $this->exclued_fields)))
          $this->model->__set($key,$value);
          //echo "Chave $key => $value <br>";
        }

        return $this->model;
  }

 }
?>