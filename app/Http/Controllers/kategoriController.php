<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori; //untuk memanggil file model

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::orderBy('created_at', 'DESC')->get();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kategori' =>  'required|string|max:150|unique:tb_kategoris'
        ]);

        kategori::create([
            'nama_kategori' =>  $request->nama_kategori
        ]);

        return redirect(route('kategori.index'))->with(['Success'=>'Kategori berhasil ditambahkan!']);
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
        $kategori = kategori::find($id);

        return view('kategori.edit', compact('kategori'));
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
            'nama_kategori' =>  'required|string|max:150|unique:tb_kategoris,nama_kategori,'.$id
        ]);

        $kategori = kategori::find($id);
        $kategori->update([
            'nama_kategori' =>  $request->nama_kategori
        ]);

        return redirect(route('kategori.index'))->with(['Success'=>'Kategori berhasil diperbaharui!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori::where('id', $id)->delete();
        return redirect(route('kategori.index'))->with(['Success'=>'Kategori berhasil dihapus!']);
    }
}
