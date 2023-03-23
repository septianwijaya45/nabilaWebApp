<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori'     => 'Bagaimana Pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'nama_kategori'     => 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'nama_kategori'     => 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'nama_kategori'     => 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'nama_kategori'     => 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalan standar pelayanan dengan hasil yang diberikan',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'nama_kategori'     => 'Bagaimana Pendapat saudara tentang kompetensi kemampuan petugas dalam pelayanan',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'nama_kategori'     => 'Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'nama_kategori'     => 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasana',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'nama_kategori'     => 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
        ]);
    }
}
