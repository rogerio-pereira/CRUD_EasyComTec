<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{   

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRedirectLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                ->assertSee('Login');
        });
    }

    public function testLoginWrongCredentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                ->type('email', 'easy@easy.com.br')
                ->type('password', 'wrong')
                ->press('#login')
                ->assertSee('These credentials do not match our records.');
        });
    }

    public function testLoginRightCredentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                ->type('email', 'easy@easy.com')
                ->type('password', 'easy')
                ->press('#login')
                ->assertSee('Dashboard');
        });
    }

    public function testLoginNoCredentials()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);

            $browser->loginAs($user)
                ->visit('/admin')
                ->assertSee('Dashboard');
        });
    }
}
