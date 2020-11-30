<?php

namespace Modules\Mahasiswa\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [''],
            'nim' => [''],
            'gender' => [''],
            'tempat_lahir' => [''],
            'tanggal_lahir' => [''],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
