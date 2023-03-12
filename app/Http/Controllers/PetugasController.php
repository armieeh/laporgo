<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PetugasController extends Controller
{
    public function index(){

        $petugas = Petugas::where('level', 'petugas')->get();
        // $desa = Petugas::where('id_desa', 'id_desa')->get();

        return view('contents.petugas.index', ['petugas' => $petugas]);
    }

    public function create(){

        $desa = Desa::all();
        return view('contents.petugas.create', compact('desa'));
    }

    public function store(Request $request){
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama' => 'required|string|max:225',
            'username' => 'required|string|unique:petugas',
            'password' => 'required|min:6',
            'telp' => 'required',
            'level' => 'required|in:admin,petugas'
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }

        $username = Petugas::where('username', $data['username'])->first();

        if ($username){
            return redirect()->back()->with(['username' => 'Username sudah digunakan']);
        }
        // dd($request->all());
        Petugas::create([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'id_desa' => $data['id_desa'],
            'level' => $data['level']
        ]);

        return redirect()->route('petugas.index')->with('pesan', 'Berhasil ditambahkan');
    }

    public function edit($id_petugas){

        $petugas = Petugas::where('id_petugas', $id_petugas)->first();

        return view('contents.petugas.edit', ['petugas' => $petugas]);
    }

    public function update(Request $request, $id_petugas){

        $data = $request->all();

        $petugas = Petugas::find($id_petugas);

        $petugas->update([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level']
        ]);

        return redirect()->route('petugas.index');
    }

    public function destroy($id_petugas){

        $petugas = Petugas::findOrFail($id_petugas);

        $petugas->delete();

        return redirect()->route('petugas.index');
    }
}
