<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ubah menjadi `false` jika Anda ingin menggunakan autentikasi untuk request ini
    }

    public function rules()
    {
        return [
            'street' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
        ];
    }
}
