<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuangBelajarRequest;
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
        $ruang_belajar = RuangBelajarModel::with('mapel')->get();
        return view('admin.pages.pembelajaran.ruang_belajar.index', compact('ruang_belajar'));
    }

    public function create()
    {
        $mapel = MapelModel::where('is_active',1)->get();
        return view('admin.pages.pembelajaran.ruang_belajar.form_add',compact('mapel'));
    }

    public function store(RuangBelajarRequest $request)
    {
        // dd($request->all());
        RuangBelajarModel::create($request->all());
        if (Auth()->user()->getRoleNames() == '["admin"]') {
            return redirect()->route('admin-panel.ruang-belajar.index')->with('status', 'Berhasil di Simpan !');
        }else{
            return redirect()->route('guru-panel.guruDashboard')->with('status', 'Berhasil Membuat ruang belajar !');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = RuangBelajarModel::findOrFail($id)->with('mapel')->first();
         return view('admin.pages.pembelajaran.ruang_belajar.form_edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = RuangBelajarModel::findOrFail($id);
        $data = $request->except('kode');
        $item->update($data);
        return redirect()->route('admin-panel.ruang-belajar.index')->with('status', 'Berhasil di Edit !');
    }

    public function destroy($id)
    {
        $item = RuangBelajarModel::findOrFail($id);
        $item->delete();
        return redirect()->route('admin-panel.ruang-belajar.index')->with('status', 'Berhasil di Hapus !');
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
        $item = RuangBelajarModel::with('mapel','guru')->get();
        return DataTables::of($item)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/ruang-belajar/' . $item->id_ruang_belajar . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a>';
                $action .= ' ||<form action="/admin-panel/ruang-belajar/' . $item->id_ruang_belajar . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })
            ->make(true);
    }
}
