<?php

namespace See\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use See\Http\Requests\SeeEmailTesteRequest;
use See\Mail\EmailBoletim;

class EmailTeste extends Controller
{
    /**
     * Método responsável por enviar email de teste
     *
     * @param SeeEmailTesteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function enviarEmailTeste(SeeEmailTesteRequest $request)
    {
        $data = $request->only(array_keys($request->all()));

        Mail::to($data['teste_see_ds_email_teste'])->send(new EmailBoletim($data));

        return response()->json(true);
    }
}
