<?php

use Illuminate\Database\Seeder;
use sis3a_oficial\Models\Comunicado;


class ComunicadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comunicado = new Comunicado;

        $comunicado->__set('id_comunicado_tipo',1);
        $comunicado->__set('dt_comunicado','2017-01-09');
        $comunicado->__set('destino','destino teste');
        $comunicado->__set('id_ol',1);
     	$comunicado->__set('id_user',1);
     	$comunicado->__set('ativo',1);

     	$comunicado->save();
        
        $comunicado->__set('id_comunicado_tipo',2);
        $comunicado->__set('dt_comunicado','2017-01-10');
        $comunicado->__set('destino','outro destino teste');
        $comunicado->__set('id_ol',2);
     	$comunicado->__set('id_user',2);
     	$comunicado->__set('ativo',2);

     	$comunicado->save();
           
    }
}
