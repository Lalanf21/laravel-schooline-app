<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Model\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\VarDumper;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('pages.Siswa.index', compact('siswa'));;

    }

    public function create()
    {
        return view('pages.Siswa.form_add');
    }

    public function store(SiswaRequest $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('foto/siswa', 'public');
        $data['password'] = Hash::make($request->password);

        Siswa::create($data);

        return redirect()->route('siswa.index')->with('status', 'Berhasil di Simpan !');
    }

    public function show(Siswa $siswa)
    {
        return view('pages.siswa.detail_siswa', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        return view('pages.siswa.form_edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $item = Siswa::findOrFail($id);
        $data = $request->all();
        
        // cek apakah ada update foto
        if ($request->hasFile('foto')) {
            $file = 'storage/'.$item->foto;
            if (is_file($file)) {
                unlink($file);
            }
        $data['foto'] = $request->file('foto')->store('foto/siswa', 'public');
        }
        // dd($data);
        $item->update($data);
        return redirect()->route('siswa.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $item = Siswa::findOrFail($id);
        $file = 'storage/' . $item->foto;
        if (is_file($file)) {
            unlink($file);
        }

        $item->delete();
        return redirect()->route('siswa.index')->with('status', 'Berhasil di Hapus !');
    }
}
