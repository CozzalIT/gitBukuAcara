<?php

use Illuminate\Database\Seeder;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = [
          "Kabupaten Bandung",
          "Kabupaten Bandung Barat",
          "Kabupaten Bekasi",
          "Kabupaten Bogor",
          "Kabupaten Ciamis",
          "Kabupaten Cianjur",
          "Kabupaten Cirebon",
          "Kabupaten Garut",
          "Kabupaten Indramayu",
          "Kabupaten Karawang",
          "Kabupaten Kuningan",
          "Kabupaten Majalengka",
          "Kabupaten Pangandaran",
          "Kabupaten Purwakarta",
          "Kabupaten Subang",
          "Kabupaten Sukabumi",
          "Kabupaten Sumedang",
          "Kabupaten Tasikmalaya",
          "Kota Bandung",
          "Kota Banjar",
          "Kota Bekasi",
          "Kota Bogor",
          "Kota Cimahi",
          "Kota Cirebon",
          "Kota Depok",
          "Kota Sukabumi",
          "Kota Tasikmalaya"
        ];

        for ($i=0; $i < count($city); $i++) {
          $add = new City();
          $add->name = $city[$i];
          $add->save();
        }

    }
}
