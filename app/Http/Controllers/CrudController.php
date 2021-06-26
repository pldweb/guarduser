<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class CrudController extends Controller
{
    public function grafik(){
      return view('product.charts');
    }

    // Menampilkan Data ke tabel
    public function table(){
      Paginator::useBootstrap();
      $barang = DB::table('barang')->paginate(5);
      return view('product/table', ['barang' => $barang]);
    }

    public function TambahBarang(){
      return view('product.tambah');
    }

    // Menyimpan barang ke Tabel
    public function SimpanBarang(Request $request){

      $request->validate([
        'nomor_barang' => 'required|min:1',
        'nama_barang' => 'required|min:5',
        'tujuan_barang' => 'required',
      ]);
        
      DB::table('barang')->insert([

        'nomor_barang' => $request->nomor_barang,
        'nama_barang' => $request->nama_barang,
        'tujuan_barang' => $request->tujuan_barang,
      ]);
      return redirect('product/table')->with('success', 'Barang berhasil ditambah!');
    }

    // Menghapus data di tabel melalui id
    public function HapusBarang($id){
      DB::table('barang')->where('id', $id)->delete();
      return redirect('product/table');
    }

    //Mengarahkan Ke edit data
    public function EditBarang($id){
     $barang = DB::table('barang')->where('id', $id)->first();
      return view('product/edit', compact('barang'));

    }

    // Edit Data di tabel
    public function UpdateBarang(Request $request,$id){

      $request->validate([
        'nomor_barang' => 'required|min:1',
        'nama_barang' => 'required|min:5',
        'tujuan_barang' => 'required',
      ]);

      DB::table('barang')->where('id', $id)->update([

        'nomor_barang' => $request->nomor_barang,
        'nama_barang' => $request->nama_barang,
        'tujuan_barang' => $request->tujuan_barang,

      ]);

      return redirect('product/table')->with('success', 'Berhasil update data barang');
    }
}
