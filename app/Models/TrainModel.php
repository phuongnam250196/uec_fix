<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainModel extends Model
{
    protected $table = 'uec_training';
    protected $guarded=[];

    public function Area() {
    	return $this->belongsTo('App\Models\danhmuckhac\AreaModel', 'area_id');
    }

    public function Skill() {
    	return $this->belongsTo('App\Models\danhmuckhac\SkillModel', 'skill_id');
    }

    public function Enterprise() {
        return $this->belongsTo('App\Models\EnterprisesModel', 'enterprise_id');
    }
}
