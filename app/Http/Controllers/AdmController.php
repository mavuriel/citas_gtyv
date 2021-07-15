<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Carbon\Carbon;

class AdmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hoy = Carbon::today()->toDateString();

        $proxm = Cita::where('date_taken', '>=', $hoy)
            ->orderBy('date_taken')
            ->orderBy('hour_taken')
            ->paginate(4);

        $prox = Cita::where('date_taken', '>=', $hoy)
            ->orderBy('date_taken')
            ->orderBy('hour_taken')
            ->paginate(8);

        return view('admon.reg_prox', compact('prox', 'proxm'));
    }

    public function allReg()
    {
        $citasm = Cita::paginate(4);
        $citas = Cita::paginate(8);

        return view('admon.registros', compact('citasm', 'citas'));
    }

    public function searchID($id)
    {
        $info = Cita::find($id);
        return view('admon.detalles', compact('info'));
    }

    public function editID($id)
    {
        $info = Cita::find($id);
        return view('admon.edit', compact('info'));
    }

    public function deleteID($id)
    {
        $info = Cita::find($id)->delete();

        return back()->with('del_item', 'Cita eliminada');
    }
}
