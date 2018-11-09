<?php

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Skill::class)->create([
            'name' => 'Ionic'
        ]);
        factory(Skill::class)->create([
            'name' => 'Android'
        ]);
        factory(Skill::class)->create([
            'name' => 'IOS'
        ]);
        factory(Skill::class)->create([
            'name' => 'HTML'
        ]);
        factory(Skill::class)->create([
            'name' => 'CSS'
        ]);
        factory(Skill::class)->create([
            'name' => 'Bootstrap'
        ]);
        factory(Skill::class)->create([
            'name' => 'Jquery'
        ]);
        factory(Skill::class)->create([
            'name' => 'AngularJs'
        ]);
        factory(Skill::class)->create([
            'name' => 'Java'
        ]);
        factory(Skill::class)->create([
            'name' => 'Asp.Net MVC'
        ]);
        factory(Skill::class)->create([
            'name' => 'C'
        ]);
        factory(Skill::class)->create([
            'name' => 'C#'
        ]);
        factory(Skill::class)->create([
            'name' => 'C++'
        ]);
        factory(Skill::class)->create([
            'name' => 'Cake'
        ]);
        factory(Skill::class)->create([
            'name' => 'Django'
        ]);
        factory(Skill::class)->create([
            'name' => 'Majento'
        ]);
        factory(Skill::class)->create([
            'name' => 'PHP'
        ]);
        factory(Skill::class)->create([
            'name' => 'Vue'
        ]);
        factory(Skill::class)->create([
            'name' => 'Wordpress'
        ]);
        factory(Skill::class)->create([
            'name' => 'Phyton'
        ]);
        factory(Skill::class)->create([
            'name' => 'Ruby'
        ]);
        factory(Skill::class)->create([
            'name' => 'My SQL Server'
        ]);
        factory(Skill::class)->create([
            'name' => 'My SQL'
        ]);
        factory(Skill::class)->create([
            'name' => 'Salesforce'
        ]);
        factory(Skill::class)->create([
            'name' => 'Photoshop'
        ]);
        factory(Skill::class)->create([
            'name' => 'Illustrator'
        ]);
        factory(Skill::class)->create([
            'name' => 'SEO'
        ]);
        factory(Skill::class)->create([
            'name' => 'Laravel'
        ]);
    }
}
