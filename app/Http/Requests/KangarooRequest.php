<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KangarooRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('kangaroos')->ignore($this->route('kangaroo'))],
            'nickname' => ['nullable', 'string'],
            'weight' => ['required', 'numeric', 'min:1'],
            'height' => ['required', 'numeric', 'min:1'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'color' => ['nullable', 'string'],
            'friendliness' => ['nullable', Rule::in(['friendly', 'independent'])],
            'birthday' => ['required', 'date']
        ];
    }
}
