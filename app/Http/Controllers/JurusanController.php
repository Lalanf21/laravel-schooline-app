<?php

namespace App\Http\Controllers;

use App\Http\Requests\jurusanRequest;
use App\model\jurusanModel;
use Illuminate\Http\Request;
use DataTables;

class JurusanController extends Controller
{
    public function index()
    {
        return view('admin.pages.pengaturan.jurusan.index');
    }


    public function store(jurusanRequest $request)
    {
        $data = $request->all();
        jurusanModel::create($data);
        return redirect()->route('admin-panel.jurusan.index')->with('status', 'Berhasil di Simpan !');
    }

    public function edit($id)
    {
        $item = jurusanModel::findOrFail($id);
        return view('admin.pages.pengaturan.guru.form_edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = guruModel::findOrFail($id);
        $data = $request->all();

        $item->update($data);
        return redirect()->route('admin-panel.guru.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = guruModel::findOrFail($id);

        $item->delete();
        return redirect()->route('admin-panel.guru.index')->with('status', 'Berhasil di Hapus !');
    }

    public function list_guru()
    {
        $item = guruModel::all();
        // dd($item);
        return DataTables::of($item)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/guru/' . $item->id_guru . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a>';
                $action .= ' ||<form action="/admin-panel/guru/' . $item->id_guru . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })->make(true);
    }
}
