<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Felipe Ricardo do Nascimento',
            'document' => '07168931938',
            'email' => 'contato@felipericardo.com',
            'birthdate' => '1991-07-08',
        ]);
    }
}
