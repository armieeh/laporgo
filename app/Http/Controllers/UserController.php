<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('contents.masyarakat.index');
    }

    public function loginForm()
    {
        return view('contents.masyarakat.loginMasyarakat');
    }

    public function login(Request $request)
    {
        $username = Masyarakat::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak ditemukan']);
        }

        $password = Hash::check($request->password, $username->password); //kenapa $username

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
        }

        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect('/');
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
        }
    }

    public function formRegister()
    {
        return view('contents.masyarakat.register');
    }

    public function registerform()
    {
        return view('contents.masyarakat.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nik' => 'required|min:16|max:16',
            'nama' => 'required|min:2',
            'username' => 'required|min:3',
            'password' => 'required', //kenapa tidak di hash?
            'telp' => 'required'
        ]);

        if ($validate->fails()){
            return redirect()->back()->with(['pesan' => $validate->errors()]); //errors tuh nama yang kita buat atau dari sananya
        }

        $username = Masyarakat::where('username', $request->username)->first();

        if ($username){
            return redirect()->back()->with(['pesan' => 'username sudah terdaftar']);
        }

        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

    return redirect()->route('pekat.loginForm');
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();
        return redirect('/');
    }

    public function storePengaduan(Request $request)
    {
        if (!Auth::guard('masyarakat')->user()){
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

        $data = $request->all();

        $validate = Validator::make($data,[
            'isi_laporan' => 'required|min:10',
            'tgl_pengaduan' => 'required',
            'lokasi' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000'
        ]);

        if ($validate->fails()){
            return redirect()->back()->withInput()->withErrors($validate);
        }

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        date_default_timezone_set('Asia/Bangkok');

        $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'isi_laporan' => $data['isi_laporan'],
            'lokasi' => $data['lokasi'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);

        // dd($request->all());

        if ($pengaduan) {
            return redirect()->route('pekat.laporan', 'me')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function laporan($siapa = '')
    {
        $terverifikasi = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->get()->count();
        $proses = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();

        $hitung = [$terverifikasi, $proses, $selesai];

        if ($siapa == 'me') {
            $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();
            
            return view('contents.masyarakat.laporan', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa]);
        } else {
            $pengaduan = Pengaduan::where([['nik', '!=', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->orderBy('tgl_pengaduan', 'desc')->get();

            return view('contents.masyarakat.laporan', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa]);
        }
    }
}
