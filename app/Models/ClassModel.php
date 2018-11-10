<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'uec_class';
    protected $guarded=[];

    public function Teacher() {
    	return $this->belongsTo('App\Models\danhmuckhac\TeacherModel', 'teacher_id');
    }

    public function Student() {
    	return $this->hasMany('App\Models\StudentModel', 'class_id');
    }
}
