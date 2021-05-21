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

    public function create(Request $req)
    {
        $fes = $req->fecha;
        $msn = $this->search();
        return view('estudiante.formestudiante', compact('msn', 'fes'));
    }

    public function store(Request $req)
    {
        $cita = new Cita;

        $cita->service = $req->cita;
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

    public function search()
    {
        $hours = array(
            "10:00",
            "11:00",
            "12:00",
            "13:00",
            "14:00",
            "15:00"
        );
        print_r($hours);
    }
}
