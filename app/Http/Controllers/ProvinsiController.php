<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Provinsi";
        $data = Provinsi::orderBy('kode', 'asc')->get();
        return view('provinsi.provinsi', compact('data', 'title'));
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
            'kode' => 'required',
            'nama_provinsi' => 'required'
        ],[
            'kode.required' => 'Isian kode Wajid di isi',
            'nama_provinsi' => 'Isian nama provinsi perlu di isi'
        ]);

        $data = [
            'kode' => $request->input('kode'),
            'nama_provinsi' => $request->input('nama_provinsi'),
            'active' => $request->input('active', false)
        ];

        Provinsi::create($data);
        return redirect()->route('provinsi')->with('succes', 'Berhasil menambah data provinsi');
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
        $title = "Provinsi Edit";
        $data = Provinsi::findorfail($id);
        return view('provinsi.provinsi-edit', compact('data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = [
            'kode' => $request->input('kode'),
            'nama_provinsi' => $request->input('nama_provinsi'),
            'active' => $request->input('active', false)
        ];
        // $data = Provinsi::findorfail($id);
        // $data->update
        Provinsi::where('id', $id)->update($data);
        return redirect()->route('provinsi')->with('succes', 'Berhasil menambah data provinsi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Provinsi::where('id', $id)->delete();
        return redirect()->route('provinsi')->with('succes', 'Berhasil menghapus data provinsi');
    }
}
