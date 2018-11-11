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
use App\Models\RecruitmentModel;
// use App\Models\TrainingModel;
use App\Models\TrainModel;
use App\Models\UserModel;
use App\Models\Jobapp_RecruitmentModel;
use App\Models\JobapplicationModel;
use App\Models\StudentModel;

use App\Http\Requests\doanhnghiep2\AddTTDRequest;
use App\Http\Requests\khoadaotao\AddKDTRequest;
use App\Http\Requests\doimk\EnterRequest;

use Illuminate\Support\Facades\Hash;

use DB;
use Response;
use Auth;
use Validator;

class EnterpriseController extends Controller
{
    public function getDoanhnghiepPri() {
    	
        $en_id = EnterprisesModel::join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
                        ->where('uec_user.id', Auth::id())->first();
        $tin = RecruitmentModel::where('uec_recruitment.enterprise_id', $en_id->enterprise_id)->paginate(3);
        $tin_count = RecruitmentModel::where('uec_recruitment.enterprise_id', $en_id->enterprise_id)->count();
        $jr = Jobapp_RecruitmentModel::join('uec_jobapplication', 'uec_jobapplication.id', '=', 'uec_jobapp_recruitment.jobapplication_id')
            ->join('uec_student', 'uec_student.id', '=', 'uec_jobapp_recruitment.student_id')->get();
        // dd($tin, $en_id);
    	return view('frontend.doanhnghiep.pr_doanhnghiep', compact('enterprise', 'tin', 'jr', 'tin_count'));
    }
    public function getDoanhnghiepSearch(Request $request) {
        $en_id = EnterprisesModel::join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
                        ->where('uec_user.id', Auth::id())->first();
        $tin = RecruitmentModel::where('uec_recruitment.enterprise_id', $en_id->enterprise_id)->where('recruitment_name', 'like', '%'.$request->recruitment_name.'%')->paginate(5);
        $tin_count = RecruitmentModel::where('uec_recruitment.enterprise_id', $en_id->enterprise_id)->where('recruitment_name', 'like', '%'.$request->recruitment_name.'%')->count();
        $jr = Jobapp_RecruitmentModel::join('uec_jobapplication', 'uec_jobapplication.id', '=', 'uec_jobapp_recruitment.jobapplication_id')
            ->join('uec_student', 'uec_student.id', '=', 'uec_jobapp_recruitment.student_id')->get();
        // dd($tin, $en_id);
        return view('frontend.doanhnghiep.pr_doanhnghiep_search', compact('enterprise', 'tin', 'jr', 'tin_count'));
    }

    public function getDNInfo($id) {
        
        $data = EnterprisesModel::join('uec_user', 'uec_enterprises.id', '=', 'uec_user.enterprise_id')
                ->where('uec_user.id', $id)
                ->first();
        $area = $data->Area;
        // dd($data, $area);
        return view('frontend.doanhnghiep.pr_doanhnghiep_info', compact('area', 'data'));
    }
    public function getResetpassword($id) {
        $data = EnterprisesModel::join('uec_user', 'uec_enterprises.id', '=', 'uec_user.enterprise_id')
                ->where('uec_user.id', $id)
                ->first();
        return view('frontend.doanhnghiep.pr_doanhnghiep_reset_password', compact('data'));
    }
    public function postResetpassword(EnterRequest $request, $id) {
        $mk = UserModel::find($id);
        $currentPass = $request->password;
        $newPass = $request->new_pass;
        if(Hash::check($currentPass, $mk->password)) {
            $mk->password = Hash::make($request->new_pass);
            $mk->save();
            return back()->with('success', 'Đổi mật khẩu thành công');
        } else {
            return back()->with('err', 'Mật khẩu cũ không chính xác');
        }
        // return back()->with('success', 'Đổi mật khẩu thành công');
    }
    public function getDNInfoEdit($id) {
    	
        $area = AreaModel::all();
        $data = EnterprisesModel::find($id);
        // dd($data);
    	return view('frontend.doanhnghiep.pr_doanhnghiep_info_edit', compact('enterprise', 'data', 'area'));
    }
    public function postDNInfoEdit(Request $request,$id) {
        if(!Input::get('save')) {
            $area = AreaModel::all();
            $data = EnterprisesModel::findOrFail ($id);
            $data->update($request->all());
            return redirect('enterprise/info/'.Auth::id())->with('message', 'Cập nhật thông tin thành công');
        } else  {
            $data = EnterprisesModel::find($id);
            if(empty($request->dn_logo)) {

            } else {
                 $file =  $request->dn_logo;
                $path = 'uploads/public/';
                $modifiedFileName = time().'-'.$file->getClientOriginalName();
                if($file->move($path,$modifiedFileName)){
                    $data->enterprise_logo = $path.$modifiedFileName;
                }
                $data->save();
            }
            
            return back()->with('message', 'Cập nhật ảnh thành công');
        }
    }

    // uploat Ảnh
    public function UploadImg(Request $request, $id) {
        if(Input::get('save')) {
            $data = EnterprisesModel::find($id);
            $file =  $request->dn_logo;
            $path = 'uploads/public/';
            $modifiedFileName = time().'-'.$file->getClientOriginalName();
            if($file->move($path,$modifiedFileName)){
                $data->enterprise_logo = $path.$modifiedFileName;
            }
            $data->save();
            return back();
        }
    }

    // Khoa dao tao
    public function getListKdt() {
    	
        $en_id = EnterprisesModel::join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
                        ->where('uec_user.id', Auth::id())->first();
        $training = TrainModel::where('enterprise_id', $en_id->enterprise_id)->paginate(5);
        $skill = SkillModel::all();
        // dd($training, $en_id->enterprise_id);
    	return view('frontend.doanhnghiep.pr_doanhnghiep_khoadaotao', compact('enterprise', 'training', 'skill'));
    }

    public function getAddKdt() {
        
        $en_id = EnterprisesModel::join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
                        ->where('uec_user.id', Auth::id())->first();
        $area = AreaModel::all();
        $skill = SkillModel::all();
        return view('frontend.doanhnghiep.pr_doanhnghiep_add_kdt', compact('enterprise', 'area', 'skill', 'en_id'));
    }
    public function postAddKdt(Request $request) {
        $rules = [
            'training_img' => 'required',
            'training_name' => 'required',
            'training_timeserving' => 'required',
            'training_amount_student' => 'required',
            'training_address' => 'required',
            'area_id' => 'required',
            'skill_id' => 'required',
        ];
        $messages = [
            'training_img.required' => 'Ảnh khóa đào tạo không được để trống',
            'training_name.required' => 'Tên khóa đào tạo không được để trống',
            'training_timeserving.required' => 'Thời gian khóa đào tạo không được để trống',
            'training_amount_student.required' => 'Số lượng học viên không được để trống',
            'training_address.required' => 'Địa chỉ không được để trống',
            // 'training_describe.required' => 'Mô tả đào tạo không được để trống',
            'area_id.required' => 'Bạn không được để trống tỉnh/thành phố',
            'skill_id.required' => 'Bạn không được để trống trình độ kĩ năng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        } else {
             $data = new TrainModel;
            $data->training_name = $request->training_name;
            $data->training_slug = str_slug($request->training_name);
            $data->training_timeserving = $request->training_timeserving;
            $data->training_amount_student = $request->training_amount_student;
            $data->training_deadline = $request->training_deadline;
            $data->training_address = $request->training_address;
            $data->training_describe = $request->training_describe;
            $data->training_status = $request->training_status;
            $data->area_id = $request->area_id;
            $data->skill_id = $request->skill_id;
            $data->enterprise_id = $request->enterprise_id;

            $file =  $request->training_img;
            $path = 'uploads/khoadaotao/';
            $modifiedFileName = time().'-'.$file->getClientOriginalName();
            if($file->move($path,$modifiedFileName)){
                $data->training_img = $path.$modifiedFileName;
            }
            $data->save();
            // dd($data);
            return redirect()->intended('enterprise/list_kdt');
        }
       
    }
    public function getEditKdt($id) {
    	
        $en_id = EnterprisesModel::join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
                        ->where('uec_user.id', Auth::id())->first();
        $area = AreaModel::all();
        $skill = SkillModel::all();
        $train = TrainModel::find($id);
    	return view('frontend.doanhnghiep.pr_doanhnghiep_edit_kdt', compact('enterprise', 'area', 'skill', 'train', 'en_id'));
    }
    public function postEditKdt(Request $request, $id) {
        $data = TrainModel::find($id);
        
        $data->training_name = $request->training_name;
        $data->training_slug = str_slug($request->training_name);
        $data->training_timeserving = $request->training_timeserving;
        $data->training_amount_student = $request->training_amount_student;
        $data->training_deadline = $request->training_deadline;
        $data->training_address = $request->training_address;
        $data->training_describe = $request->training_describe;
        $data->training_status = $request->training_status;
        $data->area_id = $request->area_id;
        $data->skill_id = $request->skill_id;
        $data->enterprise_id = $request->enterprise_id;

        $file =  $request->training_img;
        $path = 'uploads/khoadaotao/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $data->training_img = $path.$modifiedFileName;
        }
        $data->save();
        
        // dd($data);
        return redirect()->intended('enterprise/list_kdt');
    }
    public function getDeleteKdt($id) {
        TrainModel::destroy($id);
        return back()->with("success", "Xóa khóa đào tạo thành công");
    }
    public function getKdtDetail($id) {
        
        $kdt = TrainModel::join('uec_enterprises', 'uec_enterprises.id', '=', 'uec_training.enterprise_id')
                ->join('uec_area', 'uec_area.id', '=', 'uec_training.area_id')
                ->join('uec_skill', 'uec_skill.id', '=', 'uec_training.skill_id')
                ->find($id);
        return view('frontend.doanhnghiep.pr_doanhnghiep_khoadaotao_chitiet', compact('enterprise', 'kdt'));
    }

    // Tin tuyen dung
    public function getListTtd() {
    	
        $en_id = EnterprisesModel::join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
                    ->where('uec_user.id', Auth::id())->first();
        $recruitment = RecruitmentModel::join('uec_formality', 'uec_recruitment.formality_id', '=', 'uec_formality.id')
                    ->select('uec_recruitment.id', 'recruitment_name', 'formality_name', 'recruitment_status', 'recruitment_deadline', 'uec_recruitment.enterprise_id')
                    ->where('enterprise_id', $en_id->enterprise_id)
                    ->orderBy('uec_recruitment.id', 'desc')
                    ->paginate(10);
                        // dd($recruitment, Auth::id(), $en_id);
    	return view('frontend.doanhnghiep.pr_doanhnghiep_tintuyendung', compact('enterprise', 'recruitment'));
    }
    public function getAddTtd() {
        
        $area = AreaModel::all();
        $yearofexp = YearOfExpModel::all();
        $position = PositionModel::all();
        $education = EducationModel::all();
        $formality = FormalityModel::all();
        $career = CareerModel::all();
    	return view('frontend.doanhnghiep.pr_doanhnghiep_add_ttd', compact('enterprise', 'area', 'yearofexp', 'position', 'education', 'formality', 'career'));
    }
    public function postAddTtd(AddTTDRequest $request) {
        $data = new RecruitmentModel;
        $data->recruitment_name = $request->recruitment_name;
        $data->recruitment_slug = str_slug($request->recruitment_name);
        $data->recruitment_salary = $request->recruitment_salary;
        $data->recruitment_amount = $request->recruitment_amount;
        $data->recruitment_age = $request->recruitment_age;
        $data->recruitment_gender = $request->recruitment_gender;
        $data->recruitment_deadline = $request->recruitment_deadline;
        $data->recruitment_status = $request->recruitment_status;
        $data->recruitment_describe = $request->recruitment_describe;
        $data->recruitment_benefit = $request->recruitment_benefit;
        $data->recruitment_requirements = $request->recruitment_requirements;
        $data->area_id = $request->area_id;
        $data->yearofexp_id = $request->yearofexp_id;
        $data->position_id = $request->position_id;
        $data->education_id = $request->education_id;
        $data->formality_id = $request->formality_id;
        $data->career_id = $request->career_id;
        $data->formality_id = $request->formality_id;
        $data->enterprise_id = $request->enterprise_id;
        $file =  $request->recruitment_img;
        $path = 'uploads/tintuyendung/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $data->recruitment_img = $path.$modifiedFileName;
        }
        $data->save();
        // dd($data);
        return redirect()->intended('enterprise/list_ttd');
    }
    public function getEditTtd($id) {
        
        $area = AreaModel::all();
        $yearofexp = YearOfExpModel::all();
        $position = PositionModel::all();
        $education = EducationModel::all();
        $formality = FormalityModel::all();
        $career = CareerModel::all();
        $recruit = RecruitmentModel::find($id);
        return view('frontend.doanhnghiep.pr_doanhnghiep_edit_ttd', compact('enterprise', 'area', 'yearofexp', 'position', 'education', 'formality', 'career', 'recruit'));
    }
    public function postEditTtd(AddTTDRequest $request, $id) {
        $data = RecruitmentModel::find($id);
        
        $data->recruitment_name = $request->recruitment_name;
        $data->recruitment_slug = str_slug($request->recruitment_name);
        $data->recruitment_salary = $request->recruitment_salary;
        $data->recruitment_amount = $request->recruitment_amount;
        $data->recruitment_age = $request->recruitment_age;
        $data->recruitment_gender = $request->recruitment_gender;
        $data->recruitment_deadline = $request->recruitment_deadline;
        $data->recruitment_status = $request->recruitment_status;
        $data->recruitment_describe = $request->recruitment_describe;
        $data->recruitment_benefit = $request->recruitment_benefit;
        $data->recruitment_requirements = $request->recruitment_requirements;
        $data->area_id = $request->area_id;
        $data->yearofexp_id = $request->yearofexp_id;
        $data->position_id = $request->position_id;
        $data->education_id = $request->education_id;
        $data->formality_id = $request->formality_id;
        $data->career_id = $request->career_id;
        $data->formality_id = $request->formality_id;
        $data->enterprise_id = $request->enterprise_id;
         $file =  $request->recruitment_img;
        $path = 'uploads/tintuyendung/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $data->recruitment_img = $path.$modifiedFileName;
        }
        $data->save();
        
        // dd($data);
        return redirect()->intended('enterprise/list_ttd')->with("success", "Cập nhật tin tuyển dụng thành công");
    }
    public function DeleteTtd($id) {
        RecruitmentModel::destroy($id);
        return back()->with("success", "Xóa tin tuyển dụng thành công");
    }
    public function getDetailTtd($id) {
    	
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
        // dd($tin_id);
    	return view('frontend.doanhnghiep.pr_doanhnghiep_tintuyendung_chitiet', compact('enterprise', 'tin','tin_id'));
    }

    public function getCV() {
        
        $en_id = EnterprisesModel::join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
                        ->where('uec_user.id', Auth::id())->first();
        $cvs = RecruitmentModel::join('uec_enterprises', 'uec_enterprises.id', '=', 'uec_recruitment.enterprise_id')
                        ->join('uec_jobapp_recruitment', 'uec_jobapp_recruitment.recruitment_id', '=', 'uec_recruitment.id')
                        ->join('uec_jobapplication', 'uec_jobapplication.id', '=', 'uec_jobapp_recruitment.jobapplication_id')
                        ->join('uec_student', 'uec_student.id', '=', 'uec_jobapp_recruitment.student_id')
                        ->where('enterprise_id', $en_id->enterprise_id)
                        ->select('recruitment_name', 'jobapplication_name', 'student_name', 'uec_jobapp_recruitment.created_at', 'uec_jobapp_recruitment.status', 'uec_jobapp_recruitment.id', 'active_work')
                        ->paginate(10);

                        // dd($cvs);
        return view('frontend.doanhnghiep.pr_doanhnghiep_hosoungtuyen', compact('enterprise', 'cvs'));
    }
    public function getCVDetail($id) {
    	
        $tin_id = $id;
        $cv = JobapplicationModel::join('uec_user', 'uec_user.id', '=', 'uec_jobapplication.user_id')
                ->join('uec_area', 'uec_area.id', '=', 'uec_jobapplication.area_id')    
                ->join('uec_education', 'uec_education.id', '=', 'uec_jobapplication.education_id')    
                ->join('uec_career', 'uec_career.id', '=', 'uec_jobapplication.career_id')    
                ->join('uec_yearofexp', 'uec_yearofexp.id', '=', 'uec_jobapplication.yearofexp_id')    
                ->join('uec_formality', 'uec_formality.id', '=', 'uec_jobapplication.formality_id')    
                ->join('uec_student', 'uec_student.id', '=', 'uec_jobapplication.student_id')    
                ->join('uec_jobapp_recruitment', 'uec_jobapp_recruitment.jobapplication_id', '=', 'uec_jobapplication.id')    
                ->where('uec_jobapp_recruitment.id', $id)
                ->select('uec_jobapplication.id', 'jobapplication_name', 'jobapplication_salary', 'jobapplication_purpose', 'area_name', 'career_name', 'education_name', 'yearofexp_name', 'formality_name', 'uec_user.student_id', 'uec_student.student_name', 'uec_student.student_code', 'uec_jobapplication.created_at')
                ->first();
        $utr = Jobapp_RecruitmentModel::where('status', 'work')
                ->where('active_work', 1)
                ->where('id', $id)
                ->first();
        $utr2 = Jobapp_RecruitmentModel::where('active_work', 2)
                ->where('id', $id)
                ->first();
        // dd($cv, $utr->id);
    	return view('frontend.doanhnghiep.pr_doanhnghiep_hosoungtuyen_chitiet', compact('enterprise', 'cv', 'tin_id', 'utr', 'utr2'));
    }
    public function postCVDetail(Request $request) {
        if(!empty($request->id)) {
            $ut = Jobapp_RecruitmentModel::find($request->id);
            $ut->status = $request->status;
            $ut->active_work = 1;
            $ut->save();
        }
        return Response()->json($ut);
    }
    public function postCVDetail2(Request $request) {
        if(!empty($request->id)) {
            $ut = Jobapp_RecruitmentModel::find($request->id);
            $ut->active_work = 2;
            $ut->save();
        }
        return Response()->json($ut);
    }

    public function getReport(Request $request) {
        $en_id = EnterprisesModel::join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
                        ->where('uec_user.id', Auth::id())->select('uec_enterprises.id')->first();
    	$enterprise = EnterprisesModel::all();
        $area = AreaModel::all();
        $jobs = $en_id->Recruitment;
        if(!empty($request->recruitment_id)) {
            $c = Jobapp_RecruitmentModel::where('recruitment_id', $request->recruitment_id)->first();
            dd($c->Student);
            $arr = [];
            foreach($c as $job) {
                $arr[] = [
                    'student_id'=>$job->student_id
                ];
            }
            dd($arr);
        }
        
        // dd($jobs, $en_id);
        $students = StudentModel::where('area_id', $request->area_id)->orderBy('id', $request->order_by)->get();
        // $students = StudentModel::where('id', function($b) {
        //     $b->Jobapp_RecruitmentModel::where('status', 'work');
        // })->get();
        // dd($students);
    	return view('frontend.doanhnghiep.pr_doanhnghiep_thongke', compact('area', 'students', 'jobs'));
    }
}
