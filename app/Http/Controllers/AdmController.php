<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class AdmController extends Controller
{
    public function index()
    {

        $citas = Cita::paginate(5);

        return view('admon.registros', compact('citas'));
    }
}
