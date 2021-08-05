<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassworkRequest;
use App\Model\ClassworkModel;
use App\Model\GuruModel;
use App\Model\MapelGuruModel;
use App\Model\RuangBelajarModel;
use DataTables;
use Illuminate\Http\Request;

class ClassworkController extends Controller
{
    public function index()
    {
        session()->get('id_ruang_belajar');
        $nip = Auth()->user()->nisn;
        $id_guru = GuruModel::where('nip', $nip)->first()->id_guru;
        $ruang_belajar = RuangBelajarModel::where('id_guru', $id_guru)->with('mapel')->get();
        return view('guru.pages.pembelajaran.classwork.index', compact('ruang_belajar'));
    }

    public function tampil_classwork(Request $request)
    {
        session()->put('id_ruang_belajar', $request->id_ruang_belajar);
        return view('guru.pages.pembelajaran.classwork.tampil_classwork');
    }

    public function store(ClassworkRequest $request)
    {
        $data = $request->all();
        $fileName = $request->file('file')->getClientOriginalName();
        $data['file'] = $request->file('file')->storeAs('/file-classwork',$fileName,'public');
        $data['tanggal'] = date("Y-m-d");
        
        ClassworkModel::create($data);

        return back()->with('status', 'Classwork Berhasil di Simpan !');
    }

    public function show($id)
    {
        $nisn = Auth()->user()->nisn;
        $item = ClassworkModel::where('id_classwork',$id)->with('classwork')->first();
        return view ('siswa.pages.detail_story',compact('item'));
    }

    public function edit($id)
    {
        $nip = Auth()->user()->nisn;
        $id_guru = GuruModel::where('nip', $nip)->first()->id_guru;
        $mapel = MapelGuruModel::where('id_guru', $id_guru)->with('mapel')->get();
        
        $item = ClassworkModel::where('id_classwork',$id)->first();
        // dd($item);
        return view('guru.pages.pembelajaran.classwork.form_edit',compact('mapel','item'));
    }

    public function update(Request $request, $id)
    {
        $item = ClassworkModel::findOrFail($id);
        $data = $request->except('id_ruang_belajar');

        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $file = 'storage/' . $item->file;
            if (is_file($file)) {
                unlink($file);
            }
            $data['file'] = $request->file('file')->storeAs('/file-classwork', $fileName, 'public');
        }
        $item->update($data);
        return redirect()->route('guru-panel.classwork.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = ClassworkModel::findOrFail($id);
        $file = 'storage/' . $item->file;
        if (is_file($file)) {
            unlink($file);
        }

        $item->delete();
        return redirect()->route('guru-panel.classwork.index')->with('status', 'Berhasil di Hapus !');
    }

    public function list()
    {
        $id = session()->get('id_ruang_belajar');
        $item = ClassworkModel::with('ruang_belajar.mapel.kelas')->where('id_ruang_belajar', $id)->get();
        return DataTables::of($item)
            ->rawColumns(['action','penilaian'])
            ->addIndexColumn()
            ->addColumn('publish', function ($item) {
                if ($item->is_publish == '1') {
                    return 'Ya';
                } else {
                    return 'tidak';
                }
            })
            ->addColumn('action', function ($item) {
                $action = '<a href="/guru-panel/classwork/' . $item->id_classwork . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a>';
                $action .= ' ||<form action="/guru-panel/classwork/' . $item->id_classwork . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })
            ->addColumn('penilaian', function ($item) {
                $penilaian = '<a href="/guru-panel/classwork/penilaian/' . $item->id_classwork . '" class="btn btn-light"><i class="fas fa-book"></i></a>';
                return $penilaian;
            })
            ->make(true);
    }
}
