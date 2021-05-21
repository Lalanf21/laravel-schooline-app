<?php

namespace App\Http\Controllers;

use App\Http\Requests\mapelRequest;
use App\Model\guruModel;
use App\Model\kelasModel;
use App\model\mapelModel;
use DataTables;

class MapelController extends Controller
{
    public function index()
    {
        $kelas = kelasModel::all();
        $guru = guruModel::all();
        return view('admin.pages.master-data.mapel.index', compact('kelas','guru'));
    }
    
    
    public function store(mapelRequest $request)
    {
        $data = $request->all();
        mapelModel::create($data);
        return redirect()->route('admin-panel.mapel.index')->with('status', 'Berhasil di Simpan !');
    }
    
    public function edit($id)
    {
        $mapel = mapelModel::findOrFail($id);
        $guru = guruModel::all();
        $kelas = kelasModel::all();
        return view('admin.pages.master-data.mapel.form_edit', compact('mapel', 'kelas','guru'));
    }

    public function update(mapelRequest $request, $id)
    {
        $item = mapelModel::findOrFail($id);
        $data = $request->all();

        $item->update($data);
        return redirect()->route('admin-panel.mapel.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = mapelModel::findOrFail($id);

        $item->delete();
        return redirect()->route('admin-panel.mapel.index')->with('status', 'Berhasil di Hapus !');
    }

    public function list_mapel()
    {
        $item = mapelModel::with('kelas')->get();
        // dd($item);
        return DataTables::of($item)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('active', function($item){
                if($item->is_active == '1'){
                    return 'Ya';
                }else{
                    return 'tidak';
                }
            })
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/mapel/' . $item->id_mapel . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $action .= ' ||<form action="/admin-panel/mapel/' . $item->id_mapel . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })->make(true);
    }
}
