<?php

namespace See\Http\Controllers;

use Illuminate\Http\Request;
use See\Http\Requests\SeeRequest;
use See\Mail\EmailBoletim;
use See\Models\TbEmailSee;

class SeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeeRequest $request)
    {
        try {
            $data = $request->all();

            if (isset($data['ema_see_ds_copia'])) {
                $data['ema_see_ds_copia'] = implode($data['ema_see_ds_copia'], ',');
            }

            if (isset($data['ema_see_ds_para'])) {
                $data['ema_see_ds_para'] = implode($data['ema_see_ds_para'], ',');
            }

            if (isset($data['materias'])) {
                $data['materias'] = implode($data['materias'], ',');
            }

            $data['ema_see_ds_login'] = usernameUpper();

            TbEmailSee::create($data);

//        $result = TbEmailSee::create($data);

//        if($result){
//            \Mail::to($result->ema_see_ds_de)->send(new EmailBoletim($result));
//        }

            toastr()->success('Cadastro realizado com sucesso!');

            return redirect()->route('home');
        } catch (\Exception $exception) {
            toastr()->error("erro: {$exception->getMessage()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function enviarTeste()
    {

    }
}
