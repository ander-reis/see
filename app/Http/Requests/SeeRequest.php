<?php

namespace See\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeeRequest extends FormRequest
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
            'ema_see_ds_email' => 'required|min:20',
            'ema_see_ds_tipo' => 'required',
            'ema_see_ds_de' => 'required|email',
            'ema_see_ds_exibir' => 'required',
            'ema_see_ds_assunto' => 'required',
            'ema_see_ds_para' => 'required',

//            'ema_see_ds_lista' => '',
//            'ema_see_ds_copia' => '',
//            'materias' => '',
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['ema_see_ds_de'] = trim(filter_var($input['ema_see_ds_de'], FILTER_SANITIZE_STRING));
        $input['ema_see_ds_exibir'] = trim(filter_var($input['ema_see_ds_exibir'], FILTER_SANITIZE_STRING));
        $input['ema_see_ds_assunto'] = trim(filter_var($input['ema_see_ds_assunto'], FILTER_SANITIZE_STRING));

        $this->replace($input);
    }
}
