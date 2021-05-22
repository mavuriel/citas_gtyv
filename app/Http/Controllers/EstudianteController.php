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
        $msn = $this->search($fes);

        return $msn;
        /* return view('estudiante.formestudiante', compact('taken', 'jsonp')); */
        /* return print_r($jsonp); */
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

    public function search($fes)
    {
        $taken = Cita::select('hour_taken')
            ->where('date_taken', $fes)
            ->get();

        $jsonp = json_decode($taken);
        $hours = [
            '10:00:00',
            "11:00:00",
            "12:00:00", //*
            "13:00:00",
            "14:00:00",
            "14:30:00", //*
            "15:00:00"  //*
        ];
        /* $dis = array_diff($p, $jsonp); */
        /*

        /* foreach ($hours as $h) {
            print $h;
        } */
        /* print_r($hours);
        print_r($jsonp); */

        /* print_r($dis); */


        foreach ($jsonp as $s) {
            $p[] = $s->hour_taken;
        }
        print_r($hours);
        print_r($p);
        $dis = array_diff($hours, $p);
        print_r($dis);

        /*

        Array ( [0] => 10:00
                [1] => 11:00
                [2] => 12:00
                [3] => 13:00
                [4] => 14:00
                [5] => 14:30
                [6] => 15:00 )

        Array ( [0] => 10:00:00
                [1] => 12:00:00
                [2] => 14:30:00
                [3] => 15:00:00 )

        Array ( [0] => 10:00
                [1] => 11:00
                [2] => 12:00
                [3] => 13:00
                [4] => 14:00
                [5] => 14:30
                [6] => 15:00 )
        */

        /*
            Array ( [0] => 10:00:00
                    [1] => 11:00:00
                    [2] => 12:00:00
                    [3] => 13:00:00
                    [4] => 14:00:00
                    [5] => 14:30:00
                    [6] => 15:00:00 )
            Array ( [0] => 10:00:00
                    [1] => 12:00:00
                    [2] => 14:30:00
                    [3] => 15:00:00 )
            Array ( [1] => 11:00:00
                    [3] => 13:00:00
                    [4] => 14:00:00 )
        */
    }
}
