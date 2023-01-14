<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\MahasiswaService;
use App\Repository\MahasiswaRepository;
use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;

class MahasiswaController 
{
    public function view(){
        $datas['list_mahasiswa'] = MahasiswaRepository::getAll();
        return view('home', $datas);
    }

    public function add(MahasiswaRequest $request)
    {
        MahasiswaRepository::addMahasiswa();
        return redirect('/');
    }
    public function update(MahasiswaRequest $request)
    {
        MahasiswaRepository::updateMahasiswa();
         return redirect('/');
    }
    public function delete(Request $request)
    {
        MahasiswaRepository::deleteMahasiswa();
        return redirect('/');
    }
    public function preview($id)
    {
        $mahasiswa =  MahasiswaRepository::getOneMahasiswa($id);
        return view('preview.index', $mahasiswa );
    }
}
