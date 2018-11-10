<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\giaovien\AddTeacherInfoRequest;
use App\Http\Requests\giaovien\EditTeacherInfoRequest;
use App\Http\Requests\giaovien\AddTeacherUserRequest;
use App\Http\Requests\giaovien\EditTeacherUserRequest;

use App\Models\TeacherModel;
use App\Models\danhmuckhac\AreaModel;
use App\Models\UserModel;
use App\Models\ScienceModel;

use Illuminate\Support\Facades\Input;

use Excel;
use DB;

class TeacherController extends Controller
{
    // Danh sách giáo viên
    public function getListThongtin() {
        $teach = TeacherModel::join('uec_science', 'uec_science.id', '=', 'uec_teacher.science_id')
        ->select('uec_teacher.id', 'teacher_name', 'science_name', 'teacher_email', 'teacher_phone', 'teacher_img')->paginate(5);
        return view('backend.giaovien.adm_giaovien_list', compact('teach'));
    }
	// Thông tin giáo viên
    public function getThongtin() {
    	$area = AreaModel::all();
        $science = ScienceModel::all();
    	$teach = TeacherModel::paginate(2);
    	return view('backend.giaovien.adm_giaovien')->with(compact('area', 'teach', 'science'));
    }
    public function postThongtin(AddTeacherInfoRequest $request) {
        if(!Input::get('save')) {
            $filename = $request->gv_img->getClientOriginalName();
            $teach = new TeacherModel;
            $teach->teacher_name = $request->gv_name;
            $teach->teacher_slug = str_slug($request->gv_name);
            $teach->teacher_img = $filename;
            $teach->teacher_birthday = $request->gv_birthday;;
            $teach->teacher_email = $request->gv_email;
            $teach->teacher_phone = $request->gv_phone;
            $teach->teacher_address = $request->gv_address;
            $teach->area_id = $request->gv_area;
            $teach->science_id = $request->gv_science;
            $teach->save();
            $request->gv_img->storeAs('giaovien', $filename);
            return redirect('admin/giaovien/thongtin/list')->with('message', 'Thêm mới thành công');
        } else {
            if($request->hasFile('gv_excel')){
                $path = $request->file('gv_excel')->getRealPath();
                $data = Excel::load($path)->get();
                $arr2 = [];
                $arr = [];
                if(!empty($data) && $data->count() > 0){
                    foreach ($data as $value) {
                        $students = TeacherModel::where('teacher_email', $value['teacher_email'])->first();
                        // dd($students, $arr);
                        if(!empty($students)) {
                            $arr2[] = [
                                'teacher_name' => $value->teacher_name,
                                'teacher_slug' => str_slug($value->teacher_name),
                                'teacher_birthday' => $value->teacher_birthday,
                                'teacher_email' => $value->teacher_email,
                                'teacher_phone' => $value->teacher_phone,
                                'teacher_address' => $value->teacher_address,
                                'area_id' => $value->area_id,
                                'science_id' => $value->science_id
                            ];
                            // dd($arr2);
                        } else {
                            $arr[] = [
                                 'teacher_name' => $value->teacher_name,
                                 'teacher_slug' => str_slug($value->teacher_name),
                                'teacher_birthday' => $value->teacher_birthday,
                                'teacher_email' => $value->teacher_email,
                                'teacher_phone' => $value->teacher_phone,
                                'teacher_address' => $value->teacher_address,
                                'area_id' => $value->area_id,
                                'science_id' => $value->science_id

                            ];
                        }
                    }
                    // dd($arr, $arr2, count($arr));
                    if(!empty($arr)){
                        DB::table('uec_teacher')->insert($arr);
                    }
                    if(!empty($arr2)) {
                        foreach ($arr2 as $key => $value) {
                            $value = (Object)$value;
                            DB::table('uec_teacher')->where('teacher_email',$value->teacher_email)->update([
                                'teacher_name' => $value->teacher_name,
                                'teacher_slug' => str_slug($value->teacher_name),
                                'teacher_birthday' => $value->teacher_birthday,
                                'teacher_email' => $value->teacher_email,
                                'teacher_phone' => $value->teacher_phone,
                                'teacher_address' => $value->teacher_address,
                                'area_id' => $value->area_id,
                                'science_id' => $value->science_id
                            ]);
                        }
                    }
                    // dd($message);
                    return redirect('admin/giaovien/thongtin/list')->with('message', 'Thêm thành công!');
                }
            }
        }
    }
    public function getEditThongtin($id) {
        $area = AreaModel::all();
        $science = ScienceModel::all();
        $teach = TeacherModel::find($id);
        return view('backend.giaovien.adm_giaovien_edit', compact('area', 'science', 'teach'));
    }
    public function postEditThongtin(EditTeacherInfoRequest $request, $id) {
        
        $teach =TeacherModel::find($id);
        $teach->teacher_name = $request->gv_name;
        $teach->teacher_slug = str_slug($request->gv_name);
        if(!empty($request->gv_img)) {
            $filename = $request->gv_img->getClientOriginalName();
            $teach->teacher_img = $filename;
            $request->gv_img->storeAs('giaovien', $filename);
        }
        
        $teach->teacher_birthday = $request->gv_birthday;;
        $teach->teacher_email = $request->gv_email;
        $teach->teacher_phone = $request->gv_phone;
        $teach->teacher_address = $request->gv_address;
        $teach->area_id = $request->gv_area;
        $teach->science_id = $request->gv_science;
        $teach->save();
        
        return redirect()->intended('admin/giaovien/thongtin/list')->with("success", "Sửa thông tin giáo viên thành công");;
    }
    public function getDeleteThongtin($id) {
        TeacherModel::destroy($id);
        return back()->with("success", "Xóa thông tin giáo viên thành công");
    }


    // Tài khoản giáo viên
    public function getTaikhoan() {
        $a = UserModel::whereNotNull('teacher_id')->select('teacher_id')->get();
        // dd($a);
        $arr = [];
        foreach ($a as $value) {
            
                $arr[] = [
                    'teacher_id' => $value->teacher_id
                ];
            
        }
        // dd($arr);
        $teach = TeacherModel::whereNotIn('id', $arr)->get();
        // dd($teach);
        $list_user = DB::table('uec_teacher')
        ->join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
        ->select('uec_user.id', 'teacher_name', 'user_name')
        ->paginate(5);
        // dd($list_user);
        return view('backend.giaovien.adm_giaovien_taikhoan', compact('list_user', 'teach'));
    }
    public function postTaikhoan(AddTeacherUserRequest $request) {
        $teach_user = new UserModel;
        $teach_user->user_name=$request->gv_user_name;
        $teach_user->password=bcrypt($request->gv_user_pass);
        $teach_user->teacher_id=$request->gv_user_info;
        $teach_user->user_level = 4;
        $teach_user->save();
        return back();
    }
    public function getEditTaikhoan($id) {
        $teach = TeacherModel::all();
        $list_user = UserModel::find($id);
        return view('backend.giaovien.adm_giaovien_taikhoan_edit', compact('teach', 'list_user'));
    }
    public function postEditTaikhoan(Request $request, $id) {
        $teach = UserModel::find($id);
        // dd($teach);
        $rules = [
            'gv_user_name'=>'required',
            'gv_user_pass'=>'required',
            'gv_user_pass_2'=>'required | same:gv_user_pass',
        ];
        $messages = [
            'gv_user_name.required'=>'Tài khoản không được để trống',
            'gv_user_pass.required'=>'Mật khẩu không được để trống',
            'gv_user_pass_2.required'=>'Mật khẩu nhập lại không được để trống',
            'gv_user_pass_2.same'=>'Mật khẩu nhập lại không khớp',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $teach->user_name=$request->gv_user_name;
            $teach->password=bcrypt($request->gv_user_pass);
            // dd('sai');
            $teach->save();
            return redirect()->intended('admin/giaovien/taikhoan')->with("success", "Sửa tài khoản giáo viên thành công");
        }
    }
    public function getDeleteTaikhoan($id) {
        UserModel::destroy($id);
        return back()->with("success", "Xóa thông tin giáo viên thành công");
    }

    public function getAvatar($id)
    {
        $a = TeacherModel::where('id', $id)->select('teacher_img')->first();
        return $a->teacher_img;
    }
}
