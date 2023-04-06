<?php

//namespace App\Http\Requests\Api;

// use Illuminate\Foundation\Http\FormRequest;

// class UpdateClientRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      */
//     public function authorize(): bool
//     {
//         return false;
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
//      */
//     public function rules(): array
//     {
//         return [
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//             'national_id' => ['required', 'string', 'national_id', 'max:255', 'unique:users'],
//             'password' => ['required', 'string', 'min:6', 'confirmed'],
//             'phone'=>['required', 'string', 'min:11'],
//             'avatar'=>'required|image'
//         ];
//     }

//     public function messages()
//     {
//         return [
//             'body.required' => 'A message is required',

//         ];
//     }
// }
