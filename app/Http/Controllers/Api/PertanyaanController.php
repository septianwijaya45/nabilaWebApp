<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function showPertanyaan()
    {
        $pertanyaan = Kategori::all();
        return response()->json([
            'status'    => true,
            'data'      => $pertanyaan
        ]);
    }
}
