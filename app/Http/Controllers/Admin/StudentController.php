<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\sinhvien\AddUser1Requeset;
use App\Http\Requests\sinhvien\AddUserRequest;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\danhmuckhac\AreaModel;
use App\Models\danhmuckhac\PositionModel;
use App\Models\ScienceModel;
use App\Models\CourseModel;
use App\Models\SpecializeModel;
use App\Models\ClassModel;
use App\Models\TeacherModel;
use Excel;
use DB;
use Input;
use Auth;
use session;
use Validator;

class StudentController extends Controller
{
	//Thông tin sinh viên
    public function getThongtin() {
    	$std = StudentModel::paginate(20);
        $science = ScienceModel::all();
        $class = ClassModel::all();
    	return view('backend.sinhvien.adm_sinhvien', compact('std', 'science', 'class'));
    }
    public function getThemmot() {
    	$area = AreaModel::all();
        $science = ScienceModel::all();
        $course = CourseModel::all();
        $specialize = SpecializeModel::all();
        $teacher =TeacherModel::all();
        $class = ClassModel::all();
        $position = PositionModel::all();
    	return view('backend.sinhvien.adm_sinhvien_add', compact('area', 'science', 'course', 'specialize', 'teacher', 'class', 'position'));
    }
    public function postThemmot(AddUser1Requeset $request) {

    	$std = new StudentModel;
    	$std->student_code = $request->student_code;
    	$std->student_name = $request->student_name;
    	$std->student_slug = str_slug($request->student_name);
        if(!empty($request->student_img)) {
            $filename = $request->img->getClientOriginalName();
            $std->student_img = $filename;
            $request->student_img->storeAs('sinhvien', $filename);
        }
    	$std->student_birthday = $request->student_birthday;
    	$std->student_gender = $request->student_gender;
    	$std->student_phone = $request->student_phone;
    	$std->student_email = $request->student_email;
    	$std->specialize_id = $request->specialize_id;
    	$std->course_id = $request->course_id;
    	$std->science_id = $request->science_id;
    	$std->class_id = $request->class_id;
    	$std->teacher_id = $request->teacher_id;
    	$std->student_address = $request->student_address;
    	$std->student_employment_name = $request->student_employment_name;
        $std->student_company_name = $request->student_company_name;
        $std->position_id = $request->position_id;
    	$std->student_company_address = $request->student_company_address;
    	$std->student_timeserving = $request->student_timeserving;
    	$std->student_tick = 1;
        $std->input_source = 'Admin';
		$std->area_id = $request->area_id;
		$std->save();

    	return redirect()->intended('admin/sinhvien/thongtin');
    }
    public function getEditThemmot($id) {
        $area = AreaModel::all();
        $science = ScienceModel::all();
        $course = CourseModel::all();
        $specialize = SpecializeModel::all();
        $teacher =TeacherModel::all();
        $class = ClassModel::all();
        $position = PositionModel::all();
        $student = StudentModel::find($id);
        return view('backend.sinhvien.adm_sinhvien_edit', compact('area', 'science', 'course', 'specialize', 'student', 'teacher', 'class', 'position'));
    }
    public function postEditThemmot(AddUser1Requeset $request, $id) {
        
            $std = StudentModel::find($id);
            // dd($std);
            $std->student_code = $request->student_code;
            $std->student_name = $request->student_name;
            $std->student_slug = str_slug($request->student_name);
            // dd($request->img);
            if(!empty($request->student_img)) {
                $filename = $request->student_img->getClientOriginalName();
                $std->student_img = $filename;
                $request->student_img->storeAs('sinhvien', $filename);
            }
            $std->student_birthday = $request->student_birthday;
            $std->student_gender = $request->student_gender;
            $std->student_phone = $request->student_phone;
            $std->student_email = $request->student_email;
            $std->specialize_id = $request->specialize_id;
            $std->course_id = $request->course_id;
            $std->science_id = $request->science_id;
            $std->class_id = $request->class_id;
            $std->teacher_id = $request->teacher_id;
            $std->student_address = $request->student_address;
            $std->student_employment_name = $request->student_employment_name;
            $std->student_company_name = $request->student_company_name;
            $std->position_id = $request->position_id;
            $std->student_company_address = $request->student_company_address;
            $std->student_timeserving = $request->student_timeserving;
            
            $std->area_id = $request->area_id;
            $std->save();
        return redirect()->intended('admin/sinhvien/thongtin');
    }

    public function getThemnhieu() {
    	$area = AreaModel::all();
    	return view('backend.sinhvien.adm_sinhvien_add_file', compact('area'));
    }
    public function postThemnhieu(Request $request) {
        $rules = [
            'std_img' => 'mimes:csv,xls,xlsx',
        ];
        $messages = [
            'std_img.mimes'=>'File không đúng định dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
             $message = '';
            $a = 0;
            if($request->hasFile('std_img')){
               
                $path = $request->file('std_img')->getRealPath();
                $data = Excel::load($path)->get();

                $arr2 = [];
                $arr = [];
                if(!empty($data) && $data->count() > 0){
                    foreach ($data as $value) {
                        $students = StudentModel::where('student_code', $value['student_code'])->first();
                        // dd($students, $arr);
                        if(!empty($students)) {

                            $arr2[] = [
                                'student_code' => $value->student_code,
                                'class_id' => $value->class_id,
                                'student_name' => $value->student_name,
                                'student_nation' => $value->student_nation,
                                'student_country' => $value->student_country,
                                'student_distribution' => $value->student_distribution,
                                'student_number_code' => $value->student_number_code,
                                'student_so_bang' => $value->student_so_bang,
                                'student_sendEmailforEnterprise' => $value->student_sendEmailforEnterprise,
                                'student_receiveEmail' => $value->student_receiveEmail,
                                'student_addinUEC' => $value->student_addinUEC,
                                'student_year_ourschool' => $value->student_year_ourschool,
                            ];
                            // dd($arr2);
                        } else {
                            $arr[] = [
                                'student_code' => $value->student_code,
                                'student_name' => $value->student_name,
                                'student_birthday' => $value->student_birthday,
                                'student_home_town' => $value->student_home_town,
                                'student_gender' => $value->student_gender,
                                'student_class_only' => $value->student_class_only,
                                'class_id' => $value->class_id,
                                'student_phone' => $value->student_phone,
                                'specialize_id' => $value->specialize_id,
                                'science_id' => $value->science_id,
                                'student_nation' => $value->student_nation,
                                'student_country' => $value->student_country,
                                'student_distribution' => $value->student_distribution,
                                'student_number_code' => $value->student_number_code,
                                'student_so_bang' => $value->student_so_bang,
                                'student_sendEmailforEnterprise' => $value->student_sendEmailforEnterprise,
                                'student_receiveEmail' => $value->student_receiveEmail,
                                'student_addinUEC' => $value->student_addinUEC,
                                'student_year_ourschool' => $value->student_year_ourschool,
                                'input_source' => 'admin',
                            ];
                        }
                    }
                    // dd($arr, $arr2, count($arr));
                    if(!empty($arr)){
                        DB::table('uec_student')->insert($arr);
                        $them = 'Them moi thanh cong';
                        $message = 'Them moi thanh cong';
                    } else {
                        $message = 'File moi du lieu bi trung het';
                        $a = 1;
                    }
                    if(!empty($arr2)) {
                        foreach ($arr2 as $key => $value) {
                            $value = (Object)$value;
                            if(!empty($value->student_so_bang)) {
                                // dd('co');
                                DB::table('uec_student')->where('student_code',$value->student_code)->update([
                                    'student_nation' => $value->student_nation,
                                    'student_country' => $value->student_country,
                                    'student_distribution' => $value->student_distribution,
                                    'student_number_code' => $value->student_number_code,
                                    'student_so_bang' => $value->student_so_bang,
                                    'student_sendEmailforEnterprise' => $value->student_sendEmailforEnterprise,
                                    'student_receiveEmail' => $value->student_receiveEmail,
                                    'student_addinUEC' => $value->student_addinUEC,
                                    'student_year_ourschool' => $value->student_year_ourschool,
                                ]);
                            }
                            
                        }
                        $message = "Cap nhat du lieu moi thanh cong";
                    }
                    // dd($message);
                    return redirect('admin/sinhvien/thongtin')->with('them',$message);
                }
            }
            // dd('Request data does not have any files to import.'); 
            // return back()->with('success','Insert Record successfully.');
        }
       
    }

    public function getDeleteThongtin($id) {
        StudentModel::destroy($id);
        return back()->with("success", "Xóa hình thức thành công");
    }

    // Tài khoản sinh viên
    public function getTaikhoan() {
    	$area = AreaModel::all();
        $list_user = DB::table('uec_user')
        ->join('uec_student', 'uec_user.student_id', '=', 'uec_student.id')
        ->orderBy('student_id', 'desc')
        ->paginate(15);
        $m = UserModel::whereNotNull('student_id')->orderBy('id', 'desc')->paginate(15);
    	return view('backend.sinhvien.adm_sinhvien_taikhoan', compact('area', 'list_user',  'm'));
    }
    public function postTaikhoan(AddUserRequest $request) {
        // $userall = UserModel::where('student_id', Auth::id())->get();
        $a = UserModel::where('user_name', $request->user_name)->first();
        $b = StudentModel::where('student_code', $request->user_name)->first();
        // dd($b);
    	$user = new UserModel;
        if(!empty($b->student_code)) {
            if(!empty($a->user_name)) {
                return back()->with('error', 'Tài khoản đã tồn tại');
            } else {
                $user->user_name=$request->user_name;
                $user->password=bcrypt($request->password);
                $user->student_id=$b->id;
                $user->user_level = 5;
                $user->save();
                return back()->with('success', 'Tạo tài khoản thành công');
            }
            
        } else {
            return back()->with('error', 'Mã sinh viên không tồn tại trong hệ thống');
        }
    }

    public function getEditTaikhoan($id) {
        $user = UserModel::find($id);
        $tk = UserModel::find($id)->Student;
        // dd($user, $tk);
        return view('backend.sinhvien.adm_sinhvien_taikhoan_edit', compact('user', 'tk'));
    }
    public function postEditTaikhoan(Request $request, $id) {
        $rules = [
            'student_code' => 'required',
            'password' => 'required',
            'pass_2' => 'required | same:password',
        ];
        $messages = [
            'student_code.required'=>'Tài khoản không được để trống',
            'password.required'=>'Mật khẩu không được để trống',
            'pass_2.required'=>'Bạn chưa nhập lại mật khẩu',
            'pass_2.same'=>'Mật khẩu nhập lại không khớp',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            // $user = UserModel::where('user_name', $request->student_code)->first();
            // if(!empty($user)) {
            //     return back()->with('message', 'Tài khoản đã tồn tại');
            // } else {
                $tk = UserModel::find($id);
                $tk->user_name = $request->student_code;
                $tk->password = bcrypt($request->password);
                $tk->save();
                return redirect('admin/sinhvien/taikhoan')->with('message', 'Cập nhật thành công');
            // }
        }
    }

    public function getResetTaikhoan() {
        $user = StudentModel::whereNotNull('id')->get();
        foreach ($user as $key => $value) {
            $arr[] = [
                'student_id' => $value->id
            ];
        }
        // dd($arr);
        $student = UserModel::whereNotIn('student_id', $arr)->get();
        // dd($student);
        foreach ($student as $key => $value) {
            UserModel::destroy($value->id);
        }
        return "<h2>Bạn đã reset thành công.</h2>";
    }

    public function getDeleteTaikhoan($id) {
        UserModel::destroy($id);
        return back()->with('message', 'Xóa tài khoản thành công!!!');
    }

}
