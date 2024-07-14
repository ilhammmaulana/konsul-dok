<?php

namespace Database\Seeders;

use App\Models\Subdistrict;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banyumanik = Subdistrict::where('name', 'like', 'Banyumanik')->first();
        User::create([
            "name" => 'Budi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // password
            'phone' => "08954638229",
            'photo' => 'https://placehold.co/600x400?text=User+Photo',
            'subdistrict_id' => $banyumanik->id
        ])->assignRole('admin');
        User::create([
            "name" => 'Ben',
            'email' => 'ben@gmail.com',
            'password' => bcrypt('password'), // password
            'phone' => "08921118398",
            'photo' => 'https://placehold.co/600x400?text=User+Photo',
            'subdistrict_id' => $banyumanik->id
        ])->assignRole('admin');


        User::factory(10)->create();
    }
}
