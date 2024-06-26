<?php

namespace Database\Seeders;

use App\Models\ListRespondent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListRespondentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            ['question'=>'Bagaimana Anda Menilai Kualitas Handphone yang Anda beli di Shopee?','type'=>'radio','answer_id'=>1],
            ['question'=>'Apakah Spesifikasi Produk Sesuai Dengan Deskripsi Di Shopee?','type'=>'radio','answer_id'=>1],
            ['question'=>'Bagaimana Kondisi Handphone Saat Tiba Di Tangan Anda?','type'=>'radio','answer_id'=>1],
            ['question'=>'Bagaimana Anda Menilai Responsivitas Layanan Pelanggan Shopee?','type'=>'radio','answer_id'=>1],
            ['question'=>'Apakah Masalah Anda Diselesaikan dengan cepat oleh Layanan Pelanggan?','type'=>'radio','answer_id'=>1],
            ['question'=>'Bagaimana Anda Menilai Kemudahan Navigasi Di Aplikasi Shopee?','type'=>'radio','answer_id'=>1],
            ['question'=>'Bagaimana Anda Menilai Proses Pembayaran Di Shopee?','type'=>'radio','answer_id'=>1],
            ['question'=>'Bagaimana Anda Menilai Pengalaman Berbelanja Handphone di Shopee Secara Keseluruhan?','type'=>'radio','answer_id'=>1],
            ['question'=>'Seberapa Besar Kemungkinan Anda Akan Merekomendasi Shopee Kepada Teman Atau Keluarga Anda?','type'=>'radio','answer_id'=>1],
        ];

        ListRespondent::insert($collections);
    }
}
