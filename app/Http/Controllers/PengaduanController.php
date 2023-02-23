<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(){

        $pengaduan = Pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

        return view('contents.admin.pengaduan', ['pengaduan' => $pengaduan]);
    }

    public function show($id){

        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();

        return view('contents.admin.showPengaduan', ['pengaduan' => $pengaduan, 'tanggapan' => $pengaduan]);
    }
}
