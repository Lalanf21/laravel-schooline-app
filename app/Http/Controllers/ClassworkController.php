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
        $nip = Auth()->user()->nisn;
        $id_guru = GuruModel::where('nip', $nip)->first()->id_guru;
        $mapel = MapelGuruModel::where('id_guru', $id_guru)->with('mapel')->get();
        
        $ruang_belajar = RuangBelajarModel::where('id_guru', $id_guru)->with('mapel')->get();
        return view('guru.pages.pembelajaran.classwork.index', compact('mapel','ruang_belajar'));
    }
    
    public function create()
    {

    }

    public function store(ClassworkRequest $request)
    {
        $data = $request->all();
        $fileName = $request->file('file')->getClientOriginalName();
        $data['file'] = $request->file('file')->storeAs('/file-classwork',$fileName,'public');
        $data['tanggal'] = date("Y-m-d");
        
        ClassworkModel::create($data);

        return redirect()->route('guru-panel.classwork.index')->with('status', 'Classwork Berhasil di Simpan !');
    }

    public function show($id)
    {
        //
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
        $item = ClassworkModel::with('ruang_belajar.mapel.kelas')->get();
        return DataTables::of($item)
            ->rawColumns(['action'])
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
            ->make(true);
    }
}
