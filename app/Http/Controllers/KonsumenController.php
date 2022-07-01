<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('konsumen.index');
    }

    public function data()
    {
        $konsumen = Konsumen::orderBy('kode_konsumen', 'asc')->get();

        return datatables()
            ->of($konsumen)
            ->addIndexColumn()
            ->addColumn('aksi', function($konsumen) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('konsumen.update', $konsumen->id_konsumen) .'`)" class="btn btn-info btn-flat"><i class="fa fa-pen"></i></button>
                    <button onclick="deleteData(`'. route('konsumen.destroy', $konsumen->id_konsumen) .'`)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $konsumen = Konsumen::latest()->first();
        $kode_konsumen = $konsumen->kode_konsumen +1 ?? 1;
       
        $konsumen = new Konsumen();
        $konsumen->kode_konsumen = tambah_nol_didepan($kode_konsumen, 5);
        $konsumen->nama = $request->nama;
        $konsumen->telepon = $request->telepon;
        $konsumen->save();
        

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $konsumen = Konsumen::find($id);

        return response()->json($konsumen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return response(null, 204);
    }
}
