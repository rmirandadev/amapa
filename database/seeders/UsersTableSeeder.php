<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $user = User::create([
            'name'          => 'Administração Geral',
            'email'         => 'admin@amapa.gov.br',
            'password'      => Hash::make('Adm1n2021!@'),
            'status'        => '1',
            'user_id'       => '1',
        ]);

        $user->assignRole(['Administrador']);

    }
}
