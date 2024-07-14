<?php

namespace Database\Seeders;

use App\Models\CategoryDocter;
use App\Models\Docter;
use App\Models\Subdistrict;
use Illuminate\Database\Seeder;

class DocterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docterUmum = CategoryDocter::where('name', 'Dokter Umum')->first();
        $banyumanikSubdistrictId = Subdistrict::where('name', 'Banyumanik')->first()->id;

        $data = collect([
            [
                "name" => "Docter Cinta",
                "address" => "Jalan Gaharu No 23, Semarang Banyumanik Jawa Tenggah",
                "category_docter_id" => $docterUmum->id,
                "password" => bcrypt('password_docter'),
                "phone" => "08239823asds9",
                "subdistrict_id" => $banyumanikSubdistrictId,
                "email" => "docter@gmail.com"
            ],
        ]);

        $data->each(function ($data) {
            Docter::create($data);
        });
    }
}
