<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\kategori;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::orderBy('created_at', 'DESC')->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //sebagai validasi form
        $this->validate($request,[
            'code_barang'       => 'required',
            'nama_barang'	    => 'required',
            'stock_barang'      => 'required|numeric',
            'harga_barang'      => 'required|numeric',	
            'kategori_id'       => 'required'
        ]);

        barang::create([
            'code_barang'     => $request->code_barang,
            'nama_barang'	  => $request->nama_barang,
            'stock_barang'    => $request->stock_barang,
            'harga_barang'    => $request->harga_barang,	
            'kategori_id'     => $request->kategori_id
        ]);

        return redirect(route('barang.index'))->with(['Success'=>'Barang berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::all();
        $barang = barang::where('id',$id)->first(); 
        return view('barang.edit',compact('barang','kategori'));
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
        $this->validate($request,[
            'code_barang'       => 'required',
            'nama_barang'	    => 'required',
            'stock_barang'      => 'required|numeric',
            'harga_barang'      => 'required|numeric',	
            'kategori_id'       => 'required'
        ]);

        $barang = barang::find($id);
        $barang->update([
            'code_barang'     => $request->code_barang,
            'nama_barang'	  => $request->nama_barang,
            'stock_barang'    => $request->stock_barang,
            'harga_barang'    => $request->harga_barang,	
            'kategori_id'     => $request->kategori_id
        ]);

        return redirect(route('barang.index'))->with(['Success'=>'Barang berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang::where('id',$id)->delete();
        return redirect(route('barang.index'))->with(['Success'=>'Barang berhasil dihapus!']);
    }
}
