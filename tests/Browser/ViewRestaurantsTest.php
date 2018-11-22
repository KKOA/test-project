<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

//Models
use App\Restaurant as Restaurant;

class ViewRestaurantsTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * Check that the appropriate message is displayed, when
     * restaurants are available and the user navigates to this page.
     *
     * @return void
     */

    public function test_users_can_view_no_avaliable_restaurants()
    {

        $this->browse(function (Browser $browser) {

            $restaurant1 = new Restaurant(
                [
                    'name'          => 'Benny',
                    'description'   => 'Benny Text',
                    // 'address1'      =>  '47 North Baliey',
                    // 'city'          =>  'Durham',
                    // 'postcode'      =>  'DH1 3ET'
                ]
            );

            $browser->visit('/restaurants')
                    ->assertPathIs('/restaurants')
                    ->assertSeeIn('.results', '0 restaurants found.')
                    ->assertDontSee('.restaurant',$restaurant1->name)
                    ;
        });
    }

    /**
     * Test when restaurants are avaliable and user navigates
     * to the page the apprioprate message is displayed
     *
     * @return void
     */

    public function test_users_can_view_avaliable_restaurants()
    {
        $this->browse(function (Browser $browser) {


            $restaurant1 = Restaurant::create(
                [
                    'name'          =>  'El Greco',
                    'description'   => ' random text here'//,
                    // 'address1'      =>  '27 Rother Street',
                    // 'address2'      =>  '',
                    // 'city'          =>  'Stratford-upon-Avon',
                    // 'county'        =>  '',
                    // 'postcode'      =>  'CV37 6QB'
                ]
            );

            $restaurant2 = Restaurant::create(
                [
                    'name'          =>  'Reubens',
                    'description'   => ' random text here'//,
                    // 'address1'      =>  '79 Baker Street',
                    // 'address2'      =>  '',
                    // 'city'          =>  'London',
                    // 'county'        =>  '',
                    // 'postcode'      =>  'W1U 6AG'
                ]
            );

            $browser->visit('/restaurants')
                    ->assertPathIs('/restaurants')
                    ->assertSeeIn("#restaurant1", e($restaurant1->name))
                    ->assertSeeIn("#restaurant2", e($restaurant2->name))
                    ->assertDontSeeIn('.results', '0 restaurants found.')
                    ;
        });
    }
}
