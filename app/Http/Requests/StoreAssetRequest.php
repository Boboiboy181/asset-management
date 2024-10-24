<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'value' => ['required', 'numeric'],
            'residual_value' => ['required', 'numeric'],
            'expired_year' => ['required', 'numeric'],
            'purchased_year' => ['required', 'numeric'],
            'image_url' => ['required', 'image', 'mimes:jpg,jpeg,png'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->expired_year <= $this->purchased_year) {
                $validator->errors()->add('expired_year', 'The expired year must be greater than the purchased year.');
            }
        });
    }
}
