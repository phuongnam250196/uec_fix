<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ScienceModel;
use App\Models\CourseModel;
use App\Models\SpecializeModel;

use Validator;
use Response;
use DB;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class WidenController extends Controller
{
	// Khoa học
    public function getKhoahoc() {
    	$post = ScienceModel::orderBy('id', 'desc')->paginate(4);
    	return view('backend.morong.adm_science', compact('post'));
    }
    public function AddKhoahoc(Request $request){
      	$rules = array(
	        'name' => 'required',
	      );
	    $validator = Validator::make ( Input::all(), $rules);
	    if ($validator->fails())
	    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

	    else {
	      $post = new ScienceModel;
	      $post->science_name = $request->name;
	      $post->save();
	      return response()->json($post);
	    }
	}
	public function EditKhoahoc(request $request){
	  $post = ScienceModel::find ($request->id);
	  $post->science_name = $request->name;
	  $post->save();
	  return response()->json($post);
	}

	public function DeleteKhoahoc(request $request){
	  $post = ScienceModel::find ($request->id)->delete();
	  return response()->json();
	}

    // Khóa
    public function getKhoa() {
    	$post = CourseModel::paginate(4);
    	return view('backend.morong.adm_course', compact('post'));
    }
    public function AddKhoa(Request $request){
      	$rules = array(
	        'name' => 'required',
	      );
	    $validator = Validator::make ( Input::all(), $rules);
	    if ($validator->fails())
	    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

	    else {
	      $post = new CourseModel;
	      $post->course_name = $request->name;
	      $post->save();
	      return response()->json($post);
	    }
	}
	public function EditKhoa(request $request){
	  $post = CourseModel::find ($request->id);
	  $post->course_name = $request->name;
	  $post->save();
	  return response()->json($post);
	}

	public function DeleteKhoa(request $request){
	  $post = CourseModel::find ($request->id)->delete();
	  return response()->json();
	}

    // Chuyên ngành
    public function getChuyennganh() {
    	// $post = SpecializeModel::paginate(4);	
    	$khoas = ScienceModel::all();
    	$a = SpecializeModel::join('uec_science', 'uec_science.id', '=', 'uec_specialize.science_id')->get();
    	$b = DB::table('uec_science')->join('uec_specialize', 'uec_science.id', '=', 'uec_specialize.science_id')->paginate(5);
    	// dd($b, $a);
    	return view('backend.morong.adm_specialize', compact('post', 'khoas', 'a', 'b'));
    }
    public function AddChuyennganh(Request $request){
      	$rules = array(
	        'name' => 'required',
	      );
	    $validator = Validator::make ( Input::all(), $rules);
	    if ($validator->fails())
	    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

	    else {
	      $post = new SpecializeModel;
	      $post->science_id = $request->khoa;
	      $post->specialize_name = $request->name;
	      $post->save();
	      return response()->json($post);
	    }
	}
	public function EditChuyennganh(request $request){
	  $post = SpecializeModel::find ($request->id);
	  $post->science_id = $request->khoa;
	  $post->specialize_name = $request->name;
	  $post->save();
	  return response()->json($post);
	}

	public function DeleteChuyennganh(request $request){
	  $post = SpecializeModel::find ($request->id)->delete();
	  return response()->json();
	}

}
