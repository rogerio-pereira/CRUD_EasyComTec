<?php

namespace Tests\Browser\Navigation\Skill;

use App\Models\Skill;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ResumeSkillTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShowAllSkills()
    {
        $this->browse(function (Browser $browser) {
            factory(Skill::class, 5)->create();
            $skills = Skill::all();

            $browser->visit('/')
                ->assertSee('Faça parte da nossa equipe / Join our team')
                ->clickLink('Conhecimento')
                ->assertSee('Conhecimento / Knowledge');

            foreach ($skills as $skill) {
                $browser->assertSee($skill->name);
            }
        });
    }
}
