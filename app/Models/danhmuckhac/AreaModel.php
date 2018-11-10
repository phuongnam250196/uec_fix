<?php

namespace App\Models\danhmuckhac;

use Illuminate\Database\Eloquent\Model;

class AreaModel extends Model
{
    protected $table = 'uec_area';
    protected $guarded=[];

    public function enterprise() {
    	return $this->hasMany('App\Models\EnterprisesModel', 'area_id');
    }
}
