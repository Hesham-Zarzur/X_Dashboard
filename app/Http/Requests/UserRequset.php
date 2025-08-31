<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Http\FormRequest;

class UserRequset extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        $user = $this->user ?? 0;
        return [
            'name'=> "required|string|max:255",
            'email'=> "required|string|email|unique:users,id,{$user}|max:124|",
            'mobile' => "required|string|size:11|unique:users,id,{$user}|",
            'password'=> "nullable|string|max:24",
            'confirmPassword' => 'nullable|same:password',
            'role'=> "required|string|in:Admin,Cashier",
        ];
    }
}
