<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurusanRequest;
use App\Model\JurusanModel;
use DataTables;

class JurusanController extends Controller
{
    public function index()
    {
        return view('admin.pages.master-data.jurusan.index');
    }


    public function store(JurusanRequest $request)
    {
        $data = $request->all();
        JurusanModel::create($data);
        return redirect()->route('admin-panel.jurusan.index')->with('status', 'Berhasil di Simpan !');
    }

    public function edit($id)
    {
        $item = JurusanModel::findOrFail($id);
        return view('admin.pages.master-data.jurusan.form_edit', compact('item'));
    }

    public function update(JurusanRequest $request, $id)
    {
        $item = JurusanModel::findOrFail($id);
        $data = $request->all();

        $item->update($data);
        return redirect()->route('admin-panel.jurusan.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = JurusanModel::findOrFail($id);

        try {
            $item->delete();
        } catch (\Exception $ex) {
            return redirect()->route('admin-panel.jurusan.index')->with('status', 'Berhasil di Hapus !');
        }
    }

    public function list_jurusan()
    {
        $item = JurusanModel::all();
        // dd($item);
        return DataTables::of($item)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/jurusan/' . $item->id_jurusan . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $action .= ' ||<form action="/admin-panel/jurusan/' . $item->id_jurusan . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })->make(true);
    }
}
