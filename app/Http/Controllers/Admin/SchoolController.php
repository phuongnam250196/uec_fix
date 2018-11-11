<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\nhatruong\AddSchoolInfoRequest;
use App\Http\Controllers\Controller;
use App\Models\danhmuckhac\AreaModel;
use App\Models\SchoolModel;
use App\Models\UserModel;
use Auth;
use DB;
use App\Http\Requests\nhatruong\AdminTaikhoanRequest;

class SchoolController extends Controller
{
    public function getThongtin() {
    	$area = AreaModel::all();
        $s = SchoolModel::first();
        // dd($data);
    	return view('backend.nhatruong.adm_nhatruong', compact('area', 's'));
    }
    public function postThongtin(AddSchoolInfoRequest $request) {
    	$scl = new SchoolModel;
    	$scl->school_code = $request->nt_code;
    	$scl->school_name = $request->nt_name;
    	$scl->school_slug = str_slug($request->nt_name);
    	$scl->school_address = $request->nt_address;
    	$scl->school_email = $request->nt_email;
    	$scl->school_phone = $request->nt_phone;
    	$scl->school_web = $request->nt_website;
    	$scl->school_describe = $request->nt_describe;
		$scl->area_id = $request->nt_area;

        $file =  $request->nt_logo;
        $path = 'uploads/school/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->school_logo = $path.$modifiedFileName;
        }
        $scl->save();
    	return back();
    }
    public function getEditThongtin($id) {
        $data['area'] = AreaModel::all();
        $data['school'] = SchoolModel::find($id);
        // dd($data);
        return view('backend.nhatruong.adm_nhatruong_edit', $data);
    }
    public function postEditThongtin(Request $request, $id) {
        
        $scl = SchoolModel::find($id);
        $scl->school_code = $request->nt_code;
        $scl->school_name = $request->nt_name;
        $scl->school_slug = str_slug($request->nt_name);
        $scl->school_address = $request->nt_address;
        $scl->school_email = $request->nt_email;
        $scl->school_phone = $request->nt_phone;
        $scl->school_web = $request->nt_website;
        $scl->school_describe = $request->nt_describe;
        $scl->area_id = $request->nt_area;

        $file =  $request->nt_logo;
        $path = 'uploads/school/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->school_logo = $path.$modifiedFileName;
        }
        $scl->save();
        
        return redirect()->intended('admin/nhatruong/thongtin/')->with("success", "Sửa thông tin nhà trường thành công");
    }

    public function getTaikhoan() {
        $school = SchoolModel::all();
        $school2 = SchoolModel::first();
        $user_school = SchoolModel::join('uec_user', 'uec_user.school_id', '=', 'uec_school.id')->paginate(7);
        // dd($school);
        return view('backend.nhatruong.adm_nhatruong_taikhoan', compact('school', 'school2', 'user_school'));
    }
    public function postTaikhoan(AdminTaikhoanRequest $request) {
    	$school_user = new UserModel;
        $school_user->user_name=$request->user_name;
        $school_user->password=bcrypt($request->password);
        $school_user->school_id=$request->school_id;
        $school_user->user_level = 3;
        $school_user->save();
        return back()->with('message', "Thành công");
    }

    public function getEditTaikhoan($id) {
        $school_user = UserModel::find($id);
        $school = SchoolModel::all();
        $school2 = SchoolModel::first();
        return view('backend.nhatruong.adm_nhatruong_taikhoan_edit', compact('school', 'school2', 'school_user'));
    }
    public function postEditTaikhoan(AdminTaikhoanRequest $request, $id) {
        $school_user = UserModel::find($id);
        $school_user->user_name=$request->user_name;
        $school_user->password=bcrypt($request->password);
        $school_user->school_id=$request->school_id;
        $school_user->user_level = 3;
        $school_user->save();
        return back()->with('message', "Thành công");
    }

    public function getDeleteTaikhoan($id) {
        UserModel::destroy($id);
        return back()->with("success", "Xóa thông tin doanh nghiệp thành công");
    }
}
