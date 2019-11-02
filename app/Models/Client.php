<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    		'name', 'site', 'state_id', 'city_id', 'region_id','email_id', 'attendance_cycle', 'incharge', 'remarks',
    		// ,'editor_id' removed
    ];

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
