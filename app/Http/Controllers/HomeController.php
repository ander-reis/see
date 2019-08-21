<?php

namespace See\Http\Controllers;

use See\Models\Materia;
use See\Models\TbEmailSee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $materias = Materia::all();
        $observacoes = TbEmailSee::whereRaw('ema_see_fl_status <> 9')->orderBy('ema_see_cd_observacao', 'desc')->get();
        $enviarCopia = TbEmailSee::checkboxOption();
        $selectOption = TbEmailSee::selectOption();

        return view('see.create', compact('materias', 'observacoes', 'enviarCopia', 'selectOption'));
    }
}
