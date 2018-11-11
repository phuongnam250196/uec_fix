<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\EnterpriseInfoRequest;
use App\Http\Requests\doanhnghiep\AddUserEnterprisesRequest;
use App\Http\Requests\doanhnghiep\EditEnterprisesInfoRequest;
use App\Http\Requests\doanhnghiep\EditUserEnterprisesRequest;
use App\Http\Controllers\Controller;

use App\Models\danhmuckhac\AreaModel;
 use App\Models\EnterprisesModel;
use App\Models\UserModel;

use Illuminate\Support\Facades\Input;

use Excel;
use DB;
use Response;
// use Url;
class EnterpriseController extends Controller
{
	// Thông tin doanh nghiệp
    public function getThongtin() {
    	$area = AreaModel::all();
    	$enter = EnterprisesModel::join('uec_area', 'uec_area.id', '=', 'uec_enterprises.area_id')->orderBy('id', 'desc')
        ->select('uec_enterprises.id', 'enterprise_full_name', 'enterprise_email', 'enterprise_phone', 'enterprise_logo', 'area_name')->paginate(5);
    	return view('backend.doanhnghiep.adm_doanhnghiep', compact('area', 'enter'));
    }
    public function getEditThongtin($id) {
        $data['area'] = AreaModel::all();
        $data['enp'] = EnterprisesModel::find($id);
        // dd($data);
        return view('backend.doanhnghiep.adm_doanhnghiep_edit', $data);
    }
    public function getAddThongtin() {
        $data['area'] = AreaModel::all();
        $data['enter'] = EnterprisesModel::orderBy('id', 'desc')->paginate(5);
        return view('backend.doanhnghiep.adm_doanhnghiep_add', $data);
    }
    public function postAddThongtin(Request $request) {
        if(!Input::get('save')) {
            $enter = new EnterprisesModel;
            $enter->enterprise_name = $request->dn_acronym;
            $enter->enterprise_full_name = $request->dn_name;
            $enter->enterprise_slug = str_slug($request->dn_name);
            $enter->enterprise_size = $request->dn_size;
            $enter->enterprise_address = $request->dn_address;
            $enter->enterprise_tax_code = $request->dn_tax_code;
            $enter->enterprise_email = $request->dn_email;
            $enter->enterprise_phone = $request->dn_phone;
            $enter->enterprise_web = $request->dn_website;
            $enter->enterprise_describe = $request->dn_describe;
            $enter->area_id = $request->dn_area;
           
            $file =  $request->dn_logo;
            $path = 'uploads/public/';
            $modifiedFileName = time().'-'.$file->getClientOriginalName();
            if($file->move($path,$modifiedFileName)){
                $enter->enterprise_logo = $path.$modifiedFileName;
            }
            $enter->save();
            return redirect('admin/doanhnghiep/thongtin')->with('message', 'Thêm mới thành công');
        } else {
            if($request->hasFile('file_excel_dn')){
                $path = $request->file('file_excel_dn')->getRealPath();
                $data = Excel::load($path)->get();
                $arr2 = [];
                $arr = [];
                if(!empty($data) && $data->count() > 0){
                    foreach ($data as $value) {
                        $students = EnterprisesModel::where('enterprise_name', $value['enterprise_name'])->first();
                        // dd($students, $arr);
                        if(!empty($students)) {
                            $arr2[] = [
                                'enterprise_name' => $value->enterprise_name,
                                'enterprise_full_name' => $value->enterprise_full_name,
                                'enterprise_size' => $value->enterprise_size,
                                'enterprise_address' => $value->enterprise_address,
                                'enterprise_tax_code' => $value->enterprise_tax_code,
                                'enterprise_email' => $value->enterprise_email,
                                'enterprise_phone' => $value->enterprise_phone,
                                'enterprise_web' => $value->enterprise_web,
                                'enterprise_fanpage' => $value->enterprise_fanpage,
                                'enterprise_describe' => $value->enterprise_describe,
                                'enterprise_people_name' => $value->enterprise_people_name,
                                'enterprise_people_phone' => $value->enterprise_people_phone,
                                'area_id' => $value->area_id,
                            ];
                            // dd($arr2);
                        } else {
                            $arr[] = [
                                'enterprise_name' => $value->enterprise_name,
                                'enterprise_full_name' => $value->enterprise_full_name,
                                'enterprise_size' => $value->enterprise_size,
                                'enterprise_address' => $value->enterprise_address,
                                'enterprise_tax_code' => $value->enterprise_tax_code,
                                'enterprise_email' => $value->enterprise_email,
                                'enterprise_phone' => $value->enterprise_phone,
                                'enterprise_web' => $value->enterprise_web,
                                'enterprise_fanpage' => $value->enterprise_fanpage,
                                'enterprise_describe' => $value->enterprise_describe,
                                'enterprise_people_name' => $value->enterprise_people_name,
                                'enterprise_people_phone' => $value->enterprise_people_phone,
                                'area_id' => $value->area_id,

                            ];
                        }
                    }
                    // dd($arr, $arr2, count($arr));
                    if(!empty($arr)){
                        DB::table('uec_enterprises')->insert($arr);
                    }
                    if(!empty($arr2)) {
                        foreach ($arr2 as $key => $value) {
                            $value = (Object)$value;
                            DB::table('uec_enterprises')->where('enterprise_name',$value->enterprise_name)->update([
                                'enterprise_name' => $value->enterprise_name,
                                'enterprise_full_name' => $value->enterprise_full_name,
                                'enterprise_size' => $value->enterprise_size,
                                'enterprise_address' => $value->enterprise_address,
                                'enterprise_tax_code' => $value->enterprise_tax_code,
                                'enterprise_email' => $value->enterprise_email,
                                'enterprise_phone' => $value->enterprise_phone,
                                'enterprise_web' => $value->enterprise_web,
                                'enterprise_fanpage' => $value->enterprise_fanpage,
                                'enterprise_describe' => $value->enterprise_describe,
                                'enterprise_people_name' => $value->enterprise_people_name,
                                'enterprise_people_phone' => $value->enterprise_people_phone,
                                'area_id' => $value->area_id,
                            ]);
                        }
                    }
                    // dd($message);
                    return redirect('admin/doanhnghiep/thongtin');
                }
            }
        }
    }

    public function postEditThongtin(EditEnterprisesInfoRequest $request, $id) {
        $enter = EnterprisesModel::find($id);
        $enter->enterprise_name = $request->dn_acronym;
        $enter->enterprise_full_name = $request->dn_name;
        $enter->enterprise_slug = str_slug($request->dn_name);
        $enter->enterprise_size = $request->dn_size;
        $enter->enterprise_address = $request->dn_address;
        $enter->enterprise_tax_code = $request->dn_tax_code;
        $enter->enterprise_email = $request->dn_email;
        $enter->enterprise_phone = $request->dn_phone;
        $enter->enterprise_web = $request->dn_website;
        $enter->enterprise_describe = $request->dn_describe;
        $enter->area_id = $request->dn_area;
        $file =  $request->dn_logo;
        $path = 'uploads/public/';
        $modifiedFileName = time().'-'.$file->getClientOriginalName();
        if($file->move($path,$modifiedFileName)){
            $enter->enterprise_logo = $path.$modifiedFileName;
        }
        $enter->save();
        return redirect()->intended('admin/doanhnghiep/thongtin')->with("success", "Sửa thông tin doanh nghiệp thành công");
    }
    public function getDeleteThongtin($id) {
        // EnterprisesModel::destroy($id);
        // return back()->with("success", "Xóa thông tin doanh nghiệp thành công");
        $a = EnterprisesModel::destroy($id);
        return Response::json($a);
    }

    // Tài khoản doanh nghiệp
    public function getTaikhoan() {
        $enter = EnterprisesModel::all();
        // $enter = UserModel::find($id)->Enterprises;
        // $area = AreaModel::all();
        $list_user = DB::table('uec_enterprises')
        ->join('uec_user', 'uec_user.enterprise_id', '=', 'uec_enterprises.id')
        ->paginate(5);
        $user = UserModel::whereNotNull('enterprise_id')->get();
    	return view('backend.doanhnghiep.adm_doanhnghiep_taikhoan', compact('enter', 'list_user', 'user'));
        // dd($data);
    }
    public function postTaikhoan(AddUserEnterprisesRequest $request) {
    	$enter_user = new UserModel;
    	$enter_user->user_name=$request->dn_user_name;
    	$enter_user->password=bcrypt($request->dn_user_pass);
    	$enter_user->enterprise_id=$request->dn_user_info;
    	$enter_user->user_level = 2;
    	$enter_user->save();
    	return back();
    }
    public function getEditTaikhoan($id) {
        $enter = UserModel::find($id)->Enterprises;
        $list_user = UserModel::find($id);
        return view('backend.doanhnghiep.adm_doanhnghiep_taikhoan_edit', compact('enter', 'list_user'));
        // dd($data);
    }
    public function postEditTaikhoan(EditUserEnterprisesRequest $request, $id) {
        $enter_user = UserModel::find($id);
        $enter_user->user_name=$request->dn_user_name;
        $enter_user->password=bcrypt($request->dn_user_pass);
        $enter_user->save();
        return redirect()->intended('admin/doanhnghiep/taikhoan')->with("success", "Sửa tài khoản doanh nghiệp thành công");
    }
    public function getDeleteTaikhoan($id) {
        UserModel::destroy($id);
        return back()->with("success", "Xóa thông tin doanh nghiệp thành công");
    }
    public function getDeleteTaikhoanAll() {
        $enterprise = EnterprisesModel::all();
        $arr = [];
        foreach ($enterprise as $value) {
            $arr[] = [
                'enterprise_id' => $value->id
            ];
            
        }
        // dd($arr);
        $user = UserModel::whereNotNull('enterprise_id')->whereNotIn('enterprise_id', $arr)->get();
        foreach ($user as $value) {
            UserModel::destroy($value->id);

        }
        // dd($teach);
        return back()->with("success", "Reset tài khoản thành công");
    }

    public function getChitiet($id) {
    	$data['usct'] = EnterprisesModel::find($id)->User;
    	$data['dnct'] = EnterprisesModel::find($id)->get();
    	return view('backend.doanhnghiep.adm_doanhnghiep_user_info', $data);
    	// dd($data);
    }
    public function getAvatar($id)
    {
        $a = EnterprisesModel::where('id', $id)->select('enterprise_logo')->first();
        return $a->enterprise_logo;
    }
}
