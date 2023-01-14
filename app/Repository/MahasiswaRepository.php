<?php

namespace App\Repository;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Service\MahasiswaService;
use Attribute;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Redis;

class MahasiswaRepository extends Mahasiswa
{
    public static function getAll()
    {
        $data = self::all();
        return $data;   
    }
    public static function addMahasiswa()
    {
        global $request;
        $name = $request->get('name');
        $alamat = $request->get('alamat');
        $semester = $request->get('semester');
        $program_studi = $request->get('program_studi');
        $nim = $request->get('nim');
        if($request->file('img'))
        {
            $img = $request->file('img')->store('mahasiswa-images');
        }
        $data = [   
            'name' => $name,
            'program_studi' => $program_studi,
            'alamat' => $alamat,
            'semester' => $semester,
            'nim' => $nim,
            'img' => $img
        ];
        $pullData = new self;
        $pullData->name = $data['name'];
        $pullData->nim = $data['nim'];
        $pullData->img = $data['img'];
        $pullData->program_studi = $data['program_studi'];
        $pullData->alamat = $data['alamat'];
        $pullData->semester = $data['semester'];
         return $pullData->save();
    } 
    
    public static function updateMahasiswa(){
        global $request;
        $id = $request->get('id');
        $name = $request->get('name');
        $alamat = $request->get('alamat');
        $semester = $request->get('semester');
        $program_studi = $request->get('program_studi');
        $nim = $request->get('nim');
        $img = $request->get('oldImage');
         if($request->hasFile('img')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $img = $request->file('img')->store('mahasiswa-images');
         }
         $data = [
            'id' => $id,
            'name' => $name,
            'program_studi' => $program_studi,
            'alamat' => $alamat,
            'semester' => $semester,
            'nim' => $nim,
            'img' => $img
        ];
        $pullData = self::find($data['id']);
        $pullData->name = $data['name'];
        $pullData->nim = $data['nim'];
        $pullData->img = $data['img'];
        $pullData->program_studi = $data['program_studi'];
        $pullData->alamat = $data['alamat'];
        $pullData->semester = $data['semester'];
        return $pullData->save();      
    }
    
    public static function deleteMahasiswa(){
        global $request; 
        $id = $request->get('id');
        $img = $request->get('oldImg');
        Storage::delete($img);
        $mahasiswa = self::find($id);
        $mahasiswa->delete();
    }
    public static function getOneMahasiswa($id)
    {   
        $data = Mahasiswa::find($id);
        $newData = MahasiswaService::getOneMahasiswa($data);
        return $newData;
    }
}

// Ilham Maulana