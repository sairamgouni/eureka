<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\User;
use \App\Category;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
    		$name  = ucfirst($faker->word);
	        DB::table('categories')->insert([
	            'title' => $name,
	            'slug' => str_slug($name),
	            'status' => 'Active',
	            'created_by' =>2,
	            'about_user' => $faker->text($maxNbChars = 200),
	        ]);
		}
    }
}
