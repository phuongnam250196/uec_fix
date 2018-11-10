<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
	use Notifiable;
	
    protected $table = 'uec_user';
    protected $guarded=[];

    public function Enterprises() {
    	return $this->belongsTo('App\Models\EnterprisesModel', 'enterprise_id');
    }

    public function Student() {
    	return $this->belongsTo('App\Models\StudentModel', 'student_id');
    }
}
