<?php

use Illuminate\Database\Seeder;

//Models
use App\User as User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user1 = User::firstOrCreate(
            ['name'=>'Keith'],
            [
                'name'      =>  'Keith',
                'email'     => 'keith@test.com',
                'password'  =>  bcrypt('nisbets'),
            ]
        );

        $user2 = User::firstOrCreate(
            ['name'=>'Tom'],
            [
                'name'      =>  'Tom',
                'email'     => 'tom@test.com',
                'password'  =>  bcrypt('nisbets'),
            ]
        );
    }
}
