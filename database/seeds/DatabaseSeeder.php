<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(AgeGroupTableSeeder::class);
        $this->call(FocusTableSeeder::class);
        $this->call(PrincipleTableSeeder::class);
        $this->call(StageTableSeeder::class);
        $this->call(DrillTableSeeder::class);

        Model::reguard();
    }
}
