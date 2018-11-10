<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\Http\Request\danhmuckhac;
use App\Http\Requests\danhmuckhac\AddCareerRequest;
use App\Http\Requests\danhmuckhac\EditCareerRequest;
use App\Http\Requests\danhmuckhac\AddYearofexpRequest;
use App\Http\Requests\danhmuckhac\EditYearofexpRequest;
use App\Http\Requests\danhmuckhac\AddEducationRequest;
use App\Http\Requests\danhmuckhac\EditEducationRequest;
use App\Http\Requests\danhmuckhac\AddFormalityRequest;
use App\Http\Requests\danhmuckhac\EditFormalityRequest;
use App\Http\Requests\danhmuckhac\AddSkillRequest;
use App\Http\Requests\danhmuckhac\EditSkillRequest;
use App\Http\Requests\danhmuckhac\AddAreaRequest;
use App\Http\Requests\danhmuckhac\EditAreaRequest;
use App\Http\Requests\danhmuckhac\AddPositionRequest;
use App\Http\Requests\danhmuckhac\EditPositionRequest;
use App\Http\Controllers\Controller;

use App\Models\danhmuckhac\CareerModel;
use App\Models\danhmuckhac\YearofexpModel;
use App\Models\danhmuckhac\EducationModel;
use App\Models\danhmuckhac\AreaModel;
use App\Models\danhmuckhac\FormalityModel;
use App\Models\danhmuckhac\PositionModel;
use App\Models\danhmuckhac\SkillModel;
use Response;

class OtherCategoryController extends Controller
{

    // nghề nghiệp
    public function getNghenghiep() {
        $data['nn'] = CareerModel::orderBy('id', 'desc')->paginate(5);
    	return view('backend.danhmuckhac.adm_nghenghiep', $data);
    }
    public function postNghenghiep(Request $request) {
        $nn = new CareerModel;
        $nn->career_name = $request->name;
        $nn->career_describe = $request->describe;
        $nn->career_slug = str_slug($request->name);
        $nn->save();
        return response()->json($nn);
    }
    public function getEditNghenghiep($id) {
        $data['nn'] = CareerModel::find($id);
        return view('backend.danhmuckhac.adm_nghenghiep_edit', $data);
    }
    public function postEditNghenghiep(EditCareerRequest $request, $id) {
        $nn = CareerModel::find($id);
        $nn->career_name = $request->name;
        $nn->career_describe = $request->describe;
        $nn->career_slug = str_slug($request->name);
        $nn->save();
        return redirect()->intended('admin/danhmuckhac/nghenghiep')->with("success", "Sửa nghề nghiệp thành công");
    }
    public function getDeleteNghenghiep($id) {
         $b = CareerModel::destroy($id);
        return Response::json($b);
    }


    // Năm kinh nghiệm
    public function getNamkinhnghiem() {
        $data['nn'] = YearofexpModel::orderBy('id', 'desc')->paginate(5);
    	return view('backend.danhmuckhac.adm_namkinhnghiem', $data);
    }
    public function postNamkinhnghiem(AddYearofexpRequest $request) {
        $nn = new YearofexpModel;
        $nn->yearofexp_name = $request->name;
        $nn->yearofexp_describe = $request->describe;
        $nn->yearofexp_slug = str_slug($request->name);
        $nn->save();
        return back()->with("sucess", "Thêm năm kinh nghiệm thành công");
    }
    public function getEditNamkinhnghiem($id) {
        $data['nn'] = YearofexpModel::find($id);
        return view('backend.danhmuckhac.adm_namkinhnghiem_edit', $data);
    }
    public function postEditNamkinhnghiem(EditYearofexpRequest $request, $id) {
        $nn = YearofexpModel::find($id);
        $nn->yearofexp_name = $request->name;
        $nn->yearofexp_describe = $request->describe;
        $nn->yearofexp_slug = str_slug($request->name);
        $nn->save();
        return redirect()->intended('admin/danhmuckhac/namkinhnghiem')->with("success", "Sửa năm kinh nghiệm thành công");
    }
    public function getDeleteNamkinhnghiem($id) {
        YearofexpModel::destroy($id);
        return back()->with("success", "Xóa năm kinh nghiệm thành công");
    }
    

    // Học vấn
    public function getHocvan() {
        $data['nn'] = EducationModel::orderBy('id', 'desc')->paginate(5);
        return view('backend.danhmuckhac.adm_hocvan', $data);
    }
    public function postHocvan(AddEducationRequest $request) {
        $nn = new EducationModel;
        $nn->education_name = $request->name;
        $nn->education_describe = $request->describe;
        $nn->education_slug = str_slug($request->name);
        $nn->save();
        return back()->with("sucess", "Thêm học vấn thành công");
    }
    public function getEditHocvan($id) {
        $data['nn'] = EducationModel::find($id);
        return view('backend.danhmuckhac.adm_hocvan_edit', $data);
    }
    public function postEditHocvan(EditEducationRequest $request, $id) {
        $nn = EducationModel::find($id);
        $nn->education_name = $request->name;
        $nn->education_describe = $request->describe;
        $nn->education_slug = str_slug($request->name);
        $nn->save();
        return redirect()->intended('admin/danhmuckhac/hocvan')->with("success", "Sửa học vấn thành công");
    }
    public function getDeleteHocvan($id) {
        EducationModel::destroy($id);
        return back()->with("success", "Xóa học vấn thành công");
    }


    // Hình thức
    public function getHinhthuc() {
        $data['nn'] = FormalityModel::orderBy('id', 'desc')->paginate(5);
        return view('backend.danhmuckhac.adm_hinhthuc', $data);
    }
    public function postHinhthuc(AddFormalityRequest $request) {
        $nn = new FormalityModel;
        $nn->formality_name = $request->name;
        $nn->formality_describe = $request->describe;
        $nn->formality_slug = str_slug($request->name);
        $nn->save();
        return back()->with("sucess", "Thêm hình thức thành công");
    }
    public function getEditHinhthuc($id) {
        $data['nn'] = FormalityModel::find($id);
        return view('backend.danhmuckhac.adm_hinhthuc_edit', $data);
    }
    public function postEditHinhthuc(EditFormalityRequest $request, $id) {
        $nn = FormalityModel::find($id);
        $nn->formality_name = $request->name;
        $nn->formality_describe = $request->describe;
        $nn->formality_slug = str_slug($request->name);
        $nn->save();
        return redirect()->intended('admin/danhmuckhac/hinhthuc')->with("success", "Sửa hình thức thành công");
    }
    public function getDeleteHinhthuc($id) {
        FormalityModel::destroy($id);
        return back()->with("success", "Xóa hình thức thành công");
    }


    // Kĩ năng
    public function getKinang() {
        $data['nn'] = SkillModel::orderBy('id', 'desc')->paginate(5);
        return view('backend.danhmuckhac.adm_kinang', $data);
    }
    public function postKinang(AddSkillRequest $request) {
        $nn = new SkillModel;
        $nn->skill_name = $request->name;
        $nn->skill_describe = $request->describe;
        $nn->skill_slug = str_slug($request->name);
        $nn->save();
        return back()->with("sucess", "Thêm kĩ năng thành công");
    }
    public function getEditKinang($id) {
        $data['nn'] = SkillModel::find($id);
        return view('backend.danhmuckhac.adm_kinang_edit', $data);
    }
    public function postEditKinang(EditSkillRequest $request, $id) {
        $nn = SkillModel::find($id);
        $nn->skill_name = $request->name;
        $nn->skill_describe = $request->describe;
        $nn->skill_slug = str_slug($request->name);
        $nn->save();
        return redirect()->intended('admin/danhmuckhac/kinang')->with("success", "Sửa kĩ năng thành công");
    }
    public function getDeleteKinang($id) {
        SkillModel::destroy($id);
        return back()->with("success", "Xóa kĩ năng thành công");
    }


    // Khu vực
    public function getKhuvuc() {
        $data['nn'] = AreaModel::orderBy('id', 'desc')->paginate(5);
        return view('backend.danhmuckhac.adm_khuvuc', $data);
    }
    public function postKhuvuc(AddAreaRequest $request) {
        $nn = new AreaModel;
        $nn->area_name = $request->name;
        $nn->area_describe = $request->describe;
        $nn->area_slug = str_slug($request->name);
        $nn->save();
        return back()->with("sucess", "Thêm khu vực thành công");
    }
    public function getEditKhuvuc($id) {
        $data['nn'] = AreaModel::find($id);
        return view('backend.danhmuckhac.adm_khuvuc_edit', $data);
    }
    public function postEditKhuvuc(EditAreaRequest $request, $id) {
        $nn = AreaModel::find($id);
        $nn->area_name = $request->name;
        $nn->area_describe = $request->describe;
        $nn->area_slug = str_slug($request->name);
        $nn->save();
        return redirect()->intended('admin/danhmuckhac/khuvuc')->with("success", "Sửa khu vực thành công");
    }
    public function getDeleteKhuvuc($id) {
        AreaModel::destroy($id);
        return back()->with("success", "Xóa khu vực thành công");
    }


    // Chức vụ
    public function getChucvu() {
        $data['nn'] = PositionModel::orderBy('id', 'desc')->paginate(5);
        return view('backend.danhmuckhac.adm_chucvu', $data);
    }
    public function postChucvu(AddPositionRequest $request) {
        $nn = new PositionModel;
        $nn->position_name = $request->name;
        $nn->position_describe = $request->describe;
        $nn->position_slug = str_slug($request->name);
        $nn->save();
        return back()->with("sucess", "Thêm chức vụ thành công");
    }
    public function getEditChucvu($id) {
        $data['nn'] = PositionModel::find($id);
        return view('backend.danhmuckhac.adm_chucvu_edit', $data);
    }
    public function postEditChucvu(EditPositionRequest $request, $id) {
        $nn = PositionModel::find($id);
        $nn->position_name = $request->name;
        $nn->position_describe = $request->describe;
        $nn->position_slug = str_slug($request->name);
        $nn->save();
        return redirect()->intended('admin/danhmuckhac/chucvu')->with("success", "Sửa chức vụ thành công");
    }
    public function getDeleteChucvu($id) {
        PositionModel::destroy($id);
        return back()->with("success", "Xóa chức vụ thành công");
    }
}
