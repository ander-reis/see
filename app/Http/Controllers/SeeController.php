<?php

namespace See\Http\Controllers;

use Illuminate\Http\Request;
use See\Http\Requests\SeeRequest;
use See\Models\Materia;
use See\Models\TbEmailSee;

class SeeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeeRequest $request)
    {
        try {
            /**
             * form request data
             */
            $data = $request->all();

            /**
             * formata data
             */
            $data = $this->formatDataRequest($data);

            /**
             * insert database
             */
            TbEmailSee::create($data);

            /**
             * alert toast message
             */
            toastr()->success('Cadastro realizado com sucesso!');

            /**
             * redirect route for home
             */
            return redirect()->route('home');
        } catch (\Exception $exception) {
            /**
             * alert toast message error
             */
            return toastr()->error("erro: {$exception->getMessage()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * select database
         */
        $model = TbEmailSee::where('ema_see_cd_observacao', $id)->first();

        /**
         * return view
         */
        return view('see.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * select database
         */
        $model = TbEmailSee::where('ema_see_cd_observacao', $id)->first();

        /**
         * explode ema_see_ds_para
         */
        $model->ema_see_ds_para = explode(',', $model->ema_see_ds_para);

        /**
         * fill input select multiple
         */
        $selectOption = TbEmailSee::selectOption();

        /**
         * select database Materia
         */
        $materias = $this->optionCheckboxMaterias($model->ema_see_ds_materia);

        /**
         * fill option checkbox
         */
        $enviarCopia = $this->optionCheckboxEnviarCopia($model->ema_see_ds_copia);

        /**
         * return view
         */
        return view('see.edit', compact('model', 'materias', 'enviarCopia', 'selectOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            /**
             * select database
             */
            $see = TbEmailSee::where('ema_see_cd_observacao', $id)->first();

            /**
             * format data from request
             */
            $data = $this->formatDataRequest($request->all());

            /**
             * update database
             */
            $see->update($data);

            /**
             * alert toast message successs
             */
            toastr()->success('Cadastro alterado com sucesso!');

            /**
             * redirect view
             */
            return redirect()->route('home');
        } catch (\Exception $exception) {
            /**
             * alert message toast error
             */
            return toastr()->error("erro: {$exception->getMessage()}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            /**
             * data ema_see_cd_observacao
             */
            $id = $request->only(array_keys($request->all()));

            /**
             * delete database
             */
            TbEmailSee::destroy($id['ema_see_cd_observaca']);

            /**
             * alert message toast success
             */
            toastr()->success('Agendamento cancelado com sucesso!');

            /**
             * redirect view
             */
            return redirect()->route('home');

        } catch (\Exception $e) {
            /**
             * alert message toast error
             */
            toastr()->error('Agendamento não pode ser cancelado!');

            return back();
        }
    }

    /**
     * Método responsável por preencher checkbox
     *
     * @param $model
     * @return array
     */
    public function optionCheckboxEnviarCopia($model)
    {
        /**
         * fill checkbox option
         */
        $enviarCopia = TbEmailSee::checkboxOption();

        /**
         * explode data model
         */
        $namesCopiaDatabase = explode(',', $model);

        /**
         * configure option checked
         */
        foreach ($enviarCopia as $key => $value) {
            foreach ($namesCopiaDatabase as $name) {
                if ($key == $name) {
                    $enviarCopia[$key]['option'] = true;
                }
            }
        }

        /**
         * return data
         */
        return $enviarCopia;
    }

    /**
     * Método responsável por preencher checkbox matérias
     *
     * @param $model
     * @return array
     */
    public function optionCheckboxMaterias($model)
    {
        /**
         * fill checkbox option
         */
        $materias = Materia::all();

        /**
         * explode data model
         */
        $namesMateriaDatabase = explode(',', $model);

        /**
         * configure option checked
         */
        foreach ($materias as $key => $value) {
            foreach ($namesMateriaDatabase as $name) {
                if ($value->Materia == $name) {
                    $materias[$key]['option'] = true;
                }
            }
        }

        /**
         * return data
         */
        return $materias;
    }

    /**
     * Método responsável por formatar dados ema_see_ds_copia, ema_see_ds_para, ema_see_ds_materia de Array para String
     * Formata o campo ema_see_ds_login para letras maiúscula
     *
     * @param $data
     * @return mixed
     */
    public function formatDataRequest($data)
    {
        /**
         * format Array from String
         */
        if (isset($data['ema_see_ds_copia'])) {
            $data['ema_see_ds_copia'] = implode($data['ema_see_ds_copia'], ',');
        }

        /**
         * format Array from String
         */
        if (isset($data['ema_see_ds_para'])) {
            $data['ema_see_ds_para'] = implode($data['ema_see_ds_para'], ',');
        }

        /**
         * format Array from String
         */
        if (isset($data['ema_see_ds_materia'])) {
            $data['ema_see_ds_materia'] = implode($data['ema_see_ds_materia'], ',');
        }

        /**
         * format Uppercase
         */
        $data['ema_see_ds_login'] = usernameUpper();

        /**
         * return data
         */
        return $data;
    }
}
