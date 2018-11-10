<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobapp_RecruitmentModel extends Model
{
    protected $table = 'uec_jobapp_recruitment';
    protected $guarded=[];

    public function Student() {
    	return $this->belongsTo('App\Models\StudentModel', 'student_id');
    }
}
