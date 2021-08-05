<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsensiRequest;
use App\Model\AbsensiModel;
use App\Model\GuruModel;
use App\Model\RuangBelajarModel;
use App\Model\SiswaModel;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    public function index()
    {
        session()->pull('id_ruang_belajar');
        session()->pull('tanggal');
        $nip = Auth()->user()->nisn;
        $id = GuruModel::where('nip', $nip)->first()->id_guru;
        $ruang_belajar = RuangBelajarModel::where('id_guru', $id)->get();
        return view('guru.pages.absensi.form', compact('ruang_belajar'));
    }
    
    public function create()
    {
        $nip = Auth()->user()->nisn;
        $id = GuruModel::where('nip', $nip)->first()->id_guru;
        $ruang_belajar = RuangBelajarModel::where('id_guru',$id)->get();
        $siswa = SiswaModel::with('kelas')->get();
        return view('guru.pages.absensi.form_add', compact('ruang_belajar','siswa'));
    }

    public function store(AbsensiRequest $request)
    {
        $data = $request->all();

        $nisn = Auth()->user()->nisn;
        $id_siswa = SiswaModel::where('nisn',$nisn)->first()->id_siswa;
        
        if ($request->has('id_siswa')) {
            $data['id_siswa'] = $request->id_siswa;
        }else{
            $nisn = Auth()->user()->nisn;
            $data['id_siswa'] =  SiswaModel::where('nisn',$nisn)->first()->id_siswa;
        }
        
        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $data['file'] = $request->file('file')->storeAs('/absensi', $fileName, 'public');
        }

        if ($request->has('tanggal_absen')) {
            $data['tanggal_absen'] = $request->tanggal_absen;
        }else{
            $data['tanggal_absen'] = date('Y-m-d');
        }

        $cek = AbsensiModel::where([
            ['id_siswa',$id_siswa],
            ['tanggal_absen',$data['tanggal_absen']],
        ])->first();

        if ($cek) {
            return redirect()->back()->with('status', 'Anda sudah absen hari ini !');
        }else{
            // dd($data);
            AbsensiModel::create($data);
            return redirect()->back()->with('status', 'Absen berhasil !');

        }
    }

    public function edit($id)
    {
        $item = AbsensiModel::where('id_absensi', $id)->first();
        return view('guru.pages.absensi.form_edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = AbsensiModel::findOrFail($id);
        $data = $request->all();

        $item->update($data);
        return redirect()->route('guru-panel.absensi.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        //
    }

    public function tampil_absensi(Request $request)
    {
        $id = $request->id_ruang_belajar;
        $tanggal = $request->tanggal;
        session()->put('id_ruang_belajar', $id);
        session()->put('tanggal', $tanggal);
        return view('guru.pages.absensi.tampil_absensi');
    }

    public function list()
    {
        $id = session()->get('id_ruang_belajar');
        $tanggal = session()->get('tanggal');
        $item = AbsensiModel::where([
            ['id_ruang_belajar', '=', $id],
            ['tanggal_absen', '=', $tanggal],
        ])->with('siswa')->get();
        return DataTables::of($item)
        ->rawColumns(['open','edit'])
        ->addIndexColumn()
        ->addColumn('open', function($item){
            return '<a href="'.Storage::url($item->file).'" class="btn btn-light"><i class="fas fa-download"></i></a>';
        })
        ->addColumn('edit', function($item){
            return '<a href="/guru-panel/absensi/' . $item->id_absensi . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
        })->make(true);
    }
}
