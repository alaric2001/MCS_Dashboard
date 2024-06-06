<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     *@group login_test
     */

    public function testlogin_test(): void
    {
        $user = User::factory()->create([
            'email' => 'shob@mail.com',
            'password' => Hash::make('123'), // Hash the password
        ]);
 
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', '123')
                    ->press('LOG IN')
                    ->assertPathIs('/')
                    ->visit('/mcs-data')
                    ->screenshot('afterlogin')
                    ->assertSee('Data MCS');

            $browser->logout();
        });
    }

    // public function testExample(): void
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/')
    //                 ->assertSee('Laravel');
    //     });
    // }
}
