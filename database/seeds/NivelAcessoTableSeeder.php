<?php

use Illuminate\Database\Seeder;

class NivelAcessoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into nivel_acessos(nome,nivel) values(?,?)',['USUARIO',1]);
        DB::insert('insert into nivel_acessos(nome,nivel) values(?,?)',['ADMIN',2]);
        DB::insert('insert into nivel_acessos(nome,nivel) values(?,?)',['GERENTE',3]);
    }
}
