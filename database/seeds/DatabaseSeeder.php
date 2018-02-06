<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hasher = app()->make('hash');

        DB::table('biodatas')->insert([
            // $this->call('UsersTableSeeder');
            [
                'nama' => 'Afif Salman Z',
                'ttl' => 'Bandung, 01 Juni 2001',
                'alamat' => 'Jalan Kebon Waru',
                'jenis_kelamin' => 'laki-laki',
                'telephone' => '089553247724'
            ],
            [
                'nama' => 'Valentina Alexandra',
                'ttl' => 'Bandung, 07 Maret 2001',
                'alamat' => 'Jalan Antapani Belakang',
                'jenis_kelamin' => 'perempuan',
                'telephone' => '087882374882'
            ],
            [
                'nama' => 'Mochammad Rafi Al Rizkan',
                'ttl' => 'Bandung, 12 November 2000',
                'alamat' => 'Jalan Atlas 7 no 11',
                'jenis_kelamin' => 'laki-laki',
                'telephone' => '089623096431'
            ],
            [
                'nama' => 'Justin D Marzio',
                'ttl' => 'Jakarta, 03 Agustus 2003',
                'alamat' => 'Jalan Purwakarta 9',
                'jenis_kelamin' => 'laki-laki',
                'telephone' => '089338536434'
            ],
            [
                'nama' => 'Alexandra Augustina',
                'ttl' => 'Bali, 09 Agustus 2002',
                'alamat' => 'Komplek Golf B',
                'jenis_kelamin' => 'perempuan',
                'telephone' => '0878823488824'
            ],
            [
                'nama' => 'Slamet Riyadi',
                'ttl' => 'Bali, 25 Mei 1987',
                'alamat' => 'Parakansaat',
                'jenis_kelamin' => 'laki-laki',
                'telephone' => '0878823488809'
            ]
        ]);
        DB::table('users')->insert([
            [
                'email' => 'afifsalman01@gmail.com',
                'nis' => '100000020321',
                'password' => $hasher->make('123456'),
                'jabatan' => 'Administrator',
                'biodata_id' => 1
            ],
            [
                'email' => 'valentina@gmail.com',
                'nis' => '100000020354',
                'password' => $hasher->make('123456'),
                'jabatan' => 'Guru',
                'biodata_id' => 2
            ],
            [
                'email' => 'rafinyadi@gmail.com',
                'nis' => '100000020201',
                'password' => $hasher->make('123456'),
                'jabatan' => 'Siswa',
                'biodata_id' => 3
            ],

            [
                'email' => 'justini23@gmail.com',
                'nis' => '100000020203',
                'password' => $hasher->make('123456'),
                'jabatan' => 'Siswa',
                'biodata_id' => 4
            ],
            [
                'email' => 'alexandra@gmail.com',
                'nis' => '100000020205',
                'password' => $hasher->make('123456'),
                'jabatan' => 'Siswa',
                'biodata_id' => 5
            ],
            [
                'email' => 'slametriyadi22@gmail.com',
                'nis' => '100000020394',
                'password' => $hasher->make('123456'),
                'jabatan' => 'Guru',
                'biodata_id' => 6
            ],
        ]);
        DB::table('kelas')->insert([
            [
                'nama' => '10 Rekayasa Perangkat Lunak',
            ],
            [
                'nama' => '10 Teknik Komputer dan Jaringan',
            ],
            [
                'nama' => '10 Farmasi',
            ],
            [
                'nama' => '11 Rekayasa Perangkat Lunak',
            ],
            [
                'nama' => '11 Teknik Komputer dan Jaringan',
            ],
            [
                'nama' => '11 Farmasi',
            ],
            [
                'nama' => '12 Rekayasa Perangkat Lunak',
            ],
            [
                'nama' => '12 Teknik Komputer dan Jaringan',
            ],
            [
                'nama' => '12 Farmasi',
            ],
        ]);
        DB::table('pelajaran')->insert([
            [
                'nama' => 'Kimia'
            ],
            [
                'nama' => 'Fisika'
            ],
            [
                'nama' => 'Pemograman Web'
            ],
            [
                'nama' => 'Bahasa Inggris'
            ],
        ]);
        DB::table('kelas_user')->insert([
            [
                'user_id' => 3,
                'kelas_id' => 4,
            ],
            [
                'user_id' => 4,
                'kelas_id' => 4,
            ],
            [
                'user_id' => 5,
                'kelas_id' => 6,
            ],
        ]);
        DB::table('pelajaran_user')->insert([
            [
                'user_id' => 2,
                'pelajaran_id' => 1,
            ],
            [
                'user_id' => 6,
                'pelajaran_id' => 3,
            ],
        ]);
        DB::table('soal')->insert([
            [
                'soal' => 'HTML merupakan singkatan dari',
                'gambar_soal' => null,
                'pelajaran_id' => 3,
                'a' => 'Home Tool  Markup Language',
                'b' => 'Hyperlinks and Text Markup Language',
                'c' => 'Hyper Text Markup Language',
                'd' => 'Hyper Tool Markup Language',
                'e' => 'Hyper Tricks Markup Language',
                'jawaban' => 'c'
            ],
            [
                'soal' => 'Siapa yang mengembangkan Sejarah Web pertama kali',
                'gambar_soal' => null,
                'pelajaran_id' => 3,
                'a' => 'Ruben',
                'b' => 'Thomas Alpha Edison',
                'c' => 'Tim Berners-Lee',
                'd' => 'Albert Einstein',
                'e' => 'Steward',
                'jawaban' => 'c'
            ],
            [
                'soal' => 'Profesi dalam pengembangan web, kecuali',
                'gambar_soal' => null,
                'pelajaran_id' => 3,
                'a' => 'Web Developer',
                'b' => 'Web Programer',
                'c' => 'Web Designer',
                'd' => 'Web Administrator',
                'e' => 'Web Browser',
                'jawaban' => 'e'
            ],
            [
                'soal' => 'Pada tanggal brapa www dapat di gunakan gratis',
                'gambar_soal' => null,
                'pelajaran_id' => 3,
                'a' => '20 april 1993',
                'b' => '27 april 1993',
                'c' => '20 april 1939',
                'd' => '25 april 1995',
                'e' => '30 april 1993',
                'jawaban' => 'e'
            ],
            [
                'soal' => 'Yang dimaksud dengan halaman Web adalah',
                'gambar_soal' => null,
                'pelajaran_id' => 3,
                'a' => 'Halaman elektronik yang dibuka dengan email',
                'b' => 'Halaman online bisa di download',
                'c' => 'Halaman digital yang dibuka dengan web browser',
                'd' => 'Halaman digital yang berisi berbagai jenis data dan gambar',
                'e' => 'Digital online yang terhubung dengan internet',
                'jawaban' => 'c'
            ],
            [
                'soal' => 'Tahun berapa web di buat?',
                'gambar_soal' => null,
                'pelajaran_id' => 3,
                'a' => '1993',
                'b' => '1999',
                'c' => '1945',
                'd' => '1993',
                'e' => '1991',
                'jawaban' => 'c'
            ],
            [
                'soal' => 'Kegiatan menulis html di sebut?',
                'gambar_soal' => null,
                'pelajaran_id' => 3,
                'a' => 'Nulis',
                'b' => 'Coding',
                'c' => 'Ngetik',
                'd' => 'Gambar',
                'e' => 'Melukis',
                'jawaban' => 'c'
            ],
            [
                'soal' => 'Apa kepanjangan WWW?',
                'gambar_soal' => null,
                'pelajaran_id' => 3,
                'a' => 'World Wide Web',
                'b' => 'Wide World Web',
                'c' => 'Web Wide World',
                'd' => 'World Web Wide',
                'e' => 'Web World Wide',
                'jawaban' => 'a'
            ],
        ]);
    }
}
