<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        $totSoal = count(Kategori::all());
        $responden = count(Jawaban::groupBy('member_id')->get());
        // Total Nilai Per Soal
        $p1 = Jawaban::whereNotNull('soal1')->sum('soal1');
        $p2 = Jawaban::whereNotNull('soal2')->sum('soal2');
        $p3 = Jawaban::whereNotNull('soal3')->sum('soal3');
        $p4 = Jawaban::whereNotNull('soal4')->sum('soal4');
        $p5 = Jawaban::whereNotNull('soal5')->sum('soal5');
        $p6 = Jawaban::whereNotNull('soal6')->sum('soal6');
        $p7 = Jawaban::whereNotNull('soal7')->sum('soal7');
        $p8 = Jawaban::whereNotNull('soal8')->sum('soal8');
        $p9 = Jawaban::whereNotNull('soal9')->sum('soal9');

        // NRR
        $nrrP1 = $p1/$responden;
        $nrrP2 = $p2/$responden;
        $nrrP3 = $p3/$responden;
        $nrrP4 = $p4/$responden;
        $nrrP5 = $p5/$responden;
        $nrrP6 = $p6/$responden;
        $nrrP7 = $p7/$responden;
        $nrrP8 = $p8/$responden;
        $nrrP9 = $p9/$responden;

        // NRR Tertimbang
        $nrrTP1 = $nrrP1/$totSoal;
        $nrrTP2 = $nrrP2/$totSoal;
        $nrrTP3 = $nrrP3/$totSoal;
        $nrrTP4 = $nrrP4/$totSoal;
        $nrrTP5 = $nrrP5/$totSoal;
        $nrrTP6 = $nrrP6/$totSoal;
        $nrrTP7 = $nrrP7/$totSoal;
        $nrrTP8 = $nrrP8/$totSoal;
        $nrrTP9 = $nrrP9/$totSoal;

        // SKM Per Soal
        $skmP1 = round($nrrTP1 * 25, 2);
        $skmP2 = round($nrrTP2 * 25, 2);
        $skmP3 = round($nrrTP3 * 25, 2);
        $skmP4 = round($nrrTP4 * 25, 2);
        $skmP5 = round($nrrTP5 * 25, 2);
        $skmP6 = round($nrrTP6 * 25, 2);
        $skmP7 = round($nrrTP7 * 25, 2);
        $skmP8 = round($nrrTP8 * 25, 2);
        $skmP9 = round($nrrTP9 * 25, 2);

        $skmTotal = round(($nrrTP1 + $nrrTP2 + $nrrTP3 + $nrrTP4 + $nrrTP5 + $nrrTP6 + $nrrTP7 + $nrrTP8 + $nrrTP9) * 25, 2);

        $data_pendapatan = [$skmP1, $skmP2, $skmP3, $skmP4, $skmP5, $skmP6, $skmP7, $skmP8, $skmP9];

        if (auth()->user()->level == 1) {
            return view('admin.dashboard', compact('kategori', 'produk', 'supplier', 'member', 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan'));
        } else {
            return view('kasir.dashboard');
        }
    }
}
