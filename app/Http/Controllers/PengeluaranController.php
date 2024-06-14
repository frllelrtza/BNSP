<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View; // Import the View class
use Illuminate\Http\RedirectResponse; // Import the RedirectResponse class
use Illuminate\Support\Facades\Storage;

class PengeluaranController extends Controller{
   
    public function index(): View // Update the return type
    {
        $pengeluaran = Pengeluaran::latest()->paginate(5);
        return view('dashboard.pengeluaran.index', compact('pengeluaran'));
    }

    public function create(): View
    {
        return view('dashboard.pengeluaran.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'tanggal_pengeluaran' => 'required',
            'sumber_pengeluaran' => 'required',
            'deskripsi_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required'
        ]);

        Pengeluaran::create([
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'sumber_pengeluaran' => $request->sumber_pengeluaran,
            'deskripsi_pengeluaran' => $request->deskripsi_pengeluaran,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'created_by' => auth()->user()->id
        ]);

        return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('dashboard.pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        $this->validate($request, [
            'tanggal_pengeluaran' => 'required',
            'sumber_pengeluaran' => 'required',
            'deskripsi_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required'
        ]);

        $pengeluaran->update([
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
            'sumber_pengeluaran' => $request->sumber_pengeluaran,
            'deskripsi_pengeluaran' => $request->deskripsi_pengeluaran,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'created_by' => auth()->user()->id,
        ]);

        return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $pengeluaran = pengeluaran::findOrFail($id);

      
        //delete post
        $pengeluaran->delete();

        //redirect to index
        return redirect()->route('pengeluaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
