<?php

use App\AgeGroup;
use App\Principle;
use App\Stage;
use Illuminate\Database\Seeder;

class DrillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ageGroupIds = array();
        foreach (AgeGroup::all() as $ageGroup) {
            $ageGroupIds[] = $ageGroup->id;
        }
        $principleIds = array();
        foreach (Principle::all() as $principle) {
            $principleIds[] = $principle->id;
        }
        DB::table('drills')->delete();
        DB::table('drills')->insert(
            [
                [
                    'name' => 'Close Cone Passes',
                    'slug' => 'close-cone-passes',
                    'stage_id' => Stage::where('slug', 'warmup')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Close Cone Passes 2',
                    'slug' => 'close-cone-passes',
                    'stage_id' => Stage::where('slug', 'warmup')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Close Cone Passes 3',
                    'slug' => 'close-cone-passes',
                    'stage_id' => Stage::where('slug', 'warmup')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Short Short Long',
                    'slug' => 'short-short-long',
                    'stage_id' => Stage::where('slug', 'small-sided-game')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Short Short Long 2',
                    'slug' => 'short-short-long',
                    'stage_id' => Stage::where('slug', 'small-sided-game')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Shooter Keep Shooting',
                    'slug' => 'shooter-keep-shooting',
                    'stage_id' => Stage::where('slug', 'modified-small-sided-game')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Short Short Long 2',
                    'slug' => 'short-short-long',
                    'stage_id' => Stage::where('slug', 'small-sided-game')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Short Short Long 3',
                    'slug' => 'short-short-long',
                    'stage_id' => Stage::where('slug', 'small-sided-game')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Short Short Long 4',
                    'slug' => 'short-short-long',
                    'stage_id' => Stage::where('slug', 'small-sided-game')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Small Cones Outside Game',
                    'slug' => 'small-cones-outside-game',
                    'stage_id' => Stage::where('slug', 'game')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ],
                [
                    'name' => 'Small Cones Outside Game 2',
                    'slug' => 'small-cones-outside-game',
                    'stage_id' => Stage::where('slug', 'game')->first()->id,
                    'age_id' => json_encode($ageGroupIds),
                    'principle_id' => json_encode($principleIds),
                    'image' => 'img/drills/100_shooter_keeper_shooting.gif'
                ]
            ]
        );
        $this->command->info('Drill table seeded!');
    }
}
