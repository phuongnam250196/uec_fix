<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\danhmuckhac\AreaModel;
use App\Models\EnterprisesModel;
use App\Models\RecruitmentModel;
use App\Models\UserModel;
use App\Models\TrainModel;
use App\Models\StudentModel;
use App\Models\CourseModel;
use App\Models\SpecializeModel;
use App\Models\baiviet\IntroUecModel;
use App\Models\baiviet\CareerOrientationModel;
use App\Models\baiviet\InfoStudentModel;
use App\Models\baiviet\JobFairModel;
use App\Models\baiviet\NewsModel;
use App\Models\baiviet\TowardBusinessModel;

use DB;
use Response;
use Validator;

class FrontendController extends Controller
{

	
	
	// Trang chủ
    public function getHome() {
        
        $news = NewsModel::orderBy('id', 'desc')->paginate(5);
    	return view('frontend.index', compact('news'));
    }

    // Giới thiệu
    public function getGioithieu() {
         $intro = IntroUecModel::first();
    	return view('frontend.pub.pub_gioithieu', compact('intro'));
    }

    // Hướng về doanh nghiệp
    public function getHuongDN() {
         $huongdn = TowardBusinessModel::first();
    	return view('frontend.pub.pub_huongdoanhnghiep', compact('huongdn'));
    }

    // Định hướng nghề nghiệp
    public function getDinhhuongnghe() {
        $dh_first = CareerOrientationModel::orderBy('id', 'asc')->first();
        $dh_other = CareerOrientationModel::where('id', '!=', $dh_first->id)->paginate(3);
    	return view('frontend.pub.pub_dinhhuongNN', compact('dh_first', 'dh_other'));
    }
    public function getDinhhuongngheChitiet($id) {
        $dh_first = CareerOrientationModel::orderBy('id', 'asc')->first();
        $dh_other = CareerOrientationModel::where('id', '!=', $dh_first->id)->paginate(3);
        $careerOr = CareerOrientationModel::find($id);
        return view('frontend.pub.pub_dinhhuongNN_chitiet', compact('dh_first', 'dh_other', 'careerOr'));
    }

    // Jobfair
    public function getJobfair() {
         $jobfair_first = JobFairModel::orderBy('id', 'asc')->first();
         $jobfair_other = JobFairModel::where('id', '<>', $jobfair_first->id)->orderBy('id', 'desc')->paginate(5);
    	return view('frontend.pub.pub_job', compact('jobfair_first', 'jobfair_other'));
    }
    public function getJobfairChitiet($id) {
        $jobfair_first = JobFairModel::orderBy('id', 'asc')->first();
        $jobfair_other = JobFairModel::where('id', '<>', $jobfair_first->id)->orderBy('id', 'desc')->paginate(5);
        $jobfair = JobFairModel::find($id);
        return view('frontend.pub.pub_job_chitiet', compact('jobfair_first', 'jobfair_other', 'jobfair'));
    }

    // liên hệ
    public function getLienhe() {
         
    	return view('frontend.pub.pub_lienhe');
    }

    // thông tin sinh viên
    public function getThongtinsinhvien() {
         $infost = InfoStudentModel::first();
    	return view('frontend.pub.pub_thongtinSV', compact('infost'));
    }

    // khao sát sinh viên, cựu sinh viên
    public function getKSsinhvien() {
         $course = CourseModel::all();
         $specialize = SpecializeModel::all();
    	return view('frontend.pub.pub_khaosat', compact('course', 'specialize'));
    }
    public function postKSsinhvien(Request $request) {
        $rules = [
            'student_code' => 'required',
            'student_name' => 'required',
            'student_email' => 'required',
            'student_gender' => 'required',
            'course_id' => 'required',
            'specialize_id' => 'required',
            'student_sendEmailforEnterprise' => 'required',
            'student_receiveEmail' => 'required',
            'student_addinUEC' => 'required',
        ];
        $messages = [
            'student_code.required' => 'Mã sinh viên không được để trống!',
            'student_name.required' => 'Họ tên không được để trống!',
            'student_email.required' => 'Email không được để trống!',
            'student_gender.required' => 'Bạn chưa chọn giới tính!',
            'course_id.required' => 'Bạn chưa chọn khóa học!',
            'specialize_id.required' => 'Bạn chưa chọn chuyên ngành!',
            'student_sendEmailforEnterprise.required' => 'Bạn chưa xác nhận cho doanh nghiệp email!',
            'student_receiveEmail.required' => 'Bạn chưa chọn nhận thông tin việc làm!',
            'student_addinUEC.required' => 'Bạn chưa chọn tham gia vào UEC!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
             $check_std = StudentModel::find($request->student_code);
            if(!empty($check_std)) {
                $check_std->student_email = $request->student_email;
                $check_std->student_name = $request->student_name;
                $check_std->student_gender = $request->student_gender;
                $check_std->course_id = $request->course_id;
                $check_std->specialize_id = $request->specialize_id;
                $check_std->student_phone = $request->student_phone;
                $check_std->student_sendEmailforEnterprise = $request->student_sendEmailforEnterprise;
                $check_std->student_receiveEmail = $request->student_receiveEmail;
                $check_std->student_addinUEC = $request->student_addinUEC;
                $check_std->save();
                return back()->with('Cập nhật khảo sát thành công');
            } else {
                $std = new StudentModel;
                $std->student_code = $request->student_code;
                $std->student_email = $request->student_email;
                $std->student_name = $request->student_name;
                $std->student_gender = $request->student_gender;
                $std->course_id = $request->course_id;
                $std->specialize_id = $request->specialize_id;
                $std->student_phone = $request->student_phone;
                $std->student_sendEmailforEnterprise = $request->student_sendEmailforEnterprise;
                $std->student_receiveEmail = $request->student_receiveEmail;
                $std->student_addinUEC = $request->student_addinUEC;
                $std->input_source = 'khaosat';
                $std->save();
                return back()->with('message', 'Bạn đã làm khảo sát thành công');
            }
        
    }


    public function getKScuusinhvien() {
         
    	return view('frontend.pub.pub_khaosat_cuusinhvien');
    }

    // Khóa đào tạo
    public function getKhoadaotao() {
         $kdts = TrainModel::orderBy('id', 'desc')->paginate(8);
    	return view('frontend.pub.pub_khoadaotao', compact('kdts'));
    }
    public function getKhoadaotaoChitiet($id) {
         $kdt = TrainModel::find($id);
         $kdts = TrainModel::where('id', '!=', $id)->orderBy('created_at', 'desc')->paginate(5);
         $enter = TrainModel::find($id)->Enterprise;
         $skill = TrainModel::find($id)->Skill;
         $area = TrainModel::find($id)->Area;
    	return view('frontend.pub.pub_khoadaotao_chitiet', compact('kdt', 'kdts', 'enter', 'skill', 'area'));
    }

    // bài viết
    public function getBaiviet() {
         
    	return view('frontend.pub.pub_baiviet');
    }
    public function getBaivietChitiet($id) {
         $baiviet = NewsModel::find($id);
    	return view('frontend.pub.pub_baiviet_chitiet', compact('baiviet'));
    }

    // Tìm việc
    public function getTimviec() {
        $timviec = RecruitmentModel::orderBy('id', 'desc')->paginate(15);
        // dd($timviec);
    	return view('frontend.pub.pub_timviec', compact('enterprise', 'timviec'));
    }
    public function getTimviecChitiet($id) {
         $timviec = RecruitmentModel::find($id);
         $enter = RecruitmentModel::find($id)->Enterprise;
         $career = RecruitmentModel::find($id)->Career;
         $position = RecruitmentModel::find($id)->Position;
         $yearofexp = RecruitmentModel::find($id)->Yearofexp;
         $education = RecruitmentModel::find($id)->Education;
         $area = RecruitmentModel::find($id)->Area;
         $formality = RecruitmentModel::find($id)->Formality;
    	return view('frontend.pub.pub_timviec_chitiet', compact('timviec', 'enter', 'career', 'position', 'yearofexp', 'education', 'area', 'formality'));
    }

    // doanh nghiệp
    public function getDoanhnghiepPub() {
        $enterprise_pub = EnterprisesModel::join('uec_area', 'uec_area.id', '=', 'uec_enterprises.area_id')->orderBy('uec_enterprises.id', 'desc')->select('uec_enterprises.id', 'enterprise_name', 'enterprise_full_name', 'uec_enterprises.created_at', 'uec_enterprises.updated_at', 'area_name', 'enterprise_address', 'enterprise_describe')->paginate(5);
        $count = EnterprisesModel::join('uec_area', 'uec_area.id', '=', 'uec_enterprises.area_id')->orderBy('uec_enterprises.id', 'desc')->select('uec_enterprises.id', 'enterprise_name', 'enterprise_full_name', 'uec_enterprises.created_at', 'uec_enterprises.updated_at', 'area_name', 'enterprise_address', 'enterprise_describe')->count();
        $area= AreaModel::whereIn('id', function($b) {
            $b->select('area_id')->from('uec_enterprises');
         })->get();
        // $a = AreaModel::find(1)->enterprise->count();
        // dd($a);
    	return view('frontend.pub.pub_doanhnghiep', compact('area', 'enterprise_pub', 'count'));
        // dd($data, $a);
    }
    public function getDoanhnghiepKhuvuc($slug) {
        $enter_area = AreaModel::join('uec_enterprises', 'uec_enterprises.area_id', '=', 'uec_area.id')
                    ->where('area_slug', $slug)->select('uec_enterprises.id', 'enterprise_name', 'enterprise_full_name', 'uec_enterprises.created_at', 'uec_enterprises.updated_at', 'area_name', 'enterprise_address', 'enterprise_describe')->paginate(5);
        $ena = AreaModel::where('area_slug', $slug)->first();
        $count = AreaModel::join('uec_enterprises', 'uec_enterprises.area_id', '=', 'uec_area.id')
                    ->where('area_slug', $slug)->select('uec_enterprises.id', 'enterprise_name', 'enterprise_full_name', 'uec_enterprises.created_at', 'uec_enterprises.updated_at', 'area_name', 'enterprise_address', 'enterprise_describe')->count();
         $area= AreaModel::whereIn('id', function($b) {
            $b->select('area_id')->from('uec_enterprises');
         })->get();
        // dd($enter_area);
        return view('frontend.pub.pub_doanhnghiep_khuvuc', compact('area', 'enter_area', 'count', 'ena'));
    }
    public function getDoanhnghiepChitiet($id) {
        $enterp = EnterprisesModel::find($id);
        $area= AreaModel::whereIn('id', function($b) {
            $b->select('area_id')->from('uec_enterprises');
         })->get();
        $area_e = $enterp->Area;
    	return view('frontend.pub.pub_doanhnghiep_chitiet', compact('enterp', 'area', 'area_e'));
    }

}
