<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class UserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    public function testBasicExample()
    {
        Artisan::call('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
            ->visit('dashboard')
            ->assertPathIs('/dashboard/');
        });
    }
}
