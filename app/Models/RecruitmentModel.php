<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitmentModel extends Model
{
    protected $table = 'uec_recruitment';
    protected $guarded=[];

    public function Area() {
    	return $this->belongsTo('App\Models\danhmuckhac\AreaModel', 'area_id');
    }

    public function Yearofexp() {
    	return $this->belongsTo('App\Models\danhmuckhac\YearOfExpModel', 'yearofexp_id');
    }

    public function Position() {
    	return $this->belongsTo('App\Models\danhmuckhac\PositionModel', 'position_id');
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

    public function Enterprise() {
    	return $this->belongsTo('App\Models\EnterprisesModel', 'enterprise_id');
    }

    public function Jobapp_Recruitment() {
        return $this->hasMany('App\Models\Jobapp_RecruitmentModel', 'recruitment_id');
    }
}
