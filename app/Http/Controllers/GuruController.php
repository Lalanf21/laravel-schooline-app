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
        $data['foto'] = $request->file('foto')->store('foto/guru', 'public');

        guruModel::create($data);

        return redirect()->route('admin-panel.guru.index')->with('status', 'Berhasil di Simpan !');
    }

    public function show(guruModel $guru)
    {
        $nama_mapel = $guru->mapel;
        return view('admin.pages.pengaturan.guru.detail_guru', compact('guru','nama_mapel'));
    }

    public function edit($id)
    {
        $guru = guruModel::findOrFail($id);
        return view('admin.pages.pengaturan.guru.form_edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $item = guruModel::findOrFail($id);
        $data = $request->all();

        // cek apakah ada update foto
        if ($request->hasFile('foto')) {
            $file = 'storage/' . $item->foto;
            if (is_file($file)) {
                unlink($file);
            }
            $data['foto'] = $request->file('foto')->store('foto/guru', 'public');
        }
        // dd($data);
        $item->update($data);
        return redirect()->route('admin-panel.guru.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = guruModel::findOrFail($id);
        $file = 'storage/' . $item->foto;
        if (is_file($file)) {
            unlink($file);
        }

        $item->delete();
        return redirect()->route('admin-panel.guru.index')->with('status', 'Berhasil di Hapus !');
    }

    public function list_guru()
    {
        $item = guruModel::with('mapel')->get();
        // dd($item);
        return DataTables::of($item)
            ->rawColumns(['action','detail'])
            ->addIndexColumn()
            ->addColumn('active', function ($item) {
                if ($item->is_active == '1') {
                    return 'Ya';
                } else {
                    return 'tidak';
                }
            })
            ->addColumn('detail', function ($item) {
                $detail = '<a href="/admin-panel/guru/' . $item->id_guru . '" class="btn btn-light"><i class="fas fa-eye"></i></a>';
                return $detail;
            })
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/guru/' . $item->id_guru . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a>';
                $action .= ' ||<form action="/admin-panel/guru/' . $item->id_guru . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })->make(true);
    }
}
