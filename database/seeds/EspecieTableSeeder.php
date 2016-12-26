<?php

use Illuminate\Database\Seeder;

class EspecieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into especies(nome,numero) values(?,?)',['AUXILIO DOENCA PREVIDENCIARIO','31']);
        DB::insert('insert into especies(nome,numero) values(?,?)',['APOSENTADORIA POR INVALIDEZ PREVIDENCIARIO','32']);
        DB::insert('insert into especies(nome,numero) values(?,?)',['APOSENTADORIA POR IDADE','41']);
        DB::insert('insert into especies(nome,numero) values(?,?)',['APOSENTADORIA POR TEMPO DE CONTRIBUICAO','42']);
        DB::insert('insert into especies(nome,numero) values(?,?)',['APOSENTADORIA DOS PROFESSORES','57']);
    }
}
