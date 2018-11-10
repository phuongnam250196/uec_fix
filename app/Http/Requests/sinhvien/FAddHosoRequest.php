<?php

namespace App\Http\Requests\sinhvien;

use Illuminate\Foundation\Http\FormRequest;

class FAddHosoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'formality_id'=>'required',
            'yearofexp_id'=>'required',
            'education_id'=>'required',
            'career_id'=>'required',
            'area_id'=>'required',
            'jobapplication_name'=>'required',
        ];
    }
    public function messages() {
        return [
            'area_id.required'=>'Bạn chưa chọn Tỉnh/Thành phố',
            'formality_id.required'=>'Bạn chưa chọn hình thức làm việc',
            'yearofexp_id.required'=>'Bạn chưa chọn năm kinh nghiệm',
            'education_id.required'=>'Bạn chưa chọn bằng cấp',
            'career_id.required'=>'Bạn chưa chọn nghề nghiệp',
            'jobapplication_name.required'=>'Tên CV không được để trống',
        ];
    }
}
