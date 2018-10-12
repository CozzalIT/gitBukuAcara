<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        if ($this->command->confirm('Database akan di refresh, anda yakin? [y/n]')) {
            $this->command->warn("=============================");
            $this->command->call('migrate:refresh');
            $this->command->warn("");
            $this->command->warn("===========================");
            $this->command->warn("Database berhasil di refresh.");
            $this->command->warn("===========================");
        }


        if ($this->command->confirm('Lakukan Seeding? [y/n]')) {
            $this->command->warn("=============================");
            $this->call(RaceNumberSeeder::class);
            $this->call(ClassificationSeeder::class);
            $this->command->warn("");
            $this->command->warn("===========================");
            $this->command->warn("Seeding berhasil.");
            $this->command->warn("===========================");
        }
    }
}
