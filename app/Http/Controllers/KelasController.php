<?php

namespace App\Http\Controllers;

use App\Http\Requests\kelasRequest;
use App\model\kelasModel;
use DataTables;

class KelasController extends Controller
{
    public function index()
    {
        return view('admin.pages.pengaturan.kelas.index');
    }


    public function store(kelasRequest $request)
    {
        $data = $request->all();
        kelasModel::create($data);
        return redirect()->route('admin-panel.kelas.index')->with('status', 'Berhasil di Simpan !');
    }

    public function edit($id)
    {
        $item = kelasModel::findOrFail($id);
        return view('admin.pages.pengaturan.kelas.form_edit', compact('item'));
    }

    public function update(kelasRequest $request, $id)
    {
        $item = kelasModel::findOrFail($id);
        $data = $request->all();

        $item->update($data);
        return redirect()->route('admin-panel.kelas.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = kelasModel::findOrFail($id);

        $item->delete();
        return redirect()->route('admin-panel.kelas.index')->with('status', 'Berhasil di Hapus !');
    }

    public function list_kelas()
    {
        $item = kelasModel::all();
        // dd($item);
        return DataTables::of($item)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/kelas/' . $item->id_kelas . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $action .= ' ||<form action="/admin-panel/kelas/' . $item->id_kelas . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })->make(true);
    }
}
