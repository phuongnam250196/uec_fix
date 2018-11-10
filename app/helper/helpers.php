<?php

use Illuminate\Support\Facades\Input;
use App\Models\danhmuckhac\AreaModel;
use App\Models\danhmuckhac\YearOfExpModel;
use App\Models\danhmuckhac\CareerModel;
use App\Models\danhmuckhac\EducationModel;
use App\Models\danhmuckhac\FormalityModel;
use App\Models\danhmuckhac\PositionModel;
use App\Models\danhmuckhac\SkillModel;
use App\Models\EnterprisesModel;
use App\Models\RecruitmentModel;
use App\Models\TrainModel;
use App\Models\UserModel;
use App\Models\Jobapp_RecruitmentModel;
use App\Models\JobapplicationModel;
use App\Models\StudentModel;

use App\Models\baiviet\IntroUecModel;
use App\Models\baiviet\CareerOrientationModel;
use App\Models\baiviet\InfoStudentModel;
use App\Models\baiviet\JobFairModel;
use App\Models\baiviet\NewsModel;
use App\Models\baiviet\TowardBusinessModel;

function tin_new(){
	$tin_new = RecruitmentModel::join('uec_enterprises', 'uec_enterprises.id', '=', 'uec_recruitment.enterprise_id')
					->join('uec_area', 'uec_area.id', '=', 'uec_recruitment.area_id')
                    ->select('uec_recruitment.id', 'recruitment_name', 'recruitment_img', 'enterprise_name', 'uec_recruitment.enterprise_id', 'uec_recruitment.created_at', 'area_name')
                    ->orderBy('uec_recruitment.id', 'desc')
                    ->paginate(5);
                    // dd($tin_new);
	return $tin_new;
}
function Enterprise() {
	return EnterprisesModel::all();
}

function bai_viet_new() {
	$bv_new = NewsModel::orderBy('id', 'desc')->paginate(5);
	return $bv_new;
}

function su_kien_new() {
	return JobFairModel::orderBy('id', 'desc')->paginate(5);
}