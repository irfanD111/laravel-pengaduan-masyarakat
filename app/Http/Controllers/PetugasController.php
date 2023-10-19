<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    function data_petugas(request $request){
        $hi = "Data petugas di App Pengaduan Masyarakat";
        $petugas =  DB::table('petugas')->get();

        return view('data_petugas',['petugas'=>$petugas, 'hi'=>$hi]);


    }
}
