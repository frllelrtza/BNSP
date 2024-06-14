<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Import the Produk class

class LandingController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        
        return view('welcome', compact('produk'));
    }
}
