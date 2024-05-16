<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kelurahan";
        $dataKelurahan = Kelurahan::with('kecamatan')->get();
        $kec = Kecamatan::all();
        
        return view('kelurahan.kelurahan', compact('dataKelurahan', 'kec', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Kelurahan::created($data);
        $newdata = new Kelurahan;
        $newdata->kode_kel = $request->input('kode_kel');
        $newdata->nama_kelurahan = $request->input('nama_kelurahan');
        $newdata->id_kecamatan = $request->input('id_kecamatan');
        $newdata->active = $request->input('active', false);
        $newdata->save();
        return redirect()->route('kelurahan')->with('succes', 'Berhasil menambahkan data kecamatan');
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
        $title = "Kelurahan Edit";
        $dataKelurahan = Kelurahan::with('kecamatan')->findorfail($id);
        $kec = Kecamatan::all();
        return view('kelurahan.kelurahan-edit', compact('dataKelurahan','kec', 'title'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'kode_kel' => $request->input('kode_kel'),
            'nama_kelurahan' => $request->input('nama_kelurahan'),
            'id_kecamatan' => $request->input('id_kecamatan'),
            'active' => $request->input('active', false)
        ];

        Kelurahan::where('id', $id)->update($data);
        return redirect()->route('kelurahan')->with('succes', 'Berhasil mengubaha data kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelurahan::where('id', $id)->delete();
        return redirect()->route('kelurahan')->with('succes', 'Berhasil mengubaha data kecamatan');
    }
}
