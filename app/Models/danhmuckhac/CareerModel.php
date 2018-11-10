<?php

namespace App\Models\danhmuckhac;

use Illuminate\Database\Eloquent\Model;

class CareerModel extends Model
{
    protected $table = 'uec_career';
    protected $guarded=[];

    public function a() {
    	return hasOne('app/Models/EnterpriseModel', 'enterprise_id');
    }
}
