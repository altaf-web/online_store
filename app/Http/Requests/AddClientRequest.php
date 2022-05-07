<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "first_name"    =>  "required|min:2|max:30",
            "last_name"     =>  "required|min:2|max:30",
            "phone_number"  =>  "required|min:11",
            "role_id"       =>  ["required"]
        ];
    }
}
