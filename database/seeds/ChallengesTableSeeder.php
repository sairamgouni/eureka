<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\User;
use \App\Category;
use \App\Challenge;

use Faker\Factory as Faker;

class ChallengesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
    	foreach (range(1,110) as $index) {
        $faker = Faker::create();
    		$name  = ucfirst($faker->sentence($nbWords = 6, $variableNbWords = true));
    		$userId = $faker->randomElement(User::pluck('id', 'id')->toArray());
    		$randomCategories = $faker->randomElement(Category::pluck('id', 'id')->toArray());
    		$challange = new Challenge;
    		
    		$challange->title = $name;
    		$challange->slug = str_slug($name);
    		$challange->description = $faker->text($maxNbChars = 200);
    		$challange->image = '';
    		$challange->active_from = '2019-7-11';
    		$challange->status = 'Active';
    		$challange->created_by = $userId;
    		$challange->save();
	        // $challange->save([
	        //     'title' => $name,
	        //     'slug' => str_slug($name),
	        //     'description' => $faker->text($maxNbChars = 200),
	        //     'image' => '',
	        //     'category_id' => 0,
	        //     'active_from'=>'2019-7-11',
	        //     'status' => 'Active',
	        //     'created_by' =>$userId,
	        // ]);
	        $challange->categories()->sync($randomCategories);
		}
    }
}
