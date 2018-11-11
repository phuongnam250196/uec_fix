<?php

namespace App\Http\Controllers\TrangChu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\danhmuckhac\AreaModel;
use App\Models\danhmuckhac\YearOfExpModel;
use App\Models\danhmuckhac\CareerModel;
use App\Models\danhmuckhac\EducationModel;
use App\Models\danhmuckhac\FormalityModel;
use App\Models\danhmuckhac\PositionModel;
use App\Models\danhmuckhac\SkillModel;
use App\Models\EnterprisesModel;
use App\Models\StudentModel;
use App\Models\ClassModel;
use App\Models\TeacherModel;
use App\Models\RecruitmentModel;
// use App\Models\TrainingModel;
use App\Models\TrainModel;
use App\Models\UserModel;
use App\Models\SpecializeModel;
use App\Models\ScienceModel;
use App\Models\CourseModel;
use App\Models\JobapplicationModel;
use App\Models\Jobapp_RecruitmentModel;
use App\Models\Training_Student;
use App\Notifications\NotifyUser;
use App\Http\Requests\sinhvien\ChangePasswordRequest;
use App\Http\Requests\sinhvien\FUpdateUserInfoRequest;
use App\Http\Requests\sinhvien\FUpdateUserWorkRequest;
use App\Http\Requests\sinhvien\FAddHosoRequest;

use Illuminate\Support\Facades\Hash;
use DB;
use Response;
use Auth;
class StudentController extends Controller
{
    public function getStudentPri() {
    	
    	return view('frontend.sinhvien.pr_sinhvien')->with(compact('enterprise'));
    }

    public function getStudentInfo() {
        $userImg = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->first();
        $data = StudentModel::join('uec_user', 'uec_student.id', '=', 'uec_user.student_id')
                ->where('student_id', Auth::user()->student_id)
                ->select('uec_user.id', 'student_code', 'student_name', 'student_slug', 'student_birthday', 'student_gender', 'student_phone', 'student_email', 'student_address', 'student_company_name', 'student_employment_name', 'student_timeserving', 'student_company_address', 'student_img')
                ->first();
        $area = StudentModel::find(Auth::user()->student_id)->Area;
        $position = StudentModel::find(Auth::user()->student_id)->Position;
        $specialize = StudentModel::find(Auth::user()->student_id)->Specialize;
        $science = StudentModel::find(Auth::user()->student_id)->Science;
        $teacher = StudentModel::find(Auth::user()->student_id)->Teacher;

        // dd($data, $teacher);  
                // dd(Auth::user()->student_id, Auth::id(),$data);
        return view('frontend.sinhvien.pr_sinhvien_info')->with(compact('enterprise', 'data', 'area', 'specialize', 'science', 'teacher', 'position', 'userImg'));
    }
    public function getStudentResetpassword() {
        
        $userImg = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->first();
        // dd($userImg);
        return view('frontend.sinhvien.pr_sinhvien_doimatkhau', compact('enterprise', 'userImg'));
    }
    public function postStudentResetpassword(ChangePasswordRequest $request) {

        $mk = UserModel::find(Auth::id());
        $currentPass = $request->password;
        $newPass = $request->new_pass;
        if(Hash::check($currentPass, $mk->password)) {
            $mk->password = Hash::make($request->new_pass);
            $mk->save();
            return redirect('/student/info')->with('success', 'Đổi mật khẩu thành công');
        } else {
            return back()->with('err', 'Mật khẩu cũ không chính xác');
        }
    }
    public function getStudentUpdateInfo() {
        $studentInfo = StudentModel::join('uec_user', 'uec_student.id', '=', 'uec_user.student_id')
                ->where('student_id', Auth::user()->student_id)
                ->select('uec_user.id', 'student_code', 'student_name', 'student_slug', 'student_birthday', 'student_gender', 'student_phone', 'student_email', 'student_address', 'student_company_name', 'student_employment_name', 'student_timeserving', 'student_company_address', 'student_img', 'area_id', 'specialize_id', 'science_id', 'course_id', 'class_id', 'uec_student.teacher_id')
                ->first();
        // dd($studentInfo);
        $area = AreaModel::all();
        $specialize = SpecializeModel::all();
        $science = ScienceModel::all();
        $course = CourseModel::all();
        $class = ClassModel::all();
        $teacher = TeacherModel::all();
        // dd($teacher, $studentInfo);
        return view('frontend.sinhvien.pr_sinhvien_info_edit', compact('studentInfo', 'area', 'science', 'specialize', 'course', 'class', 'teacher'));
    }
    public function postStudentUpdateInfo(Request $request) {
        $studentInfo = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->select('uec_student.id')->first();
        $data = StudentModel::find($studentInfo->id);
        $data->science_id = $request->science_id;
        $data->specialize_id = $request->specialize_id;
        $data->course_id = $request->course_id;
        $data->area_id = $request->area_id;
        $data->class_id = $request->class_id;
        $data->student_address = $request->student_address;
        $data->teacher_id = $request->teacher_id;

        $file =  $request->student_img;
        $path = 'uploads/sinhvien/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $data->student_img = $path.$modifiedFileName;
        }
        $data->save();
        return redirect('/student/info')->with('success', 'Cập nhật thông tin thành công');
    }
    public function getStudentUpdateWork() {
         $userImg = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->first();
        $position = PositionModel::all();
        $studentWork = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->first();
        return view('frontend.sinhvien.pr_sinhvien_update_work', compact('enterprise', 'studentWork', 'position', 'userImg'));
    }
    public function postStudentUpdateWork(FUpdateUserWorkRequest $request) {
    	$studentInfo = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->select('uec_student.id')->first();
        $data = StudentModel::find($studentInfo->id);
        $data->student_employment_name = $request->student_employment_name;
        $data->student_company_name = $request->student_company_name;
        $data->student_timeserving = $request->student_timeserving;
        $data->student_company_address = $request->student_company_address;
        $data->position_id = $request->position_id;
        $data->save();
    	return redirect('/student/info')->with('success', 'Cập nhật công việc thành công');
    }

    //  hồ sơ
    public function getHoso() {
    	
        $cv = JobapplicationModel::join('uec_user', 'uec_user.id', '=', 'uec_jobapplication.user_id')
                ->join('uec_area', 'uec_area.id', '=', 'uec_jobapplication.area_id')    
                ->join('uec_education', 'uec_education.id', '=', 'uec_jobapplication.education_id')    
                ->join('uec_career', 'uec_career.id', '=', 'uec_jobapplication.career_id')    
                ->join('uec_yearofexp', 'uec_yearofexp.id', '=', 'uec_jobapplication.yearofexp_id')    
                ->join('uec_formality', 'uec_formality.id', '=', 'uec_jobapplication.formality_id')    
                ->join('uec_student', 'uec_student.id', '=', 'uec_jobapplication.student_id')    
                ->where('uec_user.id', Auth::id())
                ->select('uec_jobapplication.id', 'jobapplication_name', 'jobapplication_salary', 'jobapplication_purpose', 'area_name', 'career_name', 'education_name', 'yearofexp_name', 'formality_name', 'user_id', 'uec_user.student_id', 'uec_student.student_name', 'uec_student.student_code', 'uec_jobapplication.created_at')
                ->first();
        // dd($cv);
        $count = JobapplicationModel::join('uec_user', 'uec_user.id', '=', 'uec_jobapplication.user_id')
        ->where('uec_user.id', Auth::id())->count();
    	return view('frontend.sinhvien.pr_sinhvien_hoso_ungtuyen', compact('enterprise', 'cv', 'count'));
    }

    // Thêm mới hồ sơ
    public function getHosoAdd() {
        $userImg = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->first();
        $area = AreaModel::all();
        $formality = FormalityModel::all();
        $yearofexp = YearOfExpModel::all();
        $career = CareerModel::all();
        $education = EducationModel::all();
        return view('frontend.sinhvien.pr_sinhvien_hoso_add', compact('enterprise', 'area', 'formality', 'yearofexp', 'career', 'education', 'userImg'));
    }
    public function postHosoAdd(FAddHosoRequest $request) {
        $studentInfo = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->select('uec_student.id')->first();
    	$cv = new JobapplicationModel;
        $cv->jobapplication_name = $request->jobapplication_name;
        $cv->jobapplication_slug = str_slug($request->jobapplication_name);
        $cv->jobapplication_salary = $request->jobapplication_salary;
        $cv->career_id = $request->career_id;
        $cv->area_id = $request->area_id;
        $cv->education_id = $request->education_id;
        $cv->yearofexp_id = $request->yearofexp_id;
        $cv->formality_id = $request->formality_id;
        $cv->jobapplication_purpose = $request->jobapplication_purpose;
        $cv->jobapplication_status = 0;
        $cv->user_id = Auth::id();
        $cv->student_id = $studentInfo->id;
        $cv->save();
    	return back()->with('success', 'Thêm mới hồ sơ thành công');
    }

    // Cập nhật hồ sơ
    public function getHosoEdit($id) {
        $userImg = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')
        ->where('uec_user.id', Auth::id())->first();
        $area = AreaModel::all();
        $formality = FormalityModel::all();
        $yearofexp = YearOfExpModel::all();
        $career = CareerModel::all();
        $education = EducationModel::all();
        $cv = JobapplicationModel::find($id);
        // dd($cv);
        return view('frontend.sinhvien.pr_sinhvien_hoso_edit', compact('enterprise', 'area', 'formality', 'yearofexp', 'career', 'education', 'cv', 'userImg'));
    }
    public function postHosoEdit(FAddHosoRequest $request, $id) {
        $cv = JobapplicationModel::find($id);
        $cv->jobapplication_name = $request->jobapplication_name;
        $cv->jobapplication_slug = str_slug($request->jobapplication_name);
        $cv->jobapplication_salary = $request->jobapplication_salary;
        $cv->career_id = $request->career_id;
        $cv->area_id = $request->area_id;
        $cv->education_id = $request->education_id;
        $cv->yearofexp_id = $request->yearofexp_id;
        $cv->formality_id = $request->formality_id;
        $cv->jobapplication_purpose = $request->jobapplication_purpose;
        $cv->jobapplication_status = 0;
        $cv->user_id = Auth::id();
        $cv->student_id = Auth::user()->student_id;
        $cv->save();
        return back()->with('success', 'Cập nhật hồ sơ thành công');
    }

    // Tin tuyển dụng
    public function getTintuyendung() {
        $area = AreaModel::all();
        $career = CareerModel::all();
        $tintds = RecruitmentModel::join('uec_enterprises', 'uec_enterprises.id', '=', 'uec_recruitment.enterprise_id')
                    ->join('uec_area', 'uec_recruitment.area_id', '=', 'uec_area.id')
                    ->select('uec_recruitment.id', 'recruitment_name', 'enterprise_name', 'enterprise_id', 'area_name', 'recruitment_describe', 'recruitment_img', 'uec_recruitment.created_at')->orderBy('id', 'desc')
                    ->paginate(5);
        // dd($tintds);
        return view('frontend.sinhvien.pr_sinhvien_tintuyendung', compact('enterprise', 'tintds', 'area', 'career'));
    }
    
    public function getTintuyendungSearch(Request $request) {
        $enterprise = EnterprisesModel::all();
        $area = AreaModel::all();
        $career = CareerModel::all();
        if(!empty($request->search)) {
            if(!empty($request->career_id)) {
                if (!empty($request->area_id)) {
                    $tintds = RecruitmentModel::where('recruitment_name', 'LIKE', '%'.$request->search.'%')->where('career_id', $request->career_id)->where('area_id', $request->area_id)->orderBy('id', 'desc')->paginate(5);
                    // dd($tintds);
                } else {
                    $tintds = RecruitmentModel::where('recruitment_name', 'LIKE', '%'.$request->search.'%')->where('career_id', $request->career_id)->orderBy('id', 'desc')->paginate(5);
                    // dd($tintds);
                }
                
            } else {
                if (!empty($request->area_id)) {
                    $tintds = RecruitmentModel::where('recruitment_name', 'LIKE', '%'.$request->search.'%')->where('area_id', $request->area_id)->orderBy('id', 'desc')->paginate(5);
                    // dd($tintds);
                } else {
                    $tintds = RecruitmentModel::where('recruitment_name', 'LIKE', '%'.$request->search.'%')->orderBy('id', 'desc')->paginate(5);
                    // dd($tintds);
                }

            }
            // return back()->with(compact('tintds'));
        } else {
            if(!empty($request->career_id)) {
                $tintds = RecruitmentModel::where('career_id', $request->career_id)->orderBy('id', 'desc')->paginate(5);
                // dd($tintds);
            } else {
                if (!empty($request->area_id)) {
                    $tintds = RecruitmentModel::where('area_id', $request->area_id)->orderBy('id', 'desc')->paginate(5);
                    // dd($tintds);
                } else {
                    // dd('rong');
                    return back();
                }

            }
        }
        return view('frontend.sinhvien.pr_sinhvien_search', compact('enterprise', 'tintds', 'area', 'career'));
    }

    public function getTintuyendungChitiet($id) {
        $st = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')->where('uec_user.id', Auth::id())->first();
        $tin = RecruitmentModel::join('uec_area', 'uec_area.id', '=', 'uec_recruitment.area_id')
                ->join('uec_yearofexp', 'uec_yearofexp.id', '=', 'uec_recruitment.yearofexp_id')
                ->join('uec_position', 'uec_position.id', '=', 'uec_recruitment.position_id')
                ->join('uec_education', 'uec_education.id', '=', 'uec_recruitment.education_id')
                ->join('uec_formality', 'uec_formality.id', '=', 'uec_recruitment.formality_id')
                ->join('uec_career', 'uec_career.id', '=', 'uec_recruitment.career_id')
                ->join('uec_enterprises', 'uec_enterprises.id', '=', 'uec_recruitment.enterprise_id')
                ->select('uec_recruitment.id', 'recruitment_name', 'recruitment_salary', 'recruitment_amount', 'recruitment_age', 'recruitment_gender', 'recruitment_describe', 'recruitment_benefit', 'recruitment_requirements', 'area_name', 'yearofexp_name', 'position_name', 'education_name', 'formality_name', 'career_name', 'enterprise_name', 'enterprise_id', 'enterprise_logo', 'enterprise_web', 'enterprise_fanpage')
                ->find($id);
        $tin_id = $id;
        // dd($st);
        $cv = JobapplicationModel::where('user_id', Auth::id())->first();
        $utr = Jobapp_RecruitmentModel::where('status', 'pending')
                                        ->where('student_id', $st->student_id)
                                        ->where('recruitment_id', $tin->id)
                                        ->first();
        // dd( $tin, $cv);
    	return view('frontend.sinhvien.pr_sinhvien_tintuyendung_chitiet', compact('enterprise', 'tin', 'tin_id', 'cv', 'utr'));
    }

    public function postTintuyendungChitiet(Request $request) {
        $enterprise_user = UserModel::where('enterprise_id', $request->enterprise_id)->first();
        $ut = new Jobapp_RecruitmentModel;
        $ut->jobapplication_id = $request->jobapplication_id;
        $ut->recruitment_id = $request->recruitment_id;
        $ut->status = "pending";
        $ut->active_work = 0;
        $ut->student_id = $request->student_id;
        $ut->user_id = $request->user_id;
        $enterprise_user->notify(new NotifyUser(['content_event' => 'hello']));
        $ut->save();
        
        return Response()->json($ut);
    }

    public function getKhoadaotao() {
    	
        $kdts = TrainModel::join('uec_enterprises', 'uec_enterprises.id', '=', 'uec_training.enterprise_id')
                            ->join('uec_area', 'uec_area.id', '=', 'uec_training.area_id')
                            ->select('uec_training.id', 'training_name', 'uec_training.created_at', 'area_name', 'enterprise_name', 'enterprise_id', 'training_describe')
                            // ->
                            ->paginate(5);
        // dd($kdts);
    	return view('frontend.sinhvien.pr_sinhvien_khoadaotao', compact('enterprise', 'kdts'));
    }
    public function getKhoadaotaoChitiet($id) {
        
        $st = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')->where('uec_user.id', Auth::id())->first();
        $kdt = TrainModel::join('uec_enterprises', 'uec_enterprises.id', '=', 'uec_training.enterprise_id')
                ->join('uec_area', 'uec_area.id', '=', 'uec_training.area_id')
                ->join('uec_skill', 'uec_skill.id', '=', 'uec_training.skill_id')
                ->select('uec_training.id', 'training_name', 'skill_name', 'area_name', 'training_amount_student', 'training_timeserving', 'training_deadline', 'training_address', 'training_describe', 'enterprise_name', 'enterprise_logo', 'enterprise_describe', 'enterprise_fanpage', 'enterprise_web')
                ->find($id);
        $set = Training_Student::where('student_id', $st->student_id)->where('training_id', $kdt->id)->first();
                // dd($kdt->id, $set, $st->student_id);
        return view('frontend.sinhvien.pr_sinhvien_khoadaotao_chitiet', compact('enterprise', 'kdt', 'st', 'set'));
    }
    public function postKhoadaotaoChitiet(Request $request) {
        $ut = Training_Student::find($request->id);
        if(!empty($ut)) {
            $ut->status = 1;
            $ut->save();
        } else {
            $ut = new Training_Student;
            $ut->student_id = $request->student_id;
            $ut->training_id = $request->training_id;
            $ut->status_save = 0;
            $ut->status = 1;
            $ut->save();
        }
        
        return Response()->json($ut);
    }
    public function postKhoadaotaoLuu(Request $request) {
        $ut = Training_Student::find($request->id);
        if(!empty($ut)) {
            $ut->status_save = 1;
            $ut->save();
        } else {
            $ut = new Training_Student;
            $ut->student_id = $request->student_id;
            $ut->training_id = $request->training_id;
            $ut->status_save = 1;
            $ut->status = 0;
            $ut->save();
        }
        return Response()->json($ut);
    }

    public function getKetqua() {
        
        $st = StudentModel::join('uec_user', 'uec_user.student_id', '=', 'uec_student.id')->where('uec_user.id', Auth::id())->first();
        $kqs = RecruitmentModel::join('uec_jobapp_recruitment','uec_jobapp_recruitment.recruitment_id', '=', 'uec_recruitment.id')
                ->join('uec_enterprises', 'uec_enterprises.id', '=', 'uec_recruitment.enterprise_id')
                ->where('uec_jobapp_recruitment.student_id', $st->student_id)
                ->select('enterprise_name', 'recruitment_name', 'active_work', 'uec_jobapp_recruitment.updated_at', 'uec_jobapp_recruitment.id')
                ->paginate(10);
        // dd($kqs, $cms);
        return view('frontend.sinhvien.pr_sinhvien_ketqua', compact('enterprise', 'kqs', 'cms'));
    }
    public function getDeleteKetqua($id) {
        Jobapp_RecruitmentModel::destroy($id);
        return back()->with("success", "Xóa kết quả thành công");
    }
}
