<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
        {

        {
            
                DB::table('products')->updateOrInsert(
                ['produk' => ' Lampu LED Sensor Gerak Otomatis'],
                [
                    'kategori' => 'electronic spot',
                    'img' => 'https://images.tokopedia.net/img/cache/200-square/hDjmkQ/2024/12/10/fbb31e12-fcbc-49ea-93a5-b915a1c0deb0.jpg',
                    'produk' => 'Promo Lampu LED Sensor Gerak Otomatis Rechargeable Kamar Mandi Tidur Dapur',
                    'description' => 'Lampu LED Sensor Gerak Otomatis Rechargeable Kamar Mandi Tidur Dapur

                    Lampu Sensor tubuh manusia tubuh manusia yang super kece dan modern ala Korea kini hadir loh di KS Store! Lampu auto menyala jika kita lewat dan akan mati dengan sendirinya jika kita sudah pergi.

                    Features : 
                    - Produk tidak memerlukan kabel dan mudah dipasang, dapat digunakan secara luas di kamar tidur, lemari pakaian, lemari, tangga, balkon, barang-barang mobil dan ruang lain dengan kebutuhan penerangan.
                    - Jika lingkungan cerah, lampu malam otomatis akan memasuki kondisi dormant. Pada malam hari, saat seseorang memasuki area pemindaian 3 hingga 6 meter, lampu malam otomatis akan menyalakan lampu setelah merasakan suhu tubuh. , dan matikan lampu secara otomatis setelah orang tersebut pergi selama 40 detik.

                    Specs :
                    - Material : ABS bahan ramah lingkungan
                    - Ukuran : 8cm x 8cm x 2cm
                    - Warna : Putih
                    - Daya : 500mAh, Baterai 500MA
                    - Berat : 100gram

                    Untuk keamanan barang dalam pengiriman, silahkan menambahkan bubble wrap yang tersedia di link terlampir : https://www.tokopedia.com/ks21/bubble-wrap',
                    'jumlah' => 50,
                    'harga' => 55000.00,
                    'link' => 'https://www.tokopedia.com/idea-things/promo-lampu-led-sensor-gerak-otomatis-rechargeable-kamar-mandi-tidur-dapur?extParam=src%3Dshop%26whid%3D2302703&aff_unique_id=&channel=others&chain_key=',
                    'is_featured' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );


                DB::table('products')->updateOrInsert(
                    ['produk' => 'Lampu LED Penangkap Nyamuk'],
                    [
                        'kategori' => 'electronic spot',
                        'img' => 'https://images.tokopedia.net/img/cache/200-square/hDjmkQ/2024/11/5/613ef744-56d9-4952-ae31-ade7564641a0.jpg',
                        'produk' => 'Lampu LED Penangkap Nyamuk Alat Pembasmi Nyamuk Mosquitos Killer Lampu LE',
                        'description' => 'Lampu Penangkap Nyamuk Alat Pembasmi Nyamuk Mosquitos Killer Lampu LED

                        Produk ini sudah melewati dan mendapatkan sertifikat otoritas resmi, juga melewati pengujian kinerja dan kualitas produk melalui lembaga formal, misalnya, Sertifikat CE, Hak Paten Penemuan, Laporan evaluasi desain paten, dan Laporan pengujian

                        Keunggulan Produk :
                        - Daya tangkap nyamuk tinggi, sehat dan efisien. Hasil tangkapan nyamuk sangat efektif, Menangkap berapapun nyamuk yang datang.
                        - Nyaman dan tenang, cocok untuk ibu dan bayi.
                        - Nampan penyimpanan nyamuk, tanpa dapat melarikan diri.

                        Specs:
                        - Material: Plastik
                        - Ukuran: 9.6 X 9.6 X 16.4 cm
                        - Warna: Random
                        - Daya: 5W
                        - Berat : 310 Gram

                        Untuk keamanan barang dalam pengiriman, silahkan menambahkan bubble wrap yang tersedia di link terlampir : https://www.tokopedia.com/ks21/bubble-wrap

                        Jangan Ragu, Tinggal Beli Aja !',

                        'jumlah' => 20,
                        'harga' => 26900.00,
                        'link' => 'https://www.tokopedia.com/idea-things/lampu-led-penangkap-nyamuk-alat-pembasmi-nyamuk-mosquitos-killer-lampu-le?extParam=src%3Dshop%26whid%3D2302703&aff_unique_id=&channel=others&chain_key=',
                        'is_featured' => false,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );


                DB::table('products')->updateOrInsert(
                    ['produk' => 'Lampu LED Sensor Gerak Otomatis Rechargeable Kamar Mandi Tidur Dapur'],
                    [
                        'kategori' => 'electronic spot',
                        'img' => 'https://images.tokopedia.net/img/cache/200-square/hDjmkQ/2024/11/5/017d911e-683b-4261-bbb8-acb657e4bf0a.jpg',
                        'produk' => 'Lampu LED Sensor Gerak Otomatis Rechargeable Kamar Mandi Tidur Dapur',
                        'description' => 'Lampu LED Sensor Gerak Otomatis Rechargeable Kamar Mandi Tidur Dapur

                        Lampu Sensor tubuh manusia tubuh manusia yang super kece dan modern ala Korea kini hadir loh di KS Store! Lampu auto menyala jika kita lewat dan akan mati dengan sendirinya jika kita sudah pergi.

                        Features : 
                        - Produk tidak memerlukan kabel dan mudah dipasang, dapat digunakan secara luas di kamar tidur, lemari pakaian, lemari, tangga, balkon, barang-barang mobil dan ruang lain dengan kebutuhan penerangan.
                        - Jika lingkungan cerah, lampu malam otomatis akan memasuki kondisi dormant. Pada malam hari, saat seseorang memasuki area pemindaian 3 hingga 6 meter, lampu malam otomatis akan menyalakan lampu setelah merasakan suhu tubuh. , dan matikan lampu secara otomatis setelah orang tersebut pergi selama 40 detik.

                        Specs :
                        - Material : ABS bahan ramah lingkungan
                        - Ukuran : 8cm x 8cm x 2cm
                        - Warna : Putih
                        - Daya : 500mAh, Baterai 500MA
                        - Berat : 100gram

                        Untuk keamanan barang dalam pengiriman, silahkan menambahkan bubble wrap yang tersedia di link terlampir : https://www.tokopedia.com/ks21/bubble-wrap

                        Jangan Ragu, Tinggal Beli Aja !

                        Happy Shopping',

                        'jumlah' => 20,
                        'harga' => 35000.99,
                        'link' => 'https://www.tokopedia.com/idea-things/lampu-led-sensor-gerak-otomatis-rechargeable-kamar-mandi-tidur-dapur?extParam=src%3Dshop%26whid%3D2302703&aff_unique_id=&channel=others&chain_key=',
                        'is_featured' => false,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            
        }
    }

}



