<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Absensi::factory(10)->create();

        Absensi::factory()->create([
            'id_siswa'  => Siswa::factory()->create([
                'nama'          => 'Alvin',
            ]),
            'keterangan'    => 'Izin',
        ]);

        Absensi::factory()->create([
            'id_siswa'  => Siswa::factory()->create([
                'nama'          => 'Mirza',
            ]),
            'keterangan'    => 'Sakit',
        ]);

        Absensi::factory()->create([
            'id_siswa'  => Siswa::factory()->create([
                'nama'          => 'Raju',
            ]),
            'keterangan'    => 'Alfa',
        ]);

        Absensi::factory()->create([
            'id_siswa'  => Siswa::factory()->create([
                'nama'          => 'Fathan',
            ]),
            'keterangan'    => 'Izin',
        ]);

        Absensi::factory(20)->create();
    }
}
