<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\danhmuckhac\AreaModel;
use App\Models\danhmuckhac\PositionModel;
use App\Models\EnterprisesModel;
use App\Models\UserModel;
use App\Models\SchoolModel;
use App\Models\TeacherModel;
use App\Models\ClassModel;
use App\Models\StudentModel;
use App\Models\baiviet\NewsModel;
use App\Models\SpecializeModel;
use App\Models\ScienceModel;
use App\Models\CourseModel;

use App\Http\Requests\doimk\EnterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

use DB;
use Response;
use Auth;
use Validator;
class SchoolController extends Controller
{
   	public function getSchoolPri() {
    	$tintuc = NewsModel::orderBy('id', 'desc')->paginate(5);
    	return view('frontend.nhatruong.pr_nhatruong', compact('tintuc'));
    }

    public function getSchooInfo() {
         $school_id = SchoolModel::join('uec_user', 'uec_user.school_id', '=', 'uec_school.id')
                                ->where('uec_user.id', Auth::id())->first();
        // $teach = TeacherModel::join('uec_area', 'uec_area.id', '=', 'uec_teacher.area_id')
        //                         ->join('uec_science', 'uec_science.id', '=', 'uec_teacher.science_id')
        //                         ->join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
        //                         ->where('uec_user.id', Auth::id())
        //                         ->first();
        $data = SchoolModel::join('uec_user', 'uec_school.id', '=', 'uec_user.school_id')
                ->join('uec_area', 'uec_school.area_id', '=', 'uec_area.id')
                // ->select('uec_user.id')
                ->where('uec_user.id', Auth::id()) 
                ->first();
                // dd($data, Auth::id());
        return view('frontend.nhatruong.pr_nhatruong_info', compact('school_id', 'data'));
    }
    public function getSchooChangepassword() {
        $school_id = SchoolModel::join('uec_user', 'uec_user.school_id', '=', 'uec_school.id')
                                ->where('uec_user.id', Auth::id())->first();
        return view('frontend.nhatruong.pr_nhatruong_doimatkhau', compact('school_id'));
    }
    public function postSchooChangepassword(EnterRequest $request) {
        $mk = UserModel::find(Auth::id());
        $currentPass = $request->password;
        $newPass = $request->new_pass;
        if(Hash::check($currentPass, $mk->password)) {
            $mk->password = Hash::make($request->new_pass);
            $mk->save();
            return back()->with('success', 'Đổi mật khẩu thành công');
        } else {
            return back()->with('err', 'Mật khẩu cũ không chính xác');
        }
    }

    public function getSchooInfoEdit() {
    	$area = AreaModel::all();
        $school = SchoolModel::join('uec_user', 'uec_user.school_id', '=', 'uec_school.id')
                                ->where('uec_user.id', Auth::id())
                                ->first();
    	return view('frontend.nhatruong.pr_nhatruong_info_edit', compact('area', 'school'));
    }
    public function postSchooInfoEdit(Request $request) {
        $school = SchoolModel::join('uec_user', 'uec_user.school_id', '=', 'uec_school.id')
                                ->where('uec_user.id', Auth::id())
                                ->first();
        if(!Input::get('save')) {
            $data = SchoolModel::findOrFail ($school->school_id);
            $data->update($request->all());
            return back();
        } else  {
            $data = SchoolModel::find($school->school_id);
            if(empty($request->img)) {

            } else {
                 $file =  $request->img;
                $path = 'uploads/school/';
                $modifiedFileName = time().'-'.$file->getClientOriginalName();
                if($file->move($path,$modifiedFileName)){
                    $data->school_logo = $path.$modifiedFileName;
                }
                $data->save();
            }
            
            return back();
        }
    }
    public function getTaikhoanSV() {
        $science  = ScienceModel::all();
        $course = CourseModel::all();
    	$students = StudentModel::join('uec_science', 'uec_science.id', '=', 'uec_student.science_id')
                        ->join('uec_specialize', 'uec_specialize.id', '=', 'uec_student.specialize_id')
                        ->select('uec_student.id', 'student_code', 'student_name', 'science_name', 'specialize_name')
                        ->paginate(15);
                        // dd($students);
    	return view('frontend.nhatruong.pr_nhatruong_sinhvien', compact('students', 'science', 'course'));
    }

    public function getSchoolStudent($id) {
        // $school = SchoolModel::join('uec_user', 'uec_user.school_id', '=', 'uec_school.id')
        //                         ->where('uec_user.id', Auth::id())
        //                         ->first();
        $school = StudentModel::find($id);
        $science = ScienceModel::all();
        $specialize = SpecializeModel::all();
        $course = CourseModel::all();
        $area = AreaModel::all();
        $position = PositionModel::all();
        $class = ClassModel::all();
        $teacher = TeacherModel::all();
        // dd($student);
       return view('frontend.nhatruong.pr_nhatruong_sinhvien_update', compact('student', 'school', 'science', 'specialize', 'course', 'area', 'position', 'class', 'teacher'));
    }
    public function postSchoolStudent(Request $request, $id) {
        $stds = StudentModel::select('student_code')->get();
        $status = 0;
        foreach($stds as $std) {
            if($std->student_code == $request->student_code) {
                $status = 1;
            } else {
                $status = 0;
            }
        }
        if($status == 1) {
            return back()->with('message', 'Sinh viên đã tồn tại');
        } else {
            $rules = [
                'student_code' => 'required',
                'student_name' => 'required',
                'student_birthday' => 'required',
                'student_gender' => 'required',
                'science_id' => 'required',
                'specialize_id' => 'required',
                'course_id' => 'required',
                'area_id' => 'required',
                'student_phone' => 'required',
                'student_email' => 'required'
            ];
            $messages = [
                'student_code.required'=>'Mã sinh viên không được để trống',
                'student_name.required'=>'Họ tên không được để trống',
                'student_birthday.required'=>'Ngày sinh không được để trống',
                'student_gender.required'=>'Giới tính không được để trống',
                'student_phone.required'=>'Số điện thoại không được để trống',
                'student_email.required'=>'Email không được để trống',
                'science_id.required'=>'Bạn chưa chọn khoa',
                'specialize_id.required'=>'Bạn chưa chọn khóa học',
                'course_id.required'=>'Bạn chưa chọn chuyên ngành',
                'area_id.required'=>'Bạn chưa chọn tỉnh thành phố'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            } else {
                $school = StudentModel::find($id);
                $school->student_code = $request->student_code;
                $school->student_name = $request->student_name;
                $school->student_slug = str_slug($request->student_name);
                $school->student_birthday = $request->student_birthday;
                $school->student_gender = $request->student_gender;
                $school->student_phone = $request->student_phone;
                $school->student_email = $request->student_email;
                $school->specialize_id = $request->specialize_id;
                $school->course_id = $request->course_id;
                $school->science_id = $request->science_id;
                $school->area_id = $request->area_id;
                $school->class_id = $request->class_id;
                $school->teacher_id = $request->teacher_id;
                $school->student_address = $request->student_address;
                $school->student_employment_name = $request->student_employment_name;
                $school->student_company_name = $request->student_company_name;
                $school->position_id = $request->position_id;
                $school->student_timeserving = $request->student_timeserving;
                $school->student_company_address = $request->student_company_address;
                $school->save();
                // dd($school);
                return back()->with('message', 'Cập nhật thành công');
            }
        }
    }

    public function getSchoolStudentWork() {
         $school = SchoolModel::join('uec_user', 'uec_user.school_id', '=', 'uec_school.id')
                                ->where('uec_user.id', Auth::id())
                                ->first();
        return view('frontend.nhatruong.pr_nhatruong_sinhvien_update_vieclam', compact('students', 'school'));
    }
    public function postSchoolStudentWork(Request $request) {
        $rules = [
            'student_code' => 'required',
            'student_employment_name' => 'required',
            'student_company_position' => 'required',
            'student_company_name' => 'required',
        ];
        $messages = [
            'student_code.required' => 'Mã sinh viên không được để trống',
            'student_employment_name.required' => 'Tên công việc không được để trống',
            'student_company_name.required' => 'Tên công ty không được để trống',
            'student_company_position.required' => 'Tên chức vụ không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $std = StudentModel::where('student_code', $request->student_code)->first();
            // dd($std);
            if(!empty($std)) {
                $std->student_employment_name = $request->student_employment_name;
                $std->student_company_position = $request->student_company_position;
                $std->student_company_name = $request->student_company_name;
                $std->student_timeserving = $request->student_timeserving;
                $std->student_company_address = $request->student_company_address;
                $std->save();
                return back()->with('message', 'Cập nhật công việc thành công');
            } else {
                return back()->with('message', 'Mã sinh viên không tồn tại');
            }
            // dd($std);
            
        }
    }

    public function getSchooResetpassword() {
        return view('frontend.nhatruong.pr_nhatruong_reset_pass', compact('students', 'school'));
    }
    public function postSchooResetpassword(Request $request) {
        $rules = [
            'student_code' => 'required',
            'password' => 'required',
            'password_2' => 'required | same:password',
        ];
        $messages = [
            'student_code.required' => 'Mã sinh viên không được để trống',
            'password.required' => 'Mật khẩu reset không được để trống',
            'password_2.required' => 'Mật khẩu nhập lại không được để trống',
            'password_2.same' => 'Mật khẩu nhập lại không khớp',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $std = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')->where('student_code', $request->student_code)->select('uec_student.id')->first();
            // dd($std);
            if(!empty($std)) {
                $user = UserModel::where('student_id', $std->id)->first();
                $user->password = Hash::make($request->password);
                // dd($user);
                $user->save();
                return back()->with('message', 'Reset mật khẩu thành công');
            } else {
                return back()->with('message', 'Mã sinh viên không tồn tại');
            }
            // dd($std);
            
        }
    }

    public function getTaikhoanSVDelete($id) {
        StudentModel::destroy($id);
        return back()->with("success", "Xóa sinh viên thành công");
    }

    public function getReportSchool(Request $request) {
        $specialize = SpecializeModel::all();
        if(!empty($request->word)) {
            if(!empty($request->specialize_id)) {
                $reports = StudentModel::where('student_name', 'like', '%'.$request->word.'%')->orwhere('student_code', 'like', '%'.$request->word.'%')->where('specialize_id', $request->specialize_id)->orderBy('id', $request->order_by)->get();
            } else {
                $reports = StudentModel::where('student_name', 'like', '%'.$request->word.'%')->orwhere('student_code', 'like', '%'.$request->word.'%')->orderBy('id', $request->order_by)->get();
            }
        } else {
            if(!empty($request->specialize_id)) {
                $reports = StudentModel::where('specialize_id', $request->specialize_id)->orderBy('id', $request->order_by)->get();
            } else {
                // return back();
            }
        }
    	
        // dd($reports);
    	return view('frontend.nhatruong.pr_nhatruong_thongke', compact('reports', 'specialize'));
    }
}
