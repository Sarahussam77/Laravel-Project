<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Validation\Rule;
// use Illuminate\Validation\Rules\Unique;
// use Illuminate\Support\Facades\Validator;

// class UpdateRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      */
//     public function authorize(): bool
//     {
//         return true;
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