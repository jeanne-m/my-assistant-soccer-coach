<?php

use Illuminate\Database\Seeder;

class StageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stages')->delete();
        DB::table('stages')->insert(
            [
                ['name' => 'Warmup', 'slug' => 'warmup'],
                ['name' => 'Small Sided Game', 'slug' => 'small-sided-game'],
                ['name' => 'Modified Small Sided Game', 'slug' => 'modified-small-sided-game'],
                ['name' => 'Game', 'slug' => 'game']
            ]
        );
        $this->command->info('Stage table seeded!');
    }
}
