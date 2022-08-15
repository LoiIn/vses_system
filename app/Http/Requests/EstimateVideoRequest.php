<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EstimateVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) return true;
        else return redirect()->route('login.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'video' => 'required|mimes:mp4|max:25600',
            // 'rwf' => 'required',
            // 'rws' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'video.required' => 'Bạn chưa cung cấp video',
            'video.mines' => 'Video phải có định dạng .mp4',
            'video.max' => 'Dung lượng video không được vượt quá 50MB',
            'rwf.required' => 'Bạn chưa cung cấp giá trị của chiều dài mép đường thứ nhất',
            'rws.required' => 'Bạn chưa cung cấp giá trị của chiều dài mép đường thứ hai'
        ];
    }
}
