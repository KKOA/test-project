<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

//Models
use App\User as User;

class Register extends DuskTestCase
{
    use DatabaseMigrations;


    /**
     * Check user cannot create an account with invalid details
     * @test
     * @return void
     */
    // public function user_cannot_register_account_with_invalid_details()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/register')
    //                 ->assertSee('Register')
    //                 ->type('name','keith')
    //                 ->type('email','keith@test.com')
    //                 ->type('password','secret')
    //                 ->type('password_confirmation','secret')
    //                 ->press('Register')
    //                  //Assertion not written
    //                 ->assertpathIs('/home')
    //                 ;
    //     });
    // }



    /**
     * Check user cannot create an account with exist account credintials
     * @test
     * @return void
     */
    public function user_cannot_register_an_account_with_exist_account_credintials()
    {
        $this->browse(function (Browser $browser) {
            $user1 = User::create(
                [
                    'name'          =>  'Keith',
                    'email'         => 'keith@test.com',
                    'password'  =>  bcrypt('nisbets')
                ]
            );

            $browser->visit('/register')
                    ->assertSee('Register')
                    ->type('name',$user1->name)
                    ->type('email',$user1->email)
                    ->type('password','secret')
                    ->type('password_confirmation','secret')
                    // ->press('Register')
                    ->click('button[type="submit"]')
                     //Assertion not written
                    ->assertpathIs('/register')
                    ->assertSeeIn('form','The email has already been taken.')
                    ->assertSeeIn('nav', 'Login')
                    ->assertSeeIn('nav', 'Register')

                    ;
        });
    }


    /**
     * A user can create an account.
     * @test
     * @return void
     */
    public function user_can_register_account_with_valid_details()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->type('name','keith')
                    ->type('email','keith@test.com')
                    ->type('password','secret')
                    ->type('password_confirmation','secret')
                    ->press('Register')
                    ->assertpathIs('/home')
                    ->assertDontSeeIn('nav', 'Login')
                    ->assertDontSeeIn('nav', 'register')
                    ;
        });
    }
}
