<?php

namespace See\Http\Controllers;

use Illuminate\Http\Request;
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
        $observacoes = TbEmailSee::all();

        return view('see.create', compact('materias', 'observacoes'));
    }
}
