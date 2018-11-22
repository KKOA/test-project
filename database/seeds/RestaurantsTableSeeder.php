<?php

use Illuminate\Database\Seeder;

//Model
use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantImg = '/imgs/restaurants/';
        $faker = Faker\Factory::create();
        $restaurant1 = Restaurant::firstOrCreate(
            ['name'=>'El Greco'], //Greek
            [
                'name'          =>  'El Greco',
                'description'   => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)//,
                // 'address1'      =>  '27 Rother Street',
                // 'address2'      =>  '',
                // 'city'          =>  'Stratford-upon-Avon',
                // 'county'        =>  '',
                // 'postcode'      =>  'CV37 6QB'
            ]
        );
        $restaurant2 = Restaurant::firstOrCreate(
            ['name'=>'Reubens'], //Russina
            [
                'name'          =>  'Reubens',
                'description'   => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)//,
                // 'address1'      =>  '79 Baker Street',
                // 'address2'      =>  '',
                // 'city'          =>  'London',
                // 'county'        =>  '',
                // 'postcode'      =>  'W1U 6AG'
            ]
        );
        $restaurant3 = Restaurant::firstOrCreate(
            ['name'=>'Laduree UK'], //Swedish
            [
                'name'          =>  'Laduree UK',
                'description'   => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)//,
                // 'address1'      =>  '71 Burlington Arcade',
                // 'address2'      =>  '',
                // 'city'          =>  'London',
                // 'county'        =>  '',
                // 'postcode'      =>  'W1J 0QX'
            ]
        );
        $restaurant4 = Restaurant::firstOrCreate(
            ['name'=>'Sorrentino Restaurant'], //Italien
            [
                'name'          =>  'Sorrentino Restaurant',
                'description'   => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)//,
                // 'address1'      =>  '64 Gold Street',
                // 'address2'      =>  '',
                // 'city'          =>  'Northampton',
                // 'county'        =>  '',
                // 'postcode'      =>  'NN1 1RS'
            ]
        );
    }
}
