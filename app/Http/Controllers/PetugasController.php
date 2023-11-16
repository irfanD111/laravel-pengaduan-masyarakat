<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\petugas;
use Illuminate\Support\Facades\Session;


class PetugasController extends Controller
{
    function data_petugas(request $request){
        $hi = "Data petugas di App Pengaduan Masyarakat";
        $petugas =  DB::table('petugas')->get();

        return view('data_petugas',['petugas'=>$petugas, 'hi'=>$hi]);
    }

    function index(){
        return view("login_petugas");
    }

    function proses_login(request $request){
        $datalogin = $request->only("username","password");
        if (Auth::guard("petugas")->attempt($datalogin)) {
            return redirect('/petugas/home');
        }else{
            return redirect('/petugas/login')->with("salah","username atau password salah");
        }

    }

    function logout(){
        Auth::guard('petugas')->logout();

        return redirect('/petugas/login');
    }

    function petugas_home(){       
        $pengaduan = DB::table('pengaduan')->get();
        return view('home_petugas',['pengaduan'=>$pengaduan]);
    }

    function petugas_update($id){
      
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan','=', $id )->first();
        // $tanggapan = DB::table('tanggapan')->where('id_pengaduan',$id)->get();
        $tanggapan = DB::table('tanggapan')
            ->join('petugas', 'petugas.id', '=', 'tanggapan.id_petugas')
            ->where('tanggapan.id_pengaduan',$id)
            ->get();
        return view('/tanggapan',['pengaduan'=> $pengaduan , 'tanggapan'=>$tanggapan]);
    }

    function petugas_proses_update( request $request){
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan',$request->id)->update([
            'status' => $request-> status,

        ]);
        return redirect('/petugas/home');
    
    }

    function proses_tanggapi_pengaduan(Request $request, $id){
        $id_pengaduan = $request->id_pengaduan;
        $tanggapan = $request->tanggapan;
        $pengaduan = DB::table('tanggapan')->insert([
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $tanggapan,
            'id_petugas' => Auth::guard('petugas')->user()->id,
        ]);

        return redirect('/petugas/home');
    }

  

}