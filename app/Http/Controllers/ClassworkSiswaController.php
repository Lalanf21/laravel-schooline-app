<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassworkSiswaRequest;
use App\Model\ClassworksiswaModel;
use App\Model\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClassworkSiswaController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(ClassworkSiswaRequest $request)
    {
        $data = $request->all();
        $fileName = $request->file('file')->getClientOriginalName();
        
        $data['id_classwork'] = Crypt::decryptString($request->id_classwork);
        $data['file'] = $request->file('file')->storeAs('/classwork-siswa', $fileName, 'public');

        $nisn = Auth()->user()->nisn;
        $data['id_siswa'] = SiswaModel::where('nisn', $nisn)->first()->id_siswa;
        $data['tanggal'] = date('Y-m-d');

        ClassworksiswaModel::create($data);

        return redirect()->route('siswa-panel.siswaDashboard')->with('status', 'Tugas Berhasil di kirim !');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function listPenilaian($id)
    {
        $classworks = ClassworksiswaModel::where('id_classwork',$id)->with('siswa')->get();
        return view('guru.pages.pembelajaran.classwork.listPenilaian', compact('classworks'));
    }

    
    public function penilaian(Request $request)
    {
        $item = ClassworksiswaModel::where([
            ['id_classwork','=',$request->id_classwork],
            ['id_siswa','=',$request->id_siswa],
        ])->first();
        
        $item->update(['nilai'=>$request->nilai]);

        return redirect()->back()->with('status', 'Nilai berhasil di simpan !');
    }
}
