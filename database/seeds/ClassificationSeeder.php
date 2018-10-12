<?php

use Illuminate\Database\Seeder;
use App\Classification;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = new Classification();
        $s1->name = 'S1';
        $s1->point = 1;
        $s1->save();

        $s2 = new Classification();
        $s2->name = 'S2';
        $s2->point = 2;
        $s2->save();

        $s3 = new Classification();
        $s3->name = 'S3';
        $s3->point = 3;
        $s3->save();

        $s4 = new Classification();
        $s4->name = 'S4';
        $s4->point = 4;
        $s4->save();

        $s5 = new Classification();
        $s5->name = 'S5';
        $s5->point = 5;
        $s5->save();

        $s6 = new Classification();
        $s6->name = 'S6';
        $s6->point = 6;
        $s6->save();

        $s7 = new Classification();
        $s7->name = 'S7';
        $s7->point = 7;
        $s7->save();

        $s8 = new Classification();
        $s8->name = 'S8';
        $s8->point = 8;
        $s8->save();

        $s9 = new Classification();
        $s9->name = 'S9';
        $s9->point = 9;
        $s9->save();

        $s10 = new Classification();
        $s10->name = 'S10';
        $s10->point = 10;
        $s10->save();

        $s11 = new Classification();
        $s11->name = 'S11';
        $s11->point = 11;
        $s11->save();

        $s12 = new Classification();
        $s12->name = 'S12';
        $s12->point = 12;
        $s12->save();

        $s13 = new Classification();
        $s13->name = 'S13';
        $s13->point = 13;
        $s13->save();

        $s14 = new Classification();
        $s14->name = 'S14';
        $s14->point = 14;
        $s14->save();

        $s15 = new Classification();
        $s15->name = 'S15';
        $s15->point = 15;
        $s15->save();
    }
}
