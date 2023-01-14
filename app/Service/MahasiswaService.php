<?php

namespace App\Service;
use App\Models\Mahasiswa;
use App\Repository\MahasiswaRepository;
use Illuminate\Support\Facades\Storage; 
class MahasiswaService extends Mahasiswa{
    public static function getOneMahasiswa($mahasiswa)
    {
        $mahasiswa->tamplateStr  = 'Name : ' . $mahasiswa['name'] . 'Prodi :  ' . $mahasiswa['program_studi'];    
        return $mahasiswa;
    }
} 
// Maaf jika service nya simple  