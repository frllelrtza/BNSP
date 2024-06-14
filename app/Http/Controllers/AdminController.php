<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index()
    {
        $jumlahPendapatan = Pendapatan::sum('jumlah_pendapatan');
        $jumlahPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
        $jumlahProduk = Produk::count();

        // Fetch data from Pendapatan and Pengeluaran tables
        $pendapatan = DB::table('pendapatan')
            ->select(
                'tanggal_pendapatan as tanggal',
                'sumber_pendapatan as sumber',
                'deskripsi_pendapatan as deskripsi',
                'jumlah_pendapatan as jumlah',
                DB::raw('"Pendapatan" as tipe')
            );

        $pengeluaran = DB::table('pengeluaran')
            ->select(
                'tanggal_pengeluaran as tanggal',
                'sumber_pengeluaran as sumber',
                'deskripsi_pengeluaran as deskripsi',
                'jumlah_pengeluaran as jumlah',
                DB::raw('"Pengeluaran" as tipe')
            );

        // Combine the queries using union
        $laporan = $pendapatan->union($pengeluaran)
            ->orderBy('tanggal', 'desc')
            ->get();

        $produk = Produk::all();
        
        return view('dashboard.index', compact('jumlahPendapatan', 'jumlahPengeluaran', 'jumlahProduk', 'laporan', 'produk'));
    }
}
