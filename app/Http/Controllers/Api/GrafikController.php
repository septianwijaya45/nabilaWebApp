<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use App\Models\Kategori;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function getDataRespondenMenjawab()
    {
        try {
            $p1 = count(Jawaban::whereNotNull('soal1')->get());
            $p2 = count(Jawaban::whereNotNull('soal2')->get());
            $p3 = count(Jawaban::whereNotNull('soal3')->get());
            $p4 = count(Jawaban::whereNotNull('soal4')->get());
            $p5 = count(Jawaban::whereNotNull('soal5')->get());
            $p6 = count(Jawaban::whereNotNull('soal6')->get());
            $p7 = count(Jawaban::whereNotNull('soal7')->get());
            $p8 = count(Jawaban::whereNotNull('soal8')->get());
            $p9 = count(Jawaban::whereNotNull('soal9')->get());

            $soal = Kategori::all();
            $s1 = $soal[0] ? $soal[0]->nama_kategori : '';
            $s2 = $soal[1] ? $soal[1]->nama_kategori : '';
            $s3 = $soal[2] ? $soal[2]->nama_kategori : '';
            $s4 = $soal[3] ? $soal[3]->nama_kategori : '';
            $s5 = $soal[4] ? $soal[4]->nama_kategori : '';
            $s6 = $soal[5] ? $soal[5]->nama_kategori : '';
            $s7 = $soal[6] ? $soal[6]->nama_kategori : '';
            $s8 = $soal[7] ? $soal[7]->nama_kategori : '';
            $s9 = $soal[8] ? $soal[8]->nama_kategori : '';


            return response()->json([
                'status'    => true,
                'message'   => 'Success!',
                'p1'        => $p1,
                'p2'        => $p2,
                'p3'        => $p3,
                'p4'        => $p4,
                'p5'        => $p5,
                'p6'        => $p6,
                'p7'        => $p7,
                'p8'        => $p8,
                'p9'        => $p9,
                's1'        => $s1,
                's2'        => $s2,
                's3'        => $s3,
                's4'        => $s4,
                's5'        => $s5,
                's6'        => $s6,
                's7'        => $s7,
                's8'        => $s8,
                's9'        => $s9
            ]);
        } catch (\Throwable $th) {
            \Log::info($th);
            return response()->json([
                'status'    => false,
                'message'   => 'Network Error!'
            ]);
        }
    }

    public function skm()
    {
        try {
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

            return response()->json([
                'status'    => true,
                'skmP1'     => $skmP1,
                'skmP2'     => $skmP2,
                'skmP3'     => $skmP3,
                'skmP4'     => $skmP4,
                'skmP5'     => $skmP5,
                'skmP6'     => $skmP6,
                'skmP7'     => $skmP7,
                'skmP8'     => $skmP8,
                'skmP9'     => $skmP9,
                'skmTotal'  => $skmTotal,
                'respondenTotal' => $responden
            ]);
        } catch (\Exception $th) {
            \Log::info($th);
            return response()->json([
                'status'    => false,
                'message'   => 'Network Error!'
            ]);
        }
    }
}
