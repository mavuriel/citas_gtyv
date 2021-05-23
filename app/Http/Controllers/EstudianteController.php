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
        /* Obtencion de la fecha en la vista estudiante */
        $fes = $req->fecha;
        /* Envio el dato a otra funcion para obtener las horas disponibles */
        $res = $this->search($fes);

        if ($res[1] == 'nada') {
            echo 'Se enviran todas las horas disponibles';
        } else {
            echo 'Se enviaran las horas que no estan ocupadas';
        }
        return view('estudiante.formestudiante', compact('res'));
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
        /* Horas disponibles */
        $hours = [
            "10:00:00",
            "11:00:00",
            "12:00:00",
            "13:00:00",
            "14:00:00",
            "15:00:00"
        ];
        /* Horas tomadas - consulta */
        $taken = Cita::select('hour_taken')
            ->where('date_taken', $fes)
            ->get();
        /* Conversion JSON a array */
        $jsona = json_decode($taken);

        if (empty($jsona)) {
            $dato = 'nada';
            return array($hours, $dato);
        } else {

            $dato = 'si hay';
            /* Conversion del array */
            foreach ($jsona as $s) {
                $p[] = $s->hour_taken;
            }
            /*
            Comparacion entre arrays para saber cuales estan en el array 1
            contra los del array 2 y mostrar los que falten en el array 1
            */
            $dis = array_diff($hours, $p);
            return array($dis, $dato);
        }
    }
}
