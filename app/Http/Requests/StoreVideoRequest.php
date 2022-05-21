<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreVideoRequest extends FormRequest
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
            'name' => ['required'],
            'length' => ['required', 'integer'],
            'slug' => ['required', 'unique:videos,slug', 'alpha_dash'],
            'file' => ['required', 'file', 'mimetypes:video/mp4'],
            'thumbnail' => ['required', 'url'],
            'description' => ['required', 'string','min:2','max:1000'],
            'category_id' => ['required', 'integer',Rule::exists('categories','id')],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    public function messages()
    {
        return [
            'file.*' => 'فایل باید ویدیویی باشد.'
        ];
    }
}
