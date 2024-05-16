<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kecamatan";
        $data = Kecamatan::orderBy('kode_kec', 'asc')->get();
        return view('kecamatan.kecamatan', compact('data', 'title'));
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
        $request->validate([
            'kode_kec' => 'required',
            'nama_kecamatan' => 'required'
        ],[
            'kode_kec.required' => 'Isian kode kecamatan Wajib di isi',
            'nama_kecamatan.required' => 'Isian nama kecamatan wajib di isi'
        ]);

        $data = [
            'kode_kec' => $request->input('kode_kec'),
            'nama_kecamatan' => $request->input('nama_kecamatan'),
            'active' => $request->input('active', false)
        ];

        Kecamatan::create($data);
        return redirect()->route('kecamatan')->with('succes', 'Berhasil menambahkan data kecamatan');
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
        $title = "Kecamatan Edit";
        $data = Kecamatan::findorfail($id);
        return view('kecamatan.kecamatan-edit', compact('data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'kode_kec' => $request->input('kode_kec'),
            'nama_kecamatan' => $request->input('nama_kecamatan'),
            'active' => $request->input('active', false)
        ];
        Kecamatan::where('id', $id)->update($data);
        return redirect()->route('kecamatan')->with('succes', 'Berhasil mengubaha data kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kecamatan::where('id', $id)->delete();
        return redirect()->route('kecamatan')->with('succes', 'Berhasil menghapus data kecamatan');
    }
}
