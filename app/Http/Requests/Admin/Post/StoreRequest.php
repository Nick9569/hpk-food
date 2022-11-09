<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'distance' => 'required|integer',
            'location' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Це поле необхідно заповнити',
            'title.string'=>'Дані повинні відповідати рядковому типу',
            'description.required'=>'Це поле необхідно заповнити',
            'description.string'=>'Дані повинні відповідати рядковому типу',
            'distance.required'=>'Це поле необхідно заповнити',
            'distance.string'=>'Дані повинні відповідати числовому типу',
            'location.required'=>'Це поле необхідно заповнити',
            'location.string'=>'Дані повинні відповідати рядковому типу',
            'preview_image.required'=>'Це поле необхідно заповнити',
            'preview_image.file'=>'Необхідно вибрати файл',
            'main_image.required'=>'Це поле необхідно заповнити',
            'main_image.file'=>'ДНеобхідно вибрати файл',
            'category_id.required'=>'Це поле необхідно заповнити',
            'category_id.integer'=>'Id категорії має бути числом',
            'category_id.exists'=>'Id категорії має бути в базі даних',
        ];
    }
}
