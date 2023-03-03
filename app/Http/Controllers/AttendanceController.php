<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function ver(){
        // ? Trae todos las fechas de forma unica
        // $registros = Attendance::select('fecha')->groupBy('fecha')->orderBy('fecha')->get();
        
        //? 
        $registros = Attendance::select('fecha', Attendance::raw('count(fecha) as count'))->groupBy('fecha')->orderByDesc('fecha')->limit(7)->get();

        $puntos = [];
        foreach($registros as $registro){
            $date = Carbon::parse($registro['fecha'])->format('l');
            switch ($date) {
                case 'Monday':
                    $date='Lunes';
                break;
                case 'Tuesday':
                    $date='Martes';
                break;
                case 'Wednesday':
                    $date='Miercoles';
                break;
                case 'Thursday':
                    $date='Jueves';
                break;
                case 'Friday':
                    $date='Viernes';
                break;
                case 'Saturday':
                    $date='Sabado';
                break;
                case 'Sunday':
                    $date='Domingo';
                break;
                
                default:
                break;
            }
            $puntos[] = ['name' => $registro['fecha'], 'y' => floatval($registro['count']), 'drilldown' => $registro['fecha']];
        }
  

        // return view('ver', compact('registros'));
        return view('ver',  ['data' => json_encode($puntos)] );
    }

    public function inasistencias(){
        $registros = Attendance::select('fecha', Attendance::raw('count(fecha) as count'))->groupBy('fecha')->orderByDesc('fecha')->limit(7)->get();
        $cantidad = User::select(User::raw('count(name) as count'))->get();
        $cant=0;
        foreach ($cantidad as $item) {
            $cant=$item['count'];
        }
        
        $puntos = [];
        foreach($registros as $registro){
            $date = Carbon::parse($registro['fecha'])->format('l');
            switch ($date) {
                case 'Monday':
                    $date='Lunes';
                break;
                case 'Tuesday':
                    $date='Martes';
                break;
                case 'Wednesday':
                    $date='Miercoles';
                break;
                case 'Thursday':
                    $date='Jueves';
                break;
                case 'Friday':
                    $date='Viernes';
                break;
                case 'Saturday':
                    $date='Sabado';
                break;
                case 'Sunday':
                    $date='Domingo';
                break;
                
                default:
                break;
            }
            $faltas = $cant-$registro['count'];
            $puntos[] = ['name' => $registro['fecha'], 'y' => floatval($faltas), 'drilldown' => $registro['fecha']];
        }
        return view('inasistencias', ['data' => json_encode($puntos)]);

    }
}
