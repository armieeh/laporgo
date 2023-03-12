<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index(){

        if (Auth::guard('admin')->user()->id_desa == 0) {
            $pengaduan = Pengaduan::all();
        }else {

            $pengaduan = Pengaduan::where('id_desa', Auth::guard('admin')->user()->id_desa)->get();
        }

        return view('contents.admin.pengaduan', ['pengaduan' => $pengaduan]);
    }

    public function show($id){

        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();

        return view('contents.admin.showPengaduan', ['pengaduan' => $pengaduan, 'tanggapan' => $pengaduan]);
    }

    public function destroy($id_pengaduan){

        $pengaduan = Pengaduan::findOrFail($id_pengaduan);

        $pengaduan->delete();

        return redirect()->route('pengaduan.index');
    }
}
