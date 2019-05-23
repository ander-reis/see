<?php

namespace See\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeeEmailTesteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'teste_see_ds_email_teste' => 'required',
            'teste_see_ds_email' => 'required|min:20',
            'teste_see_ds_de' => 'required|email',
            'teste_see_ds_assunto' => 'required'
        ];
    }
}
