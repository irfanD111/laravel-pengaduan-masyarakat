<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    function index(){
        $judul ="selamat datang di App pengaduan masyarakat";
        //$pengaduan = DB::table('pengaduan')->get();
        $pengaduan = pengaduan::where('nik',auth::user()->nik)->get();
        return view('/home',['Judul'=>$judul,'pengaduan'=>$pengaduan]);
    }  


    function proses_isi_pengaduan(){
        $tampil = "dataaaaaaaaaa";

        return view('isi_pengaduan',['tampil'=>$tampil]);


    }


    function proses_tambah_pengaduan(Request $request){
        //validasi
        $request ->validate([
            'isi_laporan' => 'required|min:5'
        ]);
        //mindahin/nyimpan file
        $nama_foto = $request->foto->getclientoriginalname();
        $request->foto->storeas('public/image',$nama_foto);


        $isi_pengaduan = $request->isi_laporan;
        $pengaduan = DB::table('pengaduan')->insert([
            'tgl_pengaduan' => date('Y-m-d'),
            'nik' => auth::user()->nik,
            'isi_laporan' => $isi_pengaduan,
            'foto' => $request->foto->getclientoriginalname(),
            'status' => '0 '
        ]);

        return redirect('/home');
    }

    function hapus($id){
        DB::table('pengaduan')->where('id_pengaduan','=',$id)->delete();
        return redirect()->back();
    }

    function detail($id){
       // $pengaduan = DB::table('pengaduan')->where('id_pengaduan','=', $id )->get();
       $pengaduan = DB::table('pengaduan')
       ->join('tanggapan', 'pengaduan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
       ->where('pengaduan.id_pengaduan',$id)
       ->get();
 
        
        return view('/detail',['pengaduan'=> $pengaduan]);  

     }

    function update($id){
      
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan','=', $id )->first();
        return view('/update',['pengaduan'=> $pengaduan]);
    }

    function proses_update( request $request){
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan',$request->id)->update([
            'isi_laporan' => $request-> isi_laporan,

        ]);
        return redirect('/home');
    }

}
