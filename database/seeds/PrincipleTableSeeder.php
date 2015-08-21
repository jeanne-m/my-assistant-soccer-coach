<?php

use App\Focus;
use Illuminate\Database\Seeder;

class PrincipleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('principles')->delete();
        $focus = Focus::where('slug', 'attacking')->first();
        DB::table('principles')->insert(
            [
                ['name' => 'Penetration', 'slug' => 'penetration', 'focus_id' => $focus->id],
                ['name' => 'Support', 'slug' => 'support', 'focus_id' => $focus->id],
                ['name' => 'Mobility', 'slug' => 'mobility', 'focus_id' => $focus->id],
                ['name' => 'Width', 'slug' => 'width', 'focus_id' => $focus->id],
                ['name' => 'Improvisation', 'slug' => 'improvisation', 'focus_id' => $focus->id]
            ]
        );
        $focus = Focus::where('slug', 'defending')->first();
        DB::table('principles')->insert(
            [
                ['name' => 'Pressure', 'slug' => 'pressure', 'focus_id' => $focus->id],
                ['name' => 'Delay', 'slug' => 'delay', 'focus_id' => $focus->id],
                ['name' => 'Cover', 'slug' => 'cover', 'focus_id' => $focus->id],
                ['name' => 'Balance', 'slug' => 'balance', 'focus_id' => $focus->id],
                ['name' => 'Compactness', 'slug' => 'compactness', 'focus_id' => $focus->id],
                ['name' => 'Control', 'slug' => 'control', 'focus_id' => $focus->id]
            ]
        );
        $this->command->info('Principle table seeded!');
    }
}
