<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistTest extends DuskTestCase
{
    /**
     * @test
     * @group regis_test
     */
    public function registrasi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Test Registrasi')
                    ->type('email', 'test@mail.com')
                    ->type('password', '123')
                    ->type('password_confirmation', '123')
                    ->press('REGISTER')
                    ->assertSee('SELAMAT DATANG');

            $browser->logout();
        });
    }

    
    /**
     * @test
     * @group regis_test
     */
    public function akses_data_mcs(): void
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
                    ->screenshot('register_test')
                    ->assertSee('Data MCS');

            $browser->logout();
        });
    }
}
