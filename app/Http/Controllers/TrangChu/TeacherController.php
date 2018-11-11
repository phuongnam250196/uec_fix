<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\danhmuckhac\AreaModel;
use App\Models\danhmuckhac\PositionModel;
use App\Models\EnterprisesModel;
use App\Models\StudentModel;
use App\Models\UserModel;
use App\Models\TrainModel;
use App\Models\SpecializeModel;
use App\Models\ScienceModel;
use App\Models\CourseModel;
use App\Models\TeacherModel;
use App\Models\ClassModel;
use App\Models\baiviet\NewsModel;

use App\Http\Requests\GVFrontend\EditTaiKhoanSV;
use App\Http\Requests\doimk\EnterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use DB;
use Response;
use Auth;
use Validator;
class TeacherController extends Controller
{
    public function getTeacherPri() {
    	$tintuc = NewsModel::orderBy('id', 'desc')->paginate(5);
        $tintuc_count = NewsModel::orderBy('id', 'desc')->count();
    	return view('frontend.giaovien.pr_giaovien', compact('tintuc', 'tintuc_count'));
    }

    public function getTeacherSearch(Request $request) {
        $tintucs = NewsModel::where('news_name', 'like', '%'.$request->news_name.'%')->orderBy('id', 'desc')->paginate(5);
        $tintuc_count = NewsModel::where('news_name', 'like', '%'.$request->news_name.'%')->orderBy('id', 'desc')->count();
        return view('frontend.giaovien.pr_giaovien_search', compact('tintucs', 'tintuc_count'));
    }

    public function getTeacherInfo() {
        $teach_id = TeacherModel::join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
                                ->where('uec_user.id', Auth::id())->first();
        $teach = TeacherModel::join('uec_area', 'uec_area.id', '=', 'uec_teacher.area_id')
                                ->join('uec_science', 'uec_science.id', '=', 'uec_teacher.science_id')
                                ->join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
                                ->where('uec_user.id', Auth::id())
                                ->first();
                                // dd($teach->teacher_img, Auth::id(), $teach_id);
        return view('frontend.giaovien.pr_giaovien_info', compact('teach'));
    }
    public function getTeacherChangepassword() {
        $teach_id = TeacherModel::join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
                                ->where('uec_user.id', Auth::id())->first();
        return view('frontend.giaovien.pr_giaovien_doimatkhau', compact('teach_id'));
    }
    public function postTeacherChangepassword(EnterRequest $request) {
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


    public function getTeacherInfoEdit() {
        $area = AreaModel::all();
        $science = ScienceModel::all();
        $teach = TeacherModel::join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
                                ->where('uec_user.id', Auth::id())
                                ->first();
                                // dd($teach->teacher_id);
        return view('frontend.giaovien.pr_giaovien_info_edit', compact('area', 'science', 'teach'));
    }
    public function postTeacherInfoEdit(Request $request) {
        $teach = TeacherModel::join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
                                ->where('uec_user.id', Auth::id())
                                ->first();
    	if(!Input::get('save')) {
            $data = TeacherModel::findOrFail ($teach->teacher_id);
            $data->update($request->all());
            return back();
        } else  {
            $data = TeacherModel::find($teach->teacher_id);
            if(empty($request->img)) {

            } else {
                $file =  $request->img;
                $path = 'uploads/giaovien/';
                $modifiedFileName = time().'-'.$file->getClientOriginalName();
                if($file->move($path,$modifiedFileName)){
                    $data->teacher_img = $path.$modifiedFileName;
                }
                $data->save();
            }
            
            return back();
        }
    }

    public function getSV() {
    	$area = AreaModel::all();
        $science = ScienceModel::all();
        $course = CourseModel::all();
        $specialize = SpecializeModel::all();
         $position = PositionModel::all();
        $class = ClassModel::where('teacher_id', Auth::user()->teacher_id)->get();
    	return view('frontend.giaovien.pr_giaovien_hocsinh', compact('area', 'science', 'course', 'specialize', 'class', 'position'));
    }
    public function postSV(Request $request) {
        $stds = StudentModel::select('student_code')->get();
        $teach = TeacherModel::join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
                                ->where('uec_user.id', Auth::id())
                                ->first();
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
                $data = new StudentModel;
                $data->student_code = $request->student_code;
                $data->student_name = $request->student_name;
                $data->student_slug = str_slug($request->student_name);
                $data->student_birthday = $request->student_birthday;
                $data->student_gender = $request->student_gender;
                $data->student_phone = $request->student_phone;
                $data->student_email = $request->student_email;
                $data->specialize_id = $request->specialize_id;
                $data->course_id = $request->course_id;
                $data->science_id = $request->science_id;
                $data->area_id = $request->area_id;
                $data->class_id = $request->class_id;
                $data->teacher_id = Auth::user()->teach_id;
                $data->student_address = $request->student_address;
                $data->student_employment_name = $request->student_employment_name;
                $data->student_company_name = $request->student_company_name;
                $data->position_id = $request->position_id;
                $data->student_timeserving = $request->student_timeserving;
                $data->student_company_address = $request->student_company_address;
                $data->input_source = 'teacher';
                $data->save();
                // dd($data);
                return back()->with('message', 'Thêm thành công');
            }
        }
    }

    public function getEditSV($id) {
        $student = StudentModel::find($id);
        $class = ClassModel::all();
        $course = CourseModel::all();
        $specialize = SpecializeModel::all();
        $science = ScienceModel::all();
        $area = AreaModel::all();
        $position = PositionModel::all();
        return view('frontend.giaovien.pr_giaovien_hocsinh_edit', compact('student', 'class', 'course', 'science', 'specialize', 'area', 'position'));
    }
    public function postEditSV(Request $request, $id) {
        $stds = StudentModel::select('student_code')->get();
        $teach = TeacherModel::join('uec_user', 'uec_user.teacher_id', '=', 'uec_teacher.id')
                                ->where('uec_user.id', Auth::id())
                                ->first();
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
                $data = StudentModel::find($id);
                $data->student_code = $request->student_code;
                $data->student_name = $request->student_name;
                $data->student_slug = str_slug($request->student_name);
                $data->student_birthday = $request->student_birthday;
                $data->student_gender = $request->student_gender;
                $data->student_phone = $request->student_phone;
                $data->student_email = $request->student_email;
                $data->specialize_id = $request->specialize_id;
                $data->course_id = $request->course_id;
                $data->science_id = $request->science_id;
                $data->area_id = $request->area_id;
                $data->class_id = $request->class_id;
                $data->student_address = $request->student_address;
                $data->student_employment_name = $request->student_employment_name;
                $data->student_company_name = $request->student_company_name;
                $data->position_id = $request->position_id;
                $data->student_timeserving = $request->student_timeserving;
                $data->student_company_address = $request->student_company_address;
                $data->save();
                // dd($data);
                return back()->with('message', 'Cập nhật thành công');
            }
        }
    }
    public function getDeleteSV($id) {
        StudentModel::destroy($id);
        return back()->with("message", "Xóa thành công");
    }
    public function getListSV() {
        $class = ClassModel::where('teacher_id', Auth::user()->teacher_id)->get();
        $student = StudentModel::whereNotNull('class_id')->get();
        // dd($student);
        return view('frontend.giaovien.pr_giaovien_sv_list', compact('class','student'));
    }

    public function getClass() {
        $classes = ClassModel::where('teacher_id', Auth::user()->teacher_id)->get();
        // $teach = Auth::user();
        // dd($teach);
        return view('frontend.giaovien.pr_giaovien_class', compact('classes'));
    }
    public function postClass(Request $request) {
        $rules = [
            'class_name' => 'required',
        ];
        $messages = [
            'class_name.required'=>'Tên lớp không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $class = new ClassModel;
            $class->class_name = $request->class_name;
            $class->class_slug = str_slug($request->class_name);
            $class->class_describe = $request->class_describe;
            $class->teacher_id = Auth::user()->teacher_id;
            $class->save();
            return back()->with('message', 'Thêm mới thành công');
        }
    }
    public function getEditClass($id) {
        $class = ClassModel::find($id);
        $classes = ClassModel::all();
        return view('frontend.giaovien.pr_giaovien_class_edit', compact('class', 'classes'));
    }
    public function postEditClass(Request $request, $id) {
        $rules = [
            'class_name' => 'required',
        ];
        $messages = [
            'class_name.required'=>'Tên lớp không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
            $class = ClassModel::find($id);
            $class->class_name = $request->class_name;
            $class->class_slug = str_slug($request->class_name);
            $class->class_describe = $request->class_describe;;
            $class->save();
            return back()->with('message', 'Cập nhật thành công');
        }
    }

    public function getDeleteClass($id) {
         ClassModel::destroy($id);
        return back()->with("message", "Xóa thành công");
    }
}
