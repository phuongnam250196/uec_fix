<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnterprisesModel extends Model
{
    protected $table = 'uec_enterprises';
    protected $guarded=[];

    public function Area() {
    	return $this->belongsTo('App\Models\danhmuckhac\AreaModel', 'area_id');
    }

    public function User() {
    	return $this->hasMany('App\Models\UserModel', 'enterprise_id');
    }

    public function Recruitment() {
    	return $this->hasMany('App\Models\RecruitmentModel', 'enterprise_id');
    }
}
