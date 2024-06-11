<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Contracts\View\View; // Import the View class
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $produk = Produk::orderBy('created_at', 'DESC')->get();
        return view('dashboard.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate request data
        $request->validate([
            'nama_produk' => 'required',
            'foto_produk' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi_produk' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);
    
        // Handle file upload
        $file = $request->file('foto_produk');
        $name = time() . '_' . $file->getClientOriginalName(); // Ensure unique filename
        $tujuan_upload = 'produk'; // Specify the folder within the public disk
        $file->storeAs($tujuan_upload, $name, 'public');
    
        // Create the product
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'photo_produk' => $name,
            'deskripsi_produk' => $request->deskripsi_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
    
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('dashboard.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $produk = Produk::findOrFail($id);
    
        $request->validate([
            'nama_produk' => 'required',
            'foto_produk' => 'image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi_produk' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);
    
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
    
        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $name = time() . '_' . $file->getClientOriginalName(); // Ensure unique filename
            $tujuan_upload = 'produk';
            $file->storeAs($tujuan_upload, $name, 'public');
            $produk->photo_produk = $name;
        }
    
        $produk->save();
    
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

      /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $produk = Produk::findOrFail($id);

      
        //delete post
        $produk->delete();

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}