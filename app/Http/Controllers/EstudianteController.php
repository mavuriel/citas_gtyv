<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class EstudianteController extends Controller
{
    public function index()
    {
        return view('estudiante.principalestudiante');
    }

    public function create()
    {
        return view('estudiante.formestudiante');
    }

    public function store(Request $req)
    {
        $cita = new Cita;

        $cita->date_taken = $req->fecha;
        $cita->hour_taken = $req->hora;
        $cita->n_control = $req->control;
        $cita->name = $req->nombre;
        $cita->asigned_to = 'prueba';
        $cita->save();

        return redirect()->route('show.estudiante', $cita->n_control);
    }

    public function show($cita)
    {
        //TODO: corregir error de seguridad, si alguien pone otro n. control entrara a otro registro
        return view('estudiante.citasestudiante', compact('cita'));
    }
}
