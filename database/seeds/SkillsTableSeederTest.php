<?php

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeederTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Skill::class, 5)->create();
    }
}
