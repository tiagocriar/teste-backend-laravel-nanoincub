<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrador')->insert([
            'nome_completo' => 'Admin',
            'login' => 'admin',
            'senha' => Hash::make('changeme'),
            'data_criacao' => Carbon::now()->format('Y-m-d H:i:s'),
            'data_alteracao' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
