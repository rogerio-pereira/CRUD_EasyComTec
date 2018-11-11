<?php

namespace Tests\Browser\Navigation\Skill;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SkillTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);

            $browser->loginAs($user)
                ->visit('/admin/')
                ->assertSee('Dashboard')
                ->clickLink('Skills')
                ->assertSee('New Skill');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);

            $browser->loginAs($user)
                ->visit('/admin/skills')
                ->assertSee('New Skill')
                ->clickLink('New Skill')
                ->assertSee('New Skill')
                ->assertSee('Name')
                ->type('name', 'Test Create')
                ->click('#submit')
                ->assertSee('Skill saved successfully!');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testValidationNoName()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);

            $browser->loginAs($user)
                ->visit('/admin/skills/create')
                ->assertSee('New Skill')
                ->assertSee('Name')
                ->press('Save')
                ->assertSee('The name field is required');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testValidationPass()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);

            $browser->loginAs($user)
                ->visit('/admin/skills/create')
                ->assertSee('New Skill')
                ->assertSee('Name')
                ->type('name', 'Test Dusk')
                ->press('Save')
                ->assertDontSee('The name field is required');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEdit()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $skill = Skill::all()->first();

            $browser->loginAs($user)
                ->visit('/admin/skills')
                ->assertSee($skill->name)
                ->visit('/admin/skills/'.$skill->id.'/edit')
                ->assertSee('Edit Skill: '.$skill->name.' - ID: '.$skill->id)
                ->type('name', 'Test Dusk alt')
                ->press('Save')
                ->assertDontSee('The name field is required')
                ->assertSee('Skill updated successfully!');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testDelete()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $skill = Skill::all()->first();

            $browser->loginAs($user)
                ->visit('/admin/skills')
                ->assertSee($skill->name)
                ->press('#delete_'.$skill->id)
                ->assertSee('Skill deleted successfully!')
                ->assertDontSee($skill->name);
        });
    }
}
