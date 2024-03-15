<?php

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    public function run()
    {
        Address::create([
            'contact_id' => 1,
            'street' => 'Jalan Contoh 123',
            'city' => 'Contoh Kota',
            'province' => 'Contoh Provinsi',
            'country' => 'Contoh Negara',
            'postal_code' => '12345',
        ]);
    }
}
