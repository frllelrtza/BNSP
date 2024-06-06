<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Contracts\View\View; // Import the View class

class ProdukController extends Controller
{
    /**
     * index
     *
     * @return View
     */

     public function index(): View
    {
        //get posts
        $produk = Produk::latest()->paginate(5);

        //render view with posts
        return view('dashboard.produk.index', compact('produk'));
    }
}
