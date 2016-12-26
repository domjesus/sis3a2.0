<?php

use Illuminate\Database\Seeder;

class OlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into ols(nome,numero) values(?,?)',['APS BENTO GONCALVES','19022010']);
        DB::insert('insert into ols(nome,numero) values(?,?)',['APS CANELA','19022020']);
        DB::insert('insert into ols(nome,numero) values(?,?)',['APS CAXIAS DO SUL','19022030']);
    }
}
