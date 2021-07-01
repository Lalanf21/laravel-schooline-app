<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UsersRequest;
use App\Model\GuruModel;
use App\Model\SiswaModel;
use App\User;
use DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $guru = GuruModel::all();
        $role = Role::all();
        return view('admin.pages.pengaturan.user.index', compact('guru','role'));
    }


    public function store(UsersRequest $request)
    {
        $nama = $request->nama;
        $nisn = $request->nisn;
        $password = $request->password;
        $role = $request->role;
        $user = user::create([
            'nama' => $nama,
            'nisn' => $nisn,
            'password' => Hash::make($password)
        ]);

        $user->assignRole($role);
        return redirect()->route('admin-panel.users.index')->with('status', 'Berhasil di Simpan !');
    }

    public function edit($id)
    {
        $items = User::with('roles')->findOrFail($id);
        foreach ($items->roles as $key) {
            $roleUser = $key->name;
        }
        // dd($roleUser);
        $roles = Role::all();
        return view('admin.pages.pengaturan.user.form_edit', compact('items','roles','roleUser'));
    }

    public function update(UsersRequest $request, $id)
    {
        $item = User::findOrFail($id);
        // dd($request->role);
        $item->syncRoles($request->role);
        return redirect()->route('admin-panel.users.index')->with('status', 'Berhasil di Update !');
    }

    public function destroy($id)
    {
        $items = User::findOrFail($id);
        $items = User::with('roles')->findOrFail($id);
        foreach ($items->roles as $key) {
            $roleUser = $key->name;
        }
        $items->delete();
        $items->removeRole($roleUser);
        return redirect()->route('admin-panel.users.index')->with('status', 'Berhasil di Hapus !');
    }

    public function get_nisn($id)
    {
        $guru = GuruModel::where('nama', $id)->first();
        return response()->json($guru);
    }

    public function ubah_foto($id)
    {
        if (Auth()->user()->getRoleNames() == '["guru"]' || '["admin"]') {
            $item = GuruModel::where('nip',$id)->first();
        }else{
            $item = SiswaModel::where('nisn',$id)->first();
        }
        return view('auth.form_ubah_foto', compact('item'));
    }

    public function proses_foto(Request $request, $id)
    {
        if (Auth()->user()->getRoleNames() == '["guru"]' || '["admin"]') {
            $item = GuruModel::where('id_guru', $id)->first();
            $data['foto'] = $request->file('foto')->store('foto/guru', 'public');
        } else {
            $item = SiswaModel::where('id_siswa', $id)->first();
            $data['foto'] = $request->file('foto')->store('foto/siswa', 'public');
        }
        
        if ($item->foto !== 'foto/user.jpg') {
            $file = 'storage/' . $item->foto;
            if (is_file($file)) {
                unlink($file);
            }
        }

        $item->update($data);

        return redirect()->back()->with('status', 'Foto berhasil di ganti !');    
    }

    public function ubah_password($id)
    {
        $item = User::where('id',$id)->first();
        // dd($item);
        return view('auth.form_ubah_sandi', compact('item'));
    }

    public function proses_password(PasswordRequest $request,$id)
    {
        $item = User::where('id', $id)->first();
        $item->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('status', 'Password berhasil di ganti !');    
    }

    public function list_users()
    {
        $item = User::with('roles')->get();
        // dd($item);
        return DataTables::of($item)
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                $action = '<a href="/admin-panel/users/' . $item->id . '/edit" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Edit</a>';
                $action .= ' ||<form action="/admin-panel/users/' . $item->id . '" method="post" class="d-inline">'
                . csrf_field() . method_field("delete") . '
                <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></form>';
                return $action;
            })->make(true);
    }
}
