<?php

use Illuminate\Database\Seeder;

class AgeGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('age_groups')->delete();
        DB::table('age_groups')->insert(
            [
                ['name' => 'U9 and younger', 'slug' => 'u9-and-younger'],
                ['name' => 'U10 - U13', 'slug' => 'u10-u13'],
                ['name' => 'U14 - U15', 'slug' => 'u14-u15'],
                ['name' => 'U16 - U18', 'slug' => 'u16-u18'],
                ['name' => 'U19 and older', 'slug' => 'u19-and-older']
            ]
        );
        $this->command->info('AgeGroup table seeded!');
    }
}
