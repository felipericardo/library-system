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
            'document' => '071.689.319-38',
            'email' => 'contato@felipericardo.com',
            'birthdate' => '08/07/1991',
        ]);
    }
}
