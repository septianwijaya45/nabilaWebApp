<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class RespondenController extends Controller
{
    public function store(Request $request)
    {
        try {
            $checkmember = Member::latest()->first() ?? new Member();
            $kode_member = (int) $checkmember->kode_member +1;
    
            $member = new Member();
            $member->kode_member = tambah_nol_didepan($kode_member, 5);
            $member->nama = $request->nama;
            $member->telepon = $request->telepon;
            $member->alamat = $request->alamat;
            $member->save();

            $getMember = Member::latest()->first();
    
            return response()->json([
                'status'    => true,
                'id'        => $getMember->id_member,
                'message'   => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'failed!'
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $member = Member::find($id);
            $member->delete();

            return response()->json([
                'status' => true,
                'message' => 'success'
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status' => false,
                'message' => 'failed!'
            ]);
        }
    }
}
