<?php

use Illuminate\Database\Seeder;
use App\Athlete;
use App\RaceNumber;

class AthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
          'Farhan Hanif Alaudin',
          'Ridwan Kamil',
          'Rizal Ahmad Fauzi',
          'Muhammad Iqbal Zamaludin',
          'Imron Abu Laiz',

          'Abu Halim',
          'Salaman AlFarizi',
          'Ivan Ramdan Hikmatul Falah',
          'Robby Firdaus',
          'Akmaludin Fahri',

          'Iqbal Shalahudin',
          'Agung Syandika Pratama',
          'Deri Hermawan',
          'Heri Susilo',
          'Ishaq Rizal'
        ];

        $race_number1 = RaceNumber::where('id', 1)->first();
        $race_number2 = RaceNumber::where('id', 2)->first();
        $race_number20 = RaceNumber::where('id', 20)->first();

        for ($i=0; $i < 11; $i++) {
          $athletes = new Athlete;
          $athletes->name = $name[$i];
          $athletes->birth_date = "2018-10-01";
          $athletes->gender = "L";
          $athletes->city_id = $i;
          $athletes->classification_id = 1;
          $athletes->save();
          $athletes->race_number()->attach($race_number1);
          $athletes->race_number()->attach($race_number2);
        }

        for ($i=11; $i < 13; $i++) {
          $athletes = new Athlete;
          $athletes->name = $name[$i];
          $athletes->birth_date = "2018-10-01";
          $athletes->gender = "L";
          $athletes->city_id = $i;
          $athletes->classification_id = 15;
          $athletes->save();
          $athletes->race_number()->attach($race_number20);
        }

        for ($i=13; $i < 15; $i++) {
          $athletes = new Athlete;
          $athletes->name = $name[$i];
          $athletes->birth_date = "2018-10-01";
          $athletes->gender = "L";
          $athletes->city_id = $i;
          $athletes->classification_id = 14;
          $athletes->save();
          $athletes->race_number()->attach($race_number20);
        }
    }
}
