<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateCityRegion extends Model
{
	protected $fillable = [
			'state_city_region_id', 'state_city_regionable_id', 'state_city_regionable_type',
	];

    public function states()
        {
            return $this->morphedByMany('App\Models\State', 'states'); //states is registered on boot method in AppServiceProvider
        }

        /**
         * Get all of the videos that are assigned this tag.
         */
        public function cities()
        {
            return $this->morphedByMany('App\Models\City', 'cities');//cities is registered on boot method in AppServiceProvider
        }
}
