<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        $technology_data = ['HTML', 'CSS', 'Bootstrap 5', 'JavaScript', 'VueJS', 'Axios', 'RESTful API', 'SQL', 'PHP', 'Json', 'Laravel', 'Blade', 'Eloquent', 'Faker'];
        
        foreach($technology_data as $_tech){
            $technology = new Technology;
            $technology->label = $_tech;
            $technology->color = $faker->hexColor();
            $technology->save();

        };
    }
}
