<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function index(){

        $masyarakat = Masyarakat::all();

        return view('contents.admin.masyarakat', ['masyarakat' => $masyarakat]);
    }

    public function show($nik){

        $masyarakat = Masyarakat::where('nik', $nik)->first();

        return view('contents.admin.showMasyarakat', ['masyarakat' => $masyarakat]);
    }


}
