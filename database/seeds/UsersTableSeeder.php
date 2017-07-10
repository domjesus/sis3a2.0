<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::insert('insert into users(nome,matricula,passwd,nivel_acesso,id_ol,id_cargo) values (?,?,?,?,?,?)',['wandeir carneiro','1563655','1234','2','1','2']);
 		//factory(App\Models\User::class,3)->create()->each(function $u){
    	DB::table('users')->insert([
    		'nome'=>'wandeir carneiro',
    		'matricula'=>'1563654',
    		'passwd'=>md5('1234'),
    		'nivel_acesso'=>'2',
    		'id_ol'=>'1',
    		'id_cargo'=>'2',
    	 ]);

        DB::table('users')->insert([
            'nome'=>'gabi campana',
            'matricula'=>'1563653',
            'passwd'=>md5('1234'),
            'nivel_acesso'=>'1',
            'id_ol'=>'2',
            'id_cargo'=>'1',
         ]);
 		
    }
}
