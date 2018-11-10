<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolModel extends Model
{
    protected $table = 'uec_school';
    protected $guarded=[];

    public function Area() {
    	return $this->hasMany('App\Models\danhmuckhac\AreaModel', 'area_id');
    }

    public function User() {
    	return $this->hasMany('App\Models\UserModel', 'user_id');
    }
}
