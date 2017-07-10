<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CargoTableSeeder::class);
        $this->call(NivelAcessoTableSeeder::class);
        $this->call(OlTableSeeder::class);
        $this->call(EspecieTableSeeder::class);
        $this->call(ComunicadosSeeder::class);
    }
}
