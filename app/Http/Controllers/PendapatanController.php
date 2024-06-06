<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View; // Import the View class
use Illuminate\Http\RedirectResponse; // Import the RedirectResponse class
use Illuminate\Support\Facades\Storage;

class PendapatanController extends Controller{
   
    public function index(): View // Update the return type
    {
        $pendapatan = Pendapatan::latest()->paginate(5);
        return view('dashboard.pendapatan.index', compact('pendapatan'));
    }

    public function create(): View
    {
        return view('dashboard.pendapatan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'tanggal_pendapatan' => 'required',
            'sumber_pendapatan' => 'required',
            'deskripsi_pendapatan' => 'required',
            'jumlah_pendapatan' => 'required'
        ]);

        Pendapatan::create([
            'tanggal_pendapatan' => $request->tanggal_pendapatan,
            'sumber_pendapatan' => $request->sumber_pendapatan,
            'deskripsi_pendapatan' => $request->deskripsi_pendapatan,
            'jumlah_pendapatan' => $request->jumlah_pendapatan,
            'created_by' => auth()->user()->id
        ]);

        return redirect()->route('pendapatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $pendapatan = Pendapatan::findOrFail($id);
        return view('dashboard.pendapatan.edit', compact('pendapatan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $pendapatan = Pendapatan::findOrFail($id);

        $this->validate($request, [
            'tanggal_pendapatan' => 'required',
            'sumber_pendapatan' => 'required',
            'deskripsi_pendapatan' => 'required',
            'jumlah_pendapatan' => 'required'
        ]);

        $pendapatan->update([
            'tanggal_pendapatan' => $request->tanggal_pendapatan,
            'sumber_pendapatan' => $request->sumber_pendapatan,
            'deskripsi_pendapatan' => $request->deskripsi_pendapatan,
            'jumlah_pendapatan' => $request->jumlah_pendapatan,
            'created_by' => auth()->user()->id
        ]);

        return redirect()->route('pendapatan.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $pendapatan = pendapatan::findOrFail($id);

      
        //delete post
        $pendapatan->delete();

        //redirect to index
        return redirect()->route('pendapatan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
