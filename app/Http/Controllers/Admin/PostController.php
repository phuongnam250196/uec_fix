<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\baiviet\NewsRequest;
use App\Http\Requests\baiviet\CareerOrientationRequest;
use App\Http\Requests\baiviet\IntroUecRequest;
use App\Http\Requests\baiviet\JobFairRequest;
use App\Http\Requests\baiviet\TowardBusinessRequest;
use App\Http\Requests\baiviet\InfoStudentRequest;
use App\Http\Requests\baiviet\EditCareerOrientationRequest;
use App\Http\Requests\baiviet\EditInfoStudentRequest;
use App\Http\Requests\baiviet\EditIntroUecRequest;
use App\Http\Requests\baiviet\EditJobFairRequest;
use App\Http\Requests\baiviet\EditTowardBusinessRequest;
use App\Http\Requests\baiviet\EditNewsRequest;


use App\Models\baiviet\NewsModel;
use App\Models\baiviet\CareerOrientationModel;
use App\Models\baiviet\InfoStudentModel;
use App\Models\baiviet\IntroUecModel;
use App\Models\baiviet\JobFairModel;
use App\Models\baiviet\TowardBusinessModel;
class PostController extends Controller
{

	// Tin tức
    public function getTintuc() {
    	return view('backend.baiviet.adm_tintuc');
    }
    public function postTintuc(NewsRequest $request) {
    	$enter = new NewsModel;
    	$enter->news_name = $request->tt_title;
    	$enter->news_slug = str_slug($request->tt_title);
    	$enter->news_content = $request->tt_content;
		$file =  $request->tt_img;
        $path = 'uploads/tintuc';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->news_img = $path.$modifiedFileName;
        }
        $enter->save();
    	return redirect('admin/baiviet/tintuc/danhsach')->with('success', 'Thêm mới thành công!');
    }
    public function getEditTintuc($id) {
        $data['data'] = NewsModel::find($id);
        return view('backend.baiviet.adm_tintuc_edit', $data);
    }
    public function postEditTintuc(EditNewsRequest $request, $id) {
       
        $enter = NewsModel::find($id);
        $enter->news_name = $request->tt_title;
        $enter->news_slug = str_slug($request->tt_title);
        $enter->news_content = $request->tt_content;
        $file =  $request->tt_img;
        $path = 'uploads/tintuc';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->news_img = $path.$modifiedFileName;
        }
        $enter->save();
        return redirect('admin/baiviet/tintuc/danhsach')->with("success", "Sửa thành công");
    }
    public function getDanhsachTintuc() {
    	$data = NewsModel::orderBy('id', 'desc')->paginate(5);
    	return view('backend.baiviet.adm_tintuc_danhsach')->with(compact('data'));
    }
    public function getDeleteTintuc($id) {
        NewsModel::destroy($id);
        return back()->with("success", "Tin tức được xóa thành công!");
    }
    

    // Giới thiệu
    public function getGioithieu() {
    	return view('backend.baiviet.adm_gioithieu');
    }
    public function postGioithieu(IntroUecRequest $request) {
    	$enter = new IntroUecModel;
    	$enter->introuec_name = $request->tt_title;
    	$enter->introuec_slug = str_slug($request->tt_title);
    	$enter->introuec_content = $request->tt_content;
		$file =  $request->tt_img;
        $path = 'uploads/gioithieuUEC';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->introuec_img = $path.$modifiedFileName;
        }
        $enter->save();
    	return back();
    }
    public function getEditGioithieu($id) {
        $data['data'] = IntroUecModel::find($id);
        return view('backend.baiviet.adm_gioithieu_edit', $data);
    }
    public function postEditGioithieu(EditIntroUecRequest $request, $id) {
        
        $enter = IntroUecModel::find($id);
        $enter->introuec_name = $request->tt_title;
        $enter->introuec_slug = str_slug($request->tt_title);
        $file =  $request->tt_img;
        $path = 'uploads/gioithieuUEC';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->introuec_img = $path.$modifiedFileName;
        }
        $enter->introuec_content = $request->tt_content;
        $enter->save();
       
        return redirect('admin/baiviet/gioithieu/danhsach');
    }
    public function getDanhsachGioithieu() {
    	$intro = IntroUecModel::first();
    	return view('backend.baiviet.adm_gioithieu_danhsach')->with(compact('intro'));
    }
    public function getDeleteGioithieu($id) {
        IntroUecModel::destroy($id);
        return back()->with("success", "Giới thiệu được xóa thành công!");
    }

    // Hướng về doanh nghiệp
    public function getHuongdoanhnghiep() {
    	return view('backend.baiviet.adm_huongdoanhnghiep');
    }
    public function postHuongdoanhnghiep(TowardBusinessRequest $request) {
    	$enter = new TowardBusinessModel;
    	$enter->towardbusiness_name = $request->tt_title;
    	$enter->towardbusiness_slug = str_slug($request->tt_title);
    	$enter->towardbusiness_content = $request->tt_content;
		$enter->save();

        $file =  $request->tt_img;
        $path = 'uploads/huongdoanhnghiep/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->towardbusiness_img = $path.$modifiedFileName;
        }
        $enter->save();
    	return back();
    }
    public function getEditHuongdoanhnghiep($id) {
        $data['data'] = TowardBusinessModel::find($id);
        return view('backend.baiviet.adm_huongdoanhnghiep_edit', $data);
    }
    public function postEditHuongdoanhnghiep(EditTowardBusinessRequest $request, $id) {
        $enter = TowardBusinessModel::find($id);
        $enter->towardbusiness_name = $request->tt_title;
        $enter->towardbusiness_slug = str_slug($request->tt_title);
         $file =  $request->tt_img;
        $path = 'uploads/huongdoanhnghiep/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->towardbusiness_img = $path.$modifiedFileName;
        }
        $enter->towardbusiness_content = $request->tt_content;
        $enter->save();
        
        return redirect('admin/baiviet/huongdoanhnghiep/danhsach');
    }
    public function getDanhsachHuongdoanhnghiep() {
    	$huong = TowardBusinessModel::first();
    	return view('backend.baiviet.adm_huongdoanhnghiep_danhsach')->with(compact('huong'));
    }

    // Thông tin sinh viên
    public function getThongtinsinhvien() {
    	return view('backend.baiviet.adm_thongtinSV');
    }
    public function postThongtinsinhvien(InfoStudentRequest $request) {
    	$enter = new InfoStudentModel;
    	$enter->infostudent_name = $request->tt_title;
    	$enter->infostudent_slug = str_slug($request->tt_title);
    	$enter->infostudent_content = $request->tt_content;

         $file =  $request->tt_img;
        $path = 'uploads/thongtinSV/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->infostudent_img = $path.$modifiedFileName;
        }
        $enter->save();
    	return back();
    }
    public function getEditThongtinsinhvien($id) {
        $data['data'] = InfoStudentModel::find($id);
        return view('backend.baiviet.adm_thongtinSV_edit', $data);
    }
    public function postEditThongtinsinhvien(EditInfoStudentRequest $request, $id) {
        $enter = InfoStudentModel::find($id);
        $enter->infostudent_name = $request->tt_title;
        $enter->infostudent_slug = str_slug($request->tt_title);
        $file =  $request->tt_img;
        $path = 'uploads/thongtinSV/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->infostudent_img = $path.$modifiedFileName;
        }
        $enter->infostudent_content = $request->tt_content;
        $enter->save();
        
        return redirect('admin/baiviet/thongtinsinhvien/danhsach');
    }
    public function getDanhsachThongtinsinhvien() {
    	$thongtin = InfoStudentModel::first();
    	return view("backend.baiviet.adm_thongtinSV_danhsach")->with(compact('thongtin'));
    }

    // Định hướng nghề nghiệp
    public function getDinhhuongnghe() {
    	return view('backend.baiviet.adm_dinhhuong');
    }
    public function postDinhhuongnghe(CareerOrientationRequest $request) {
    	$enter = new CareerorientationModel;
    	$enter->careerorientation_name = $request->tt_title;
    	$enter->careerorientation_slug = str_slug($request->tt_title);
    	$enter->careerorientation_content = $request->tt_content;

        $file =  $request->tt_img;
        $path = 'uploads/dinhhuong/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->careerorientation_img = $path.$modifiedFileName;
        }
        $enter->save();
    	return redirect('admin/baiviet/dinhhuongnghe/danhsach')->with('success', 'Thêm định hướng nghề nghiệp thành công!!');
    }
    public function getEditDinhhuongnghe($id) {
        $data = CareerorientationModel::find($id);
        // dd($data);
        return view('backend.baiviet.adm_dinhhuong_edit', compact('data'));
    }
    public function postEditDinhhuongnghe(EditCareerOrientationRequest $request, $id) {
        $enter = CareerorientationModel::find($id);
        $enter->careerorientation_name = $request->tt_title;
        $enter->careerorientation_slug = str_slug($request->tt_title);
        $file =  $request->tt_img;
        $path = 'uploads/dinhhuong/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->careerorientation_img = $path.$modifiedFileName;
        }
        
        $enter->careerorientation_content = $request->tt_content;
        $enter->save();
        
        return redirect('admin/baiviet/dinhhuongnghe/danhsach');
    }
    public function getDanhsachDinhhuongnghe() {
    	$data = CareerorientationModel::paginate(5);
    	return view("backend.baiviet.adm_dinhhuong_danhsach")->with(compact('data'));
    }
    public function getDeleteDinhhuongnghe($id) {
        CareerorientationModel::destroy($id);
        return back()->with("success", "Định hướng được xóa thành công!");
    }

    // JobFair
    public function getJobfair() {
    	return view('backend.baiviet.adm_jobFair');
    }
    public function postJobfair(JobFairRequest $request) {
    	$enter = new JobFairModel;
    	$enter->jobfair_name = $request->tt_title;
    	$enter->jobfair_slug = str_slug($request->tt_title);
    	$enter->jobfair_content = $request->tt_content;

        $file =  $request->tt_img;
        $path = 'uploads/jobFair/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->jobfair_img = $path.$modifiedFileName;
        }
        $enter->save();
    	return redirect('admin/baiviet/jobfair/danhsach');
    }
     public function getEditJobfair($id) {
        $data['data'] = JobFairModel::find($id);
        return view('backend.baiviet.adm_jobFair_edit', $data);
    }
    public function postEditJobfair(EditJobFairRequest $request, $id) {
        $filename = $request->tt_img->getClientOriginalName();
        $enter = JobFairModel::find($id);
        $enter->jobfair_name = $request->tt_title;
        $enter->jobfair_slug = str_slug($request->tt_title);
        $file =  $request->tt_img;
        $path = 'uploads/jobFair/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->jobfair_img = $path.$modifiedFileName;
        }
        $enter->jobfair_content = $request->tt_content;
        $enter->save();
        
        return redirect('admin/baiviet/jobfair/danhsach');
    }
    public function getDanhsachJobFair() {
    	$data = JobFairModel::paginate(5);
    	return view("backend.baiviet.adm_jobFair_danhsach")->with(compact('data'));
    }
    public function getDeleteJobFair($id) {
        JobFairModel::destroy($id);
        return back()->with("success", "JobFair được xóa thành công!");
    }

}
