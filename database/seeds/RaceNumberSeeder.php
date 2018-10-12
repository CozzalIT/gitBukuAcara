<?php

use Illuminate\Database\Seeder;
use App\RaceNumber;

class RaceNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gaya_bebas = new RaceNumber();
        $gaya_bebas->name = '50M GAYA BEBAS';
        $gaya_bebas->is_relay = 0;
        $gaya_bebas->save();

        $gaya_bebas = new RaceNumber();
        $gaya_bebas->name = '100M GAYA BEBAS';
        $gaya_bebas->is_relay = 0;
        $gaya_bebas->save();

        $gaya_bebas = new RaceNumber();
        $gaya_bebas->name = '200M GAYA BEBAS';
        $gaya_bebas->is_relay = 0;
        $gaya_bebas->save();

        $gaya_bebas = new RaceNumber();
        $gaya_bebas->name = '400M GAYA BEBAS';
        $gaya_bebas->is_relay = 0;
        $gaya_bebas->save();

        $gaya_bebas = new RaceNumber();
        $gaya_bebas->name = '800M GAYA BEBAS';
        $gaya_bebas->is_relay = 0;
        $gaya_bebas->save();

        $gaya_bebas = new RaceNumber();
        $gaya_bebas->name = '1500M GAYA BEBAS';
        $gaya_bebas->is_relay = 0;
        $gaya_bebas->save();

        $gaya_punggung = new RaceNumber();
        $gaya_punggung->name = '50M GAYA PUNGGUNG';
        $gaya_punggung->is_relay = 0;
        $gaya_punggung->save();

        $gaya_punggung = new RaceNumber();
        $gaya_punggung->name = '100M GAYA PUNGGUNG';
        $gaya_punggung->is_relay = 0;
        $gaya_punggung->save();

        $gaya_punggung = new RaceNumber();
        $gaya_punggung->name = '200M GAYA PUNGGUNG';
        $gaya_punggung->is_relay = 0;
        $gaya_punggung->save();

        $gaya_dada = new RaceNumber();
        $gaya_dada->name = '50M GAYA DADA';
        $gaya_dada->is_relay = 0;
        $gaya_dada->save();

        $gaya_dada = new RaceNumber();
        $gaya_dada->name = '100M GAYA DADA';
        $gaya_dada->is_relay = 0;
        $gaya_dada->save();

        $gaya_dada = new RaceNumber();
        $gaya_dada->name = '200M GAYA DADA';
        $gaya_dada->is_relay = 0;
        $gaya_dada->save();

        $gaya_kupu_kupu = new RaceNumber();
        $gaya_kupu_kupu->name = '50M GAYA KUPU-KUPU';
        $gaya_kupu_kupu->is_relay = 0;
        $gaya_kupu_kupu->save();

        $gaya_kupu_kupu = new RaceNumber();
        $gaya_kupu_kupu->name = '100M GAYA KUPU-KUPU';
        $gaya_kupu_kupu->is_relay = 0;
        $gaya_kupu_kupu->save();

        $gaya_kupu_kupu = new RaceNumber();
        $gaya_kupu_kupu->name = '200M GAYA KUPU-KUPU';
        $gaya_kupu_kupu->is_relay = 0;
        $gaya_kupu_kupu->save();

        $gaya_ganti_perorangan = new RaceNumber();
        $gaya_ganti_perorangan->name = '100M GAYA GANTI PERORANGAN';
        $gaya_ganti_perorangan->is_relay = 0;
        $gaya_ganti_perorangan->save();

        $gaya_ganti_perorangan = new RaceNumber();
        $gaya_ganti_perorangan->name = '200M GAYA GANTI PERORANGAN';
        $gaya_ganti_perorangan->is_relay = 0;
        $gaya_ganti_perorangan->save();

        $gaya_ganti_perorangan = new RaceNumber();
        $gaya_ganti_perorangan->name = '400M GAYA GANTI PERORANGAN';
        $gaya_ganti_perorangan->is_relay = 0;
        $gaya_ganti_perorangan->save();

        $gaya_ganti_estafet = new RaceNumber();
        $gaya_ganti_estafet->name = '4x100M GAYA GANTI ESTAFET';
        $gaya_ganti_estafet->is_relay = 1;
        $gaya_ganti_estafet->save();

        $gaya_bebas_estafet = new RaceNumber();
        $gaya_bebas_estafet->name = '4x100M GAYA BEBAS ESTAFET';
        $gaya_bebas_estafet->is_relay = 1;
        $gaya_bebas_estafet->save();

        $gaya_bebas_estafet = new RaceNumber();
        $gaya_bebas_estafet->name = '4x200M GAYA BEBAS ESTAFET';
        $gaya_bebas_estafet->is_relay = 1;
        $gaya_bebas_estafet->save();
    }
}
