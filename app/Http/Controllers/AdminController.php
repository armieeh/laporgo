<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){

        $petugas = Petugas::all()->count();
        $masyarakat = Masyarakat::all()->count();
        $proses = Pengaduan::where('status', 'proses')->get()->count();
        $selesai = Pengaduan::where('status', 'selesai')->get()->count();
        

        return view('contents.admin.index', ['petugas' => $petugas, 'masyarakat' => $masyarakat, 'proses' => $proses, 'selesai' => $selesai]);
    }

    public function formLogin()
    {
        return view('contents.admin.loginAdmin');
    } 

    public function login(Request $request)
    {
        $username = Petugas::where('username', $request->username)->first();

        if(!$username){
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if(!$password){
            return redirect()->back()->with(['pesan', 'Password tidak sesuai']);
        }

        $auth = Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password]);

        if($auth){
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with(['pesan', 'Akun tidak terdaftar']);
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->route('admin.formLogin');
    }
}
