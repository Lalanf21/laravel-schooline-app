<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapelGuruRequest;
use App\Model\GuruModel;
use App\Model\MapelGuruModel;
use App\Model\MapelModel;
use Illuminate\Http\Request;
use DataTables;
class MapelGuruController extends Controller
{
    
    public function index()
    {
        $mapel = MapelModel::all();
        $guru = GuruModel::all();
        // dd($guru);
        return view('admin.pages.master-data.mapel.mapel_guru', compact('mapel', 'guru'));
    }

    
    public function create()
    {
        
    }

    
    public function store(MapelGuruRequest $request)
    {
        $cek = MapelGuruModel::where([
            'id_mapel' => $request->id_mapel,
            'id_guru' => $request->id_guru,
        ])->first();
        // dd($cek);
        if ($cek) {
            return redirect()->route('admin-panel.mapel-guru.index')->with('status', 'Data sudah ada !');
        }else{
            MapelGuruModel::create($request->all());
            return redirect()->route('admin-panel.mapel-guru.index')->with('status', 'Berhasil di Tambah !');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = MapelGuruModel::findOrFail($id);
        $mapel = MapelModel::all();
        $guru = GuruModel::all();
        return view('admin.pages.master-data.mapel.edit_mapel_guru', compact('mapel', 'guru','item'));
    }

    public function update(MapelGuruRequest $request, $id)
    {
        $item = MapelGuruModel::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin-panel.mapel-guru.index')->with('status', 'Berhasil di Update !');

    }

    public function destroy($id)
    {
        $item = MapelGuruModel::findOrFail($id);

        $item->delete();
        return redirect()->route('admin-panel.mapel-guru.index')->with('status', 'Berhasil di Hapus !');
    }

    public function list_mapel_guru()
    {
        $item = MapelguruModel::with('mapel', 'guru')->get();
        foreach ($item as $key => $value) {
            $data = $value->mapel->kelas->nama_kelas;
        }
        // dd($data);
        return datatables::of($item)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/mapel-guru/' . $item->id . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i></a>';
                $action .= ' ||<form action="/admin-panel/mapel-guru/' . $item->id . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></form>';
                return $action;
            })->make(true);
    }
}
