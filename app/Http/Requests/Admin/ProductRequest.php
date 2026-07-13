<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'productname' => 'required|min:5|max:100',

            'price' => 'required|numeric|min:0|max:10000000',

            'cateid' => 'required|exists:categories,cateid',

            'brandid' => 'required|exists:brands,id',

            // Lab 10
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'imgs.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ];
    }

    public function messages(): array
    {
        return [

            'required' => ':attribute không được để trống',

            'min' => ':attribute tối thiểu :min ký tự',

            'max' => ':attribute tối đa :max ký tự',

            'numeric' => ':attribute phải là số',

            'exists' => ':attribute không tồn tại',

            'image' => ':attribute phải là hình ảnh',

            'mimes' => ':attribute phải có định dạng jpg, jpeg, png hoặc webp',

        ];
    }

    public function attributes(): array
    {
        return [

            'productname' => 'Tên sản phẩm',

            'price' => 'Giá',

            'cateid' => 'Loại sản phẩm',

            'brandid' => 'Thương hiệu',

            'img' => 'Hình ảnh đại diện',

            'imgs.*' => 'Hình ảnh phụ',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException(
            $validator,
            redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}