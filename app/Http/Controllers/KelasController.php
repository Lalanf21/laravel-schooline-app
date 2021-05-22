<?php

namespace App\Http\Controllers;

use App\Http\Requests\kelasRequest;
use App\Model\KelasModel;
use DataTables;

class KelasController extends Controller
{
    public function index()
    {
        return view('admin.pages.master-data.kelas.index');
    }


    public function store(KelasRequest $request)
    {
        $data = $request->all();
        KelasModel::create($data);
        return redirect()->route('admin-panel.kelas.index')->with('status', 'Berhasil di Simpan !');
    }

    public function edit($id)
    {
        $item = KelasModel::findOrFail($id);
        return view('admin.pages.master-data.kelas.form_edit', compact('item'));
    }

    public function update(KelasRequest $request, $id)
    {
        $item = KelasModel::findOrFail($id);
        $data = $request->all();

        $item->update($data);
        return redirect()->route('admin-panel.kelas.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = KelasModel::findOrFail($id);

        
        try {
            $item->delete();
        } catch (\Exception $ex) {
            return redirect()->route('admin-panel.kelas.index')->with('status', 'Data Kelas tidak boleh di hapus !');
        }
    }

    public function list_kelas()
    {
        $item = KelasModel::all();
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
