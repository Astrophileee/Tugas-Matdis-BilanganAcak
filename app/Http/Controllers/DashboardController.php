<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class DashboardController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nilaiAwal' =>'required',
            'a' => 'required',
            'b' =>'required',
            'm' =>'required',
            'n' =>'required'
        ],[
    'nilaiAwal.required' => 'Kolom nilai awal harus diisi.',
    'a.required' => 'Kolom a harus diisi.',
    'b.required' => 'Kolom b harus diisi.',
    'm.required' => 'Kolom m harus diisi.',
    'n.required' => 'Kolom n harus diisi.'
    ]);

        $data = [
            'nilaiAwal' => $request->input('nilaiAwal'),
            'a' => $request->input('a'),
            'b' => $request->input('b'),
            'm' => $request->input('m'),
            'n' => $request->input('n')
        ];
        return redirect('/aplikasi')->with('data',$data);
    }
}
