<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function ver(){
        // ? Trae todos las fechas de forma unica
        // $registros = Attendance::select('fecha')->groupBy('fecha')->orderBy('fecha')->get();
        
        //? 
        $registros = Attendance::select('fecha', Attendance::raw('count(fecha) as count'))->groupBy('fecha')->get();



        return view('ver', compact('registros'));
    }
}
