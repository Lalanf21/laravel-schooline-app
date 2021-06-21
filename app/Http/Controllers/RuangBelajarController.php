<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuangBelajarRequest;
use App\Model\GuruModel;
use App\Model\MapelGuruModel;
use App\Model\MapelModel;
use App\Model\RuangBelajarModel;
use App\Model\RuangBelajarSiswaModel;
use App\Model\SiswaModel;
use Illuminate\Http\Request;
use DataTables;
class RuangBelajarController extends Controller
{
    
    public function index()
    {
        $nip = Auth()->user()->nisn;
        $id_guru = GuruModel::where('nip', $nip)->first()->id_guru;
        $mapel = MapelGuruModel::where('id_guru', $id_guru)->with('mapel')->get();
        $ruang_belajar = RuangBelajarModel::with('mapel')->get();
        return view('admin.pages.pembelajaran.ruang_belajar.index', compact('ruang_belajar','mapel'));
    }

    public function create()
    {
        $mapel = MapelModel::where('is_active',1)->with('kelas')->get();
        $guru = GuruModel::where('is_active',1)->get();
        // dd($guru);
        return view('admin.pages.pembelajaran.ruang_belajar.form_add',compact('mapel','guru'));
    }

    public function store(RuangBelajarRequest $request)
    {
        RuangBelajarModel::create($request->all());
        if (Auth()->user()->getRoleNames() == '["admin"]') {
            return redirect()->route('admin-panel.ruang-belajar.index')->with('status', 'Berhasil di Simpan !');
        }else{
            return redirect()->route('guru-panel.guruDashboard')->with('status', 'Berhasil Membuat ruang belajar !');
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $item = RuangBelajarModel::where('id_ruang_belajar',$id)->with('mapel','guru')->first();
        // dd($item);
        return view('admin.pages.pembelajaran.ruang_belajar.form_edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = RuangBelajarModel::findOrFail($id);
        $data = $request->except('kode');
        $item->update($data);
        if (Auth()->user()->getRoleNames() == '["admin"]') {
            return redirect()->route('admin-panel.ruang-belajar.index')->with('status', 'Berhasil di Edit !');
        }else {
            return redirect()->route('guru-panel.ruang-belajar.index')->with('status', 'Berhasil di Edit !');
        }
    }

    public function destroy($id)
    {
        $item = RuangBelajarModel::findOrFail($id);
        $item->delete();
        if (Auth()->user()->getRoleNames() == '["admin"]') {
            return redirect()->route('admin-panel.ruang-belajar.index')->with('status', 'Berhasil di Hapus !');
        }else{
            return redirect()->route('guru-panel.ruang-belajar.index')->with('status', 'Berhasil di Hapus !');
        }
    }

    public function addMember(Request $request)
    {
        $kode = $request->kode;
        $item = RuangBelajarModel::where('kode',$kode)->first();
        if ($item !== null) {
            $nisn = Auth()->user()->nisn;
            $id_ruang_belajar = RuangBelajarModel::where('kode',$kode)->first()->id_ruang_belajar;
            $id_siswa = SiswaModel::where('nisn', $nisn)->first()->id_siswa;

            $add = RuangBelajarSiswaModel::create([
                'id_ruang_belajar'=>$id_ruang_belajar,
                'id_siswa'=>$id_siswa,
            ]);
            return redirect()->route('siswa-panel.siswaDashboard')->with('status', 'Berhasil masuk ke ruang belajar !');
        }else{
            return redirect()->route('siswa-panel.siswaDashboard')->with('status', 'Kode ruang belajar tidak di temukan!');
        }
    }

    public function list()
    {
        if (Auth()->user()->getRoleNames() == '["admin"]') {
            $item = RuangBelajarModel::with('mapel.kelas')->get();
        }else{
            $nip = Auth()->user()->nisn;
            $id_guru = GuruModel::where('nip', $nip)->first()->id_guru;
            $item = RuangBelajarModel::where('id_guru', $id_guru)->with('mapel.kelas')->get();
        }
        // dd($item);
        return DataTables::of($item)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                if (Auth()->user()->getRoleNames() == '["admin"]') {
                    $action = '<a href="/admin-panel/ruang-belajar/' . $item->id_ruang_belajar . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a>';
                    $action .= ' ||<form action="/admin-panel/ruang-belajar/' . $item->id_ruang_belajar . '" method="post" class="d-inline">'
                    . csrf_field() . method_field("delete") . '
                    <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                    return $action;
                }else{
                    $action = '<a href="/guru-panel/ruang-belajar/' . $item->id_ruang_belajar . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a>';
                    $action .= ' ||<form action="/guru-panel/ruang-belajar/' . $item->id_ruang_belajar . '" method="post" class="d-inline">'
                    . csrf_field() . method_field("delete") . '
                    <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                    return $action;

                }
            })
            ->make(true);
    }

    public function ruangSiswa($id)
    {
        $nisn = Auth()->user()->nisn;
        $siswa = SiswaModel::where('nisn', $nisn)->get();
        $ruang_belajar = RuangBelajarModel::where('id_ruang_belajar', $id)->with('mapel')->first();
        
        $friends = RuangBelajarSiswaModel::with('siswa')->where('id_ruang_belajar',$id)->get();
        // $works = MateriModel::where('id_ruang_belajar',$id)->get();
        // dd($mapel);
        return view('siswa.pages.ruang_belajar', compact('siswa','friends','ruang_belajar'));
    }
}
