<?php

use App\Models\User;
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
        User::create([
            'email' => 'contato@felipericardo.com',
            'password' => bcrypt('mudar123'),
            'name' => 'Felipe Ricardo',
            'admin' => true,
        ]);
    }
}
