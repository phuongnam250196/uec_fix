<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobapplicationModel extends Model
{
    protected $table = 'uec_jobapplication';
    protected $guarded=[];

     public function Area() {
    	return $this->belongsTo('App\Models\danhmuckhac\AreaModel', 'area_id');
    }

    public function Yearofexp() {
    	return $this->belongsTo('App\Models\danhmuckhac\YearOfModel', 'yearofexp_id');
    }

    public function Education() {
    	return $this->belongsTo('App\Models\danhmuckhac\EducationModel', 'education_id');
    }

    public function Formality() {
    	return $this->belongsTo('App\Models\danhmuckhac\FormalityModel', 'formality_id');
    }

    public function Career() {
    	return $this->belongsTo('App\Models\danhmuckhac\CareerModel', 'career_id');
    }

    public function User() {
    	return $this->belongsTo('App\Models\UserModel', 'user_id');
    }
}
