<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\Pilihan;
use App\Models\Program;
use App\Models\Simpul;
use Illuminate\Database\Seeder;

class JalurSeeder extends Seeder
{
    public function run(): void
    {
        /*
        | BIDANG / BUSINESS PILLAR MAHREEN
        */

        $bidang = [

            'studio' => [
                'Mahreen Studio',
                'Creative lifestyle dan fashion development dengan konsep modern, elegan, dan mengikuti tren masa kini.',
                'Kamu tertarik mengembangkan ide kreatif menjadi karya visual, lifestyle, fashion, dan produk yang memiliki nilai estetika.'
            ],

            'tanya' => [
                'Tanya Mahreen',
                'Solusi akademik, kreatif, bisnis, branding, website, pemasaran digital, dan pengembangan kreatif.',
                'Kamu suka memecahkan masalah melalui ide, teknologi, branding, bisnis, dan pengembangan solusi digital.'
            ],

            'peduli' => [
                'Peduli Mahreen',
                'Program sosial dan kemanusiaan yang berfokus pada kebermanfaatan dan kepedulian terhadap masyarakat.',
                'Kamu ingin menggunakan waktu, kemampuan, dan energi untuk membantu masyarakat melalui kegiatan sosial dan kemanusiaan.'
            ],

            'csr' => [
                'Mahreen CSR',
                'Program pemberdayaan dan kolaborasi sosial yang menghadirkan dampak positif bagi masyarakat.',
                'Kamu tertarik membangun kolaborasi dan program yang memberikan manfaat nyata serta berkelanjutan bagi masyarakat.'
            ],

        ];

        foreach ($bidang as $slug => [$nama, $ringkas, $alasan]) {
            Bidang::create([
                'slug' => $slug,
                'nama' => $nama,
                'ringkas' => $ringkas,
                'alasan' => $alasan,
            ]);
        }

        /*
        | PERTANYAAN
        */

        Simpul::insert([

            [
                'id' => 1,
                'is_start' => true,
                'teks' => 'Kalau punya ide baru, hal pertama yang paling ingin kamu lakukan apa?'
            ],

            [
                'id' => 2,
                'is_start' => false,
                'teks' => 'Kamu ingin membuat sesuatu yang bisa dilihat dan dirasakan orang. Bidang apa yang paling menarik?'
            ],

            [
                'id' => 3,
                'is_start' => false,
                'teks' => 'Ada sebuah bisnis atau usaha yang ingin berkembang. Bagian mana yang paling ingin kamu bantu?'
            ],

            [
                'id' => 4,
                'is_start' => false,
                'teks' => 'Kamu melihat ada masalah sosial di sekitar. Apa yang paling ingin kamu lakukan?'
            ],

            [
                'id' => 5,
                'is_start' => false,
                'teks' => 'Sebuah komunitas ingin membuat program yang bermanfaat. Kamu lebih tertarik mengambil peran apa?'
            ],

            [
                'id' => 6,
                'is_start' => false,
                'teks' => 'Kalau diberi kesempatan berkolaborasi, hasil seperti apa yang ingin kamu ciptakan?'
            ],

        ]);

        /*
        | PILIHAN
        */

        $pilihan = [

            // Pertanyaan 1

            [
                1,
                'Membuat karya kreatif atau visual',
                2,
                [
                    'studio' => 3,
                    'tanya' => 1,
                ]
            ],

            [
                1,
                'Mencari solusi menggunakan teknologi atau bisnis',
                3,
                [
                    'tanya' => 3,
                ]
            ],

            [
                1,
                'Membantu orang yang membutuhkan',
                4,
                [
                    'peduli' => 3,
                ]
            ],

            [
                1,
                'Mengajak orang bekerja sama untuk membuat perubahan',
                5,
                [
                    'csr' => 3,
                ]
            ],

            // Pertanyaan 2 - KREATIF

            [
                2,
                'Fashion, lifestyle, dan produk kreatif',
                null,
                [
                    'studio' => 4,
                ]
            ],

            [
                2,
                'Desain, branding, dan konten digital',
                3,
                [
                    'studio' => 2,
                    'tanya' => 2,
                ]
            ],

            // Pertanyaan 3 - BISNIS & DIGITAL

            [
                3,
                'Membangun website atau solusi digital',
                null,
                [
                    'tanya' => 4,
                ]
            ],

            [
                3,
                'Mengembangkan branding dan pemasaran',
                null,
                [
                    'tanya' => 4,
                    'studio' => 1,
                ]
            ],

            [
                3,
                'Mencari strategi agar bisnis bisa berkembang',
                null,
                [
                    'tanya' => 4,
                ]
            ],

            // Pertanyaan 4 - SOSIAL

            [
                4,
                'Terjun langsung membantu masyarakat',
                null,
                [
                    'peduli' => 4,
                ]
            ],

            [
                4,
                'Mengadakan kegiatan sosial atau kemanusiaan',
                5,
                [
                    'peduli' => 4,
                ]
            ],

            // Pertanyaan 5 - PEMBERDAYAAN

            [
                5,
                'Mengajak komunitas dan relawan berkolaborasi',
                null,
                [
                    'csr' => 4,
                    'peduli' => 1,
                ]
            ],

            [
                5,
                'Membuat program pemberdayaan yang berkelanjutan',
                null,
                [
                    'csr' => 4,
                ]
            ],

            [
                5,
                'Membantu merancang kegiatan yang berdampak',
                6,
                [
                    'csr' => 3,
                    'tanya' => 1,
                ]
            ],

            // Pertanyaan 6 - KOLABORASI

            [
                6,
                'Karya kreatif yang bisa dikenal banyak orang',
                null,
                [
                    'studio' => 3,
                ]
            ],

            [
                6,
                'Solusi digital atau pengembangan bisnis',
                null,
                [
                    'tanya' => 3,
                ]
            ],

            [
                6,
                'Gerakan sosial yang membantu masyarakat',
                null,
                [
                    'peduli' => 3,
                ]
            ],

            [
                6,
                'Program kolaborasi yang memberdayakan komunitas',
                null,
                [
                    'csr' => 3,
                ]
            ],

        ];

        foreach ($pilihan as [$simpul, $label, $next, $skor]) {

            Pilihan::create([
                'simpul_id' => $simpul,
                'label' => $label,
                'next_simpul_id' => $next,
                'skor' => $skor,
            ]);

        }

        /*
        | PROGRAM MAHREEN
        | Catatan:
        | Data tanggal di bawah dibuat sebagai data dummy.
        |
        */

        $program = [

            // MAHREEN STUDIO

            [
                'studio',
                'Creative Lifestyle Workshop',
                '2026-10-17',
                '2026-10-18'
            ],

            [
                'studio',
                'Fashion & Creative Development',
                '2026-11-07',
                '2026-11-08'
            ],

            [
                'studio',
                'Creative Product Showcase',
                '2027-01-23',
                null
            ],

            // TANYA MAHREEN

            [
                'tanya',
                'Digital Branding Workshop',
                '2026-10-24',
                '2026-10-25'
            ],

            [
                'tanya',
                'Website & Digital Development Class',
                '2026-11-14',
                '2026-11-15'
            ],

            [
                'tanya',
                'Business & Creative Consultation',
                '2026-12-12',
                null
            ],

            // PEDULI MAHREEN

            [
                'peduli',
                'Aksi Sosial Peduli Mahreen',
                '2026-10-31',
                null
            ],

            [
                'peduli',
                'Volunteer & Community Activity',
                '2026-12-19',
                null
            ],

            [
                'peduli',
                'Gerakan Kemanusiaan Mahreen',
                '2027-01-16',
                null
            ],

            // MAHREEN CSR

            [
                'csr',
                'Community Empowerment Program',
                '2026-11-21',
                '2026-11-22'
            ],

            [
                'csr',
                'Social Collaboration Workshop',
                '2026-12-05',
                '2026-12-06'
            ],

            [
                'csr',
                'Mahreen CSR Collaboration',
                '2027-01-30',
                null
            ],

        ];

        foreach ($program as [$slug, $judul, $mulai, $selesai]) {

            Program::create([
                'bidang_id' => Bidang::where('slug', $slug)->value('id'),
                'judul' => $judul,
                'mulai' => $mulai,
                'selesai' => $selesai,

                // Data program di atas adalah seed/demo,
                // bukan jadwal resmi website.
                'is_contoh' => true,
            ]);

        }
    }
}
