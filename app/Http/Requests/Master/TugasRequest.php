<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class TugasRequest extends FormRequest
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
            'id' => 'nullable',
            'nip' => 'required',
            'nama_project' => 'required',
            'nama_modul' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'value' => 'required',
            'bonus' => 'required',
            'catatan' => 'nullable',
            'status' => 'required',
            'status_penyelesaian' => 'required',
        ];
    }
}
