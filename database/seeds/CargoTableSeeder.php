<?php

use Illuminate\Database\Seeder;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into cargos(nome) values(?)',['ANALISTA DO SEGURO SOCIAL']);    
		DB::insert('insert into cargos(nome) values(?)',['TECNICO DO SEGURO SOCIAL']);
		DB::insert('insert into cargos(nome) values(?)',['MEDICO PERITO']);
		DB::insert('insert into cargos(nome) values(?)',['ESTAGIARIO']);
    }
}
