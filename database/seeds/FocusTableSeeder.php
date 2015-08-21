<?php

use Illuminate\Database\Seeder;

class FocusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foci')->delete();
        DB::table('foci')->insert(
            [
                ['name' => 'Attacking', 'slug' => 'attacking'],
                ['name' => 'Defending', 'slug' => 'defending']
            ]
        );
        $this->command->info('Focus table seeded!');
    }
}
