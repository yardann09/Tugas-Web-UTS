<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::with('kategori')->latest()->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create() 
    {
        $kategori = KategoriKegiatan::all();
    return view('admin.kegiatan.create',compact('kategori'));
    }
}
