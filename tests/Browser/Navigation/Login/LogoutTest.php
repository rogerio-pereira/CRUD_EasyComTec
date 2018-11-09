<?php

namespace Tests\Browser\Navigation\Login;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);

            $browser->loginAs($user)
                ->visit('/admin/')
                ->assertSee('Dashboard')
                ->click('#navbarDropdownLogout')
                ->clickLink('Logout')
                ->assertSee('Login');
        });
    }
}
