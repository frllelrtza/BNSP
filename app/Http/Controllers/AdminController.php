<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index()
    {
        return view('dashboard.index');
    }
}
