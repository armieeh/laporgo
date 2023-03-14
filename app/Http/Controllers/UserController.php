<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kategori;
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
        $desa = Desa::all();
        $kategori = Kategori::all();
        return view('contents.masyarakat.index', compact('desa', 'kategori'));
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

    public function profile($nik)
    {
        $masyarakat = Masyarakat::where('nik', $nik)->first();

        return view('contents.masyarakat.editProfile', compact('masyarakat'));
    }

    public function updateProfile(Request $request ,$nik)
    {

        $fileName = time() . $request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('foto-profile', $fileName);
        $foto = '/storage/' .$path;
        
        Masyarakat::where('nik',$nik)->update([
            'foto' => $foto,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'telp' => $request->telp,
        ]);

        return redirect()->back()->with('success','Profile berhasil di update');

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
            'nama' => 'required',
            'username' => 'required|min:3',
            'password' => 'required|min:8',
            'telp' => 'required',
        ]);

        if ($validate->fails()){
            return redirect()->back()->with(['pesan' => $validate->errors()]); 
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
            'judul_laporan' => 'required|min:5',
            'isi_laporan' => 'required|min:10',
            'tgl_pengaduan' => 'required',
            'lokasi' => 'required',
            'id_kategori' => 'required',
            'id_desa' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:10000'
        ]);

        if ($validate->fails()){
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $image = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key) {
                $path = $key->store('assets/pengaduan', 'public');
                $image[] = $path;
            }
        }

        date_default_timezone_set('Asia/Bangkok');

        $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'judul_laporan' => $data['judul_laporan'],
            'isi_laporan' => $data['isi_laporan'],
            'lokasi' => $data['lokasi'],
            'id_kategori' => $data['id_kategori'],
            'id_desa' => $data['id_desa'],
            'foto' => implode('|', $image) ?? '',
            'status' => '0',
        ]);

        if ($pengaduan) {
            return redirect()->route('pekat.laporan', 'me')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function editPengaduan(Request $request, $id_pengaduan)
    {
        $pengaduan = Pengaduan::with('desa', 'kategori')->findOrFail($id_pengaduan);

        $desa = Desa::get(['id_desa', 'nama_desa']);

        $kategori = Kategori::get(['id', 'kategori']);

        return view('contents.masyarakat.editPengaduan', ['pengaduan' => $pengaduan, 'desa' => $desa, 'kategori' => $kategori]);
    }

    public function updatePengaduan(Request $request, $id_pengaduan)
    {

        $image = [];

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('assets/pengaduan');
                $image[] = $path;
            }
        }
        
        Pengaduan::where('id_pengaduan', $id_pengaduan)->update([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'judul_laporan' => $request['judul_laporan'],
            'isi_laporan' => $request['isi_laporan'],
            'lokasi' => $request['lokasi'],
            'id_kategori' => $request['id_kategori'],
            'id_desa' => $request['id_desa'],
            'foto' => implode('|', $image) ?? '',
            'status' => '0'
        ]);
        
        return redirect('/laporan')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);

        $pengaduan->delete();

        return redirect()->route('pekat.laporan');
    }

    public function laporan($siapa = '')
    {
        $masyarakat = Masyarakat::all()->first();
        $terverifikasi = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik]])->get()->count();
        $proses = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        $selesai = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();

        $hitung = [$terverifikasi, $proses, $selesai];

            $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();
            
            return view('contents.masyarakat.laporan', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa], compact('masyarakat'));
    }
}
