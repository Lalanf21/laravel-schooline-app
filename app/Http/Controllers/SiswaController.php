<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Model\jurusanModel;
use App\Model\kelasModel;
use App\Model\SiswaModel;
use Illuminate\Http\Request;
use DataTables;

class SiswaController extends Controller
{
    public function index()
    {
        return view('admin.pages.master-data.siswa.index');;

    }

    public function create()
    {
        $jurusan = jurusanModel::get();
        $kelas = kelasModel::get();
        return view('admin.pages.master-data.siswa.form_add',compact('jurusan','kelas'));
    }

    public function store(SiswaRequest $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('foto/siswa', 'public');

        SiswaModel::create($data);

        return redirect()->route('admin-panel.siswa.index')->with('status', 'Berhasil di Simpan !');
    }

    public function show(SiswaModel $siswa)
    {
        return view('admin.pages.master-data.siswa.detail_siswa', compact('siswa'));
    }

    public function edit(SiswaModel $siswa)
    {
        $jurusan = jurusanModel::get();
        $kelas = kelasModel::get();
        return view('admin.pages.master-data.siswa.form_edit', compact('siswa','kelas','jurusan'));
    }

    public function update(Request $request, $id)
    {
        $item = SiswaModel::findOrFail($id);
        $data = $request->all();
        
        // cek apakah ada update foto
        if ($request->hasFile('foto')) {
            if ($item->foto !== 'foto/user.jpg') {
                $file = 'storage/'.$item->foto;
                if (is_file($file)) {
                    unlink($file);
                }
            }
            $data['foto'] = $request->file('foto')->store('foto/siswa', 'public');
        }
        // dd($data);
        $item->update($data);
        return redirect()->route('admin-panel.siswa.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = SiswaModel::findOrFail($id);
        if ($item->foto !== 'foto/user.jpg') {
            $file = 'storage/' . $item->foto;
            if (is_file($file)) {
                unlink($file);
            }
        }

        $item->delete();
        return redirect()->route('admin-panel.siswa.index')->with('status', 'Berhasil di Hapus !');
    }

    public function list_siswa()
    {
        $item = SiswaModel::with('kelas','jurusan')->get();
        return DataTables::of($item)
            ->rawColumns(['action','detail'])
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/siswa/'.$item->id_siswa.'/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a>';
                $action .= ' ||<form action="/admin-panel/siswa/'.$item->id_siswa.'" method="post" class="d-inline">'
                .csrf_field().method_field("delete").'
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })
            ->addColumn('detail', function ($item) {
                $detail = '<a href="/admin-panel/siswa/'.$item->id_siswa.'" class="btn btn-light"><i class="fas fa-eye"></i></a>';
                return $detail;
            })
            ->make(true);
    }
}
