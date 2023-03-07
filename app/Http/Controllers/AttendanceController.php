<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //?????????????????????????????????????????????????????????????????????
    public function ver(){
        // ? Trae todos las fechas de forma unica
        // $registros = Attendance::select('fecha')->groupBy('fecha')->orderBy('fecha')->get();
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

    public function entradas_salidas(){
        $hoy = Carbon::today();
        $entradas = Attendance::select(Attendance::raw('count(entrada) as count'))->whereDate('fecha', '=', $hoy)->get();
        $salidas = Attendance::select(Attendance::raw('count(salida)as count'))->whereDate('fecha', '=', $hoy)->get();
        $entradashoy=0;
        $salidashoy=0;
        foreach ($entradas as $item) {
            $entradashoy = $item['count'];
        }
        foreach ($salidas as $item) {
            $salidashoy = $item['count'];
        }
        // dump($salidashoy);
        return view('entradas_salidas', ['entradas' => json_encode($entradashoy), 'salidas' => json_encode($salidashoy) ]);
    }

    public function temperatura_voltaje(){
        $voltaje = 3.5;

        return view('temperatura_voltaje', ['voltaje' => json_encode($voltaje)]);
    }

    public function carga_temp(){
        $temperatura = 24;
        return view('carga-temp')->with(['temp' => json_encode($temperatura)]);
    }
    //?????????????????????????????????????????????????????????????????????
}
