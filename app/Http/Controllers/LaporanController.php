<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
         $beritas = Laporan::all();

        return view('super.laporan.index', compact('laporans'));
    }
}
