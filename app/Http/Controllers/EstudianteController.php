<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\User;

class EstudianteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('estudiante.principalestudiante');
    }

    public function create(Request $req)
    {
        $req->validate([
            'fecha' => 'required'
        ]);

        $n = auth()->user()->name;
        $c = auth()->user()->n_control;


        /* Obtencion de la fecha en la vista estudiante */
        $fes = $req->fecha;
        /* Envio el dato a otra funcion para obtener las horas disponibles */
        $res = $this->searchHour($fes);
        /* Arreglo res contiene dos parametros:
            [0] -> contiene las horas disponibles
            [1] -> contiene el dato de verificacion para el switch */
        $h = $res[0];

        switch ($res[1]) {
            case 0:
                /* No hay horas ese dia */
                return back()->with('no_hour', 'No hay horas disponibles, comprueba otra fecha.');
                break;
            case 1:
                /* Todas las horas libres*/
                return view('estudiante.formestudiante', compact('h', 'fes', 'n', 'c'));
                break;
            case 2:
                /* Algunas horas libres*/
                return view('estudiante.formestudiante', compact('h', 'fes', 'n', 'c'));
                break;
            default:

                break;
        }
    }

    public function searchHour($fes)
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
        /* Cuenta el numero de horas tomadas */
        $c = count($jsona);
        /* Si todas la horas estan tomadas (no hay ninguna libre) */
        if ($c == 6) {
            $dato = 0;
            $r = '';
            return array($r, $dato);
            /* Si hay horas disponibles */
        } else {
            /* Si no hay ninguna hora tomada (todas las horas libres) */
            if (empty($jsona)) {
                $dato = 1;
                return array($hours, $dato);
                /* Si hay al menos una hora tomada pero aun hay horas disponibles */
            } else {
                $dato = 2;
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

    public function store(Request $req)
    {
        $req->validate([
            'hora' => 'required',
            'cita' => 'required',
            'nombre' => array('required', 'regex:/^([A-Z]([a-z]+)(\s*)){2,}$/u'),
            'control' => array('required', 'regex:/^[E]([1][0-9]|[2][0-1])([0][1]|[0][2])\d{4}$/i')
        ]);

        $cita = new Cita;

        $cita->service = $req->cita;
        $cita->date_taken = $req->fecha;
        $cita->hour_taken = $req->hora;
        $cita->n_control = $req->control;
        $cita->name = $req->nombre;
        $cita->save();

        return redirect()->route('show.estudiante');
    }

    public function update(Request $req, $id)
    {
        /*TODO: Jerarquia de validaciones
            1. Datos vacios LISTO
            2. Datos no modificados
            3. Fecha/hora no disponible
            4. Formato de datos LISTO
        */
        $req->validate([
            'ahora' => 'required',
            'servicea' => 'required',
            'nombrea' => array('required', 'regex:/^([A-Z]([a-z]+)(\s*)){2,}$/u'),
            'ncontrola' => array('required', 'regex:/^[E]([1][0-9]|[2][0-1])([0][1]|[0][2])\d{4}$/i')
        ]);

        $cita = new Cita();
        $cita = Cita::find($id);
        $cita->name = $req->nombrea;
        $cita->n_control = $req->ncontrola;
        $cita->date_taken = $req->afecha;
        $cita->hour_taken = $req->ahora;
        $cita->service = $req->servicea;

        $cita->save();

        return back()->with('dato_act', 'Dato actualizado correctamente');
    }

    public function show()
    {

        $user = new User();

        $user = User::all();

        $id = auth()->user()->id;
        $n = User::find($id);
        $control = $n->n_control;

        $citas = new Cita();
        $citas = Cita::where('n_control', $control)
            ->orderByDesc('date_taken')
            ->paginate(4);

        return view('estudiante.citasestudiante', compact('user', 'citas'));
    }

    public function storeInfo(Request $req)
    {

        $req->validate([
            'areap' => 'required', //falta validacion
            'phonep' => 'required', //falta validacion
            'namep' => array('required', 'regex:/^([A-Z]([a-z]+)(\s*)){2,}$/u'),
            'ncontrolp' => array('required', 'regex:/^[E]([1][0-9]|[2][0-1])([0][1]|[0][2])\d{4}$/i')
        ]);

        $id = auth()->user()->id;
        $info = new User();
        $info = User::find($id);

        $info->name = $req->namep;
        $info->area = $req->areap;
        $info->n_control = $req->ncontrolp;
        $info->phone = $req->phonep;

        $info->save();

        return back()->with('dato_act', 'Dato actualizado correctamente');
    }
}
