<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CampaignSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $campaigns = [
            [
                'akun_id' => 4,
                'nama' => 'Bersih-Bersih Sungai Ciliwung',
                'waktu' => $now->copy()->addDays(2),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Aksi bersih-bersih sungai dan pemilahan sampah organik/anorganik untuk didaur ulang.',
                'lokasi' => 'Jakarta Selatan',
                'kontak' => 'ciliwung@bersihdaur.id',
                'kuota_partisipan' => 100,
            ],
            [
                'akun_id' => 5,
                'nama' => 'Aksi Sabtu Bersih Taman Kota',
                'waktu' => $now->copy()->addDays(3),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Membersihkan taman kota dan memilah sampah plastik untuk bank sampah.',
                'lokasi' => 'Depok',
                'kontak' => 'sabtubersih@taman.id',
                'kuota_partisipan' => 80,
            ],
            [
                'akun_id' => 6,
                'nama' => 'Clean Up Day + Workshop Daur Ulang',
                'waktu' => $now->copy()->addDays(5),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Kegiatan bersih-bersih lingkungan sekaligus belajar mendaur ulang sampah rumah tangga.',
                'lokasi' => 'Bekasi',
                'kontak' => 'cleanup@reuse.org',
                'kuota_partisipan' => 60,
            ],
            [
                'akun_id' => 4,
                'nama' => 'Bersih-Bersih Pantai dan Edukasi Sampah Laut',
                'waktu' => $now->copy()->addDays(6),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Aksi bersih pantai dan edukasi dampak limbah plastik di laut.',
                'lokasi' => 'Anyer',
                'kontak' => 'pantai@bersihlaut.id',
                'kuota_partisipan' => 120,
            ],
            [
                'akun_id' => 5,
                'nama' => 'Gotong Royong Bersih Lingkungan Sekitar',
                'waktu' => $now->copy()->addDays(7),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Warga bergotong royong membersihkan lingkungan dan memilah sampah untuk daur ulang.',
                'lokasi' => 'Cimahi',
                'kontak' => 'lingkungan@gotongdaur.id',
                'kuota_partisipan' => 70,
            ],
            [
                'akun_id' => 6,
                'nama' => 'Clean & Recycle Day Sekolah',
                'waktu' => $now->copy()->addDays(4),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Siswa membersihkan area sekolah dan mendaur ulang kertas serta plastik.',
                'lokasi' => 'Yogyakarta',
                'kontak' => 'schoolrecycle@edu.id',
                'kuota_partisipan' => 90,
            ],
            [
                'akun_id' => 4,
                'nama' => 'Aksi Jumat Bersih + Edukasi Kompos',
                'waktu' => $now->copy()->addDays(2),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Jumat bersih rutin yang dilengkapi pelatihan mengompos sampah organik.',
                'lokasi' => 'Bogor',
                'kontak' => 'jumatkompos@desa.id',
                'kuota_partisipan' => 50,
            ],
            [
                'akun_id' => 5,
                'nama' => 'Bersih-Bersih Mall + Dropbox Sampah',
                'waktu' => $now->copy()->addDays(3),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Pembersihan area mall dan peluncuran dropbox sampah daur ulang.',
                'lokasi' => 'Tangerang',
                'kontak' => 'mallbersih@reuse.org',
                'kuota_partisipan' => 85,
            ],
            [
                'akun_id' => 6,
                'nama' => 'Car Free Day Recycle Walk',
                'waktu' => $now->copy()->addDay(),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Jalan sehat sambil mengumpulkan sampah di area CFD dan edukasi daur ulang.',
                'lokasi' => 'Bandung',
                'kontak' => 'cfdwalk@zerowaste.id',
                'kuota_partisipan' => 200,
            ],
            [
                'akun_id' => 4,
                'nama' => 'Aksi Bersih Pasar Tradisional',
                'waktu' => $now->copy()->addDays(5),
                'waktu_diperbarui' => $now,
                'deskripsi' => 'Pembersihan pasar dan pengumpulan kantong plastik untuk didaur ulang.',
                'lokasi' => 'Surabaya',
                'kontak' => 'pasarbersih@greenbiz.id',
                'kuota_partisipan' => 100,
            ],
        ];

        DB::table('campaign')->insert($campaigns);
    }
}
