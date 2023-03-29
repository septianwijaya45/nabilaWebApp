<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JawabanController extends Controller
{
    public function sendJawaban(Request $request)
    {
        \Log::info($request->all());
        try {
            $jawaban = Jawaban::insert([
                'member_id'     => $request->id,
                'soal1'         => $request->pilihan1,
                'soal2'         => $request->pilihan2,
                'soal3'         => $request->pilihan3,
                'soal4'         => $request->pilihan4,
                'soal5'         => $request->pilihan5,
                'soal6'         => $request->pilihan6,
                'soal7'         => $request->pilihan7,
                'soal8'         => $request->pilihan8,
                'soal9'         => $request->pilihan9,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
    
            return response()->json([
                'status'    => true,
                'message'   => 'Success!'
            ]);   
        } catch (\Exception $th) {
            \Log::info($th);
            return response()->json([
                'status'    => false,
                'message'   => 'Failed!'
            ]);
        }
    }
}
