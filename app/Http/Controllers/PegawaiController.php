<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Pegawai";
        $dataPegawai = Pegawai::with(['kelurahan', 'kecamatan', 'provinsi'])->get();
        $prov = Provinsi::all();
        $kec = Kecamatan::all();
        $kel = Kelurahan::all();

        return view('pegawai.pegawai', compact('title', 'dataPegawai', 'prov', 'kec', 'kel'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = [
        //     'nama_pegawai' => $request->input('nama_pegawai'),
        //     'tempat_lahir' => $request->input('tempat_lahir'),
        //     'tgl_lahir' => $request->input('jenis_kelamin'),
        //     'agama' => $request->input('agama'),
        //     'alamat' => $request->input('alamat'),
        //     'id_kelurahan' => $request->input('id_kelurahan'),
        //     'id_kecamatan' => $request->input('id_kecamatan'),
        //     'id_provinsi' => $request->input('id_provinsi')
        // ];
        // Pegawai::created($data);

        $dataPegawai = new Pegawai;
        $dataPegawai->nama_pegawai = $request->input('nama_pegawai');
        $dataPegawai->tempat_lahir = $request->input('nama_pegawai');
        $dataPegawai->tgl_lahir = $request->input('tgl_lahir');
        $dataPegawai->jenis_kelamin = $request->input('jenis_kelamin');
        $dataPegawai->agama = $request->input('agama');
        $dataPegawai->alamat = $request->input('alamat');
        $dataPegawai->id_kelurahan = $request->input('id_kelurahan');
        $dataPegawai->id_kecamatan = $request->input('id_kecamatan');
        $dataPegawai->id_provinsi = $request->input('id_provinsi');
        $dataPegawai->save();
        return redirect()->route('pegawai')->with('succes', 'Berhasil Menambahkan data pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Pegawai Edit";
        $dataPegawai = Pegawai::with('kelurahan', 'kecamatan', 'provinsi')->findOrFail($id);
        $kel = Kelurahan::all();
        $kec = Kecamatan::all();
        $prov = Provinsi::all();
        return view('pegawai.pegawai-edit', compact('title', 'dataPegawai', 'kel', 'kec', 'prov'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama_pegawai' => $request->input('nama_pegawai'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'alamat' => $request->input('alamat'),
            'id_kelurahan' => $request->input('id_kelurahan'),
            'id_kecamatan' => $request->input('id_kecamatan'),
            'id_provinsi' => $request->input('id_provinsi')
        ];

        Pegawai::where('id', $id)->update($data);
        return redirect()->route('pegawai')->with('succes', 'Berhasil Menambahkan data pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pegawai::where('id', $id)->delete();
        return redirect()->route('pegawai')->with('succes', 'Berhasil Menambahkan data pegawai');
        
    }
}
