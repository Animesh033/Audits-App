<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserRole extends Model
{
    //
    protected $table = "admin_user_roles";
    
    protected $fillable = ['role_id', 'user_id', 'admin_id', ];
}
