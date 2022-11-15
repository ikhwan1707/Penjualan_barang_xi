<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\transaction;
use App\order;
use App\orderproduct;
use DB;
use Carbon\Carbon;

class transactioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::select('nama_barang','id')->where('stock_barang','!=','0')->get();
        $transaction = transaction::orderBy('created_at', 'DESC')->paginate(10);
        $counttransaction = transaction::count();
        return view('transaksi.index', compact('transaction','barang','counttransaction'));
    }

    public function list()
    {
        $orders = order::orderBy('created_at', 'DESC')->get();
        return view('transaksi.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'barang_id' =>  'required|unique:transactions'
        ]);

        $barang_total = barang::find($request->barang_id);

        $transaction = transaction::create([
            'barang_id' => $request->barang_id,
            'qty' => 1 ,
            'total' => $barang_total->harga_barang
        ]);

        return redirect(route('transaksi.index'))->with(['Success'=>'Barang berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = order::where('id',$id)->first();
        //$dateorder = $orders->created_at->isoFormat('dddd, D MMMM Y');
        $orders_ = DB::table('orders as O')
        ->select('O.*','OP.*','B.*')
        ->join('order_products as OP', 'O.id', '=', 'OP.order_id')
        ->join('tb_barangs as B','B.id','=','OP.barang_id')
        ->where('O.id', '=', $id)
        ->get();

        return view('transaksi.detail', compact('orders_','orders'));
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
        $transaction = transaction::findOrFail($id);
        $param = $request->param;

        if ($param == 'tambah') {
            $transaction->update([
                'qty' => $transaction->qty + 1,
                'total' => $transaction->barang->harga_barang*($transaction->qty + 1)
            ]);

            return back()->with('success', 'Item berhasil diupdate');
        }
        
        if ($param == 'kurang') {
            $transaction->update([
                'qty' => $transaction->qty - 1,
                'total' => $transaction->barang->harga_barang*($transaction->qty - 1)
            ]);

            return back()->with('success', 'Item berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transaction::where('id', $id)->delete();
        return redirect(route('transaksi.index'))->with(['Success'=>'Transaction berhasil dihapus!']);
    }

    public function save(Request $request)
    {
        $this->validate($request,[
            'pembayaran' => 'required'
        ]);

        $transaction = transaction::get();
        
        $order = order::create([
            'no_faktur' => 'OD-'.date('Ymd').rand(1111,9999),
            'karyawan_id' => 1,
            'grand_total' => $transaction->sum('total'),
            'pembayaran' => $request->pembayaran,
            'kembalian' => $request->pembayaran-$transaction->sum('total')
        ]);

        foreach ($transaction as $key => $value) {
            $product = array(
                'order_id' => $order->id,
                'barang_id' => $value->barang_id,
                'qty' => $value->qty,
                'total' => $value->total,
                'created_at' => \Carbon\carbon::now(),
                'updated_at' => \Carbon\carbon::now()
            );

            $barang =  barang::find($value->barang_id);
            $st_barang = $barang->stock_barang - $value->qty;

            $updatestockbarang = array(
                'stock_barang' => $st_barang
            );

            $barang->update($updatestockbarang);

            $orderProduct = orderproduct::insert($product);

            $deleteTransaction = transaction::where('id', $value->id)->delete();
        }

        return redirect(route('transaksi.list'))->with(['Success'=>'Transaction berhasil!']);
    }
}
