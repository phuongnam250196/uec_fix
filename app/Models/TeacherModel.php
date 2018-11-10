<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $table = 'uec_teacher';
    protected $guarded = [];

    public function Area() {
    	return $this->belongsTo('App\Models\danhmuckhac\AreaModel', 'area_id');
    }

    public function User() {
    	return $this->hasOne('App\Models\UserModel', 'teacher_id');
    }
}
