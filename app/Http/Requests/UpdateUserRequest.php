<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firtsname' => ['required', 'string', 'max:200'],
            'lastname' => ['required', 'string', 'max:200'],
            'username' => ['required', 'string', 'max:30', 'unique:users'],
            'code' => ['required', 'string', 'max:4'],
            'phone' => ['required', 'integer', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:200', 'unique:users' . request()->route('user')->id,],
            'address' => ['required', 'string', 'max:250'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles.*'  => ['integer'],
            'roles'    => ['required','array'],
        ];
    }
}