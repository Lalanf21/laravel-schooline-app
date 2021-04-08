<?php

namespace App\Http\Controllers;

use App\Http\Requests\guruRequest;
use App\model\guruModel;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        return view('admin.pages.pengaturan.guru.index');
    }

    public function create()
    {
        return view('admin.pages.pengaturan.guru.form_add');
    }

    public function store(guruRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        guruModel::create($data);
        return redirect()->route('admin-panel.guru.index')->with('status', 'Berhasil di Simpan !');
    }

    public function show(guruModel $guruModel)
    {
        //
    }

    public function edit($id)
    {
        $item = guruModel::findOrFail($id);
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
