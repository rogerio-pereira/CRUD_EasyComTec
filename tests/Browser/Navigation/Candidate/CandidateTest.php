<?php

namespace Tests\Browser\Navigation\Skill;

use App\Models\Candidate;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CandidateTest extends DuskTestCase
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
                ->clickLink('Candidates')
                ->assertSee('New Candidate');
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
            $skills = Skill::all();

            $browser->loginAs($user)
                ->visit('/admin/candidates')
                ->assertSee('New Candidate')
                ->clickLink('New Candidate')
                ->type('name', 'New Name')
                ->type('email', 'test@test.com')
                ->type('phone', '1111111111')
                ->type('skype', 'live:test')
                ->type('city', 'New City')
                ->type('state', 'New State')
                ->type('linkedin', 'http://linkedin.com/')
                ->type('portfolio', 'http://portfolio.com')
                ->check('#availability_4_8hours')
                ->check('#business')
                ->type('salary', '55')
                ->click('#btnPersonalInfoNext')
                ->type('bank[bank_information]', 'New Bank Information')
                ->type('bank[owner]', 'New Bank Owner')
                ->type('bank[bank]', 'New Bank Bank')
                ->type('bank[agency]', '1234')
                ->type('bank[account]', '123456')
                ->radio('bank[account_type]', 'Corrente / Chain')
                ->click('#btnBankNext');

            foreach ($skills as $skill) {
                $browser->radio('knowledge['.$skill->id.']', '5');
            }

            $browser->type('knowledge[other]', 'Other: 5')
                ->type('crud', 'http://crud.com')
                ->click('#submit')
                ->assertSee('Application saved successfully!');
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
            $skills = Skill::all();

            $browser->loginAs($user)
                ->visit('/admin/candidates')
                ->assertSee('New Candidate')
                ->clickLink('New Candidate')
                ->click('#btnPersonalInfoNext')
                ->click('#btnBankNext');

            foreach ($skills as $skill) {
                $browser->radio('knowledge['.$skill->id.']', '5');
            }

            $browser->click('#submit')
                ->assertSee('The name field is required.')
                ->assertSee('The email field is required.')
                ->assertSee('The phone field is required.')
                ->assertSee('The skype field is required.')
                ->assertSee('The city field is required.')
                ->assertSee('The state field is required.')
                ->assertSee('The availability field is required.')
                ->assertSee('The best time field is required.')
                ->assertSee('The salary field is required.')
                ->type('name', 'Name')
                ->type('email', 'email')
                ->type('phone', '1111111111')
                ->type('skype', 'live:test')
                ->type('city', 'City')
                ->type('state', 'State')
                ->type('linkedin', 'linkedin')
                ->type('portfolio', 'portfolio')
                ->check('#availability_4_8hours')
                ->check('#business')
                ->type('salary', '55')
                ->click('#btnPersonalInfoNext')

                ->assertSee('The bank information field is required.')
                ->assertSee('The owner field is required.')
                ->assertSee('The bank field is required.')
                ->assertSee('The agency field is required.')
                ->assertSee('The account field is required.')
                ->assertSee('The account_type field is required.')
                ->type('bank[bank_information]', 'Bank Information')
                ->type('bank[owner]', 'Bank Owner')
                ->type('bank[bank]', 'Bank Bank')
                ->type('bank[agency]', 'abc')
                ->type('bank[account]', '123456')
                ->radio('bank[account_type]', 'Corrente / Chain')
                ->click('#btnBankNext')

                ->assertSee('The crud field is required.')
                ->type('crud', 'crud')
                ->click('#submit')

                ->assertDontSee('The name field is required.')
                ->assertDontSee('The email field is required.')
                ->assertDontSee('The phone field is required.')
                ->assertDontSee('The skype field is required.')
                ->assertDontSee('The city field is required.')
                ->assertDontSee('The state field is required.')
                ->assertDontSee('The availability field is required.')
                ->assertDontSee('The best time field is required.')
                ->assertDontSee('The salary field is required.')
                ->assertSee('The email must be a valid email address.')
                ->assertSee('The linkedin format is invalid.')
                ->assertSee('The portfolio format is invalid.')
                ->type('email', 'test@teste.com')
                ->type('linkedin', 'http://linkedin.com')
                ->type('portfolio', 'http://portfolio.com')
                ->click('#btnPersonalInfoNext')

                ->assertDontSee('The bank information field is required.')
                ->assertDontSee('The owner field is required.')
                ->assertDontSee('The bank field is required.')
                ->assertDontSee('The agency field is required.')
                ->assertDontSee('The account field is required.')
                ->assertDontSee('The account_type field is required.')
                ->assertSee('The bank.agency must be a number.')
                ->type('bank[agency]', '123')
                ->click('#btnBankNext')

                ->assertDontSee('The crud field is required.')
                ->assertSee('The crud format is invalid.')
                ->type('crud', 'http://crud.com')
                ->click('#submit')
                ->assertSee('Application saved successfully!');
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
            $candidate = Candidate::all()->first();
            $skills = Skill::all();

            $browser->loginAs($user)
                ->visit('/admin/candidates')
                ->assertSee($candidate->name)
                ->visit('/admin/candidates/'.$candidate->id.'/edit')
                ->assertSee('Edit Candidate: '.$candidate->name.' - ID: '.$candidate->id)
                ->type('name', 'Alter Name')
                ->type('email', 'test@test.com')
                ->type('phone', '1111111111')
                ->type('skype', 'live:test')
                ->type('city', 'Alter City')
                ->type('state', 'Alter State')
                ->type('linkedin', 'http://linkedin.com/')
                ->type('portfolio', 'http://portfolio.com')
                ->check('#availability_4_8hours')
                ->check('#business')
                ->type('salary', '55')
                ->click('#btnPersonalInfoNext')
                ->type('bank[bank_information]', 'Alter Bank Information')
                ->type('bank[owner]', 'Alter Bank Owner')
                ->type('bank[bank]', 'Alter Bank Bank')
                ->type('bank[agency]', '1234')
                ->type('bank[account]', '123456')
                ->radio('bank[account_type]', 'Corrente / Chain')
                ->click('#btnBankNext');

            foreach ($skills as $skill) {
                $browser->radio('knowledge['.$skill->id.']', '3');
            }

            $browser->type('knowledge[other]', 'Other: 5')
                ->type('crud', 'http://crud.com')
                ->click('#submit')
                ->assertSee('Candidate updated successfully!');
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
            $candidate = Candidate::all()->first();

            $browser->loginAs($user)
                ->visit('/admin/candidates')
                ->assertSee($candidate->name)
                ->press('#delete_'.$candidate->id)
                ->assertSee('Candidate deleted successfully!')
                ->assertDontSee($candidate->name);
        });
    }
}
