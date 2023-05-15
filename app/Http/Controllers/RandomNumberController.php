<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomNumberController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->has('data')){
            return redirect('/dashboard')->with('status', 'Data tidak ditemukan!');;
        }
        $data = session()->get('data');
        $lcgResult = $this->generateLCGArray($data['nilaiAwal'], $data['a'], $data['b'], $data['m'], $data['n']);
        $lcgArray = $lcgResult[0];
        $sebelum = $lcgResult[1];
        return view('RandomNumber', compact('data','lcgArray'));
}

    public function generateLCGArray($nilaiAwal, $a, $b, $m, $n){
        $lcgArray = array();
        $lcgArray[] = $nilaiAwal;
        $lcg = $nilaiAwal;
        $sebelum = $nilaiAwal;

        for($i = 1; $i <= $n; $i++){
            $sebelum = $lcg;
            $lcg = ($a * $lcg + $b) % $m;
            $lcgArray[] = $lcg;
        }

        return [$lcgArray, $sebelum]; 
    }
}
