<?php

namespace Tests\Browser\Navigation\Interview;

use App\Models\Candidate;
use App\Models\Interview;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InterviewTest extends DuskTestCase
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
                ->clickLink('Interviews')
                ->assertSee('Interviews');
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
            $candidate = Candidate::all()->first();
            $interview = $candidate->interview;

            $browser->loginAs($user)
                ->visit('/admin/candidates')
                ->assertSee($candidate->name)
                ->press('#interview_'.$candidate->id)
                ->pause(1000)
                ->assertSee('Schedule Interview')
                ->type('appointment', '2050/01/01 08:00')
                ->press('Save')
                ->assertSee('Interview saved successfully!');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testValidation()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $interview = Interview::all()->first();

            $browser->loginAs($user)
                ->visit('/admin/interviews/'.$interview->id.'/edit')
                ->assertSee($interview->candidate->name)
                ->type('appointment', '')
                ->press('Save')
                ->assertSee('The appointment field is required.')
                ->type('appointment', '2050/01/01 08:00')
                ->press('Save')
                ->assertDontSee('The appointment field is required.');
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
            $interview = Interview::all()->first();

            $browser->loginAs($user)
                ->visit('/admin/interviews')
                ->assertSee($interview->candidate->name)
                ->visit('/admin/interviews/'.$interview->id.'/edit')
                ->assertSee('Edit Interview: '.$interview->candidate->name.' - ID: '.$interview->id)
                ->type('appointment', '2050/01/01 08:00')
                ->press('Save')
                ->assertSee('Interview updated successfully!');
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
            $interview = Interview::all()->first();

            $browser->loginAs($user)
                ->visit('/admin/interviews')
                ->assertSee($interview->candidate->name)
                ->press('#delete_'.$interview->id)
                ->assertSee('Interview deleted successfully!')
                ->assertDontSee($interview->name);
        });
    }
}
