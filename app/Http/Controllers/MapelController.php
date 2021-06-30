<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapelGuruRequest;
use App\Http\Requests\MapelRequest;
use App\Model\GuruModel;
use App\Model\KelasModel;
use App\Model\MapelModel;
use DataTables;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $kelas = KelasModel::all();
        $guru = GuruModel::all();
        session()->pull('id_kelas');
        return view('admin.pages.master-data.mapel.index', compact('kelas','guru'));
    }
    
    public function tampil_mapel(Request $request)
    {
        session()->put('id_kelas', $request->id_kelas);
        return view('admin.pages.master-data.mapel.tampil-mapel');
    }
    
    public function store(MapelRequest $request)
    {
        $data = $request->all();
        MapelModel::create($data);
        return redirect()->route('admin-panel.mapel.index')->with('status', 'Berhasil di Simpan !');
    }
    
    public function edit($id)
    {
        $mapel = MapelModel::findOrFail($id);
        $guru = GuruModel::all();
        $kelas = KelasModel::all();
        return view('admin.pages.master-data.mapel.form_edit', compact('mapel', 'kelas','guru'));
    }

    public function update(MapelRequest $request, $id)
    {
        $item = MapelModel::findOrFail($id);
        $data = $request->all();

        $item->update($data);
        return redirect()->route('admin-panel.mapel.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = MapelModel::findOrFail($id);

        $item->delete();
        return redirect()->route('admin-panel.mapel.index')->with('status', 'Berhasil di Hapus !');
    }

    public function list_mapel()
    {
        $kelas = session()->get('id_kelas');
        $item = MapelModel::where('id_kelas', $kelas)->get();
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
