<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'uec_student';
    protected $guarded=[];

    public function Area() {
    	return $this->belongsTo('App\Models\danhmuckhac\AreaModel', 'area_id');
    }
    public function Position() {
        return $this->belongsTo('App\Models\danhmuckhac\PositionModel', 'position_id');
    }

    public function Class() {
    	return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }

    public function Course() {
    	return $this->belongsTo('App\Models\CourseModel', 'course_id');
    }

    public function Specialize() {
    	return $this->belongsTo('App\Models\SpecializeModel', 'specialize_id');
    }

    public function Science() {
    	return $this->belongsTo('App\Models\ScienceModel', 'science_id');
    }

    public function Teacher() {
    	return $this->belongsTo('App\Models\TeacherModel', 'teacher_id');
    }

    public function User() {
    	return $this->hasOne('App\Models\UserModel', 'student_id');
    }
}
