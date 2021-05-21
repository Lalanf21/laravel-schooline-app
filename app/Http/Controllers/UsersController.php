<?php

namespace App\Http\Controllers;

use App\Http\Requests\usersRequest;
use App\Model\guruModel;
use App\User;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $guru = guruModel::all();
        $role = Role::all();
        return view('admin.pages.pengaturan.user.index', compact('guru','role'));
    }


    public function store(usersRequest $request)
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

    public function update(usersRequest $request, $id)
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
        $guru = guruModel::where('nama', $id)->first();
        return response()->json($guru);
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
