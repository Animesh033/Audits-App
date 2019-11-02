<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheduler extends Model
{
    protected $fillable = [
    		'site', 'client_id', 'state_id', 'city_id', 'region_id', 'audit_date', 'month_year',
    		// ,'editor_id' removed
    ];
}
