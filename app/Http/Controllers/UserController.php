<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $title = "Usuarios";
        $items = User::all();
        return view('modules.users.index', compact('items', 'title'));
    }

    public function create()
    {
        $title = "Nuevo Usuario";
        return view('modules.users.create', compact('title'));
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active' => true,
            'rol' => $request->rol
        ]);

        return to_route('users');
    }

    public function edit(string $id)
    {
        $item = User::find($id);
        $title = "Editar Usuario";
        return view('modules.users.edit', compact('item', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $item = User::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->rol = $request->rol;
        $item->save();
        return to_route('users');
    }

    public function tbody(){
        $items = User::all();
        return view ('modules.users.tbody', compact('items'));
    }

    public function state($id, $state){
        $item = User::find($id);
        $item->active = $state;
        return $item->save();
    }
}
