<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public static function getTopContributors()
    {
    	$countries = \App\Country::where('status','=','active')->get();
    	$list = [];
    	foreach($countries as $country)
    	{
    		$item['country'] = $country;
    		 $top_contributors = \App\User::where('reputation','>','0')
    		 						->where('rid','=',$country->id)
                                    ->orderBy('reputation','desc')
                                    ->limit(10)
                                    ->get();
        	if(count($top_contributors)<=0)
        		continue;
        	$item['toppers'] = \App\User::processFrendSuggestions($top_contributors);
        	$list[] = $item;
    	}

    	return $list;
    }
}
