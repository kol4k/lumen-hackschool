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
    }
}
