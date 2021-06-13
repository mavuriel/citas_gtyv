<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class AdmController extends Controller
{
    public function index()
    {

        $citas = Cita::paginate(4);

        return view('admon.registros', compact('citas'));
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
    }
}
