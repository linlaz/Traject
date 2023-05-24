<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MitraController extends Controller
{
    public function index()
    {
        $items = User::where("roles", "mitra")->get();
        return view('pages.admin.mitra.index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.admin.mitra.create');
    }

    public function store(Request $request)
    {   
        $request->validate([
            "name"=>'required|unique:users,name|max:255',
            "email"=>'required|unique:users,email|max:255',
            "password"=>'required'

        ]);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles'=> "mitra"
        ]);
        return redirect('/admin/mitra');
    }
    
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.admin.mitra.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            "name"=>'required|unique:users,name,'.$id.'|max:255',
            "email"=>'required|unique:users,email,'.$id.'|max:255',
            "password"=>'required'

        ]);
        $item = User::findOrFail($id);
        $item->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/admin/mitra');
    }

    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect('/admin/mitra');
    }

}
