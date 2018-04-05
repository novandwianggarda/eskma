<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Berita;

class BeritaController extends Controller
{
    public function index()
    {
         $beritas = Berita::all();

        return view('super.berita.index', compact('beritas'));
    }
}
